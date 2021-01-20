<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_stock_opname extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_stock_opname_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->uri->segment(3));

		if ($q <> '') {
			$config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'index.php/t_stock_opname/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'index.php/t_stock_opname/index/';
			$config['first_url'] = base_url() . 'index.php/t_stock_opname/index/';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = FALSE;
		$config['total_rows'] = $this->T_stock_opname_model->total_rows($q);
		$t_stock_opname = $this->T_stock_opname_model->get_limit_data($config['per_page'], $start, $q);
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			't_stock_opname_data' => $t_stock_opname,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
		);
		$this->template->load('template', 't_stock_opname/t_stock_opname_list', $data);
	}

	public function read($id)
	{
		$row = $this->T_stock_opname_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'kode_jenis_barang' => $row->kode_jenis_barang,
				'tahun' => $row->tahun,
				'tanggal_so' => $row->tanggal_so,
				'no_so' => $row->no_so,
				'kode_kabupaten' => $row->kode_kabupaten,
				'kode_unit' => $row->kode_unit,
				'barang' => $row->barang,
				'satuan' => $row->satuan,
				'saldo_awal' => $row->saldo_awal,
				'tanggal_awal' => $row->tanggal_awal,
				'jumlah_penerimaan_1' => $row->jumlah_penerimaan_1,
				'jumlah_penerimaan_2' => $row->jumlah_penerimaan_2,
				'jumlah_persediaan' => $row->jumlah_persediaan,
				'jumlah_pengeluaran' => $row->jumlah_pengeluaran,
				'saldo_adm' => $row->saldo_adm,
				'saldo_fisik' => $row->saldo_fisik,
				'harga_satuan' => $row->harga_satuan,
				'nilai_persediaan' => $row->nilai_persediaan,
				'selisih_unit' => $row->selisih_unit,
				'selisih_rupiah' => $row->selisih_rupiah,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'isdelete' => $row->isdelete,
			);
			$this->template->load('template', 't_stock_opname/t_stock_opname_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_stock_opname'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('t_stock_opname/create_action'),
			'id' => set_value('id'),
			'kode_jenis_barang' => set_value('kode_jenis_barang'),
			'tahun' => set_value('tahun'),
			'tanggal_so' => set_value('tanggal_so'),
			'no_so' => set_value('no_so'),
			'kode_kabupaten' => set_value('kode_kabupaten'),
			'kode_unit' => set_value('kode_unit'),
			'barang' => set_value('barang'),
			'satuan' => set_value('satuan'),
			'saldo_awal' => set_value('saldo_awal'),
			'tanggal_awal' => set_value('tanggal_awal'),
			'jumlah_penerimaan_1' => set_value('jumlah_penerimaan_1'),
			'jumlah_penerimaan_2' => set_value('jumlah_penerimaan_2'),
			'jumlah_persediaan' => set_value('jumlah_persediaan'),
			'jumlah_pengeluaran' => set_value('jumlah_pengeluaran'),
			'saldo_adm' => set_value('saldo_adm'),
			'saldo_fisik' => set_value('saldo_fisik'),
			'harga_satuan' => set_value('harga_satuan'),
			'nilai_persediaan' => set_value('nilai_persediaan'),
			'selisih_unit' => set_value('selisih_unit'),
			'selisih_rupiah' => set_value('selisih_rupiah'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdelete' => set_value('isdelete'),
		);
		$this->template->load('template', 't_stock_opname/t_stock_opname_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kode_jenis_barang' => $this->input->post('kode_jenis_barang', TRUE),
				'tahun' => $this->input->post('tahun', TRUE),
				'tanggal_so' => $this->input->post('tanggal_so', TRUE),
				'no_so' => $this->input->post('no_so', TRUE),
				'kode_kabupaten' => $this->session->userdata('kode_kabupaten'),
				'kode_unit' => $this->session->userdata('kode_unit'),
				'barang' => $this->input->post('barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'saldo_awal' => $this->input->post('saldo_awal', TRUE),
				'tanggal_awal' => $this->input->post('tanggal_awal', TRUE),
				'jumlah_penerimaan_1' => $this->input->post('jumlah_penerimaan_1', TRUE),
				'jumlah_penerimaan_2' => $this->input->post('jumlah_penerimaan_2', TRUE),
				'jumlah_persediaan' => $this->input->post('jumlah_persediaan', TRUE),
				'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran', TRUE),
				'saldo_adm' => $this->input->post('saldo_adm', TRUE),
				'saldo_fisik' => $this->input->post('saldo_fisik', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'nilai_persediaan' => $this->input->post('nilai_persediaan', TRUE),
				'selisih_unit' => $this->input->post('selisih_unit', TRUE),
				'selisih_rupiah' => $this->input->post('selisih_rupiah', TRUE),
				'created_by' => $this->session->userdata('full_name'),
				'created_date' => date('Y-m-d H:i:s'),
				//'updated_by' => date('Y-m-d H:i:s'),
				//'updated_date' => $this->session->userdata('nama'),
				'isdelete' => 0,
			);

			$this->T_stock_opname_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
			redirect(site_url('t_stock_opname'));
		}
	}

	public function update($id)
	{
		$row = $this->T_stock_opname_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_stock_opname/update_action'),
				'id' => set_value('id', $row->id),
				'kode_jenis_barang' => set_value('kode_jenis_barang', $row->kode_jenis_barang),
				'tahun' => set_value('tahun', $row->tahun),
				'tanggal_so' => set_value('tanggal_so', $row->tanggal_so),
				'no_so' => set_value('no_so', $row->no_so),
				'kode_kabupaten' => set_value('kode_kabupaten', $row->kode_kabupaten),
				'kode_unit' => set_value('kode_unit', $row->kode_unit),
				'barang' => set_value('barang', $row->barang),
				'satuan' => set_value('satuan', $row->satuan),
				'saldo_awal' => set_value('saldo_awal', $row->saldo_awal),
				'tanggal_awal' => set_value('tanggal_awal', $row->tanggal_awal),
				'jumlah_penerimaan_1' => set_value('jumlah_penerimaan_1', $row->jumlah_penerimaan_1),
				'jumlah_penerimaan_2' => set_value('jumlah_penerimaan_2', $row->jumlah_penerimaan_2),
				'jumlah_persediaan' => set_value('jumlah_persediaan', $row->jumlah_persediaan),
				'jumlah_pengeluaran' => set_value('jumlah_pengeluaran', $row->jumlah_pengeluaran),
				'saldo_adm' => set_value('saldo_adm', $row->saldo_adm),
				'saldo_fisik' => set_value('saldo_fisik', $row->saldo_fisik),
				'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
				'nilai_persediaan' => set_value('nilai_persediaan', $row->nilai_persediaan),
				'selisih_unit' => set_value('selisih_unit', $row->selisih_unit),
				'selisih_rupiah' => set_value('selisih_rupiah', $row->selisih_rupiah),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdelete' => set_value('isdelete', $row->isdelete),
			);
			$this->template->load('template', 't_stock_opname/t_stock_opname_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_stock_opname'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'kode_jenis_barang' => $this->input->post('kode_jenis_barang', TRUE),
				'tahun' => $this->input->post('tahun', TRUE),
				'tanggal_so' => $this->input->post('tanggal_so', TRUE),
				'no_so' => $this->input->post('no_so', TRUE),
				'kode_kabupaten' => $this->session->userdata('kode_kabupaten'),
				'kode_unit' => $this->session->userdata('kode_unit'),
				'barang' => $this->input->post('barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'saldo_awal' => $this->input->post('saldo_awal', TRUE),
				'tanggal_awal' => $this->input->post('tanggal_awal', TRUE),
				'jumlah_penerimaan_1' => $this->input->post('jumlah_penerimaan_1', TRUE),
				'jumlah_penerimaan_2' => $this->input->post('jumlah_penerimaan_2', TRUE),
				'jumlah_persediaan' => $this->input->post('jumlah_persediaan', TRUE),
				'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran', TRUE),
				'saldo_adm' => $this->input->post('saldo_adm', TRUE),
				'saldo_fisik' => $this->input->post('saldo_fisik', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'nilai_persediaan' => $this->input->post('nilai_persediaan', TRUE),
				'selisih_unit' => $this->input->post('selisih_unit', TRUE),
				'selisih_rupiah' => $this->input->post('selisih_rupiah', TRUE),
				//'created_by' => $this->input->post('created_by', TRUE),
				//'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->session->userdata('full_name'),
				'updated_date' => date('Y-m-d H:i:s'),
				//'isdelete' => $this->input->post('isdelete', TRUE),
			);

			$this->T_stock_opname_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
			redirect(site_url('t_stock_opname'));
		}
	}

	public function delete($id)
	{
		$row = $this->T_stock_opname_model->get_by_id($id);

		if ($row) {
			$this->T_stock_opname_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_stock_opname'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_stock_opname'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_jenis_barang', 'kode jenis barang', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('tanggal_so', 'tanggal so', 'trim|required');
		$this->form_validation->set_rules('no_so', 'no so', 'trim|required');
		//$this->form_validation->set_rules('kode_kabupaten', 'kode kabupaten', 'trim|required');
		//$this->form_validation->set_rules('kode_unit', 'kode unit', 'trim|required');
		$this->form_validation->set_rules('barang', 'barang', 'trim|required');
		$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
		$this->form_validation->set_rules('saldo_awal', 'saldo awal', 'trim|required|numeric');
		$this->form_validation->set_rules('tanggal_awal', 'tanggal awal', 'trim|required');
		$this->form_validation->set_rules('jumlah_penerimaan_1', 'jumlah penerimaan 1', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_penerimaan_2', 'jumlah penerimaan 2', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_persediaan', 'jumlah persediaan', 'trim|required|numeric');
		$this->form_validation->set_rules('jumlah_pengeluaran', 'jumlah pengeluaran', 'trim|required|numeric');
		$this->form_validation->set_rules('saldo_adm', 'saldo adm', 'trim|required|numeric');
		$this->form_validation->set_rules('saldo_fisik', 'saldo fisik', 'trim|required|numeric');
		$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required|numeric');
		$this->form_validation->set_rules('nilai_persediaan', 'nilai persediaan', 'trim|required|numeric');
		$this->form_validation->set_rules('selisih_unit', 'selisih unit', 'trim|required|numeric');
		$this->form_validation->set_rules('selisih_rupiah', 'selisih rupiah', 'trim|required|numeric');
		// $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		// $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		// $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		// $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		// $this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}

/* End of file T_stock_opname.php */
/* Location: ./application/controllers/T_stock_opname.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-20 16:11:33 */
/* http://harviacode.com */