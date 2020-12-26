<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pengadaan_barang_model extends CI_Model
{

    public $table = 't_pengadaan_barang';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('id,tahun,periode,kode_kabupaten,kode_unit,kode_jenis_belanja,nama_jenis_belanja,kode_kelompok_barang,nama_kelompok_barang,barang,spesifikasi_barang,tanggal_kontrak,no_kontrak,tanggal_ba,no_ba,jumlah_barang,satuan,harga_satuan,total,kode_unit_peruntukan,id_vendor,keterangan,created_by,created_date,updated_by,updated_date,isdelete');
        $this->datatables->from('t_pengadaan_barang');
        //add this line for join
        //$this->datatables->join('table2', 't_pengadaan_barang.field = table2.field');
        $this->datatables->where('isdelete', 0);
        $this->datatables->add_column('action', anchor(site_url('t_pengadaan_barang/read/$1'), '<i class="fal fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm waves-effect waves-themed')) . "
            " . anchor(site_url('t_pengadaan_barang/update/$1'), '<i class="fal fa-pencil" aria-hidden="true"></i>', array('class' => 'btn btn-warning btn-sm waves-effect waves-themed')) . "
                " . anchor(site_url('t_pengadaan_barang/delete/$1'), '<i class="fal fa-trash" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm waves-effect waves-themed" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->where('kode_unit', $this->session->userdata('kode_unit'));
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
        $this->db->like('id', $q);
        $this->db->or_like('tahun', $q);
        $this->db->or_like('periode', $q);
        $this->db->or_like('kode_kabupaten', $q);
        $this->db->or_like('kode_unit', $q);
        $this->db->or_like('kode_jenis_belanja', $q);
        $this->db->or_like('nama_jenis_belanja', $q);
        $this->db->or_like('kode_kelompok_barang', $q);
        $this->db->or_like('nama_kelompok_barang', $q);
        $this->db->or_like('barang', $q);
        $this->db->or_like('spesifikasi_barang', $q);
        $this->db->or_like('tanggal_kontrak', $q);
        $this->db->or_like('no_kontrak', $q);
        $this->db->or_like('tanggal_ba', $q);
        $this->db->or_like('no_ba', $q);
        $this->db->or_like('jumlah_barang', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('kode_unit_peruntukan', $q);
        $this->db->or_like('id_vendor', $q);
        $this->db->or_like('keterangan', $q);
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
        $this->db->or_like('tahun', $q);
        $this->db->or_like('periode', $q);
        $this->db->or_like('kode_kabupaten', $q);
        $this->db->or_like('kode_unit', $q);
        $this->db->or_like('kode_jenis_belanja', $q);
        $this->db->or_like('nama_jenis_belanja', $q);
        $this->db->or_like('kode_kelompok_barang', $q);
        $this->db->or_like('nama_kelompok_barang', $q);
        $this->db->or_like('barang', $q);
        $this->db->or_like('spesifikasi_barang', $q);
        $this->db->or_like('tanggal_kontrak', $q);
        $this->db->or_like('no_kontrak', $q);
        $this->db->or_like('tanggal_ba', $q);
        $this->db->or_like('no_ba', $q);
        $this->db->or_like('jumlah_barang', $q);
        $this->db->or_like('satuan', $q);
        $this->db->or_like('harga_satuan', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('kode_unit_peruntukan', $q);
        $this->db->or_like('id_vendor', $q);
        $this->db->or_like('keterangan', $q);
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

/* End of file T_pengadaan_barang_model.php */
/* Location: ./application/models/T_pengadaan_barang_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-24 09:47:46 */
/* http://harviacode.com */