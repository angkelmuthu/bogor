<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_rkbmd extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_rkbmd_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $data = array(
		// 	't_rkbmd_data' => $t_rkbmd,
		// );
		$this->template->load('template', 't_rkbmd/t_rkbmd_list');
	}
	public function export_xls()
	{
		$this->load->view('t_rkbmd/export_xls');
	}
	public function read($id)
	{
		$row = $this->T_rkbmd_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'id_parent' => $row->id_parent,
				'level' => $row->level,
				'tahun' => $row->tahun,
				'kode_unit' => $row->kode_unit,
				'nama' => $row->nama,
				'kode_barang' => $row->kode_barang,
				'nama_barang' => $row->nama_barang,
				'semula_jumlah' => $row->semula_jumlah,
				'semula_satuan' => $row->semula_satuan,
				'menjadi_jumlah' => $row->menjadi_jumlah,
				'menjadi_satuan' => $row->menjadi_satuan,
				'alasan_perubahan' => $row->alasan_perubahan,
				'km_jumlah' => $row->km_jumlah,
				'km_satuan' => $row->km_satuan,
				'optim_kode_barang' => $row->optim_kode_barang,
				'optim_nama_barang' => $row->optim_nama_barang,
				'optim_jumlah' => $row->optim_jumlah,
				'optim_satuan' => $row->optim_satuan,
				'riil_jumlah' => $row->riil_jumlah,
				'riil_satuan' => $row->riil_satuan,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'isdelete' => $row->isdelete,
			);
			$this->template->load('template', 't_rkbmd/t_rkbmd_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_rkbmd'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('t_rkbmd/create_action'),
			'id' => set_value('id'),
			'id_parent' => set_value('id_parent'),
			'level' => set_value('level'),
			'tahun' => set_value('tahun'),
			'kode_unit' => set_value('kode_unit'),
			'nama' => set_value('nama'),
			'kode_barang' => set_value('kode_barang'),
			'nama_barang' => set_value('nama_barang'),
			'semula_jumlah' => set_value('semula_jumlah'),
			'semula_satuan' => set_value('semula_satuan'),
			'menjadi_jumlah' => set_value('menjadi_jumlah'),
			'menjadi_satuan' => set_value('menjadi_satuan'),
			'alasan_perubahan' => set_value('alasan_perubahan'),
			'km_jumlah' => set_value('km_jumlah'),
			'km_satuan' => set_value('km_satuan'),
			'optim_kode_barang' => set_value('optim_kode_barang'),
			'optim_nama_barang' => set_value('optim_nama_barang'),
			'optim_jumlah' => set_value('optim_jumlah'),
			'optim_satuan' => set_value('optim_satuan'),
			'riil_jumlah' => set_value('riil_jumlah'),
			'riil_satuan' => set_value('riil_satuan'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdelete' => set_value('isdelete'),
		);
		$this->template->load('template', 't_rkbmd/t_rkbmd_form', $data);
	}

	public function create_action()
	{
		// $this->_rules();

		// if ($this->form_validation->run() == FALSE) {
		// 	$this->create();
		// } else {
		$data = array(
			'id_parent' => $this->input->post('id_parent', TRUE),
			'level' => $this->input->post('level', TRUE),
			'tahun' => $this->input->post('tahun', TRUE),
			'kode_unit' => $this->input->post('kode_unit', TRUE),
			'nama' => $this->input->post('nama', TRUE),
			'kode_barang' => $this->input->post('kode_barang', TRUE),
			'nama_barang' => $this->input->post('nama_barang', TRUE),
			'semula_jumlah' => $this->input->post('semula_jumlah', TRUE),
			'semula_satuan' => $this->input->post('semula_satuan', TRUE),
			'menjadi_jumlah' => $this->input->post('menjadi_jumlah', TRUE),
			'menjadi_satuan' => $this->input->post('menjadi_satuan', TRUE),
			'alasan_perubahan' => $this->input->post('alasan_perubahan', TRUE),
			'km_jumlah' => $this->input->post('km_jumlah', TRUE),
			'km_satuan' => $this->input->post('km_satuan', TRUE),
			'optim_kode_barang' => $this->input->post('optim_kode_barang', TRUE),
			'optim_nama_barang' => $this->input->post('optim_nama_barang', TRUE),
			'optim_jumlah' => $this->input->post('optim_jumlah', TRUE),
			'optim_satuan' => $this->input->post('optim_satuan', TRUE),
			'riil_jumlah' => $this->input->post('riil_jumlah', TRUE),
			'riil_satuan' => $this->input->post('riil_satuan', TRUE),
			'created_by' => $this->session->userdata('full_name'),
			'created_date' => date('Y-m-d H:i:s'),
			//'updated_by' => date('Y-m-d H:i:s'),
			//'updated_date' => $this->session->userdata('nama'),
			'isdelete' => 0,
		);

		$this->T_rkbmd_model->insert($data);
		$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
		redirect(site_url('t_rkbmd?tahun=' . $this->input->post('tahun') . '&kode_unit=' . $this->session->userdata('kode_unit')));
		//}
	}

	public function create_program()
	{
		$data = array(
			'id_parent' => '0',
			'level' => '1',
			'tahun' => $this->input->post('tahun', TRUE),
			'kode_unit' => $this->session->userdata('kode_unit'),
			'nama' => $this->input->post('nama', TRUE),
			'created_by' => $this->session->userdata('full_name'),
			'created_date' => date('Y-m-d H:i:s'),
			//'updated_by' => date('Y-m-d H:i:s'),
			//'updated_date' => $this->session->userdata('nama'),
			'isdelete' => 0,
		);

		$this->T_rkbmd_model->insert($data);
		$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
		</button><strong> Create Record Success</strong></div>');
		redirect(site_url('t_rkbmd?tahun=' . $this->input->post('tahun') . '&kode_unit=' . $this->session->userdata('kode_unit')));
	}
	public function update_judul()
	{
		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'updated_by' => date('Y-m-d H:i:s'),
			'updated_date' => $this->session->userdata('nama'),
			'isdelete' => 0,
		);
		$this->T_rkbmd_model->update($this->input->post('id', TRUE), $data);
		$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
		</button><strong> Create Record Success</strong></div>');
		redirect(site_url('t_rkbmd?tahun=' . $this->input->post('tahun') . '&kode_unit=' . $this->session->userdata('kode_unit')));
	}
	public function create_kegiatan()
	{
		$data = array(
			'id_parent' => $this->input->post('id_parent', TRUE),
			'level' => '2',
			'tahun' => $this->input->post('tahun', TRUE),
			'kode_unit' => $this->session->userdata('kode_unit'),
			'nama' => $this->input->post('nama', TRUE),
			'created_by' => $this->session->userdata('full_name'),
			'created_date' => date('Y-m-d H:i:s'),
			//'updated_by' => date('Y-m-d H:i:s'),
			//'updated_date' => $this->session->userdata('nama'),
			'isdelete' => 0,
		);

		$this->T_rkbmd_model->insert($data);
		$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
		</button><strong> Create Record Success</strong></div>');
		redirect(site_url('t_rkbmd?tahun=' . $this->input->post('tahun') . '&kode_unit=' . $this->session->userdata('kode_unit')));
	}

	public function create_output()
	{
		$data = array(
			'id_parent' => $this->input->post('id_parent', TRUE),
			'level' => '3',
			'tahun' => $this->input->post('tahun', TRUE),
			'kode_unit' => $this->session->userdata('kode_unit'),
			'nama' => $this->input->post('nama', TRUE),
			'created_by' => $this->session->userdata('full_name'),
			'created_date' => date('Y-m-d H:i:s'),
			//'updated_by' => date('Y-m-d H:i:s'),
			//'updated_date' => $this->session->userdata('nama'),
			'isdelete' => 0,
		);

		$this->T_rkbmd_model->insert($data);
		$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fal fa-times"></i></span>
		</button><strong> Create Record Success</strong></div>');
		redirect(site_url('t_rkbmd?tahun=' . $this->input->post('tahun') . '&kode_unit=' . $this->session->userdata('kode_unit')));
	}


	public function update($id)
	{
		$row = $this->T_rkbmd_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_rkbmd/update_action'),
				'id' => set_value('id', $row->id),
				'id_parent' => set_value('id_parent', $row->id_parent),
				'level' => set_value('level', $row->level),
				'tahun' => set_value('tahun', $row->tahun),
				'kode_unit' => set_value('kode_unit', $row->kode_unit),
				'nama' => set_value('nama', $row->nama),
				'kode_barang' => set_value('kode_barang', $row->kode_barang),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'semula_jumlah' => set_value('semula_jumlah', $row->semula_jumlah),
				'semula_satuan' => set_value('semula_satuan', $row->semula_satuan),
				'menjadi_jumlah' => set_value('menjadi_jumlah', $row->menjadi_jumlah),
				'menjadi_satuan' => set_value('menjadi_satuan', $row->menjadi_satuan),
				'alasan_perubahan' => set_value('alasan_perubahan', $row->alasan_perubahan),
				'km_jumlah' => set_value('km_jumlah', $row->km_jumlah),
				'km_satuan' => set_value('km_satuan', $row->km_satuan),
				'optim_kode_barang' => set_value('optim_kode_barang', $row->optim_kode_barang),
				'optim_nama_barang' => set_value('optim_nama_barang', $row->optim_nama_barang),
				'optim_jumlah' => set_value('optim_jumlah', $row->optim_jumlah),
				'optim_satuan' => set_value('optim_satuan', $row->optim_satuan),
				'riil_jumlah' => set_value('riil_jumlah', $row->riil_jumlah),
				'riil_satuan' => set_value('riil_satuan', $row->riil_satuan),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdelete' => set_value('isdelete', $row->isdelete),
			);
			$this->template->load('template', 't_rkbmd/t_rkbmd_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_rkbmd'));
		}
	}

	public function update_action()
	{
		// $this->_rules();

		// if ($this->form_validation->run() == FALSE) {
		// 	$this->update($this->input->post('id', TRUE));
		// } else {
		$data = array(
			'id_parent' => $this->input->post('id_parent', TRUE),
			'level' => $this->input->post('level', TRUE),
			'tahun' => $this->input->post('tahun', TRUE),
			'kode_unit' => $this->input->post('kode_unit', TRUE),
			'nama' => $this->input->post('nama', TRUE),
			'kode_barang' => $this->input->post('kode_barang', TRUE),
			'nama_barang' => $this->input->post('nama_barang', TRUE),
			'semula_jumlah' => $this->input->post('semula_jumlah', TRUE),
			'semula_satuan' => $this->input->post('semula_satuan', TRUE),
			'menjadi_jumlah' => $this->input->post('menjadi_jumlah', TRUE),
			'menjadi_satuan' => $this->input->post('menjadi_satuan', TRUE),
			'alasan_perubahan' => $this->input->post('alasan_perubahan', TRUE),
			'km_jumlah' => $this->input->post('km_jumlah', TRUE),
			'km_satuan' => $this->input->post('km_satuan', TRUE),
			'optim_kode_barang' => $this->input->post('optim_kode_barang', TRUE),
			'optim_nama_barang' => $this->input->post('optim_nama_barang', TRUE),
			'optim_jumlah' => $this->input->post('optim_jumlah', TRUE),
			'optim_satuan' => $this->input->post('optim_satuan', TRUE),
			'riil_jumlah' => $this->input->post('riil_jumlah', TRUE),
			'riil_satuan' => $this->input->post('riil_satuan', TRUE),
			//'created_by' => $this->input->post('created_by', TRUE),
			//'created_date' => $this->input->post('created_date', TRUE),
			'updated_by' => $this->session->userdata('full_name'),
			'updated_date' => date('Y-m-d H:i:s'),
			//'isdelete' => $this->input->post('isdelete', TRUE),
		);

		$this->T_rkbmd_model->update($this->input->post('id', TRUE), $data);
		$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
		redirect(site_url('t_rkbmd?tahun=' . $this->input->post('tahun') . '&kode_unit=' . $this->session->userdata('kode_unit')));
		//}
	}

	public function delete($id, $tahun, $kode_unit)
	{
		$row = $this->T_rkbmd_model->get_by_id($id);

		if ($row) {
			$this->T_rkbmd_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_rkbmd?tahun=' . $tahun . '&kode_unit=' . $kode_unit));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_rkbmd?tahun=' . $tahun . '&kode_unit=' . $kode_unit));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_parent', 'id parent', 'trim|required');
		$this->form_validation->set_rules('level', 'level', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('kode_unit', 'kode unit', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('kode_barang', 'kode barang', 'trim|required');
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
		$this->form_validation->set_rules('semula_jumlah', 'semula jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('semula_satuan', 'semula satuan', 'trim|required');
		$this->form_validation->set_rules('menjadi_jumlah', 'menjadi jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('menjadi_satuan', 'menjadi satuan', 'trim|required');
		$this->form_validation->set_rules('alasan_perubahan', 'alasan perubahan', 'trim|required');
		$this->form_validation->set_rules('km_jumlah', 'km jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('km_satuan', 'km satuan', 'trim|required');
		$this->form_validation->set_rules('optim_kode_barang', 'optim kode barang', 'trim|required');
		$this->form_validation->set_rules('optim_nama_barang', 'optim nama barang', 'trim|required');
		$this->form_validation->set_rules('optim_jumlah', 'optim jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('optim_satuan', 'optim satuan', 'trim|required');
		$this->form_validation->set_rules('riil_jumlah', 'riil jumlah', 'trim|required|numeric');
		$this->form_validation->set_rules('riil_satuan', 'riil satuan', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		$this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file T_rkbmd.php */
/* Location: ./application/controllers/T_rkbmd.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-23 16:51:42 */
/* http://harviacode.com */
