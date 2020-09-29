<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaan extends Private_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Tbl_pengadaan_obat_alkes_bhp_model');
    }

    public function index()
    {
        $data = [];
        $data['create_link'] = base_url("pengadaan/create");
        $data['file_name'] = "LAPORAN PENGADAAN BARANG";
        $data['title'] = "LAPORAN PENGADAAN BARANG";
        $data['message'] = "";

        $this->template->load('template', 'pengadaan/tbl_pengadaan_obat_alkes_bhp_list', $data);
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_pengadaan_obat_alkes_bhp_model->json();
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan Transaksi',
            'action' => site_url('pengadaan/create_action'),
            'no_faktur' => set_value('no_faktur'),
            'tanggal' => set_value('tanggal'),
            'kode_supplier' => set_value('kode_supplier'),
        );
        $this->template->load('template', 'pengadaan/tbl_pengadaan_obat_alkes_bhp_form', $data);
    }

    function getKodeSupplier($namaSupplier)
    {
        $this->db->where('nama_supplier', $namaSupplier);
        $data = $this->db->get('tbl_supplier')->row_array();
        return $data['kode_supplier'];
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'no_faktur' => $this->input->post('no_faktur', TRUE),
                'tanggal' => $this->input->post('tanggal', TRUE),
                'kode_supplier' => $this->input->post('kode_supplier', TRUE),
            );

            if ($this->Tbl_pengadaan_obat_alkes_bhp_model->insert($data)) {
                $this->session->set_flashdata('success', "Berhasil membuat data.");
            } else {
                $this->session->set_flashdata('error', "Gagal membuat data. Silakan coba lagi setelah beberapa saat");
            }

            redirect(site_url('pengadaan'));
        }
    }

    public function update($id)
    {
        $row = $this->Tbl_pengadaan_obat_alkes_bhp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengadaan/update_action'),
                'no_faktur' => set_value('no_faktur', $row->no_faktur),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
            );
            $this->template->load('template', 'pengadaan/tbl_pengadaan_obat_alkes_bhp_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data yang tersedia.');
            redirect(site_url('pengadaan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_faktur', TRUE));
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal', TRUE),
                'kode_supplier' => $this->input->post('kode_supplier', TRUE),
            );

            if ($this->Tbl_pengadaan_obat_alkes_bhp_model->update($this->input->post('no_faktur', TRUE), $data)) {
                $this->session->set_flashdata('success', "Berhasil memperbarui data.");
            } else {
                $this->session->set_flashdata('error', "Gagal memperbarui data.");
            }
            redirect(site_url('pengadaan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tbl_pengadaan_obat_alkes_bhp_model->get_by_id($id);

        if ($row) {
            if($this->Tbl_pengadaan_obat_alkes_bhp_model->delete($id)) {
            	$this->session->set_flashdata('success', "Berhasil menghapus data.");
            } else {
            	$this->session->set_flashdata('error', "Gagal menghapus data.");
            }

            redirect(site_url('pengadaan'));

        } else {
            $this->session->set_flashdata('error', 'Tidak ada data yang tersedia.');
            redirect(site_url('pengadaan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('kode_supplier', 'kode supplier', 'trim|required');

        $this->form_validation->set_rules('no_faktur', 'no_faktur', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function add_ajax()
    {
        $kode_barang = $this->input->post('kode_barang');
        $qty    =  $this->input->post('qty');
        $harga  = $this->input->post('harga');
        $faktur = $this->input->post('faktur');

        if(empty($kode_barang) || empty($qty) || empty($harga)  || empty($faktur)) {
            return "Masih ada yang kosong!";
        }

        $data = array('kode_barang' => $kode_barang, 'qty' => $qty, 'no_faktur' => $faktur, 'harga' => $harga);
        
        $this->db->insert('tbl_pengadaan_detail', $data);
    }

    function list_pengadaan()
    {
        $faktur = $_GET['faktur'];
        echo "<table class='table table-bordered'>
                <tr><th>NO</th><th>NAMA BARANG</th><th>QTY</th><th>HARGA</th></tr>";
        $sql = "SELECT tb2.kode_barang,tb2.nama_barang,tb1.harga,tb1.qty,tb1.id_pengadaan
                FROM tbl_pengadaan_detail as tb1, tbl_obat_alkes_bhp as tb2
                WHERE tb1.kode_barang=tb2.kode_barang and tb1.no_faktur='$faktur'";

        $list = $this->db->query($sql)->result();
        $no = 1;
        foreach ($list as $row) {
            echo "<tr>
                <td width='10'>$no</td>
                <td>$row->nama_barang</td>
                <td width='20'>$row->qty</td>
                <td width='100'>$row->harga</td>
                <td width='100' onClick='hapus($row->id_pengadaan)'><button class='btn btn-danger btn-sm'>Hapus</button></td>
                </tr>";
            $no++;
        }
        echo " </table>";
    }

    function hapus_ajax()
    {
        $id_pengadaan = $_GET['id_pengadaan'];
        $this->db->where('id_pengadaan', $id_pengadaan);
        $this->db->delete('tbl_pengadaan_detail');
    }
}

/* End of file Pengadaan.php */
/* Location: ./application/controllers/Pengadaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-10 02:07:42 */
/* http://harviacode.com */