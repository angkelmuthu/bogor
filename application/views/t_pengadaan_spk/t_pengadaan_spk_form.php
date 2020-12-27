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
									<td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Periode <?php echo form_error('periode') ?></td>
									<td><input type="text" class="form-control" name="periode" id="periode" placeholder="Periode" value="<?php echo $periode; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tanggal Kontrak <?php echo form_error('tanggal_kontrak') ?></td>
									<td><input type="date" class="form-control" id="example-date" name="tanggal_kontrak" id="datepicker-1" placeholder="Tanggal Kontrak" value="<?php echo $tanggal_kontrak; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>No Kontrak <?php echo form_error('no_kontrak') ?></td>
									<td><input type="text" class="form-control" name="no_kontrak" id="no_kontrak" placeholder="No Kontrak" value="<?php echo $no_kontrak; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>Tanggal Ba <?php echo form_error('tanggal_ba') ?></td>
									<td><input type="date" class="form-control" id="example-date" name="tanggal_ba" id="datepicker-1" placeholder="Tanggal Ba" value="<?php echo $tanggal_ba; ?>" /></td>
								</tr>
								<tr>
									<td width='200'>No Ba <?php echo form_error('no_ba') ?></td>
									<td><input type="text" class="form-control" name="no_ba" id="no_ba" placeholder="No Ba" value="<?php echo $no_ba; ?>" /></td>
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
										<a href="<?php echo site_url('t_pengadaan_spk') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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