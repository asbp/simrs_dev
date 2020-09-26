<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pasien_model extends CI_Model
{

    public $table = 'tbl_pasien';
    public $id = 'no_rekamedis';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function json()
    {
        $this->datatables->select("no_rekamedis, nama_pasien, jenis_kelamin, nama_gol_darah, tempat_lahir, tanggal_lahir, nama_ibu, nama_status_menikah");
        $this->datatables->from($this->table);

        $actions = "
        <div class=\"btn-group\" role=\"group\">
            <a href=\"".site_url('pasien/update/$1')."\" class=\"btn btn-sm btn-default\"><i class=\"fa fa-pen\"></i> Edit</a>
            <a href=\"".site_url('pasien/delete/$1')."\" class=\"btn btn-sm btn-danger\" onclick=\"javascript: return confirm('Apakah Anda yakin?')\"><i class=\"fa fa-trash-alt\"></i> Hapus</a>
        </div>
        ";

        $this->datatables->join('tbl_status_menikah', 'tbl_status_menikah.id_status_menikah = tbl_pasien.status_menikah');
        
        $this->datatables->join("tbl_gol_darah", "tbl_gol_darah.id_gol_darah = {$this->table}.id_gol_darah");

        $this->datatables->add_column('action', $actions, 'no_rekamedis');

        return $this->datatables->generate();
    } 

    function get($id = "", $q = "", $limit = 10, $start = 0)
    {
        if (!empty($id)) $this->db->where($this->id, $id);


        if (!empty($q)) {
            $this->db->like('tbl_pasien.no_rekamedis', $q);
            $this->db->or_like('tbl_pasien.nama_pasien', $q);
            $this->db->or_like('tbl_pasien.jenis_kelamin', $q);
            $this->db->or_like('tbl_pasien.id_gol_darah', $q);
            $this->db->or_like('tbl_pasien.tempat_lahir', $q);
            $this->db->or_like('tbl_pasien.tanggal_lahir', $q);
            $this->db->or_like('tbl_pasien.nama_ibu', $q);
            $this->db->or_like('tbl_pasien.alamat', $q);
            $this->db->or_like('tbl_pasien.id_agama', $q);
            $this->db->or_like('tbl_pasien.status_menikah', $q);
            $this->db->or_like('tbl_pasien.no_hp', $q);
            $this->db->or_like('tbl_pasien.id_pekerjaan', $q);
        }

        $this->db->join('tbl_status_menikah', 'tbl_status_menikah.id_status_menikah = tbl_pasien.status_menikah');
        
        $this->db->join("tbl_gol_darah", "tbl_gol_darah.id_gol_darah = {$this->table}.id_gol_darah");

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

/* End of file Tbl_pasien_model.php */
/* Location: ./application/models/Tbl_pasien_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-03 15:02:10 */
/* http://harviacode.com */