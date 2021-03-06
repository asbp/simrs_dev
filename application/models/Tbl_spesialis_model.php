<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_spesialis_model extends CI_Model
{

    public $table = 'tbl_dokter_spesialis';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,nama_spesialis');
        $this->datatables->from('tbl_dokter_spesialis');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_dokter_spesialis.field = table2.field');
        $this->datatables->add_column('action', 
                anchor(site_url('spesialis/update/$1'),'<i class="fa fa-pen" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('spesialis/delete/$1'),'<i class="fa fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Apakah Anda yakin?\')"'), 'id');
        return $this->datatables->generate();
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

/* End of file Tbl_spesialis_model.php */
/* Location: ./application/models/Tbl_spesialis_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-27 18:34:40 */
/* http://harviacode.com */