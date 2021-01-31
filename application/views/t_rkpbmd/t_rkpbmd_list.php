<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA RKPBMD</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-4">
                                <?php if (isset($_GET['tahun']) && isset($_GET['kode_unit'])) {
                                    $this->db->where('kode_unit', $_GET['kode_unit']);
                                    $result = $this->db->get('m_unit_kerja')->row();
                                ?>
                                    <a href="<?php echo site_url('t_rkpbmd/export_xls?tahun=' . $_GET['tahun'] . '&kode_unit=' . $_GET['kode_unit']) ?>" class="btn btn-sm btn-primary"><i class="fal fa-file-excel"></i> Export Excel</a>
                                    <?php
                                    if ($this->session->userdata('kode_jenis_unit') != 3) { ?>

                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah-program"><i class="fal fa-plus-square"></i> Tambah Program</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambah-program" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form method="POST" action="<?php echo site_url('t_rkpbmd/create_program') ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                Tambah Program
                                                                <small class="m-0 text-muted">
                                                                    Silahkan isi nama Program
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
                                                                <input type="number" name="tahun" id="simpleinput" class="form-control" value="<?php echo $_GET['tahun'] ?>" readonly required>
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
                                <?php }
                                } ?>
                            </div>
                            <div class="col-md-8">
                                <form action="" method="GET">
                                    <table class="table table-striped">
                                        <thead class="bg-primary-500">
                                            <tr>
                                                <th colspan="5">Filter</th colspan="5">
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td width="150px"><label class="form-label mt-2">Pilih Tahun :</label></td>
                                            <td width="150px"><input type="text" class="form-control" name="tahun" required></td>
                                            <?php if ($this->session->userdata('kode_jenis_unit') == 3) { ?>
                                                <td width="150px"><label class="form-label mt-2">Pilih Unit Kerja :</label></td>
                                                <td>
                                                    <select name="kode_unit" class="select2 form-control">
                                                        <?php
                                                        $this->db->where('kode_jenis_unit !=', '3');
                                                        $result = $this->db->get('m_unit_kerja')->result();
                                                        foreach ($result as $dt) {
                                                            echo '<option value="' . $dt->kode_unit . '">' . $dt->nama_unit . '</option>';
                                                        } ?>
                                                    </select>
                                                </td>
                                            <?php } else { ?>
                                                <input type="hidden" name="kode_unit" value="<?php echo $this->session->userdata('kode_unit') ?>">
                                            <?php } ?>
                                            <td width="150px"><button type="submit" class="btn btn-sm btn-primary"><i class="fal fa-search"></i> Search</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php if (isset($_GET['tahun']) && isset($_GET['kode_unit'])) {
                            $this->db->where('kode_unit', $_GET['kode_unit']);
                            $result = $this->db->get('m_unit_kerja')->row();
                        ?>
                            <h3 class="text-center"><?php echo $result->nama_unit ?></h3>
                            <h3 class="text-center">TAHUN <?php echo $_GET['tahun'] ?></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th class="text-center" rowspan="3" colspan="4">No</th>
                                            <th class="text-center" rowspan="3">Program/Kegiatan/Output</th>
                                            <th class="text-center" colspan="8">Barang Yang Diperlihara</th>
                                            <th class="text-center" rowspan="3">Nama Pemelihara</th>
                                            <th class="text-center" colspan="2">Semula</th>
                                            <th class="text-center" colspan="2">Menjadi</th>
                                            <th class="text-center" rowspan="3">Alasan Perubahan</th>
                                            <th class="text-center" rowspan="3">Keterangan</th>
                                            <?php if ($this->session->userdata('kode_jenis_unit') != 3) { ?>
                                                <th class="text-center" rowspan="3">Action</th>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <th class="text-center" rowspan="2">Kode Barang</th>
                                            <th class="text-center" rowspan="2">Nama Barang</th>
                                            <th class="text-center" rowspan="2">Jumlah</th>
                                            <th class="text-center" rowspan="2">Satuan</th>
                                            <th class="text-center" rowspan="2">Status Barang</th>
                                            <th class="text-center" colspan="3">Kondisi Barang</th>
                                            <th class="text-center" rowspan="2">Jumlah</th>
                                            <th class="text-center" rowspan="2">Satuan</th>
                                            <th class="text-center" rowspan="2">Jumlah</th>
                                            <th class="text-center" rowspan="2">Satuan</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">B</th>
                                            <th class="text-center">RR</th>
                                            <th class="text-center">RB</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center" colspan="4">1</th>
                                            <th class="text-center">2</th>
                                            <th class="text-center">3</th>
                                            <th class="text-center">4</th>
                                            <th class="text-center">5</th>
                                            <th class="text-center">6</th>
                                            <th class="text-center">7</th>
                                            <th class="text-center">8</th>
                                            <th class="text-center">9</th>
                                            <th class="text-center">10</th>
                                            <th class="text-center">11</th>
                                            <th class="text-center">12</th>
                                            <th class="text-center">13</th>
                                            <th class="text-center">14</th>
                                            <th class="text-center">15</th>
                                            <th class="text-center">16</th>
                                            <th class="text-center">17</th>
                                            <?php if ($this->session->userdata('kode_jenis_unit') != 3) { ?>
                                                <th class="text-center"></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <ol class="mb-g">
                                            <?php
                                            $program = 0;
                                            $kegiatan = 0;
                                            $output = 0;
                                            $barang = 0;
                                            $this->db->where('isdelete', '0');
                                            $this->db->where('kode_unit', $_GET['kode_unit']);
                                            $this->db->where('tahun', $_GET['tahun']);
                                            $t_rkpbmd_data = $this->db->get('v_rkpbmd')->result();
                                            foreach ($t_rkpbmd_data as $t_rkpbmd) {
                                            ?>
                                                <tr>
                                                    <?php if ($t_rkpbmd->level == 1) { ?>
                                                        <td><?php echo ++$program ?>.</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="16"><?php echo $t_rkpbmd->nama ?></td>
                                                    <?php } elseif ($t_rkpbmd->level == 2) { ?>
                                                        <td></td>
                                                        <td><?php echo ++$kegiatan ?>.</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="16"><?php echo $t_rkpbmd->nama ?></td>
                                                    <?php } elseif ($t_rkpbmd->level == 3) {  ?>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo ++$output ?>.</td>
                                                        <td></td>
                                                        <td colspan="16"><?php echo $t_rkpbmd->nama ?></td>
                                                    <?php } elseif ($t_rkpbmd->level == 4) {  ?>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo ++$barang ?></td>
                                                        <td><?php echo $t_rkpbmd->nama ?></td>
                                                        <td><?php echo $t_rkpbmd->kode_barang ?></td>
                                                        <td><?php echo $t_rkpbmd->nama_barang ?></td>
                                                        <td><?php echo $t_rkpbmd->jumlah_barang ?></td>
                                                        <td><?php echo $t_rkpbmd->satuan_barang ?></td>
                                                        <td><?php echo $t_rkpbmd->status_barang ?></td>
                                                        <td><?php echo $t_rkpbmd->kondisi_barang_b ?></td>
                                                        <td><?php echo $t_rkpbmd->kondisi_barang_rr ?></td>
                                                        <td><?php echo $t_rkpbmd->kondisi_barang_rb ?></td>
                                                        <td><?php echo $t_rkpbmd->nama_peliharaan ?></td>
                                                        <td><?php echo $t_rkpbmd->semula_jumlah ?></td>
                                                        <td><?php echo $t_rkpbmd->semula_satuan ?></td>
                                                        <td><?php echo $t_rkpbmd->menjadi_jumlah ?></td>
                                                        <td><?php echo $t_rkpbmd->menjadi_satuan ?></td>
                                                        <td><?php echo $t_rkpbmd->alasan_perubahan ?></td>
                                                        <td><?php echo $t_rkpbmd->ket ?></td>
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('kode_jenis_unit') != 3) { ?>
                                                        <td style="text-align:center" width="100px">
                                                            <?php if ($t_rkpbmd->level == 1) { ?>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-themed" data-toggle="dropdown" aria-expanded="false">Setting</button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 35px; left: 0px;">
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#edit-judul<?php echo $t_rkpbmd->id ?>">Edit Program</button>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete-judul<?php echo $t_rkpbmd->id ?>">Delete Program</button>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#tambah-kegiatan<?php echo $t_rkpbmd->id ?>">Tambah Kegiatan</button>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal Edit Program-->
                                                                <div class="modal fade" id="edit-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form method="POST" action="<?php echo site_url('t_rkpbmd/update_judul') ?>">
                                                                            <div class="modal-content text-left">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">
                                                                                        Edit Program
                                                                                        <small class="m-0 text-muted">
                                                                                            Silahkan Ubah nama Program
                                                                                        </small>
                                                                                    </h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" name="id" value="<?php echo $t_rkpbmd->id ?>">
                                                                                    <input type="hidden" name="tahun" value="<?php echo $t_rkpbmd->tahun ?>">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="simpleinput">Nama Program</label>
                                                                                        <input type="text" name="nama" id="simpleinput" value="<?php echo $t_rkpbmd->nama ?>" class="form-control" required>
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
                                                                <!-- Modal Delete judul-->
                                                                <div class="modal fade" id="delete-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content text-left">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">
                                                                                    Delete Program
                                                                                </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <?php
                                                                            $this->db->where('id_parent', $t_rkpbmd->id);
                                                                            $this->db->where('isdelete', '0');
                                                                            $query = $this->db->get('t_rkpbmd');
                                                                            $num = $query->num_rows();
                                                                            if ($num > 0) { ?>
                                                                                <div class="modal-body">
                                                                                    <h4>Maaf Data Program tidak bisa dihapus,silahkan hapus data Kegiatan terlebih dahulu</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="modal-body">
                                                                                    <h4>Apakah anda yakin ingin menghapus data Program?</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                    <a href="<?php echo site_url('t_rkpbmd/delete_judul/' . $t_rkpbmd->id . '/' . $_GET['tahun'] . '/' . $_GET['kode_unit']) ?>" class="btn btn-primary">Hapus</a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="tambah-kegiatan<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form method="POST" action="<?php echo site_url('t_rkpbmd/create_kegiatan') ?>">
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
                                                                                    <input type="hidden" name="id_parent" value="<?php echo $t_rkpbmd->id ?>">
                                                                                    <input type="hidden" name="tahun" value="<?php echo $t_rkpbmd->tahun ?>">
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
                                                            <?php } elseif ($t_rkpbmd->level == 2) {  ?>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-themed" data-toggle="dropdown" aria-expanded="false">Setting</button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 35px; left: 0px;">
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#edit-judul<?php echo $t_rkpbmd->id ?>">Edit Kegiatan</button>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete-judul<?php echo $t_rkpbmd->id ?>">Delete Kegiatan</button>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#tambah-output<?php echo $t_rkpbmd->id ?>">Tambah Output</button>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal Edit Program-->
                                                                <div class="modal fade" id="edit-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form method="POST" action="<?php echo site_url('t_rkpbmd/update_judul') ?>">
                                                                            <div class="modal-content text-left">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">
                                                                                        Edit Kegiatan
                                                                                        <small class="m-0 text-muted">
                                                                                            Silahkan Ubah nama Kegiatan
                                                                                        </small>
                                                                                    </h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" name="id" value="<?php echo $t_rkpbmd->id ?>">
                                                                                    <input type="hidden" name="tahun" value="<?php echo $t_rkpbmd->tahun ?>">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="simpleinput">Nama Kegiatan</label>
                                                                                        <input type="text" name="nama" id="simpleinput" value="<?php echo $t_rkpbmd->nama ?>" class="form-control" required>
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
                                                                <!-- Modal Delete judul-->
                                                                <div class="modal fade" id="delete-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content text-left">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">
                                                                                    Delete Kegiatan
                                                                                </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <?php
                                                                            $this->db->where('id_parent', $t_rkpbmd->id);
                                                                            $this->db->where('isdelete', '0');
                                                                            $query = $this->db->get('t_rkpbmd');
                                                                            $num = $query->num_rows();
                                                                            if ($num > 0) { ?>
                                                                                <div class="modal-body">
                                                                                    <h4>Maaf Data Kegiatan tidak bisa dihapus,silahkan hapus data Output terlebih dahulu</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="modal-body">
                                                                                    <h4>Apakah anda yakin ingin menghapus data Kegiatan?</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                    <a href="<?php echo site_url('t_rkpbmd/delete_judul/' . $t_rkpbmd->id . '/' . $_GET['tahun'] . '/' . $_GET['kode_unit']) ?>" class="btn btn-primary">Hapus</a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="tambah-output<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form method="POST" action="<?php echo site_url('t_rkpbmd/create_output') ?>">
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
                                                                                    <input type="hidden" name="id_parent" value="<?php echo $t_rkpbmd->id ?>">
                                                                                    <input type="hidden" name="tahun" value="<?php echo $t_rkpbmd->tahun ?>">
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
                                                            <?php } elseif ($t_rkpbmd->level == 3) { ?>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-themed" data-toggle="dropdown" aria-expanded="false">Setting</button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 35px; left: 0px;">
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#edit-judul<?php echo $t_rkpbmd->id ?>">Edit Output</button>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete-judul<?php echo $t_rkpbmd->id ?>">Delete Output</button>
                                                                        <a href="<?php echo site_url('t_rkpbmd/create/' . $t_rkpbmd->id . '/' . $t_rkpbmd->tahun) ?>" class="dropdown-item">Tambah Barang</a>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal Edit Output-->
                                                                <div class="modal fade" id="edit-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <form method="POST" action="<?php echo site_url('t_rkpbmd/update_judul') ?>">
                                                                            <div class="modal-content text-left">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">
                                                                                        Edit Output
                                                                                        <small class="m-0 text-muted">
                                                                                            Silahkan Ubah nama Output
                                                                                        </small>
                                                                                    </h4>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" name="id" value="<?php echo $t_rkpbmd->id ?>">
                                                                                    <input type="hidden" name="tahun" value="<?php echo $t_rkpbmd->tahun ?>">
                                                                                    <div class="form-group">
                                                                                        <label class="form-label" for="simpleinput">Nama Output</label>
                                                                                        <input type="text" name="nama" id="simpleinput" value="<?php echo $t_rkpbmd->nama ?>" class="form-control" required>
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
                                                                <!-- Modal Delete judul-->
                                                                <div class="modal fade" id="delete-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content text-left">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">
                                                                                    Delete Output
                                                                                </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <?php
                                                                            $this->db->where('id_parent', $t_rkpbmd->id);
                                                                            $this->db->where('isdelete', '0');
                                                                            $query = $this->db->get('t_rkpbmd');
                                                                            $num = $query->num_rows();
                                                                            if ($num > 0) { ?>
                                                                                <div class="modal-body">
                                                                                    <h4>Maaf Data Output tidak bisa dihapus,silahkan hapus data Barang terlebih dahulu</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="modal-body">
                                                                                    <h4>Apakah anda yakin ingin menghapus data Output?</h4>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                    <a href="<?php echo site_url('t_rkpbmd/delete_judul/' . $t_rkpbmd->id . '/' . $_GET['tahun'] . '/' . $_GET['kode_unit']) ?>" class="btn btn-primary">Hapus</a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } elseif ($t_rkpbmd->level == 4) { ?>
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn btn-secondary dropdown-toggle waves-effect waves-themed" data-toggle="dropdown" aria-expanded="false">Setting</button>
                                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: top, left; top: 35px; left: 0px;">
                                                                        <a href="<?php echo site_url('t_rkpbmd/update/' . $t_rkpbmd->id . '/' . $t_rkpbmd->tahun) ?>" class=" dropdown-item">Edit Barang</a>
                                                                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#delete-judul<?php echo $t_rkpbmd->id ?>">Delete Barang</button>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal Delete judul-->
                                                                <div class="modal fade" id="delete-judul<?php echo $t_rkpbmd->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content text-left">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">
                                                                                    Delete Barang
                                                                                </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h4>Apakah anda yakin ingin menghapus data Barang?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                <a href="<?php echo site_url('t_rkpbmd/delete/' . $t_rkpbmd->id . '/' . $_GET['tahun'] . '/' . $_GET['kode_unit']) ?>" class="btn btn-primary">Hapus</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </ol>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</main>
<script src=" <?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"> </script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>