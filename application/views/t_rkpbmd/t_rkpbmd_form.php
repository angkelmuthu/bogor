<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA RKBMD</h2>
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
									<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Kode Barang <?php echo form_error('kode_barang') ?></td>
									<td><input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Nama Barang <?php echo form_error('nama_barang') ?></td>
									<td><input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Jumlah Barang <?php echo form_error('jumlah_barang') ?></td>
									<td><input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Jumlah Barang" value="<?php echo $jumlah_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Satuan Barang <?php echo form_error('satuan_barang') ?></td>
									<td><input type="text" class="form-control" name="satuan_barang" id="satuan_barang" placeholder="Satuan Barang" value="<?php echo $satuan_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Status Barang <?php echo form_error('status_barang') ?></td>
									<td><input type="text" class="form-control" name="status_barang" id="status_barang" placeholder="Status Barang" value="<?php echo $status_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Kondisi Barang <?php echo form_error('kondisi_barang_b') ?></td>
									<td>
										<div class="frame-wrap">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="b" name="kondisi_barang" value="b" required>
												<label class="custom-control-label" for="b">Baik</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="rr" name="kondisi_barang" value="rr">
												<label class="custom-control-label" for="rr">Rusak Ringan</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="rb" name="kondisi_barang" value="rb">
												<label class="custom-control-label" for="rb">Rusak Berat</label>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td width='200'>Nama Peliharaan <?php echo form_error('nama_peliharaan') ?></td>
									<td><input type="text" class="form-control" name="nama_peliharaan" id="nama_peliharaan" placeholder="Nama Peliharaan" value="<?php echo $nama_peliharaan; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Semula Jumlah <?php echo form_error('semula_jumlah') ?></td>
									<td><input type="text" class="form-control" name="semula_jumlah" id="semula_jumlah" placeholder="Semula Jumlah" value="<?php echo $semula_jumlah; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Semula Satuan <?php echo form_error('semula_satuan') ?></td>
									<td><input type="text" class="form-control" name="semula_satuan" id="semula_satuan" placeholder="Semula Satuan" value="<?php echo $semula_satuan; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Menjadi Jumlah <?php echo form_error('menjadi_jumlah') ?></td>
									<td><input type="text" class="form-control" name="menjadi_jumlah" id="menjadi_jumlah" placeholder="Menjadi Jumlah" value="<?php echo $menjadi_jumlah; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Menjadi Satuan <?php echo form_error('menjadi_satuan') ?></td>
									<td><input type="text" class="form-control" name="menjadi_satuan" id="menjadi_satuan" placeholder="Menjadi Satuan" value="<?php echo $menjadi_satuan; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Alasan Perubahan <?php echo form_error('alasan_perubahan') ?></td>
									<td><input type="text" class="form-control" name="alasan_perubahan" id="alasan_perubahan" placeholder="Alasan Perubahan" value="<?php echo $alasan_perubahan; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Ket <?php echo form_error('ket') ?></td>
									<td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" required /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<input type="hidden" name="id_parent" value="<?php echo $this->uri->segment(3); ?>" />
										<input type="hidden" name="level" value="4" />
										<input type="hidden" name="tahun" value="<?php echo $this->uri->segment(4); ?>" />
										<input type="hidden" name="kode_unit" value="<?php echo $this->session->userdata('kode_unit'); ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_rkbmd') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
									</td>
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