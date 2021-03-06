<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jabatan extends Private_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Tbl_jabatan_model');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = [];
        $data['create_link'] = base_url("jabatan/create");
        $data['file_name'] = "LAPORAN JABATAN";
        $data['title'] = "LAPORAN JABATAN";
        $data['message'] = "";
        $this->template->load('template', 'jabatan/tbl_jabatan_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Tbl_jabatan_model->json();
    }


    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jabatan/create_action'),
            'id' => set_value('id'),
            'nama_jabatan' => set_value('nama_jabatan'),
        );
        $this->template->load('template', 'jabatan/tbl_jabatan_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
            );

            if ($this->Tbl_jabatan_model->insert($data)) {
                $this->session->set_flashdata('success', "Berhasil membuat data.");
            } else {
                $this->session->set_flashdata('error', "Gagal membuat data. Silakan coba lagi setelah beberapa saat");
            }

            redirect(site_url('jabatan'));
        }
    }

    public function update($id)
    {
        $row = $this->Tbl_jabatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jabatan/update_action'),
                'id' => set_value('id', $row->id),
                'nama_jabatan' => set_value('nama_jabatan', $row->nama_jabatan),
            );
            $this->template->load('template', 'jabatan/tbl_jabatan_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data yang tersedia.');
            redirect(site_url('jabatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_jabatan' => $this->input->post('nama_jabatan', TRUE),
            );

            if ($this->Tbl_jabatan_model->update($this->input->post('id', TRUE), $data)) {
                $this->session->set_flashdata('success', "Berhasil memperbarui data.");
            } else {
                $this->session->set_flashdata('error', "Gagal memperbarui data.");
            }

            redirect(site_url('jabatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tbl_jabatan_model->get_by_id($id);

        if ($row) {
            if ($this->Tbl_jabatan_model->delete($id)) {
                $this->session->set_flashdata('success', "Berhasil menghapus data.");
            } else {
                $this->session->set_flashdata('error', "Gagal menghapus data.");
            }

            redirect(site_url('jabatan'));
        } else {
            $this->session->set_flashdata('error', 'Tidak ada data yang tersedia.');
            redirect(site_url('jabatan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_jabatan.xls";
        $judul = "tbl_jabatan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Jabatan");

        foreach ($this->Tbl_jabatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_jabatan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_jabatan.doc");

        $data = array(
            'tbl_jabatan_data' => $this->Tbl_jabatan_model->get_all(),
            'start' => 0
        );

        $this->load->view('jabatan/tbl_jabatan_doc', $data);
    }
}

/* End of file Jabatan.php */
/* Location: ./application/controllers/Jabatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-28 15:38:27 */
/* http://harviacode.com */