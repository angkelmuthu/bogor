<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_jenis_unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_jenis_unit_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_jenis_unit/m_jenis_unit_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_jenis_unit_model->json();
    }

    public function read($id)
    {
        $row = $this->M_jenis_unit_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode_jenis_unit' => $row->kode_jenis_unit,
                'nama_jenis_unit' => $row->nama_jenis_unit,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdelete' => $row->isdelete,
            );
            $this->template->load('template', 'm_jenis_unit/m_jenis_unit_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenis_unit'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_jenis_unit/create_action'),
            'id' => set_value('id'),
            'kode_jenis_unit' => set_value('kode_jenis_unit'),
            'nama_jenis_unit' => set_value('nama_jenis_unit'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdelete' => set_value('isdelete'),
        );
        $this->template->load('template', 'm_jenis_unit/m_jenis_unit_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_jenis_unit' => $this->input->post('kode_jenis_unit', TRUE),
                'nama_jenis_unit' => $this->input->post('nama_jenis_unit', TRUE),
                'created_by' => $this->session->userdata('full_name'),
                'created_date' => date('Y-m-d H:i:s'),
                //'updated_by' => date('Y-m-d H:i:s'),
                //'updated_date' => $this->session->userdata('nama'),
                'isdelete' => 0,
            );

            $this->M_jenis_unit_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_jenis_unit'));
        }
    }

    public function update($id)
    {
        $row = $this->M_jenis_unit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_jenis_unit/update_action'),
                'id' => set_value('id', $row->id),
                'kode_jenis_unit' => set_value('kode_jenis_unit', $row->kode_jenis_unit),
                'nama_jenis_unit' => set_value('nama_jenis_unit', $row->nama_jenis_unit),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdelete' => set_value('isdelete', $row->isdelete),
            );
            $this->template->load('template', 'm_jenis_unit/m_jenis_unit_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenis_unit'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode_jenis_unit' => $this->input->post('kode_jenis_unit', TRUE),
                'nama_jenis_unit' => $this->input->post('nama_jenis_unit', TRUE),
                //'created_by' => $this->input->post('created_by', TRUE),
                //'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->session->userdata('full_name'),
                'updated_date' => date('Y-m-d H:i:s'),
                //'isdelete' => $this->input->post('isdelete', TRUE),
            );

            $this->M_jenis_unit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_jenis_unit'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_jenis_unit_model->get_by_id($id);

        if ($row) {
            $this->M_jenis_unit_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_jenis_unit'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_jenis_unit'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_jenis_unit', 'kode jenis unit', 'trim|required');
        $this->form_validation->set_rules('nama_jenis_unit', 'nama jenis unit', 'trim|required');
        // $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
        // $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
        // $this->form_validation->set_rules('updated_by', 'updated by', 'trim|required');
        // $this->form_validation->set_rules('updated_date', 'updated date', 'trim|required');
        // $this->form_validation->set_rules('isdelete', 'isdelete', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_jenis_unit.php */
/* Location: ./application/controllers/M_jenis_unit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-24 09:31:28 */
/* http://harviacode.com */