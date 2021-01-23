<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA T_RKBMD</h2>
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
                                <?php //echo anchor(site_url('t_rkbmd/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                ?>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah-program"><i class="fal fa-plus-square"></i> Tambah Program</button>
                                <!-- Modal -->
                                <div class="modal fade" id="tambah-program" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST" action="<?php echo site_url('t_rkbmd/create_program') ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Tambah Program
                                                        <small class="m-0 text-muted">
                                                            Silahkan isi nama Program & Tahun
                                                        </small>
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="form-label" for="simpleinput">Nama Program</label>
                                                        <input type="text" name="nama" id="simpleinput" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="simpleinput">Tahun Program</label>
                                                        <input type="number" name="tahun" id="simpleinput" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="<?php echo site_url('t_rkbmd/index'); ?>" method="get">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <div class="input-group-prepend">
                                                    <a href="<?php echo site_url('t_rkbmd'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
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
                                    <tr>
                                        <th>No</th>
                                        <th>Id Parent</th>
                                        <th>Level</th>
                                        <th>Nama</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Semula Jumlah</th>
                                        <th>Semula Satuan</th>
                                        <th>Menjadi Jumlah</th>
                                        <th>Menjadi Satuan</th>
                                        <th>Alasan Perubahan</th>
                                        <th>Km Jumlah</th>
                                        <th>Km Satuan</th>
                                        <th>Optim Kode Barang</th>
                                        <th>Optim Nama Barang</th>
                                        <th>Optim Jumlah</th>
                                        <th>Optim Satuan</th>
                                        <th>Riil Jumlah</th>
                                        <th>Riil Satuan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        foreach ($t_rkbmd_data as $t_rkbmd) {
                                        ?>
                                        <tr>
                                            <?php if ($t_rkbmd->level == 4) { ?>
                                                <td width="10px"><?php echo ++$start ?></td>
                                                <td><?php echo $t_rkbmd->id_parent ?></td>
                                                <td><?php echo $t_rkbmd->level ?></td>
                                                <td><?php echo $t_rkbmd->nama ?></td>
                                                <td><?php echo $t_rkbmd->kode_barang ?></td>
                                                <td><?php echo $t_rkbmd->nama_barang ?></td>
                                                <td><?php echo $t_rkbmd->semula_jumlah ?></td>
                                                <td><?php echo $t_rkbmd->semula_satuan ?></td>
                                                <td><?php echo $t_rkbmd->menjadi_jumlah ?></td>
                                                <td><?php echo $t_rkbmd->menjadi_satuan ?></td>
                                                <td><?php echo $t_rkbmd->alasan_perubahan ?></td>
                                                <td><?php echo $t_rkbmd->km_jumlah ?></td>
                                                <td><?php echo $t_rkbmd->km_satuan ?></td>
                                                <td><?php echo $t_rkbmd->optim_kode_barang ?></td>
                                                <td><?php echo $t_rkbmd->optim_nama_barang ?></td>
                                                <td><?php echo $t_rkbmd->optim_jumlah ?></td>
                                                <td><?php echo $t_rkbmd->optim_satuan ?></td>
                                                <td><?php echo $t_rkbmd->riil_jumlah ?></td>
                                                <td><?php echo $t_rkbmd->riil_satuan ?></td>
                                            <?php } else { ?>
                                                <td width="10px"><?php echo ++$start ?></td>
                                                <td><?php echo $t_rkbmd->id_parent ?></td>
                                                <td><?php echo $t_rkbmd->level ?></td>
                                                <td colspan="16"><?php echo $t_rkbmd->nama ?></td>
                                            <?php } ?>
                                            <td style="text-align:center" width="200px">
                                                <?php if ($t_rkbmd->level == 1) { ?>
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah-kegiatan"><i class="fal fa-plus-square"></i> Tambah Kegiatan</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="tambah-kegiatan" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form method="POST" action="<?php echo site_url('t_rkbmd/create_kegiatan') ?>">
                                                                <div class="modal-content text-left">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">
                                                                            Tambah Kegiatan
                                                                            <small class="m-0 text-muted">
                                                                                Silahkan isi nama Kegiatan
                                                                            </small>
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_parent" value="<?php echo $t_rkbmd->id ?>">
                                                                        <input type="hidden" name="tahun" value="<?php echo $t_rkbmd->tahun ?>">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="simpleinput">Nama Kegiatan</label>
                                                                            <input type="text" name="nama" id="simpleinput" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($t_rkbmd->level == 2) {  ?>
                                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah-output"><i class="fal fa-plus-square"></i> Tambah Output</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="tambah-output" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form method="POST" action="<?php echo site_url('t_rkbmd/create_output') ?>">
                                                                <div class="modal-content text-left">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">
                                                                            Tambah Output
                                                                            <small class="m-0 text-muted">
                                                                                Silahkan isi nama Output
                                                                            </small>
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id_parent" value="<?php echo $t_rkbmd->id ?>">
                                                                        <input type="hidden" name="tahun" value="<?php echo $t_rkbmd->tahun ?>">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="simpleinput">Nama Output</label>
                                                                            <input type="text" name="nama" id="simpleinput" class="form-control" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($t_rkbmd->level == 3) {
                                                    echo anchor(site_url('t_rkbmd/create/' . $t_rkbmd->id . '/' . $t_rkbmd->tahun), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Barang', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>