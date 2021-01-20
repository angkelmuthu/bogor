<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>T_stock_opname Read</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
        <table class="table table-striped">
	    <tr><td>Kode Jenis Barang</td><td><?php echo $kode_jenis_barang; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>Tanggal So</td><td><?php echo $tanggal_so; ?></td></tr>
	    <tr><td>No So</td><td><?php echo $no_so; ?></td></tr>
	    <tr><td>Kode Kabupaten</td><td><?php echo $kode_kabupaten; ?></td></tr>
	    <tr><td>Kode Unit</td><td><?php echo $kode_unit; ?></td></tr>
	    <tr><td>Barang</td><td><?php echo $barang; ?></td></tr>
	    <tr><td>Satuan</td><td><?php echo $satuan; ?></td></tr>
	    <tr><td>Saldo Awal</td><td><?php echo $saldo_awal; ?></td></tr>
	    <tr><td>Tanggal Awal</td><td><?php echo $tanggal_awal; ?></td></tr>
	    <tr><td>Jumlah Penerimaan 1</td><td><?php echo $jumlah_penerimaan_1; ?></td></tr>
	    <tr><td>Jumlah Penerimaan 2</td><td><?php echo $jumlah_penerimaan_2; ?></td></tr>
	    <tr><td>Jumlah Persediaan</td><td><?php echo $jumlah_persediaan; ?></td></tr>
	    <tr><td>Jumlah Pengeluaran</td><td><?php echo $jumlah_pengeluaran; ?></td></tr>
	    <tr><td>Saldo Adm</td><td><?php echo $saldo_adm; ?></td></tr>
	    <tr><td>Saldo Fisik</td><td><?php echo $saldo_fisik; ?></td></tr>
	    <tr><td>Harga Satuan</td><td><?php echo $harga_satuan; ?></td></tr>
	    <tr><td>Nilai Persediaan</td><td><?php echo $nilai_persediaan; ?></td></tr>
	    <tr><td>Selisih Unit</td><td><?php echo $selisih_unit; ?></td></tr>
	    <tr><td>Selisih Rupiah</td><td><?php echo $selisih_rupiah; ?></td></tr>
	    <tr><td>Created By</td><td><?php echo $created_by; ?></td></tr>
	    <tr><td>Created Date</td><td><?php echo $created_date; ?></td></tr>
	    <tr><td>Updated By</td><td><?php echo $updated_by; ?></td></tr>
	    <tr><td>Updated Date</td><td><?php echo $updated_date; ?></td></tr>
	    <tr><td>Isdelete</td><td><?php echo $isdelete; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_stock_opname') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td></tr>
	</table>
</div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>