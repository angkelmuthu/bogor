<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA PENGADAAN BARANG</h2>
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
								<tr>
									<td width='200'>Kabupaten <?php echo form_error('kode_kabupaten') ?></td>
									<td><?php echo select2_dinamis('kode_kabupaten', 'm_kabupaten', 'kode_kabupaten', 'nama_kabupaten') ?></td>
								</tr>
								<?php if (!empty($this->session->userdata('kode_unit'))) { ?>
									<input type="hidden" name="kode_unit" value="<?php echo $this->session->userdata('kode_unit'); ?>" />
								<?php } else { ?>
									<tr>
										<td width='200'>Unit Kerja<?php echo form_error('kode_unit') ?></td>
										<td><?php echo select2_dinamis('kode_unit', 'm_unit_kerja', 'kode_unit', 'nama_unit') ?></td>
									</tr>
								<?php } ?>
								<tr>
									<td width='200'>Kode Jenis Belanja <?php echo form_error('kode_jenis_belanja') ?></td>
									<td><input type="text" class="form-control" name="kode_jenis_belanja" id="kode_jenis_belanja" placeholder="Kode Jenis Belanja" value="<?php echo $kode_jenis_belanja; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Nama Jenis Belanja <?php echo form_error('nama_jenis_belanja') ?></td>
									<td><input type="text" class="form-control" name="nama_jenis_belanja" id="nama_jenis_belanja" placeholder="Nama Jenis Belanja" value="<?php echo $nama_jenis_belanja; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kode Kelompok Barang <?php echo form_error('kode_kelompok_barang') ?></td>
									<td><input type="text" class="form-control" name="kode_kelompok_barang" id="kode_kelompok_barang" placeholder="Kode Kelompok Barang" value="<?php echo $kode_kelompok_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Nama Kelompok Barang <?php echo form_error('nama_kelompok_barang') ?></td>
									<td><input type="text" class="form-control" name="nama_kelompok_barang" id="nama_kelompok_barang" placeholder="Nama Kelompok Barang" value="<?php echo $nama_kelompok_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Barang <?php echo form_error('barang') ?></td>
									<td><input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Spesifikasi Barang <?php echo form_error('spesifikasi_barang') ?></td>
									<td><input type="text" class="form-control" name="spesifikasi_barang" id="spesifikasi_barang" placeholder="Spesifikasi Barang" value="<?php echo $spesifikasi_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tanggal Kontrak <?php echo form_error('tanggal_kontrak') ?></td>
									<td><input type="text" class="form-control" name="tanggal_kontrak" id="tanggal_kontrak" placeholder="Tanggal Kontrak" value="<?php echo $tanggal_kontrak; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>No Kontrak <?php echo form_error('no_kontrak') ?></td>
									<td><input type="text" class="form-control" name="no_kontrak" id="no_kontrak" placeholder="No Kontrak" value="<?php echo $no_kontrak; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tanggal Ba <?php echo form_error('tanggal_ba') ?></td>
									<td><input type="text" class="form-control" name="tanggal_ba" id="tanggal_ba" placeholder="Tanggal Ba" value="<?php echo $tanggal_ba; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>No Ba <?php echo form_error('no_ba') ?></td>
									<td><input type="text" class="form-control" name="no_ba" id="no_ba" placeholder="No Ba" value="<?php echo $no_ba; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Jumlah Barang <?php echo form_error('jumlah_barang') ?></td>
									<td><input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Jumlah Barang" value="<?php echo $jumlah_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Satuan <?php echo form_error('satuan') ?></td>
									<td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
									<td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Total <?php echo form_error('total') ?></td>
									<td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Unit Peruntukan <?php echo form_error('kode_unit_peruntukan') ?></td>
									<td><?php echo select2_dinamis('kode_unit_peruntukan', 'm_unit_kerja', 'kode_unit', 'nama_unit') ?></td>
								</tr>
								<tr>
									<td width='200'>Vendor <?php echo form_error('id_vendor') ?></td>
									<td><?php echo select2_dinamis('id_vendor', 'm_vendor', 'id', 'nama_perusahaan') ?></td>
								</tr>
								<tr>
									<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
									<td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_pengadaan_barang') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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