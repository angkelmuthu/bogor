<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_rkbmd Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Id Parent</td><td><?php echo $id_parent; ?></td></tr>
	    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Kode Unit</td><td><?php echo $kode_unit; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Kode Barang</td><td><?php echo $kode_barang; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Semula Jumlah</td><td><?php echo $semula_jumlah; ?></td></tr>
	    <tr><td>Semula Satuan</td><td><?php echo $semula_satuan; ?></td></tr>
	    <tr><td>Menjadi Jumlah</td><td><?php echo $menjadi_jumlah; ?></td></tr>
	    <tr><td>Menjadi Satuan</td><td><?php echo $menjadi_satuan; ?></td></tr>
	    <tr><td>Alasan Perubahan</td><td><?php echo $alasan_perubahan; ?></td></tr>
	    <tr><td>Km Jumlah</td><td><?php echo $km_jumlah; ?></td></tr>
	    <tr><td>Km Satuan</td><td><?php echo $km_satuan; ?></td></tr>
	    <tr><td>Optim Kode Barang</td><td><?php echo $optim_kode_barang; ?></td></tr>
	    <tr><td>Optim Nama Barang</td><td><?php echo $optim_nama_barang; ?></td></tr>
	    <tr><td>Optim Jumlah</td><td><?php echo $optim_jumlah; ?></td></tr>
	    <tr><td>Optim Satuan</td><td><?php echo $optim_satuan; ?></td></tr>
	    <tr><td>Riil Jumlah</td><td><?php echo $riil_jumlah; ?></td></tr>
	    <tr><td>Riil Satuan</td><td><?php echo $riil_satuan; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Isdelete</td><td><?php echo $isdelete; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_rkbmd') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>