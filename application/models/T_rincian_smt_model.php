<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_rincian_smt_model extends CI_Model
{

    public $table = 't_rincian_smt';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_rincian($tahun, $periode)
    {
        $jenis_unit = $this->session->userdata('kode_jenis_unit');
        $unit = $this->session->userdata('kode_unit');
        if ($jenis_unit != 3) {
            $this->db->select('a.*,b.nama_jenis_barang');
            $this->db->from('t_rincian_smt a');
            $this->db->join('m_jenis_barang b', 'a.kode_jenis_barang = b.kode_jenis_barang');
            $this->db->where('a.kode_unit', $unit);
            $this->db->where('a.tahun', $tahun);
            $this->db->where('a.periode', $periode);
            $result = $this->db->get();
        } else {
            $this->db->where('tahun', $tahun);
            $this->db->where('periode', $periode);
            $result = $this->db->get('v_rincian_smt');
        }
        return $result->result();
    }
    function get_rekap($tahun, $periode)
    {
        $this->db->where('tahun', $tahun);
        $this->db->where('periode', $periode);
        $result = $this->db->get('v_rincian_smt_rekap');
        return $result->result();
    }
    function get_rincian_tahun()
    {
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'DESC');
        return $this->db->get($this->table)->result();
    }

    function get_all()
    {
        $jenis_unit = $this->session->userdata('kode_jenis_unit');
        $unit = $this->session->userdata('kode_unit');
        if ($jenis_unit != 3) {
            $this->db->where('kode_unit', $unit);
        }
        $this->db->where('isdelete', '0');
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
        $jenis_unit = $this->session->userdata('kode_jenis_unit');
        $unit = $this->session->userdata('kode_unit');
        if ($jenis_unit != 3) {
            $this->db->where('kode_unit', $unit);
        }
        $this->db->where('isdelete', '0');
        $this->db->group_start();
        $this->db->like('id', $q);
        $this->db->or_like('tahun', $q);
        $this->db->or_like('periode', $q);
        $this->db->or_like('kode_kabupaten', $q);
        $this->db->or_like('kode_unit', $q);
        $this->db->or_like('kode_jenis_barang', $q);
        $this->db->or_like('jumlah_harga', $q);
        $this->db->or_like('no_ba', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdelete', $q);
        $this->db->group_end();
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $jenis_unit = $this->session->userdata('kode_jenis_unit');
        $unit = $this->session->userdata('kode_unit');
        if ($jenis_unit != 3) {
            $this->db->where('kode_unit', $unit);
        }
        $this->db->where('isdelete', '0');
        $this->db->order_by($this->id, $this->order);
        $this->db->group_start();
        $this->db->like('id', $q);
        $this->db->or_like('tahun', $q);
        $this->db->or_like('periode', $q);
        $this->db->or_like('kode_kabupaten', $q);
        $this->db->or_like('kode_unit', $q);
        $this->db->or_like('kode_jenis_barang', $q);
        $this->db->or_like('jumlah_harga', $q);
        $this->db->or_like('no_ba', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('created_date', $q);
        $this->db->or_like('updated_by', $q);
        $this->db->or_like('updated_date', $q);
        $this->db->or_like('isdelete', $q);
        $this->db->group_end();
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

/* End of file T_rincian_smt_model.php */
/* Location: ./application/models/T_rincian_smt_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-28 04:14:50 */
/* http://harviacode.com */