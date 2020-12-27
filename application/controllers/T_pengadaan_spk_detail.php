<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_pengadaan_spk_detail extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_pengadaan_spk_detail_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->template->load('template', 't_pengadaan_spk_detail/t_pengadaan_spk_detail_list');
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->T_pengadaan_spk_detail_model->json();
	}

	public function read($id)
	{
		$row = $this->T_pengadaan_spk_detail_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'id_spk' => $row->id_spk,
				'kode_jenis_belanja' => $row->kode_jenis_belanja,
				'nama_jenis_belanja' => $row->nama_jenis_belanja,
				'kode_kelompok_barang' => $row->kode_kelompok_barang,
				'nama_kelompok_barang' => $row->nama_kelompok_barang,
				'barang' => $row->barang,
				'spesifikasi_barang' => $row->spesifikasi_barang,
				'jumlah_barang' => $row->jumlah_barang,
				'satuan' => $row->satuan,
				'harga_satuan' => $row->harga_satuan,
				'total' => $row->total,
				'keterangan' => $row->keterangan,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'isdelete' => $row->isdelete,
			);
			$this->template->load('template', 't_pengadaan_spk_detail/t_pengadaan_spk_detail_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_pengadaan_spk_detail'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('t_pengadaan_spk_detail/create_action'),
			'id' => set_value('id'),
			'id_spk' => set_value('id_spk'),
			'kode_jenis_belanja' => set_value('kode_jenis_belanja'),
			'nama_jenis_belanja' => set_value('nama_jenis_belanja'),
			'kode_kelompok_barang' => set_value('kode_kelompok_barang'),
			'nama_kelompok_barang' => set_value('nama_kelompok_barang'),
			'barang' => set_value('barang'),
			'spesifikasi_barang' => set_value('spesifikasi_barang'),
			'jumlah_barang' => set_value('jumlah_barang'),
			'satuan' => set_value('satuan'),
			'harga_satuan' => set_value('harga_satuan'),
			'total' => set_value('total'),
			'keterangan' => set_value('keterangan'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdelete' => set_value('isdelete'),
		);
		$this->template->load('template', 't_pengadaan_spk_detail/t_pengadaan_spk_detail_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'id_spk' => $this->input->post('id_spk', TRUE),
				'kode_jenis_belanja' => $this->input->post('kode_jenis_belanja', TRUE),
				'nama_jenis_belanja' => $this->input->post('nama_jenis_belanja', TRUE),
				'kode_kelompok_barang' => $this->input->post('kode_kelompok_barang', TRUE),
				'nama_kelompok_barang' => $this->input->post('nama_kelompok_barang', TRUE),
				'barang' => $this->input->post('barang', TRUE),
				'spesifikasi_barang' => $this->input->post('spesifikasi_barang', TRUE),
				'jumlah_barang' => $this->input->post('jumlah_barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdelete' => $this->input->post('isdelete', TRUE),
			);

			$this->T_pengadaan_spk_detail_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
			redirect(site_url('t_pengadaan_spk_detail'));
		}
	}

	public function update($id)
	{
		$row = $this->T_pengadaan_spk_detail_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_pengadaan_spk_detail/update_action'),
				'id' => set_value('id', $row->id),
				'id_spk' => set_value('id_spk', $row->id_spk),
				'kode_jenis_belanja' => set_value('kode_jenis_belanja', $row->kode_jenis_belanja),
				'nama_jenis_belanja' => set_value('nama_jenis_belanja', $row->nama_jenis_belanja),
				'kode_kelompok_barang' => set_value('kode_kelompok_barang', $row->kode_kelompok_barang),
				'nama_kelompok_barang' => set_value('nama_kelompok_barang', $row->nama_kelompok_barang),
				'barang' => set_value('barang', $row->barang),
				'spesifikasi_barang' => set_value('spesifikasi_barang', $row->spesifikasi_barang),
				'jumlah_barang' => set_value('jumlah_barang', $row->jumlah_barang),
				'satuan' => set_value('satuan', $row->satuan),
				'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
				'total' => set_value('total', $row->total),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdelete' => set_value('isdelete', $row->isdelete),
			);
			$this->template->load('template', 't_pengadaan_spk_detail/t_pengadaan_spk_detail_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_pengadaan_spk_detail'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'id_spk' => $this->input->post('id_spk', TRUE),
				'kode_jenis_belanja' => $this->input->post('kode_jenis_belanja', TRUE),
				'nama_jenis_belanja' => $this->input->post('nama_jenis_belanja', TRUE),
				'kode_kelompok_barang' => $this->input->post('kode_kelompok_barang', TRUE),
				'nama_kelompok_barang' => $this->input->post('nama_kelompok_barang', TRUE),
				'barang' => $this->input->post('barang', TRUE),
				'spesifikasi_barang' => $this->input->post('spesifikasi_barang', TRUE),
				'jumlah_barang' => $this->input->post('jumlah_barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_date' => $this->input->post('updated_date', TRUE),
				'isdelete' => $this->input->post('isdelete', TRUE),
			);

			$this->T_pengadaan_spk_detail_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
			redirect(site_url('t_pengadaan_spk_detail'));
		}
	}

	public function delete($id)
	{
		$row = $this->T_pengadaan_spk_detail_model->get_by_id($id);

		if ($row) {
			$this->T_pengadaan_spk_detail_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_pengadaan_spk_detail'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_pengadaan_spk_detail'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_spk', 'id spk', 'trim|required');
		$this->form_validation->set_rules('kode_jenis_belanja', 'kode jenis belanja', 'trim|required');
		$this->form_validation->set_rules('nama_jenis_belanja', 'nama jenis belanja', 'trim|required');
		$this->form_validation->set_rules('kode_kelompok_barang', 'kode kelompok barang', 'trim|required');
		$this->form_validation->set_rules('nama_kelompok_barang', 'nama kelompok barang', 'trim|required');
		$this->form_validation->set_rules('barang', 'barang', 'trim|required');
		$this->form_validation->set_rules('spesifikasi_barang', 'spesifikasi barang', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah barang', 'trim|required|numeric');
		$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
		$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required|numeric');
		$this->form_validation->set_rules('total', 'total', 'trim|required|numeric');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		$this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file T_pengadaan_spk_detail.php */
/* Location: ./application/controllers/T_pengadaan_spk_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-27 15:35:29 */
/* http://harviacode.com */