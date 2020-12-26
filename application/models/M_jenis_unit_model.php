<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jenis_unit_model extends CI_Model
{

    public $table = 'm_jenis_unit';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,kode_jenis_unit,nama_jenis_unit,created_by,created_date,updated_by,updated_date,isdelete');
        $this->datatables->from('m_jenis_unit');
        //add this line for join
        //$this->datatables->join('table2', 'm_jenis_unit.field = table2.field');
        $this->datatables->where('isdelete', 0);
        $this->datatables->add_column('action', anchor(site_url('m_jenis_unit/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('m_jenis_unit/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('m_jenis_unit/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
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

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('kode_jenis_unit', $q);
        $this->db->or_like('nama_jenis_unit', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdelete', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('kode_jenis_unit', $q);
        $this->db->or_like('nama_jenis_unit', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdelete', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $data = array(
            'updated_by' => $this->session->userdata('full_name'),
            'updated_date' => date('Y-m-d H:i:s'),
            'isdelete' => 1,
        );
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
}

/* End of file M_jenis_unit_model.php */
/* Location: ./application/models/M_jenis_unit_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-24 09:31:28 */
/* http://harviacode.com */