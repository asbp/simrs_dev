<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_profil_rumah_sakit_model extends CI_Model
{

    public $table = 'tbl_profil_rumah_sakit';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama_rumah_sakit', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('propinsi', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('no_telpon', $q);
	$this->db->or_like('logo', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama_rumah_sakit', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('propinsi', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('no_telpon', $q);
	$this->db->or_like('logo', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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

/* End of file Tbl_profil_rumah_sakit_model.php */
/* Location: ./application/models/Tbl_profil_rumah_sakit_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-10 01:06:29 */
/* http://harviacode.com */