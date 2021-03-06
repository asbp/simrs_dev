<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_obat_alkes_bhp_model extends CI_Model
{

    public $table = 'tbl_obat_alkes_bhp';
    public $id = 'kode_barang';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function json() {
        $actions = "
        <div class=\"btn-group\" role=\"group\">
            <a href=\"".site_url('dataobat/update/$1')."\" class=\"btn btn-default\"><i class=\"fa fa-pen\"></i> Edit</a>
            <a href=\"".site_url('dataobat/delete/$1')."\" class=\"btn btn-danger\" onclick=\"javascript: return confirm('Apakah Anda yakin?')\"><i class=\"fa fa-trash-alt\"></i> Hapus</a>
        </div>
        ";

        $this->datatables->select("kode_barang, kode_barang, nama_barang, nama_kategori, nama_satuan, harga, nama_kategori_harga_brg");
        $this->datatables->from($this->table);

        $this->datatables->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang=tbl_obat_alkes_bhp.id_kategori_barang');
        $this->datatables->join('tbl_kategori_harga_brg', 'tbl_kategori_harga_brg.id_kategori_harga_brg=tbl_obat_alkes_bhp.id_kategori_harga_brg');
        $this->datatables->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan=tbl_obat_alkes_bhp.id_satuan_barang');

        $this->datatables->add_column('action', $actions, 'kode_barang');

        return $this->datatables->generate();
    }

    function get($id = "", $q = "", $limit = 10, $start = 0)
    {
        $this->db->order_by($this->id, $this->order);

        $this->db->where($this->id, $id);

        if (!empty($q)) {
            $this->db->like('tbl_obat_alkes_bhp.kode_barang', $q);
            $this->db->or_like('tbl_obat_alkes_bhp.nama_barang', $q);
            $this->db->or_like('tbl_obat_alkes_bhp.id_kategori_barang', $q);
            $this->db->or_like('tbl_obat_alkes_bhp.id_satuan_barang', $q);
            $this->db->or_like('tbl_obat_alkes_bhp.harga', $q);
        }

        $this->db->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang=tbl_obat_alkes_bhp.id_kategori_barang');
        $this->db->join('tbl_kategori_harga_brg', 'tbl_kategori_harga_brg.id_kategori_harga_brg=tbl_obat_alkes_bhp.id_kategori_harga_brg');
        $this->db->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan=tbl_obat_alkes_bhp.id_satuan_barang');

        $this->db->limit($limit, $start);

        return $this->db->get($this->table);
    }

    function ajax() {
        return $this->ajax->select("kode_barang, kode_barang, nama_barang, nama_kategori, nama_satuan, harga, nama_kategori_harga_brg")
                          ->from($this->table)
                          ->limit(10)
                          ->join('tbl_kategori_barang', 'tbl_kategori_barang.id_kategori_barang=tbl_obat_alkes_bhp.id_kategori_barang')
                          ->join('tbl_kategori_harga_brg', 'tbl_kategori_harga_brg.id_kategori_harga_brg=tbl_obat_alkes_bhp.id_kategori_harga_brg')
                          ->join('tbl_satuan_barang', 'tbl_satuan_barang.id_satuan=tbl_obat_alkes_bhp.id_satuan_barang')
                          ->generate();

    }

    // get all
    function get_all()
    {
        return $this->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        return $this->get($id)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        return $this->get("", $q)->num_rows();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        return $this->get("", $q, $limit, $start)->result();
    }

    // insert data
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);

    }
}

/* End of file Tbl_obat_alkes_bhp_model.php */
/* Location: ./application/models/Tbl_obat_alkes_bhp_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-09 11:24:01 */
/* http://harviacode.com */