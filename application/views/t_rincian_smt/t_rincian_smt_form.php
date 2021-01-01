<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA NILAI PERSEDIAAN</h2>
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
                                    <td width='200'>Tahun <?php echo form_error('tahun') ?></td>
                                    <td><input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Periode <?php echo form_error('periode') ?></td>
                                    <td><input type="number" class="form-control" name="periode" id="periode" placeholder="Periode" value="<?php echo $periode; ?>" /></td>
                                </tr>
                                <!-- <tr>
                                    <td width='200'>Kode Kabupaten <?php echo form_error('kode_kabupaten') ?></td>
                                    <td><input type="text" class="form-control" name="kode_kabupaten" id="kode_kabupaten" placeholder="Kode Kabupaten" value="<?php echo $kode_kabupaten; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Kode Unit <?php echo form_error('kode_unit') ?></td>
                                    <td><input type="text" class="form-control" name="kode_unit" id="kode_unit" placeholder="Kode Unit" value="<?php echo $kode_unit; ?>" /></td>
                                </tr> -->
                                <tr>
                                    <td width='200'>Kode Jenis Barang <?php echo form_error('kode_jenis_barang') ?></td>
                                    <td><?php echo select2_dinamis('kode_jenis_barang', 'm_jenis_barang', 'kode_jenis_barang', 'nama_jenis_barang') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Jumlah Harga <?php echo form_error('jumlah_harga') ?></td>
                                    <td><input type="number" class="form-control" name="jumlah_harga" id="jumlah_harga" placeholder="Jumlah Harga" value="<?php echo $jumlah_harga; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>No Ba <?php echo form_error('no_ba') ?></td>
                                    <td><input type="text" class="form-control" name="no_ba" id="no_ba" placeholder="No Ba" value="<?php echo $no_ba; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_rincian_smt') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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