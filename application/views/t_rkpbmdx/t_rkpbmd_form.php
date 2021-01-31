<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA T_RKPBMDX</h2>
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
									<td width='200'>Id Parent <?php echo form_error('id_parent') ?></td>
									<td><input type="text" class="form-control" name="id_parent" id="id_parent" placeholder="Id Parent" value="<?php echo $id_parent; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Level <?php echo form_error('level') ?></td>
									<td><input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tahun <?php echo form_error('tahun') ?></td>
									<td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kode Unit <?php echo form_error('kode_unit') ?></td>
									<td><input type="text" class="form-control" name="kode_unit" id="kode_unit" placeholder="Kode Unit" value="<?php echo $kode_unit; ?>" /></td>
								</tr>
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
									<td width='200'>Jumlah Barang <?php echo form_error('jumlah_barang') ?></td>
									<td><input type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Jumlah Barang" value="<?php echo $jumlah_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Satuan Barang <?php echo form_error('satuan_barang') ?></td>
									<td><input type="text" class="form-control" name="satuan_barang" id="satuan_barang" placeholder="Satuan Barang" value="<?php echo $satuan_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Status Barang <?php echo form_error('status_barang') ?></td>
									<td><input type="text" class="form-control" name="status_barang" id="status_barang" placeholder="Status Barang" value="<?php echo $status_barang; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kondisi Barang B <?php echo form_error('kondisi_barang_b') ?></td>
									<td><input type="text" class="form-control" name="kondisi_barang_b" id="kondisi_barang_b" placeholder="Kondisi Barang B" value="<?php echo $kondisi_barang_b; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kondisi Barang Rr <?php echo form_error('kondisi_barang_rr') ?></td>
									<td><input type="text" class="form-control" name="kondisi_barang_rr" id="kondisi_barang_rr" placeholder="Kondisi Barang Rr" value="<?php echo $kondisi_barang_rr; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Kondisi Barang Rb <?php echo form_error('kondisi_barang_rb') ?></td>
									<td><input type="text" class="form-control" name="kondisi_barang_rb" id="kondisi_barang_rb" placeholder="Kondisi Barang Rb" value="<?php echo $kondisi_barang_rb; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Nama Peliharaan <?php echo form_error('nama_peliharaan') ?></td>
									<td><input type="text" class="form-control" name="nama_peliharaan" id="nama_peliharaan" placeholder="Nama Peliharaan" value="<?php echo $nama_peliharaan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Semula Jumlah <?php echo form_error('semula_jumlah') ?></td>
									<td><input type="text" class="form-control" name="semula_jumlah" id="semula_jumlah" placeholder="Semula Jumlah" value="<?php echo $semula_jumlah; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Semula Satuan <?php echo form_error('semula_satuan') ?></td>
									<td><input type="text" class="form-control" name="semula_satuan" id="semula_satuan" placeholder="Semula Satuan" value="<?php echo $semula_satuan; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Menjadi Jumlah <?php echo form_error('menjadi_jumlah') ?></td>
									<td><input type="text" class="form-control" name="menjadi_jumlah" id="menjadi_jumlah" placeholder="Menjadi Jumlah" value="<?php echo $menjadi_jumlah; ?>" /></td>
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
									<td width='200'>Ket <?php echo form_error('ket') ?></td>
									<td><input type="text" class="form-control" name="ket" id="ket" placeholder="Ket" value="<?php echo $ket; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Created By <?php echo form_error('created_by') ?></td>
									<td><input type="text" class="form-control" name="created_by" id="created_by" placeholder="Created By" value="<?php echo $created_by; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Created Date <?php echo form_error('created_date') ?></td>
									<td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo $created_date; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Updated By <?php echo form_error('updated_by') ?></td>
									<td><input type="text" class="form-control" name="updated_by" id="updated_by" placeholder="Updated By" value="<?php echo $updated_by; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Updated Date <?php echo form_error('updated_date') ?></td>
									<td><input type="text" class="form-control" name="updated_date" id="updated_date" placeholder="Updated Date" value="<?php echo $updated_date; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Isdelete <?php echo form_error('isdelete') ?></td>
									<td><input type="text" class="form-control" name="isdelete" id="isdelete" placeholder="Isdelete" value="<?php echo $isdelete; ?>" /></td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="id" value="<?php echo $id; ?>" />
										<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('t_rkpbmdx') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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