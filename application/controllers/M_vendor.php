<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_vendor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('M_vendor_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template', 'm_vendor/m_vendor_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->M_vendor_model->json();
    }

    public function read($id)
    {
        $row = $this->M_vendor_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_perusahaan' => $row->nama_perusahaan,
                'alamat' => $row->alamat,
                'direktur' => $row->direktur,
                'npwp' => $row->npwp,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdelete' => $row->isdelete,
            );
            $this->template->load('template', 'm_vendor/m_vendor_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_vendor'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_vendor/create_action'),
            'id' => set_value('id'),
            'nama_perusahaan' => set_value('nama_perusahaan'),
            'alamat' => set_value('alamat'),
            'direktur' => set_value('direktur'),
            'npwp' => set_value('npwp'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdelete' => set_value('isdelete'),
        );
        $this->template->load('template', 'm_vendor/m_vendor_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'direktur' => $this->input->post('direktur', TRUE),
                'npwp' => $this->input->post('npwp', TRUE),
                'created_by' => $this->session->userdata('full_name'),
                'created_date' => date('Y-m-d H:i:s'),
                //'updated_by' => date('Y-m-d H:i:s'),
                //'updated_date' => $this->session->userdata('nama'),
                'isdelete' => 0,
            );

            $this->M_vendor_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('m_vendor'));
        }
    }

    public function update($id)
    {
        $row = $this->M_vendor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_vendor/update_action'),
                'id' => set_value('id', $row->id),
                'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
                'alamat' => set_value('alamat', $row->alamat),
                'direktur' => set_value('direktur', $row->direktur),
                'npwp' => set_value('npwp', $row->npwp),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdelete' => set_value('isdelete', $row->isdelete),
            );
            $this->template->load('template', 'm_vendor/m_vendor_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_vendor'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'direktur' => $this->input->post('direktur', TRUE),
                'npwp' => $this->input->post('npwp', TRUE),
                //'created_by' => $this->input->post('created_by', TRUE),
                //'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->session->userdata('full_name'),
                'updated_date' => date('Y-m-d H:i:s'),
                //'isdelete' => $this->input->post('isdelete', TRUE),
            );

            $this->M_vendor_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('m_vendor'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_vendor_model->get_by_id($id);

        if ($row) {
            $this->M_vendor_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('m_vendor'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('m_vendor'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('direktur', 'direktur', 'trim|required');
        $this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
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
        $namaFile = "m_vendor.xls";
        $judul = "m_vendor";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Perusahaan");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
        xlsWriteLabel($tablehead, $kolomhead++, "Direktur");
        xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
        xlsWriteLabel($tablehead, $kolomhead++, "Created By");
        xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated Date");
        xlsWriteLabel($tablehead, $kolomhead++, "Isdelete");

        foreach ($this->M_vendor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_perusahaan);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
            xlsWriteLabel($tablebody, $kolombody++, $data->direktur);
            xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
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

/* End of file M_vendor.php */
/* Location: ./application/controllers/M_vendor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-24 09:40:19 */
/* http://harviacode.com */