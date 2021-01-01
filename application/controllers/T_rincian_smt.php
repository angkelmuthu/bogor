<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_rincian_smt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_rincian_smt_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_rincian_smt/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_rincian_smt/index/';
            $config['first_url'] = base_url() . 'index.php/t_rincian_smt/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_rincian_smt_model->total_rows($q);
        $t_rincian_smt = $this->T_rincian_smt_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_rincian_smt_data' => $t_rincian_smt,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 't_rincian_smt/t_rincian_smt_list', $data);
    }

    public function read($id)
    {
        $row = $this->T_rincian_smt_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tahun' => $row->tahun,
                'periode' => $row->periode,
                'kode_kabupaten' => $row->kode_kabupaten,
                'kode_unit' => $row->kode_unit,
                'kode_jenis_barang' => $row->kode_jenis_barang,
                'jumlah_harga' => $row->jumlah_harga,
                'no_ba' => $row->no_ba,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdelete' => $row->isdelete,
            );
            $this->template->load('template', 't_rincian_smt/t_rincian_smt_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_rincian_smt'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_rincian_smt/create_action'),
            'id' => set_value('id'),
            'tahun' => set_value('tahun'),
            'periode' => set_value('periode'),
            'kode_kabupaten' => set_value('kode_kabupaten'),
            'kode_unit' => set_value('kode_unit'),
            'kode_jenis_barang' => set_value('kode_jenis_barang'),
            'jumlah_harga' => set_value('jumlah_harga'),
            'no_ba' => set_value('no_ba'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdelete' => set_value('isdelete'),
        );
        $this->template->load('template', 't_rincian_smt/t_rincian_smt_form', $data);
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
                'kode_kabupaten' => $this->session->userdata('kode_kabupaten'),
                'kode_unit' => $this->session->userdata('kode_unit'),
                'kode_jenis_barang' => $this->input->post('kode_jenis_barang', TRUE),
                'jumlah_harga' => $this->input->post('jumlah_harga', TRUE),
                'no_ba' => $this->input->post('no_ba', TRUE),
                'created_by' => $this->session->userdata('full_name'),
                'created_date' => date('Y-m-d H:i:s'),
                //'updated_by' => date('Y-m-d H:i:s'),
                //'updated_date' => $this->session->userdata('nama'),
                'isdelete' => 0,
            );

            $this->T_rincian_smt_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_rincian_smt'));
        }
    }

    public function update($id)
    {
        $row = $this->T_rincian_smt_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_rincian_smt/update_action'),
                'id' => set_value('id', $row->id),
                'tahun' => set_value('tahun', $row->tahun),
                'periode' => set_value('periode', $row->periode),
                'kode_kabupaten' => set_value('kode_kabupaten', $row->kode_kabupaten),
                'kode_unit' => set_value('kode_unit', $row->kode_unit),
                'kode_jenis_barang' => set_value('kode_jenis_barang', $row->kode_jenis_barang),
                'jumlah_harga' => set_value('jumlah_harga', $row->jumlah_harga),
                'no_ba' => set_value('no_ba', $row->no_ba),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdelete' => set_value('isdelete', $row->isdelete),
            );
            $this->template->load('template', 't_rincian_smt/t_rincian_smt_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_rincian_smt'));
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
                'kode_kabupaten' => $this->session->userdata('kode_kabupaten'),
                'kode_unit' => $this->session->userdata('kode_unit'),
                'kode_jenis_barang' => $this->input->post('kode_jenis_barang', TRUE),
                'jumlah_harga' => $this->input->post('jumlah_harga', TRUE),
                'no_ba' => $this->input->post('no_ba', TRUE),
                //'created_by' => $this->input->post('created_by', TRUE),
                //'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->session->userdata('full_name'),
                'updated_date' => date('Y-m-d H:i:s'),
                //'isdelete' => $this->input->post('isdelete', TRUE),
            );

            $this->T_rincian_smt_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_rincian_smt'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_rincian_smt_model->get_by_id($id);

        if ($row) {
            $this->T_rincian_smt_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_rincian_smt'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_rincian_smt'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('periode', 'periode', 'trim|required');
        //$this->form_validation->set_rules('kode_kabupaten', 'kode kabupaten', 'trim|required');
        //$this->form_validation->set_rules('kode_unit', 'kode unit', 'trim|required');
        $this->form_validation->set_rules('kode_jenis_barang', 'kode jenis barang', 'trim|required');
        $this->form_validation->set_rules('jumlah_harga', 'jumlah harga', 'trim|required|numeric');
        $this->form_validation->set_rules('no_ba', 'no ba', 'trim|required');
        // $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        // $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        // $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
        // $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
        // $this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file T_rincian_smt.php */
/* Location: ./application/controllers/T_rincian_smt.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-28 04:14:50 */
/* http://harviacode.com */