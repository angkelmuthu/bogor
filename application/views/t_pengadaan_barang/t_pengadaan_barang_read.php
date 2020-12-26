<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>Pengadaan Barang Read</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<table class="table table-striped">
							<tr>
								<td>Tahun</td>
								<td><?php echo $tahun; ?></td>
							</tr>
							<tr>
								<td>Periode</td>
								<td><?php echo $periode; ?></td>
							</tr>
							<tr>
								<td>Kode Kabupaten</td>
								<td><?php echo $kode_kabupaten; ?></td>
							</tr>
							<tr>
								<td>Kode Unit</td>
								<td><?php echo $kode_unit; ?></td>
							</tr>
							<tr>
								<td>Kode Jenis Belanja</td>
								<td><?php echo $kode_jenis_belanja; ?></td>
							</tr>
							<tr>
								<td>Nama Jenis Belanja</td>
								<td><?php echo $nama_jenis_belanja; ?></td>
							</tr>
							<tr>
								<td>Kode Kelompok Barang</td>
								<td><?php echo $kode_kelompok_barang; ?></td>
							</tr>
							<tr>
								<td>Nama Kelompok Barang</td>
								<td><?php echo $nama_kelompok_barang; ?></td>
							</tr>
							<tr>
								<td>Barang</td>
								<td><?php echo $barang; ?></td>
							</tr>
							<tr>
								<td>Spesifikasi Barang</td>
								<td><?php echo $spesifikasi_barang; ?></td>
							</tr>
							<tr>
								<td>Tanggal Kontrak</td>
								<td><?php echo $tanggal_kontrak; ?></td>
							</tr>
							<tr>
								<td>No Kontrak</td>
								<td><?php echo $no_kontrak; ?></td>
							</tr>
							<tr>
								<td>Tanggal Ba</td>
								<td><?php echo $tanggal_ba; ?></td>
							</tr>
							<tr>
								<td>No Ba</td>
								<td><?php echo $no_ba; ?></td>
							</tr>
							<tr>
								<td>Jumlah Barang</td>
								<td><?php echo $jumlah_barang; ?></td>
							</tr>
							<tr>
								<td>Satuan</td>
								<td><?php echo $satuan; ?></td>
							</tr>
							<tr>
								<td>Harga Satuan</td>
								<td><?php echo $harga_satuan; ?></td>
							</tr>
							<tr>
								<td>Total</td>
								<td><?php echo $total; ?></td>
							</tr>
							<tr>
								<td>Kode Unit Peruntukan</td>
								<td><?php echo $kode_unit_peruntukan; ?></td>
							</tr>
							<tr>
								<td>Id Vendor</td>
								<td><?php echo $id_vendor; ?></td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td><?php echo $keterangan; ?></td>
							</tr>
							<tr>
								<td>Created By</td>
								<td><?php echo $created_by; ?></td>
							</tr>
							<tr>
								<td>Created Date</td>
								<td><?php echo $created_date; ?></td>
							</tr>
							<tr>
								<td>Updated By</td>
								<td><?php echo $updated_by; ?></td>
							</tr>
							<tr>
								<td>Updated Date</td>
								<td><?php echo $updated_date; ?></td>
							</tr>
							<tr>
								<td>Isdelete</td>
								<td><?php echo $isdelete; ?></td>
							</tr>
							<tr>
								<td></td>
								<td><a href="<?php echo site_url('t_pengadaan_barang') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
							</tr>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>