<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA T_PENGADAAN_SPK_DETAIL</h2>
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
									<td width='200'>Kode Jenis Belanja <?php echo form_error('kode_jenis_belanja') ?></td>
									<td><input type="text" class="form-control" name="kode_jenis_belanja" id="kode_jenis_belanja" placeholder="Kode Jenis Belanja" value="<?php echo $kode_jenis_belanja; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Nama Jenis Belanja <?php echo form_error('nama_jenis_belanja') ?></td>
									<td><input type="text" class="form-control" name="nama_jenis_belanja" id="nama_jenis_belanja" placeholder="Nama Jenis Belanja" value="<?php echo $nama_jenis_belanja; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Kode Kelompok Barang <?php echo form_error('kode_kelompok_barang') ?></td>
									<td><input type="text" class="form-control" name="kode_kelompok_barang" id="kode_kelompok_barang" placeholder="Kode Kelompok Barang" value="<?php echo $kode_kelompok_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Nama Kelompok Barang <?php echo form_error('nama_kelompok_barang') ?></td>
									<td><input type="text" class="form-control" name="nama_kelompok_barang" id="nama_kelompok_barang" placeholder="Nama Kelompok Barang" value="<?php echo $nama_kelompok_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Barang <?php echo form_error('barang') ?></td>
									<td><input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Spesifikasi Barang <?php echo form_error('spesifikasi_barang') ?></td>
									<td><input type="text" class="form-control" name="spesifikasi_barang" id="spesifikasi_barang" placeholder="Spesifikasi Barang" value="<?php echo $spesifikasi_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Jumlah Barang <?php echo form_error('jumlah_barang') ?></td>
									<td><input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Jumlah Barang" value="<?php echo $jumlah_barang; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Satuan <?php echo form_error('satuan') ?></td>
									<td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
									<td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Total <?php echo form_error('total') ?></td>
									<td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" required /></td>
								</tr>
								<tr>
									<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
									<td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<input type="hidden" name="id_spk" value="<?php echo $this->uri->segment(3); ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_pengadaan_spk_detail') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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