<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_pengadaan_spk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_pengadaan_spk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/t_pengadaan_spk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/t_pengadaan_spk/index/';
            $config['first_url'] = base_url() . 'index.php/t_pengadaan_spk/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->T_pengadaan_spk_model->total_rows($q);
        $t_pengadaan_spk = $this->T_pengadaan_spk_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_pengadaan_spk_data' => $t_pengadaan_spk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 't_pengadaan_spk/t_pengadaan_spk_list', $data);
    }
    public function export_excel()
    {
        $this->load->view('t_pengadaan_spk/excel');
    }
    public function read($id)
    {
        $row = $this->T_pengadaan_spk_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tahun' => $row->tahun,
                'periode' => $row->periode,
                'kode_kabupaten' => $row->kode_kabupaten,
                'kode_unit' => $row->kode_unit,
                'tanggal_kontrak' => $row->tanggal_kontrak,
                'no_kontrak' => $row->no_kontrak,
                'tanggal_ba' => $row->tanggal_ba,
                'no_ba' => $row->no_ba,
                'nama_unit_peruntukan' => $row->nama_unit_peruntukan,
                'nama_perusahaan' => $row->nama_perusahaan,
                'keterangan' => $row->keterangan,
                'created_by' => $row->created_by,
                'created_date' => $row->created_date,
                'updated_by' => $row->updated_by,
                'updated_date' => $row->updated_date,
                'isdelete' => $row->isdelete,
                'dt_detail' => $this->T_pengadaan_spk_model->get_all_detail($id)
            );
            $this->template->load('template', 't_pengadaan_spk/t_pengadaan_spk_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pengadaan_spk'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pengadaan_spk/create_action'),
            'id' => set_value('id'),
            'tahun' => set_value('tahun'),
            'periode' => set_value('periode'),
            'kode_kabupaten' => set_value('kode_kabupaten'),
            'kode_unit' => set_value('kode_unit'),
            'tanggal_kontrak' => set_value('tanggal_kontrak'),
            'no_kontrak' => set_value('no_kontrak'),
            'tanggal_ba' => set_value('tanggal_ba'),
            'no_ba' => set_value('no_ba'),
            'kode_unit_peruntukan' => set_value('kode_unit_peruntukan'),
            'id_vendor' => set_value('id_vendor'),
            'keterangan' => set_value('keterangan'),
            'created_by' => set_value('created_by'),
            'created_date' => set_value('created_date'),
            'updated_by' => set_value('updated_by'),
            'updated_date' => set_value('updated_date'),
            'isdelete' => set_value('isdelete'),
        );
        $this->template->load('template', 't_pengadaan_spk/t_pengadaan_spk_form', $data);
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
                'tanggal_kontrak' => $this->input->post('tanggal_kontrak', TRUE),
                'no_kontrak' => $this->input->post('no_kontrak', TRUE),
                'tanggal_ba' => $this->input->post('tanggal_ba', TRUE),
                'no_ba' => $this->input->post('no_ba', TRUE),
                'kode_unit_peruntukan' => $this->session->userdata('kode_unit'),
                'id_vendor' => $this->input->post('id_vendor', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                'created_by' => $this->session->userdata('full_name'),
                'created_date' => date('Y-m-d H:i:s'),
                //'updated_by' => date('Y-m-d H:i:s'),
                //'updated_date' => $this->session->userdata('nama'),
                'isdelete' => 0,
            );

            $this->T_pengadaan_spk_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
            redirect(site_url('t_pengadaan_spk'));
        }
    }

    public function update($id)
    {
        $row = $this->T_pengadaan_spk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pengadaan_spk/update_action'),
                'id' => set_value('id', $row->id),
                'tahun' => set_value('tahun', $row->tahun),
                'periode' => set_value('periode', $row->periode),
                'kode_kabupaten' => set_value('kode_kabupaten', $row->kode_kabupaten),
                'kode_unit' => set_value('kode_unit', $row->kode_unit),
                'tanggal_kontrak' => set_value('tanggal_kontrak', $row->tanggal_kontrak),
                'no_kontrak' => set_value('no_kontrak', $row->no_kontrak),
                'tanggal_ba' => set_value('tanggal_ba', $row->tanggal_ba),
                'no_ba' => set_value('no_ba', $row->no_ba),
                'kode_unit_peruntukan' => set_value('kode_unit_peruntukan', $row->kode_unit_peruntukan),
                'id_vendor' => set_value('id_vendor', $row->id_vendor),
                'keterangan' => set_value('keterangan', $row->keterangan),
                'created_by' => set_value('created_by', $row->created_by),
                'created_date' => set_value('created_date', $row->created_date),
                'updated_by' => set_value('updated_by', $row->updated_by),
                'updated_date' => set_value('updated_date', $row->updated_date),
                'isdelete' => set_value('isdelete', $row->isdelete),
            );
            $this->template->load('template', 't_pengadaan_spk/t_pengadaan_spk_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pengadaan_spk'));
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
                'tanggal_kontrak' => $this->input->post('tanggal_kontrak', TRUE),
                'no_kontrak' => $this->input->post('no_kontrak', TRUE),
                'tanggal_ba' => $this->input->post('tanggal_ba', TRUE),
                'no_ba' => $this->input->post('no_ba', TRUE),
                'kode_unit_peruntukan' => $this->session->userdata('kode_unit'),
                'id_vendor' => $this->input->post('id_vendor', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
                //'created_by' => $this->input->post('created_by', TRUE),
                //'created_date' => $this->input->post('created_date', TRUE),
                'updated_by' => $this->session->userdata('full_name'),
                'updated_date' => date('Y-m-d H:i:s'),
                //'isdelete' => $this->input->post('isdelete', TRUE),
            );

            $this->T_pengadaan_spk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
            redirect(site_url('t_pengadaan_spk'));
        }
    }

    public function delete($id)
    {
        $row = $this->T_pengadaan_spk_model->get_by_id($id);

        if ($row) {
            $this->T_pengadaan_spk_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
            redirect(site_url('t_pengadaan_spk'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pengadaan_spk'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('periode', 'periode', 'trim|required');
        //$this->form_validation->set_rules('kode_kabupaten', 'kode kabupaten', 'trim|required');
        //$this->form_validation->set_rules('kode_unit', 'kode unit', 'trim|required');
        $this->form_validation->set_rules('tanggal_kontrak', 'tanggal kontrak', 'trim|required');
        $this->form_validation->set_rules('no_kontrak', 'no kontrak', 'trim|required');
        $this->form_validation->set_rules('tanggal_ba', 'tanggal ba', 'trim|required');
        $this->form_validation->set_rules('no_ba', 'no ba', 'trim|required');
        //$this->form_validation->set_rules('kode_unit_peruntukan', 'kode unit peruntukan', 'trim|required');
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
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////spk detail ///////////////////////////////////////////////////////////////////////////////////////////
    public function create_detail($id_spk)
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_pengadaan_spk/create_detail_action'),
            'id' => set_value('id'),
            'id_spk' => $id_spk, //set_value('id_spk'),
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
        $this->template->load('template', 't_pengadaan_spk/t_pengadaan_spk_detail_form', $data);
    }

    public function create_detail_action()
    {
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
            'created_by' => $this->session->userdata('full_name'),
            'created_date' => date('Y-m-d H:i:s'),
            //'updated_by' => date('Y-m-d H:i:s'),
            //'updated_date' => $this->session->userdata('nama'),
            'isdelete' => 0,
        );

        $this->T_pengadaan_spk_model->insert_detail($data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Create Record Success 2</strong></div>');
        redirect(site_url('t_pengadaan_spk/read/' . $this->input->post('id_spk')));
    }

    public function update_detail($id)
    {
        $row = $this->T_pengadaan_spk_model->get_by_id_detail($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_pengadaan_spk/update_detail_action'),
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
            $this->template->load('template', 't_pengadaan_spk/t_pengadaan_spk_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Record Not Found</strong></div>');
            redirect(site_url('t_pengadaan_spk/read/' . $id));
        }
    }

    public function update_detail_action()
    {
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
            //'created_by' => $this->input->post('created_by', TRUE),
            //'created_date' => $this->input->post('created_date', TRUE),
            'updated_by' => $this->session->userdata('full_name'),
            'updated_date' => date('Y-m-d H:i:s'),
            //'isdelete' => $this->input->post('isdelete', TRUE),
        );

        $this->T_pengadaan_spk_model->update_detail($this->input->post('id', TRUE), $data);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Update Record Success</strong></div>');
        redirect(site_url('t_pengadaan_spk/read/' . $this->input->post('id_spk')));
    }

    public function delete_detail($id, $id_spk)
    {
        //$row = $this->T_pengadaan_spk_model->get_by_id($id);

        //if ($row) {
        $this->T_pengadaan_spk_model->delete_detail($id);
        $this->session->set_flashdata('message', '<div class="alert bg-info-500" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button><strong> Delete Record Success</strong></div>');
        redirect(site_url('t_pengadaan_spk/read/' . $id_spk));
        //} else {
        // $this->session->set_flashdata('message', '<div class="alert bg-warning-500" role="alert">
        // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //     <span aria-hidden="true"><i class="fal fa-times"></i></span>
        // </button><strong> Record Not Found</strong></div>');
        // redirect(site_url('t_pengadaan_spk/read/' . $id_spk));
        //}
    }
}

/* End of file T_pengadaan_spk.php */
/* Location: ./application/controllers/T_pengadaan_spk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-27 14:05:47 */
/* http://harviacode.com */