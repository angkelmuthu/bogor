<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA PENGADAAN BARANG</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($this->session->userdata('kode_jenis_unit') != 3) {
                                    echo anchor(site_url('t_pengadaan_spk/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                } ?>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal"><i class="fal fa-file-excel" aria-hidden="true"></i> Export Excel</button>
                                <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    Export Excel
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <form action="<?php echo site_url('t_pengadaan_spk/export_excel') ?>" method="GET">
                                                <div class="modal-body text-left">
                                                    <?php if ($this->session->userdata('kode_jenis_unit') == 3) { ?>
                                                        <div class="form-group">
                                                            <label class="form-label" for="simpleinput">Unit Kerja</label>
                                                            <?php echo select2_dinamis('kode_unit', 'm_unit_kerja', 'kode_unit', 'nama_unit') ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="simpleinput">Jenis Belanja</label>
                                                            <?php echo select2_dinamis('kode_jenis_belanja', 'v_jenis_belanja', 'kode_jenis_belanja', 'nama_jenis_belanja') ?>
                                                        </div>
                                                    <?php } else { ?>
                                                        <input type="hidden" name="kode_unit" value="<?php echo $this->session->userdata('kode_unit') ?>">
                                                        <div class="form-group">
                                                            <label class="form-label" for="simpleinput">Jenis Belanja</label>
                                                            <select name="kode_jenis_belanja" class="select2 form-control w-100">
                                                                <?php $this->db->where('kode_unit', $this->session->userdata('kode_unit'));
                                                                $data = $this->db->get('v_jenis_belanja')->result();
                                                                foreach ($data as $row) { ?>
                                                                    <option value="<?php echo $row->kode_jenis_belanja ?>"><?php echo $row->nama_jenis_belanja ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-group">
                                                        <label class="form-label" for="simpleinput">Tahun</label>
                                                        <input type="text" name="tahun" class="form-control" placeholder="tahun" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="simpleinput">Periode</label>
                                                        <select class="form-control" name="periode" id="example-select">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="simpleinput">Penandatangan</label>
                                                        <?php echo cmb_dinamis('id', 'm_pegawai', 'id', 'nama') ?>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-themed">Export</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="<?php echo site_url('t_pengadaan_spk/index'); ?>" method="get">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <div class="input-group-prepend">
                                                    <a href="<?php echo site_url('t_pengadaan_spk'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <input id="button-addon3" type="text" name="q" value="<?php echo $q; ?>" class="form-control" placeholder="Search for anything..." aria-label="Example text with two button addons" aria-describedby="button-addon3">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary waves-effect waves-themed" type="submit">Search</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-themed">
                                    <tr class="text-center">
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Tahun</th>
                                        <th rowspan="2">Periode</th>
                                        <th rowspan="2">Unit Kerja</th>
                                        <th colspan="2">SPK / Kontrak</th>
                                        <th colspan="2">Berita Acara</th>
                                        <th rowspan="2">Kode Unit Peruntukan</th>
                                        <th rowspan="2">Vendor</th>
                                        <th rowspan="2">Keterangan</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr class="text-center">
                                        <th>Tanggal</th>
                                        <th>Nomor</th>
                                        <th>Tanggal</th>
                                        <th>Nomor</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        foreach ($t_pengadaan_spk_data as $t_pengadaan_spk) {
                                        ?>
                                        <tr>
                                            <td width="10px"><?php echo ++$start ?></td>
                                            <td><?php echo $t_pengadaan_spk->tahun ?></td>
                                            <td><?php echo $t_pengadaan_spk->periode ?></td>
                                            <td><?php echo $t_pengadaan_spk->nama_unit ?></td>
                                            <td><?php echo $t_pengadaan_spk->tanggal_kontrak ?></td>
                                            <td><?php echo $t_pengadaan_spk->no_kontrak ?></td>
                                            <td><?php echo $t_pengadaan_spk->tanggal_ba ?></td>
                                            <td><?php echo $t_pengadaan_spk->no_ba ?></td>
                                            <td><?php echo $t_pengadaan_spk->kode_unit_peruntukan ?></td>
                                            <td><?php echo $t_pengadaan_spk->nama_perusahaan ?></td>
                                            <td><?php echo $t_pengadaan_spk->keterangan ?></td>
                                            <td style="text-align:center" width="220px">
                                                <?php
                                                echo anchor(site_url('t_pengadaan_spk/read/' . $t_pengadaan_spk->id), '<i class="fal fa-eye" aria-hidden="true"></i> Data Barang', 'class="btn btn-info btn-xs waves-effect waves-themed"');
                                                if ($this->session->userdata('kode_jenis_unit') != 3) {
                                                    echo '  ';
                                                    echo anchor(site_url('t_pengadaan_spk/update/' . $t_pengadaan_spk->id), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
                                                    echo '  ';
                                                    echo
                                                        '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm' . $t_pengadaan_spk->id . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm' . $t_pengadaan_spk->id . '" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="t_pengadaan_spk/delete/' . $t_pengadaan_spk->id . '" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>

                            <?php echo $pagination ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>