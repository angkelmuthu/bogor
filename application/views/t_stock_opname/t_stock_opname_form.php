<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA T_STOCK_OPNAME</h2>
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
									<td width='250'>Tahun <?php echo form_error('tahun') ?></td>
									<td><input type="number" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>No. Stock Opname <?php echo form_error('no_so') ?></td>
									<td><input type="text" class="form-control" name="no_so" id="no_so" placeholder="No So" value="<?php echo $no_so; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Tanggal So <?php echo form_error('tanggal_so') ?></td>
									<td><input type="date" class="form-control" id="example-date" name="tanggal_so" id="datepicker-1" placeholder="Tanggal So" value="<?php echo $tanggal_so; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Jenis Barang <?php echo form_error('kode_jenis_barang') ?></td>
									<td><?php echo select2_dinamis('kode_jenis_barang', 'm_jenis_barang', 'kode_jenis_barang', 'nama_jenis_barang', $kode_jenis_barang) ?></td>
								</tr>
								<tr>
									<td width='250'>Nama Barang <?php echo form_error('barang') ?></td>
									<td><input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Satuan <?php echo form_error('satuan') ?></td>
									<td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Saldo Awal <?php echo form_error('saldo_awal') ?></td>
									<td><input type="number" class="form-control" name="saldo_awal" id="saldo_awal" placeholder="Saldo Awal" value="<?php echo $saldo_awal; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Tanggal Awal <?php echo form_error('tanggal_awal') ?></td>
									<td><input type="date" class="form-control" id="example-date" name="tanggal_awal" id="datepicker-1" placeholder="Tanggal Awal" value="<?php echo $tanggal_awal; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Jumlah Penerimaan Periode 1 <?php echo form_error('jumlah_penerimaan_1') ?></td>
									<td><input type="number" class="form-control" name="jumlah_penerimaan_1" id="jumlah_penerimaan_1" placeholder="Jumlah Penerimaan 1" value="<?php echo $jumlah_penerimaan_1; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Jumlah Penerimaan Periode 2 <?php echo form_error('jumlah_penerimaan_2') ?></td>
									<td><input type="number" class="form-control" name="jumlah_penerimaan_2" id="jumlah_penerimaan_2" placeholder="Jumlah Penerimaan 2" value="<?php echo $jumlah_penerimaan_2; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Jumlah Persediaan <?php echo form_error('jumlah_persediaan') ?></td>
									<td><input type="number" class="form-control" name="jumlah_persediaan" id="jumlah_persediaan" placeholder="Jumlah Persediaan" value="<?php echo $jumlah_persediaan; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Jumlah Pengeluaran <?php echo form_error('jumlah_pengeluaran') ?></td>
									<td><input type="number" class="form-control" name="jumlah_pengeluaran" id="jumlah_pengeluaran" placeholder="Jumlah Pengeluaran" value="<?php echo $jumlah_pengeluaran; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Saldo Adm <?php echo form_error('saldo_adm') ?></td>
									<td><input type="number" class="form-control" name="saldo_adm" id="saldo_adm" placeholder="Saldo Adm" value="<?php echo $saldo_adm; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Saldo Fisik <?php echo form_error('saldo_fisik') ?></td>
									<td><input type="number" class="form-control" name="saldo_fisik" id="saldo_fisik" placeholder="Saldo Fisik" value="<?php echo $saldo_fisik; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
									<td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Nilai Persediaan <?php echo form_error('nilai_persediaan') ?></td>
									<td><input type="number" class="form-control" name="nilai_persediaan" id="nilai_persediaan" placeholder="Nilai Persediaan" value="<?php echo $nilai_persediaan; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Selisih Unit <?php echo form_error('selisih_unit') ?></td>
									<td><input type="number" class="form-control" name="selisih_unit" id="selisih_unit" placeholder="Selisih Unit" value="<?php echo $selisih_unit; ?>" /></td>
								</tr>
								<tr>
									<td width='250'>Selisih Rupiah <?php echo form_error('selisih_rupiah') ?></td>
									<td><input type="number" class="form-control" name="selisih_rupiah" id="selisih_rupiah" placeholder="Selisih Rupiah" value="<?php echo $selisih_rupiah; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_stock_opname') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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