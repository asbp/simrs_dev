<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pegawai_model extends CI_Model
{

    public $table = 'tbl_pegawai';
    public $id = 'id';
    public $pk = 'tbl_pegawai.id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select("{$this->pk},nik,nama_pegawai,npwp,nama_jabatan,nama_jenjang,nama_departemen,nama_bidang");
        $this->datatables->from('tbl_pegawai');
        //add this line for join
        $this->datatables->join('tbl_pegawai_jabatan', 'tbl_pegawai.id_jabatan = tbl_pegawai_jabatan.id');
        $this->datatables->join('tbl_jenjang', 'tbl_pegawai.id_jenjang = tbl_jenjang.id');
        $this->datatables->join('tbl_pegawai_departemen', 'tbl_pegawai.id_departemen = tbl_pegawai_departemen.id');
        $this->datatables->join('tbl_pegawai_bidang', 'tbl_pegawai.id_bidang = tbl_pegawai_bidang.id');


        $this->datatables->add_column('action', "$2 $3" .
            anchor(site_url('pegawai/update/$1'), '<i class="fa fa-pen" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm')) . "&nbsp;" .
            anchor(site_url('pegawai/delete/$1'), '<i class="fa fa-trash-alt" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda yakin?\')"'), 'id, make_apoteker(nama_jabatan, id), make_keuangan(nama_departemen, id)');
        return $this->datatables->generate();
    }

    function get($id = "", $q = "", $limit = 10, $start = 0)
    {
        $this->db->order_by($this->id, $this->order);

        $this->db->where($this->id, $id);

        $this->db->limit($limit, $start);
        return $this->db->get($this->table);
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

    // get data by id
    function get_by_id_array($id)
    {
        return $this->get($id)->row_array();
    }

    // insert data
    function insert($data)
    {
        return $this->db->insert($this->table, stamp($data));
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, stamp($data));
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);

    }
}

/* End of file Tbl_pegawai_model.php */
/* Location: ./application/models/Tbl_pegawai_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-28 16:16:01 */
/* http://harviacode.com */