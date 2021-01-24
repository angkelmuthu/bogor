<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>Pengadaan Barang</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<table class="table">
							<tr>
								<td>Tahun</td>
								<td>: <?php echo $tahun; ?></td>
								<td>Periode</td>
								<td>: <?php echo $periode; ?></td>
								<td>Tanggal Kontrak</td>
								<td>: <?php echo $tanggal_kontrak; ?></td>
								<td>No Kontrak</td>
								<td>: <?php echo $no_kontrak; ?></td>
							</tr>
							<tr>
								<td>Tanggal Ba</td>
								<td>: <?php echo $tanggal_ba; ?></td>
								<td>No Ba</td>
								<td>: <?php echo $no_ba; ?></td>
								<td>Kode Unit Peruntukan</td>
								<td>: <?php echo $nama_unit_peruntukan; ?></td>
								<td>Id Vendor</td>
								<td>: <?php echo $nama_perusahaan; ?></td>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td colspan="3">: <?php echo $keterangan; ?></td>
								<td>Created By</td>
								<td>: <?php echo $created_by; ?></td>
								<td>Created Date</td>
								<td>: <?php echo $created_date; ?></td>
							</tr>
						</table>
						<div>
							<a href="<?php echo site_url('t_pengadaan_spk') ?>" class="btn btn-block btn-primary waves-effect waves-themed">Kembali</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>KELOLA DATA T_PENGADAAN_SPK_DETAIL</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">
						<div class="text-center">
							<?php
							if ($this->session->userdata('kode_jenis_unit') != 3) {
								echo anchor(site_url('t_pengadaan_spk/create_detail/' . $this->uri->segment(3)), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
							} ?></div>
						<table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
							<thead>
								<tr>
									<th width="30px">No</th>
									<th>Kode Jenis Belanja</th>
									<th>Nama Jenis Belanja</th>
									<th>Kode Kelompok Barang</th>
									<th>Nama Kelompok Barang</th>
									<th>Barang</th>
									<th>Spesifikasi Barang</th>
									<th>Jumlah Barang</th>
									<th>Satuan</th>
									<th>Harga Satuan</th>
									<th>Total</th>
									<th>Keterangan</th>
									<th width="200px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								foreach ($dt_detail as $dt) { ?>
									<tr>
										<td><?php echo $i ?></td>
										<td><?php echo $dt->kode_jenis_belanja ?></td>
										<td><?php echo $dt->nama_jenis_belanja ?></td>
										<td><?php echo $dt->kode_kelompok_barang ?></td>
										<td><?php echo $dt->nama_kelompok_barang ?></td>
										<td><?php echo $dt->barang ?></td>
										<td><?php echo $dt->spesifikasi_barang ?></td>
										<td><?php echo $dt->jumlah_barang ?></td>
										<td><?php echo $dt->satuan ?></td>
										<td><?php echo $dt->harga_satuan ?></td>
										<td><?php echo $dt->total ?></td>
										<td><?php echo $dt->keterangan ?></td>
										<td><?php
											if ($this->session->userdata('kode_jenis_unit') != 3) {
												echo anchor(site_url('t_pengadaan_spk/update_detail/' . $dt->id), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
												echo ' ';
												echo
													'<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm' . $dt->id . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
											<div class="modal fade" id="default-example-modal-sm' . $dt->id . '" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-sm" role="document">
													<div class="modal-content">
														<div class="modal-header bg-info">
															<h5 class="modal-title">INFO!</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true"><i class="fal fa-times"></i></span>
															</button>
														</div>
														<div class="modal-body">
															<p>Apakah Anda Yakin Ingin Menghapus?</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<a href="' . base_url() . 't_pengadaan_spk/delete_detail/' . $dt->id . '/' . $this->uri->segment(3) . '" class="btn btn-primary">Ya, Hapus</a>
														</div>
													</div>
												</div>
											</div>';
											} ?>

										</td>
									</tr>
								<?php $i++;
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>