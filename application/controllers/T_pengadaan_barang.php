<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class T_pengadaan_barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('T_pengadaan_barang_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$data = array(
			'all' => $this->T_pengadaan_barang_model->get_all(),
		);
		$this->template->load('template', 't_pengadaan_barang/t_pengadaan_barang_list', $data);
	}

	public function excelx()
	{
		$data = array(
			'all' => $this->T_pengadaan_barang_model->get_all(),
		);
		$this->load->view('t_pengadaan_barang/excel', $data);
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->T_pengadaan_barang_model->json();
	}

	public function read($id)
	{
		$row = $this->T_pengadaan_barang_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'tahun' => $row->tahun,
				'periode' => $row->periode,
				'kode_kabupaten' => $row->kode_kabupaten,
				'kode_unit' => $row->kode_unit,
				'kode_jenis_belanja' => $row->kode_jenis_belanja,
				'nama_jenis_belanja' => $row->nama_jenis_belanja,
				'kode_kelompok_barang' => $row->kode_kelompok_barang,
				'nama_kelompok_barang' => $row->nama_kelompok_barang,
				'barang' => $row->barang,
				'spesifikasi_barang' => $row->spesifikasi_barang,
				'tanggal_kontrak' => $row->tanggal_kontrak,
				'no_kontrak' => $row->no_kontrak,
				'tanggal_ba' => $row->tanggal_ba,
				'no_ba' => $row->no_ba,
				'jumlah_barang' => $row->jumlah_barang,
				'satuan' => $row->satuan,
				'harga_satuan' => $row->harga_satuan,
				'total' => $row->total,
				'kode_unit_peruntukan' => $row->kode_unit_peruntukan,
				'id_vendor' => $row->id_vendor,
				'keterangan' => $row->keterangan,
				'created_by' => $row->created_by,
				'created_date' => $row->created_date,
				'updated_by' => $row->updated_by,
				'updated_date' => $row->updated_date,
				'isdelete' => $row->isdelete,
			);
			$this->template->load('template', 't_pengadaan_barang/t_pengadaan_barang_read', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_pengadaan_barang'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('t_pengadaan_barang/create_action'),
			'id' => set_value('id'),
			'tahun' => set_value('tahun'),
			'periode' => set_value('periode'),
			'kode_kabupaten' => set_value('kode_kabupaten'),
			'kode_unit' => set_value('kode_unit'),
			'kode_jenis_belanja' => set_value('kode_jenis_belanja'),
			'nama_jenis_belanja' => set_value('nama_jenis_belanja'),
			'kode_kelompok_barang' => set_value('kode_kelompok_barang'),
			'nama_kelompok_barang' => set_value('nama_kelompok_barang'),
			'barang' => set_value('barang'),
			'spesifikasi_barang' => set_value('spesifikasi_barang'),
			'tanggal_kontrak' => set_value('tanggal_kontrak'),
			'no_kontrak' => set_value('no_kontrak'),
			'tanggal_ba' => set_value('tanggal_ba'),
			'no_ba' => set_value('no_ba'),
			'jumlah_barang' => set_value('jumlah_barang'),
			'satuan' => set_value('satuan'),
			'harga_satuan' => set_value('harga_satuan'),
			'total' => set_value('total'),
			'kode_unit_peruntukan' => set_value('kode_unit_peruntukan'),
			'id_vendor' => set_value('id_vendor'),
			'keterangan' => set_value('keterangan'),
			'created_by' => set_value('created_by'),
			'created_date' => set_value('created_date'),
			'updated_by' => set_value('updated_by'),
			'updated_date' => set_value('updated_date'),
			'isdelete' => set_value('isdelete'),
		);
		$this->template->load('template', 't_pengadaan_barang/t_pengadaan_barang_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'tahun' => $this->input->post('tahun', TRUE),
				'periode' => $this->input->post('periode', TRUE),
				'kode_kabupaten' => $this->input->post('kode_kabupaten', TRUE),
				'kode_unit' => $this->input->post('kode_unit', TRUE),
				'kode_jenis_belanja' => $this->input->post('kode_jenis_belanja', TRUE),
				'nama_jenis_belanja' => $this->input->post('nama_jenis_belanja', TRUE),
				'kode_kelompok_barang' => $this->input->post('kode_kelompok_barang', TRUE),
				'nama_kelompok_barang' => $this->input->post('nama_kelompok_barang', TRUE),
				'barang' => $this->input->post('barang', TRUE),
				'spesifikasi_barang' => $this->input->post('spesifikasi_barang', TRUE),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak', TRUE),
				'no_kontrak' => $this->input->post('no_kontrak', TRUE),
				'tanggal_ba' => $this->input->post('tanggal_ba', TRUE),
				'no_ba' => $this->input->post('no_ba', TRUE),
				'jumlah_barang' => $this->input->post('jumlah_barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'kode_unit_peruntukan' => $this->input->post('kode_unit_peruntukan', TRUE),
				'id_vendor' => $this->input->post('id_vendor', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'created_by' => $this->session->userdata('full_name'),
				'created_date' => date('Y-m-d H:i:s'),
				//'updated_by' => date('Y-m-d H:i:s'),
				//'updated_date' => $this->session->userdata('nama'),
				'isdelete' => 0,
			);

			$this->T_pengadaan_barang_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
			redirect(site_url('t_pengadaan_barang'));
		}
	}

	public function update($id)
	{
		$row = $this->T_pengadaan_barang_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('t_pengadaan_barang/update_action'),
				'id' => set_value('id', $row->id),
				'tahun' => set_value('tahun', $row->tahun),
				'periode' => set_value('periode', $row->periode),
				'kode_kabupaten' => set_value('kode_kabupaten', $row->kode_kabupaten),
				'kode_unit' => set_value('kode_unit', $row->kode_unit),
				'kode_jenis_belanja' => set_value('kode_jenis_belanja', $row->kode_jenis_belanja),
				'nama_jenis_belanja' => set_value('nama_jenis_belanja', $row->nama_jenis_belanja),
				'kode_kelompok_barang' => set_value('kode_kelompok_barang', $row->kode_kelompok_barang),
				'nama_kelompok_barang' => set_value('nama_kelompok_barang', $row->nama_kelompok_barang),
				'barang' => set_value('barang', $row->barang),
				'spesifikasi_barang' => set_value('spesifikasi_barang', $row->spesifikasi_barang),
				'tanggal_kontrak' => set_value('tanggal_kontrak', $row->tanggal_kontrak),
				'no_kontrak' => set_value('no_kontrak', $row->no_kontrak),
				'tanggal_ba' => set_value('tanggal_ba', $row->tanggal_ba),
				'no_ba' => set_value('no_ba', $row->no_ba),
				'jumlah_barang' => set_value('jumlah_barang', $row->jumlah_barang),
				'satuan' => set_value('satuan', $row->satuan),
				'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
				'total' => set_value('total', $row->total),
				'kode_unit_peruntukan' => set_value('kode_unit_peruntukan', $row->kode_unit_peruntukan),
				'id_vendor' => set_value('id_vendor', $row->id_vendor),
				'keterangan' => set_value('keterangan', $row->keterangan),
				'created_by' => set_value('created_by', $row->created_by),
				'created_date' => set_value('created_date', $row->created_date),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_date' => set_value('updated_date', $row->updated_date),
				'isdelete' => set_value('isdelete', $row->isdelete),
			);
			$this->template->load('template', 't_pengadaan_barang/t_pengadaan_barang_form', $data);
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_pengadaan_barang'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'tahun' => $this->input->post('tahun', TRUE),
				'periode' => $this->input->post('periode', TRUE),
				'kode_kabupaten' => $this->input->post('kode_kabupaten', TRUE),
				'kode_unit' => $this->input->post('kode_unit', TRUE),
				'kode_jenis_belanja' => $this->input->post('kode_jenis_belanja', TRUE),
				'nama_jenis_belanja' => $this->input->post('nama_jenis_belanja', TRUE),
				'kode_kelompok_barang' => $this->input->post('kode_kelompok_barang', TRUE),
				'nama_kelompok_barang' => $this->input->post('nama_kelompok_barang', TRUE),
				'barang' => $this->input->post('barang', TRUE),
				'spesifikasi_barang' => $this->input->post('spesifikasi_barang', TRUE),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak', TRUE),
				'no_kontrak' => $this->input->post('no_kontrak', TRUE),
				'tanggal_ba' => $this->input->post('tanggal_ba', TRUE),
				'no_ba' => $this->input->post('no_ba', TRUE),
				'jumlah_barang' => $this->input->post('jumlah_barang', TRUE),
				'satuan' => $this->input->post('satuan', TRUE),
				'harga_satuan' => $this->input->post('harga_satuan', TRUE),
				'total' => $this->input->post('total', TRUE),
				'kode_unit_peruntukan' => $this->input->post('kode_unit_peruntukan', TRUE),
				'id_vendor' => $this->input->post('id_vendor', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				//'created_by' => $this->input->post('created_by', TRUE),
				//'created_date' => $this->input->post('created_date', TRUE),
				'updated_by' => $this->session->userdata('full_name'),
				'updated_date' => date('Y-m-d H:i:s'),
				//'isdelete' => $this->input->post('isdelete', TRUE),
			);

			$this->T_pengadaan_barang_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
			redirect(site_url('t_pengadaan_barang'));
		}
	}

	public function delete($id)
	{
		$row = $this->T_pengadaan_barang_model->get_by_id($id);

		if ($row) {
			$this->T_pengadaan_barang_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
			redirect(site_url('t_pengadaan_barang'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
			redirect(site_url('t_pengadaan_barang'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('periode', 'periode', 'trim|required');
		$this->form_validation->set_rules('kode_kabupaten', 'kode kabupaten', 'trim|required');
		$this->form_validation->set_rules('kode_unit', 'kode unit', 'trim|required');
		$this->form_validation->set_rules('kode_jenis_belanja', 'kode jenis belanja', 'trim|required');
		$this->form_validation->set_rules('nama_jenis_belanja', 'nama jenis belanja', 'trim|required');
		$this->form_validation->set_rules('kode_kelompok_barang', 'kode kelompok barang', 'trim|required');
		$this->form_validation->set_rules('nama_kelompok_barang', 'nama kelompok barang', 'trim|required');
		$this->form_validation->set_rules('barang', 'barang', 'trim|required');
		$this->form_validation->set_rules('spesifikasi_barang', 'spesifikasi barang', 'trim|required');
		$this->form_validation->set_rules('tanggal_kontrak', 'tanggal kontrak', 'trim|required');
		$this->form_validation->set_rules('no_kontrak', 'no kontrak', 'trim|required');
		$this->form_validation->set_rules('tanggal_ba', 'tanggal ba', 'trim|required');
		$this->form_validation->set_rules('no_ba', 'no ba', 'trim|required');
		$this->form_validation->set_rules('jumlah_barang', 'jumlah barang', 'trim|required|numeric');
		$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
		$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required|numeric');
		$this->form_validation->set_rules('total', 'total', 'trim|required|numeric');
		$this->form_validation->set_rules('kode_unit_peruntukan', 'kode unit peruntukan', 'trim|required');
		$this->form_validation->set_rules('id_vendor', 'id vendor', 'trim|required');
		//$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		// $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
		// $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
		// $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
		// $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
		// $this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		if (isset($_GET['tahun'])) {
			$tahun = $_GET['tahun'];
		} else {
			$tahun = date('Y');
		}
		$this->load->helper('exportexcel');
		$namaFile = "pengadaan_barang.xls";
		$judul = "DAFTAR HASIL PENGADAAN BARANG";
		$tablehead = 4;
		$tableheadsub = 5;
		$tablebody = 6;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();
		xlsWriteLabel(0, 0, $judul);
		xlsWriteLabel(1, 0, 'TAHUN ANGGARAN ' . $tahun);
		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, 1, 2, "SPK/KONTRAK");
		xlsWriteLabel($tablehead, $kolomhead++, "BA PENERIMAAN BARANG");
		// xlsWriteLabel($tableheadsub, $kolomhead++, "Kode Jenis Belanja");
		// xlsWriteLabel($tableheadsub, $kolomhead++, "Nama Jenis Belanja");
		$kolomheadsub = 0;
		xlsWriteLabel($tableheadsub, $kolomheadsub++, "Tanggal Kontrak");
		xlsWriteLabel($tableheadsub, $kolomheadsub++, "No Kontrak");
		xlsWriteLabel($tableheadsub, $kolomheadsub++, "Tanggal Ba");
		xlsWriteLabel($tableheadsub, $kolomheadsub++, "No Ba");


		foreach ($this->T_pengadaan_barang_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			// xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
			// xlsWriteLabel($tablebody, $kolombody++, $data->periode);
			// xlsWriteLabel($tablebody, $kolombody++, $data->kode_kabupaten);
			// xlsWriteLabel($tablebody, $kolombody++, $data->kode_unit);
			// xlsWriteLabel($tablebody, $kolombody++, $data->kode_jenis_belanja);
			// xlsWriteLabel($tablebody, $kolombody++, $data->nama_jenis_belanja);
			// xlsWriteLabel($tablebody, $kolombody++, $data->kode_kelompok_barang);
			// xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelompok_barang);
			// xlsWriteLabel($tablebody, $kolombody++, $data->barang);
			// xlsWriteLabel($tablebody, $kolombody++, $data->spesifikasi_barang);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_kontrak);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_kontrak);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_ba);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_ba);
			// xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_barang);
			// xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
			// xlsWriteNumber($tablebody, $kolombody++, $data->harga_satuan);
			// xlsWriteNumber($tablebody, $kolombody++, $data->total);
			// xlsWriteLabel($tablebody, $kolombody++, $data->kode_unit_peruntukan);
			// xlsWriteNumber($tablebody, $kolombody++, $data->id_vendor);
			// xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
			// xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
			// xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
			// xlsWriteLabel($tablebody, $kolombody++, $data->updated_by);
			// xlsWriteLabel($tablebody, $kolombody++, $data->updated_date);
			// xlsWriteLabel($tablebody, $kolombody++, $data->isdelete);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}
}

/* End of file T_pengadaan_barang.php */
/* Location: ./application/controllers/T_pengadaan_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-24 09:47:46 */
/* http://harviacode.com */