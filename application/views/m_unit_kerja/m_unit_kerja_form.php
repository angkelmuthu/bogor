<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA UNIT KERJA</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post">

                            <table class='table table-striped'>


                                <tr>
                                    <td width='200'>Kode Kabupaten <?php echo form_error('kode_kabupaten') ?></td>
                                    <td><?php echo select2_dinamis('kode_kabupaten', 'm_kabupaten', 'kode_kabupaten', 'nama_kabupaten') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kode Unit <?php echo form_error('kode_unit') ?></td>
                                    <td><input type="text" class="form-control" name="kode_unit" id="kode_unit" placeholder="Kode Unit" value="<?php echo $kode_unit; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nama Unit <?php echo form_error('nama_unit') ?></td>
                                    <td><input type="text" class="form-control" name="nama_unit" id="nama_unit" placeholder="Nama Unit" value="<?php echo $nama_unit; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kode Jenis Unit <?php echo form_error('kode_jenis_unit') ?></td>
                                    <td><?php echo select2_dinamis('kode_jenis_unit', 'm_jenis_unit', 'kode_jenis_unit', 'nama_jenis_unit') ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_unit_kerja') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>