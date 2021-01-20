<?php
if (isset($_GET['tahun']) && isset($_GET['periode'])) {
    $tahun = $_GET['tahun'];
    $periode = $_GET['periode'];
} else {
    $tahun = date('Y');
    $periode = 1;
}
?>
<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>DATA NILAI PERSEDIAAN <span class="fw-300"><i>Tahun <?php echo $tahun ?> Periode <?php echo $periode ?></i></span></h2>
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
                                    echo anchor(site_url('t_rincian_smt/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                } ?>
                                <a href="<?php echo site_url('t_rincian_smt/rincian_xls/' . $tahun . '/' . $periode) ?>" class="btn btn-sm btn-primary"><i class="fal fa-file-excel"></i> Export Rincian</a>
                                <a href="<?php echo site_url('t_rincian_smt/rekap_xls/' . $tahun . '/' . $periode) ?>" class="btn btn-sm btn-primary"><i class="fal fa-file-excel"></i> Export Rekap</a>
                            </div>
                            <div class="col-md-6">
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
                                                    <?php foreach ($t_rincian_tahun as $dt) {
                                                        echo '<option value="' . $dt->tahun . '">' . $dt->tahun . '</option>';
                                                    } ?>
                                                </select>
                                            </td>
                                            <td><label class="form-label mt-2">Pilih Periode :</label></td>
                                            <td>
                                                <div class="frame-wrap mt-1">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="periode1" name="periode" value="1" checked="">
                                                        <label class="custom-control-label" for="periode1">1</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="periode2" name="periode" value="2">
                                                        <label class="custom-control-label" for="periode2">2</label>
                                                    </div>
                                                </div>
                                            </td>
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
                        <div class="table-responsive">
                            <?php if ($this->session->userdata('kode_jenis_unit') != 3) { ?>
                                <table class="table table-bordered table-hover table-striped" id="example">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th>NO.</th>
                                            <th>TAHUN</th>
                                            <th>PERIODE</th>
                                            <th>NAMA BARANG</th>
                                            <th>JUMLAH HARGA</th>
                                            <th>NO. BA</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($t_rincian_smt_data as $t_rincian_smt) {
                                        ?>
                                            <tr>
                                                <td width="10px"><?php echo ++$start ?></td>
                                                <td><?php echo $t_rincian_smt->tahun ?></td>
                                                <td><?php echo $t_rincian_smt->periode ?></td>
                                                <td><?php echo $t_rincian_smt->nama_jenis_barang ?></td>
                                                <td><?php echo $t_rincian_smt->jumlah_harga ?></td>
                                                <td><?php echo $t_rincian_smt->no_ba ?></td>
                                                <td style="text-align:center" width="200px">
                                                    <?php
                                                    echo anchor(site_url('t_rincian_smt/read/' . $t_rincian_smt->id), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-info btn-xs waves-effect waves-themed"');
                                                    echo '  ';
                                                    echo anchor(site_url('t_rincian_smt/update/' . $t_rincian_smt->id), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
                                                    echo '  ';
                                                    echo
                                                        '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm' . $t_rincian_smt->id . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm' . $t_rincian_smt->id . '" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="t_rincian_smt/delete/' . $t_rincian_smt->id . '" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <table class="table table-bordered table-hover table-striped" id="example">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th>NO.</th>
                                            <th>SKPD</th>
                                            <th>TAHUN</th>
                                            <th>PERIODE</th>
                                            <th>ATK</th>
                                            <th>CETAKAN</th>
                                            <th>ALAT KEBERSIHAN</th>
                                            <th>LINEN</th>
                                            <th>PAKAIAN</th>
                                            <th>PERLENGKAPAN MEDIS</th>
                                            <th>ALAT RUMAH TANGGA</th>
                                            <th>BAHAN MAKANAN</th>
                                            <th>ALAT LISTRIK/ELEKTRONIK</th>
                                            <th>OBAT</th>
                                            <th>NATURA</th>
                                            <th>BAHAN KIMIA/FOGGING</th>
                                            <th>DARAH</th>
                                            <th>PJU</th>
                                            <th>GAS LPG</th>
                                            <th>GAS MEDIS</th>
                                            <th>PERLENGKAPAN JENAZAH</th>
                                            <th>ALAT LAB/ALKES</th>
                                            <th>ALAT KEDOKTERAN</th>
                                            <th>APD</th>
                                            <th>BBM</th>
                                            <th>BARANG YANG AKAN DISERAHKAN KEPADA MASYARAKAT</th>
                                            <th>TOTAL</th>
                                            <th>NO BA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($t_rincian_smt_data as $t_rincian_smt) {
                                        ?>
                                            <tr>
                                                <td width="10px"><?php echo ++$start ?></td>
                                                <td><?php echo $t_rincian_smt->nama_unit ?></td>
                                                <td><?php echo $t_rincian_smt->tahun ?></td>
                                                <td><?php echo $t_rincian_smt->periode ?></td>
                                                <td><?php echo $t_rincian_smt->ATK ?></td>
                                                <td><?php echo $t_rincian_smt->CETAKAN ?></td>
                                                <td><?php echo $t_rincian_smt->ALAT_KEBERSIHAN ?></td>
                                                <td><?php echo $t_rincian_smt->LINEN ?></td>
                                                <td><?php echo $t_rincian_smt->PAKAIAN ?></td>
                                                <td><?php echo $t_rincian_smt->PERLENGKAPAN_MEDIS ?></td>
                                                <td><?php echo $t_rincian_smt->ALAT_RUMAH_TANGGA ?></td>
                                                <td><?php echo $t_rincian_smt->BAHAN_MAKANAN ?></td>
                                                <td><?php echo $t_rincian_smt->ALAT_LISTRIK_ELEKTRONIK ?></td>
                                                <td><?php echo $t_rincian_smt->OBAT ?></td>
                                                <td><?php echo $t_rincian_smt->NATURA ?></td>
                                                <td><?php echo $t_rincian_smt->BAHAN_KIMIA_FOGGING ?></td>
                                                <td><?php echo $t_rincian_smt->DARAH ?></td>
                                                <td><?php echo $t_rincian_smt->PJU ?></td>
                                                <td><?php echo $t_rincian_smt->GAS_LPG ?></td>
                                                <td><?php echo $t_rincian_smt->GAS_MEDIS ?></td>
                                                <td><?php echo $t_rincian_smt->PERLENGKAPAN_JENAZAH ?></td>
                                                <td><?php echo $t_rincian_smt->ALAT_LABORATORIUM_ALKES_BHP ?></td>
                                                <td><?php echo $t_rincian_smt->ALAT_KEDOKTERAN ?></td>
                                                <td><?php echo $t_rincian_smt->APD ?></td>
                                                <td><?php echo $t_rincian_smt->BBM ?></td>
                                                <td><?php echo $t_rincian_smt->BARANG_YANG_AKAN_DISERAHKAN_KEPADA_MASYARAKAT ?></td>
                                                <td><?php echo $t_rincian_smt->total ?></td>
                                                <td><?php echo $t_rincian_smt->no_ba ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>