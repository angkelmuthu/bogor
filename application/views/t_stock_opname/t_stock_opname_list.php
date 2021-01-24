<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>STOCK OPNAME</h2>
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
                                <?php
                                if ($this->session->userdata('kode_jenis_unit') != 3) {
                                    echo anchor(site_url('t_stock_opname/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                }
                                if (isset($_GET['tahun']) && isset($_GET['unit'])) { ?>
                                    <a href="<?php echo site_url('t_stock_opname/export_xls/' . $_GET['tahun'] . '/' . $_GET['unit']) ?>" class="btn btn-sm btn-primary"><i class="fal fa-file-excel"></i> Export Excel</a>
                                <?php } ?>
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
                                            <td><label class="form-label mt-2">Pilih Tahun :</label></td>
                                            <td>
                                                <select class="form-control" name="tahun" required>
                                                    <option></option>
                                                    <?php
                                                    $this->db->group_by('tahun');
                                                    $result = $this->db->get('t_stock_opname')->result();
                                                    foreach ($result as $dt) {
                                                        echo '<option value="' . $dt->tahun . '">' . $dt->tahun . '</option>';
                                                    } ?>
                                                </select>
                                            </td>
                                            <?php if ($this->session->userdata('kode_jenis_unit') == 3) { ?>
                                                <td><label class="form-label mt-2">Pilih Unit Kerja :</label></td>
                                                <td>
                                                    <select name="unit" class="select2 form-control">
                                                        <?php
                                                        $this->db->where('kode_jenis_unit !=', '3');
                                                        $result = $this->db->get('m_unit_kerja')->result();
                                                        foreach ($result as $dt) {
                                                            echo '<option value="' . $dt->kode_unit . '">' . $dt->nama_unit . '</option>';
                                                        } ?>
                                                    </select>
                                                </td>
                                            <?php } else { ?>
                                                <input type="hidden" name="unit" value="<?php echo $this->session->userdata('kode_unit') ?>">
                                            <?php } ?>
                                            <td><button type="submit" class="btn btn-sm btn-primary"><i class="fal fa-search"></i> Search</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php if (isset($_GET['tahun']) && isset($_GET['unit'])) {
                            $this->db->where('kode_unit', $_GET['unit']);
                            $result = $this->db->get('m_unit_kerja')->row();
                        ?>
                            <h3 class="text-center"><?php echo $result->nama_unit ?></h3>
                            <h3 class="text-center">TAHUN <?php echo $_GET['tahun'] ?></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th class="text-center" rowspan="2">No.</th>
                                            <th class="text-center" rowspan="2">Barang</th>
                                            <th class="text-center" rowspan="2">Satuan</th>
                                            <th class="text-center" rowspan="2">Saldo Awal</th>
                                            <th class="text-center" colspan="2">Penerimaan</th>
                                            <th class="text-center" rowspan="2">Jumlah Persediaan</th>
                                            <th class="text-center" rowspan="2">Jumlah Pengeluaran</th>
                                            <th class="text-center" rowspan="2">Saldo Adm</th>
                                            <th class="text-center" rowspan="2">Saldo Fisik</th>
                                            <th class="text-center" rowspan="2">Harga Satuan</th>
                                            <th class="text-center" rowspan="2">Nilai Persediaan</th>
                                            <th class="text-center" colspan="2">Selisih</th>
                                            <th class="text-center" rowspan="2">Action</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">SMT 1</th>
                                            <th class="text-center">SMT 2</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Rupiah</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">1</th>
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
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                            $start = 0;
                                            $this->db->where('tahun', $_GET['tahun']);
                                            $this->db->where('kode_unit', $_GET['unit']);
                                            //$this->db->order_by('tahun,kode_unit,kode_jenis_barang,urut,id', 'ASC');
                                            $result = $this->db->get('v_stock_opname_report')->result();
                                            foreach ($result as $t_stock_opname) {
                                                if ($t_stock_opname->urut == '1') {
                                            ?>
                                                <tr class="bg-info-500">
                                                    <td></td>
                                                    <td colspan="10"><?php echo $t_stock_opname->barang ?></td>
                                                    <td><?php echo $t_stock_opname->nilai_persediaan ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align:center" width="170px">

                                                    </td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr>
                                                    <td width="10px"><?php echo ++$start ?></td>
                                                    <td><?php echo $t_stock_opname->barang ?></td>
                                                    <td><?php echo $t_stock_opname->satuan ?></td>
                                                    <td><?php echo $t_stock_opname->saldo_awal ?></td>
                                                    <td><?php echo $t_stock_opname->jumlah_penerimaan_1 ?></td>
                                                    <td><?php echo $t_stock_opname->jumlah_penerimaan_2 ?></td>
                                                    <td><?php echo $t_stock_opname->jumlah_persediaan ?></td>
                                                    <td><?php echo $t_stock_opname->jumlah_pengeluaran ?></td>
                                                    <td><?php echo $t_stock_opname->saldo_adm ?></td>
                                                    <td><?php echo $t_stock_opname->saldo_fisik ?></td>
                                                    <td><?php echo $t_stock_opname->harga_satuan ?></td>
                                                    <td><?php echo $t_stock_opname->nilai_persediaan ?></td>
                                                    <td><?php echo $t_stock_opname->selisih_unit ?></td>
                                                    <td><?php echo $t_stock_opname->selisih_rupiah ?></td>
                                                    <td style="text-align:center" width="170px">
                                                        <?php
                                                        echo anchor(site_url('t_stock_opname/read/' . $t_stock_opname->id), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-info btn-xs waves-effect waves-themed"');
                                                        echo '  ';
                                                        echo anchor(site_url('t_stock_opname/update/' . $t_stock_opname->id), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
                                                        echo '  ';
                                                        echo
                                                            '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm' . $t_stock_opname->id . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm' . $t_stock_opname->id . '" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="t_stock_opname/delete/' . $t_stock_opname->id . '" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } ?>
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