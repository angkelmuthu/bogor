<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA T_RKBMD</h2>
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
									<td width='200'>Nama <?php echo form_error('nama') ?></td>
									<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kode Barang <?php echo form_error('kode_barang') ?></td>
									<td><input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Nama Barang <?php echo form_error('nama_barang') ?></td>
									<td><input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Semula Jumlah <?php echo form_error('semula_jumlah') ?></td>
									<td><input type="number" class="form-control" name="semula_jumlah" id="semula_jumlah" placeholder="Semula Jumlah" value="<?php echo $semula_jumlah; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Semula Satuan <?php echo form_error('semula_satuan') ?></td>
									<td><input type="text" class="form-control" name="semula_satuan" id="semula_satuan" placeholder="Semula Satuan" value="<?php echo $semula_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Menjadi Jumlah <?php echo form_error('menjadi_jumlah') ?></td>
									<td><input type="number" class="form-control" name="menjadi_jumlah" id="menjadi_jumlah" placeholder="Menjadi Jumlah" value="<?php echo $menjadi_jumlah; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Menjadi Satuan <?php echo form_error('menjadi_satuan') ?></td>
									<td><input type="text" class="form-control" name="menjadi_satuan" id="menjadi_satuan" placeholder="Menjadi Satuan" value="<?php echo $menjadi_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Alasan Perubahan <?php echo form_error('alasan_perubahan') ?></td>
									<td><input type="text" class="form-control" name="alasan_perubahan" id="alasan_perubahan" placeholder="Alasan Perubahan" value="<?php echo $alasan_perubahan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Km Jumlah <?php echo form_error('km_jumlah') ?></td>
									<td><input type="number" class="form-control" name="km_jumlah" id="km_jumlah" placeholder="Km Jumlah" value="<?php echo $km_jumlah; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Km Satuan <?php echo form_error('km_satuan') ?></td>
									<td><input type="text" class="form-control" name="km_satuan" id="km_satuan" placeholder="Km Satuan" value="<?php echo $km_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Optim Kode Barang <?php echo form_error('optim_kode_barang') ?></td>
									<td><input type="text" class="form-control" name="optim_kode_barang" id="optim_kode_barang" placeholder="Optim Kode Barang" value="<?php echo $optim_kode_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Optim Nama Barang <?php echo form_error('optim_nama_barang') ?></td>
									<td><input type="text" class="form-control" name="optim_nama_barang" id="optim_nama_barang" placeholder="Optim Nama Barang" value="<?php echo $optim_nama_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Optim Jumlah <?php echo form_error('optim_jumlah') ?></td>
									<td><input type="number" class="form-control" name="optim_jumlah" id="optim_jumlah" placeholder="Optim Jumlah" value="<?php echo $optim_jumlah; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Optim Satuan <?php echo form_error('optim_satuan') ?></td>
									<td><input type="text" class="form-control" name="optim_satuan" id="optim_satuan" placeholder="Optim Satuan" value="<?php echo $optim_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Riil Jumlah <?php echo form_error('riil_jumlah') ?></td>
									<td><input type="text" class="form-control" name="riil_jumlah" id="riil_jumlah" placeholder="Riil Jumlah" value="<?php echo $riil_jumlah; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Riil Satuan <?php echo form_error('riil_satuan') ?></td>
									<td><input type="text" class="form-control" name="riil_satuan" id="riil_satuan" placeholder="Riil Satuan" value="<?php echo $riil_satuan; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_rkbmd') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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