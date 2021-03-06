<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_unit_kerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_unit_kerja_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_unit_kerja/m_unit_kerja_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_unit_kerja_model->json();
    }

    public function read($id)
    {
        $row = $this->M_unit_kerja_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kode_kabupaten' => $row->kode_kabupaten,
                'kode_unit' => $row->kode_unit,
                'nama_unit' => $row->nama_unit,
                'kode_jenis_unit' => $row->kode_jenis_unit,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdelete' => $row->isdelete,
            );
            $this->template->load('template', 'm_unit_kerja/m_unit_kerja_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit_kerja'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_unit_kerja/create_action'),
            'id' => set_value('id'),
            'kode_kabupaten' => set_value('kode_kabupaten'),
            'kode_unit' => set_value('kode_unit'),
            'nama_unit' => set_value('nama_unit'),
            'kode_jenis_unit' => set_value('kode_jenis_unit'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdelete' => set_value('isdelete'),
        );
        $this->template->load('template', 'm_unit_kerja/m_unit_kerja_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kode_kabupaten' => $this->input->post('kode_kabupaten', TRUE),
                'kode_unit' => $this->input->post('kode_unit', TRUE),
                'nama_unit' => $this->input->post('nama_unit', TRUE),
                'kode_jenis_unit' => $this->input->post('kode_jenis_unit', TRUE),
                'created_by' => $this->session->userdata('full_name'),
                'created_date' => date('Y-m-d H:i:s'),
                //'updated_by' => date('Y-m-d H:i:s'),
                //'updated_date' => $this->session->userdata('nama'),
                'isdelete' => 0,
            );

            $this->M_unit_kerja_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_unit_kerja'));
        }
    }

    public function update($id)
    {
        $row = $this->M_unit_kerja_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_unit_kerja/update_action'),
                'id' => set_value('id', $row->id),
                'kode_kabupaten' => set_value('kode_kabupaten', $row->kode_kabupaten),
                'kode_unit' => set_value('kode_unit', $row->kode_unit),
                'nama_unit' => set_value('nama_unit', $row->nama_unit),
                'kode_jenis_unit' => set_value('kode_jenis_unit', $row->kode_jenis_unit),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdelete' => set_value('isdelete', $row->isdelete),
            );
            $this->template->load('template', 'm_unit_kerja/m_unit_kerja_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit_kerja'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kode_kabupaten' => $this->input->post('kode_kabupaten', TRUE),
                'kode_unit' => $this->input->post('kode_unit', TRUE),
                'nama_unit' => $this->input->post('nama_unit', TRUE),
                'kode_jenis_unit' => $this->input->post('kode_jenis_unit', TRUE),
                //'created_by' => $this->input->post('created_by', TRUE),
                //'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->session->userdata('full_name'),
                'updated_date' => date('Y-m-d H:i:s'),
                //'isdelete' => $this->input->post('isdelete', TRUE),
            );

            $this->M_unit_kerja_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_unit_kerja'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_unit_kerja_model->get_by_id($id);

        if ($row) {
            $this->M_unit_kerja_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_unit_kerja'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_unit_kerja'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_kabupaten', 'kode kabupaten', 'trim|required');
        $this->form_validation->set_rules('kode_unit', 'kode unit', 'trim|required');
        $this->form_validation->set_rules('nama_unit', 'nama unit', 'trim|required');
        $this->form_validation->set_rules('kode_jenis_unit', 'kode jenis unit', 'trim|required');
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
        $this->load->helper('exportexcel');
        $namaFile = "m_unit_kerja.xls";
        $judul = "m_unit_kerja";
        $tablehead = 0;
        $tablebody = 1;
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

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Kabupaten");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Unit");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Unit");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Jenis Unit");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Isdelete");

        foreach ($this->M_unit_kerja_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_kabupaten);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_unit);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);
            xlsWriteLabel($tablebody, $kolombody++, $data->kode_jenis_unit);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_by);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_date);
            xlsWriteLabel($tablebody, $kolombody++, $data->isdelete);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file M_unit_kerja.php */
/* Location: ./application/controllers/M_unit_kerja.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-24 09:36:26 */
/* http://harviacode.com */