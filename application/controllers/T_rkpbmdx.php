<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_rkpbmdx extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_rkpbmd_modelx');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_rkpbmdx/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_rkpbmdx/index/';
            $config['first_url'] = base_url() . 'index.php/t_rkpbmdx/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_rkpbmd_modelx->total_rows($q);
        $t_rkpbmdx = $this->T_rkpbmd_modelx->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_rkpbmdx_data' => $t_rkpbmdx,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','t_rkpbmdx/t_rkpbmd_list', $data);
    }

    public function read($id)
    {
        $row = $this->T_rkpbmd_modelx->get_by_id($id);
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
		'jumlah_barang' => $row->jumlah_barang,
		'satuan_barang' => $row->satuan_barang,
		'status_barang' => $row->status_barang,
		'kondisi_barang_b' => $row->kondisi_barang_b,
		'kondisi_barang_rr' => $row->kondisi_barang_rr,
		'kondisi_barang_rb' => $row->kondisi_barang_rb,
		'nama_peliharaan' => $row->nama_peliharaan,
		'semula_jumlah' => $row->semula_jumlah,
		'semula_satuan' => $row->semula_satuan,
		'menjadi_jumlah' => $row->menjadi_jumlah,
		'menjadi_satuan' => $row->menjadi_satuan,
		'alasan_perubahan' => $row->alasan_perubahan,
		'ket' => $row->ket,
		'created_by' => $row->created_by,
		'created_date' => $row->created_date,
		'updated_by' => $row->updated_by,
		'updated_date' => $row->updated_date,
		'isdelete' => $row->isdelete,
	    );
            $this->template->load('template','t_rkpbmdx/t_rkpbmd_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_rkpbmdx'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_rkpbmdx/create_action'),
	    'id' => set_value('id'),
	    'id_parent' => set_value('id_parent'),
	    'level' => set_value('level'),
	    'tahun' => set_value('tahun'),
	    'kode_unit' => set_value('kode_unit'),
	    'nama' => set_value('nama'),
	    'kode_barang' => set_value('kode_barang'),
	    'nama_barang' => set_value('nama_barang'),
	    'jumlah_barang' => set_value('jumlah_barang'),
	    'satuan_barang' => set_value('satuan_barang'),
	    'status_barang' => set_value('status_barang'),
	    'kondisi_barang_b' => set_value('kondisi_barang_b'),
	    'kondisi_barang_rr' => set_value('kondisi_barang_rr'),
	    'kondisi_barang_rb' => set_value('kondisi_barang_rb'),
	    'nama_peliharaan' => set_value('nama_peliharaan'),
	    'semula_jumlah' => set_value('semula_jumlah'),
	    'semula_satuan' => set_value('semula_satuan'),
	    'menjadi_jumlah' => set_value('menjadi_jumlah'),
	    'menjadi_satuan' => set_value('menjadi_satuan'),
	    'alasan_perubahan' => set_value('alasan_perubahan'),
	    'ket' => set_value('ket'),
	    'created_by' => set_value('created_by'),
	    'created_date' => set_value('created_date'),
	    'updated_by' => set_value('updated_by'),
	    'updated_date' => set_value('updated_date'),
	    'isdelete' => set_value('isdelete'),
	);
        $this->template->load('template','t_rkpbmdx/t_rkpbmd_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_parent' => $this->input->post('id_parent',TRUE),
		'level' => $this->input->post('level',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'kode_unit' => $this->input->post('kode_unit',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'jumlah_barang' => $this->input->post('jumlah_barang',TRUE),
		'satuan_barang' => $this->input->post('satuan_barang',TRUE),
		'status_barang' => $this->input->post('status_barang',TRUE),
		'kondisi_barang_b' => $this->input->post('kondisi_barang_b',TRUE),
		'kondisi_barang_rr' => $this->input->post('kondisi_barang_rr',TRUE),
		'kondisi_barang_rb' => $this->input->post('kondisi_barang_rb',TRUE),
		'nama_peliharaan' => $this->input->post('nama_peliharaan',TRUE),
		'semula_jumlah' => $this->input->post('semula_jumlah',TRUE),
		'semula_satuan' => $this->input->post('semula_satuan',TRUE),
		'menjadi_jumlah' => $this->input->post('menjadi_jumlah',TRUE),
		'menjadi_satuan' => $this->input->post('menjadi_satuan',TRUE),
		'alasan_perubahan' => $this->input->post('alasan_perubahan',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdelete' => $this->input->post('isdelete',TRUE),
	    );

            $this->T_rkpbmd_modelx->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_rkpbmdx'));
        }
    }

    public function update($id)
    {
        $row = $this->T_rkpbmd_modelx->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_rkpbmdx/update_action'),
		'id' => set_value('id', $row->id),
		'id_parent' => set_value('id_parent', $row->id_parent),
		'level' => set_value('level', $row->level),
		'tahun' => set_value('tahun', $row->tahun),
		'kode_unit' => set_value('kode_unit', $row->kode_unit),
		'nama' => set_value('nama', $row->nama),
		'kode_barang' => set_value('kode_barang', $row->kode_barang),
		'nama_barang' => set_value('nama_barang', $row->nama_barang),
		'jumlah_barang' => set_value('jumlah_barang', $row->jumlah_barang),
		'satuan_barang' => set_value('satuan_barang', $row->satuan_barang),
		'status_barang' => set_value('status_barang', $row->status_barang),
		'kondisi_barang_b' => set_value('kondisi_barang_b', $row->kondisi_barang_b),
		'kondisi_barang_rr' => set_value('kondisi_barang_rr', $row->kondisi_barang_rr),
		'kondisi_barang_rb' => set_value('kondisi_barang_rb', $row->kondisi_barang_rb),
		'nama_peliharaan' => set_value('nama_peliharaan', $row->nama_peliharaan),
		'semula_jumlah' => set_value('semula_jumlah', $row->semula_jumlah),
		'semula_satuan' => set_value('semula_satuan', $row->semula_satuan),
		'menjadi_jumlah' => set_value('menjadi_jumlah', $row->menjadi_jumlah),
		'menjadi_satuan' => set_value('menjadi_satuan', $row->menjadi_satuan),
		'alasan_perubahan' => set_value('alasan_perubahan', $row->alasan_perubahan),
		'ket' => set_value('ket', $row->ket),
		'created_by' => set_value('created_by', $row->created_by),
		'created_date' => set_value('created_date', $row->created_date),
		'updated_by' => set_value('updated_by', $row->updated_by),
		'updated_date' => set_value('updated_date', $row->updated_date),
		'isdelete' => set_value('isdelete', $row->isdelete),
	    );
            $this->template->load('template','t_rkpbmdx/t_rkpbmd_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_rkpbmdx'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_parent' => $this->input->post('id_parent',TRUE),
		'level' => $this->input->post('level',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'kode_unit' => $this->input->post('kode_unit',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'kode_barang' => $this->input->post('kode_barang',TRUE),
		'nama_barang' => $this->input->post('nama_barang',TRUE),
		'jumlah_barang' => $this->input->post('jumlah_barang',TRUE),
		'satuan_barang' => $this->input->post('satuan_barang',TRUE),
		'status_barang' => $this->input->post('status_barang',TRUE),
		'kondisi_barang_b' => $this->input->post('kondisi_barang_b',TRUE),
		'kondisi_barang_rr' => $this->input->post('kondisi_barang_rr',TRUE),
		'kondisi_barang_rb' => $this->input->post('kondisi_barang_rb',TRUE),
		'nama_peliharaan' => $this->input->post('nama_peliharaan',TRUE),
		'semula_jumlah' => $this->input->post('semula_jumlah',TRUE),
		'semula_satuan' => $this->input->post('semula_satuan',TRUE),
		'menjadi_jumlah' => $this->input->post('menjadi_jumlah',TRUE),
		'menjadi_satuan' => $this->input->post('menjadi_satuan',TRUE),
		'alasan_perubahan' => $this->input->post('alasan_perubahan',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'updated_by' => $this->input->post('updated_by',TRUE),
		'updated_date' => $this->input->post('updated_date',TRUE),
		'isdelete' => $this->input->post('isdelete',TRUE),
	    );

            $this->T_rkpbmd_modelx->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_rkpbmdx'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_rkpbmd_modelx->get_by_id($id);

        if ($row) {
            $this->T_rkpbmd_modelx->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_rkpbmdx'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_rkpbmdx'));
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
	$this->form_validation->set_rules('jumlah_barang', 'jumlah barang', 'trim|required|numeric');
	$this->form_validation->set_rules('satuan_barang', 'satuan barang', 'trim|required');
	$this->form_validation->set_rules('status_barang', 'status barang', 'trim|required');
	$this->form_validation->set_rules('kondisi_barang_b', 'kondisi barang b', 'trim|required');
	$this->form_validation->set_rules('kondisi_barang_rr', 'kondisi barang rr', 'trim|required');
	$this->form_validation->set_rules('kondisi_barang_rb', 'kondisi barang rb', 'trim|required');
	$this->form_validation->set_rules('nama_peliharaan', 'nama peliharaan', 'trim|required');
	$this->form_validation->set_rules('semula_jumlah', 'semula jumlah', 'trim|required|numeric');
	$this->form_validation->set_rules('semula_satuan', 'semula satuan', 'trim|required');
	$this->form_validation->set_rules('menjadi_jumlah', 'menjadi jumlah', 'trim|required|numeric');
	$this->form_validation->set_rules('menjadi_satuan', 'menjadi satuan', 'trim|required');
	$this->form_validation->set_rules('alasan_perubahan', 'alasan perubahan', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required|numeric');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
	$this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
	$this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_rkpbmdx.php */
/* Location: ./application/controllers/T_rkpbmdx.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-01-31 15:01:14 */
/* http://harviacode.com */