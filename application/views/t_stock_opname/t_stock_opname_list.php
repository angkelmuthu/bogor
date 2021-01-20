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
                    <h2>KELOLA DATA T_STOCK_OPNAME</h2>
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
                                <?php
                                if ($this->session->userdata('kode_jenis_unit') != 3) {
                                    echo anchor(site_url('t_stock_opname/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                                } ?>
                                <a href="<?php echo site_url('t_stock_opname/rincian_xls/' . $tahun . '/' . $periode) ?>" class="btn btn-sm btn-primary"><i class="fal fa-file-excel"></i> Export Rincian</a>
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
                                                    <?php
                                                    $this->db->group_by('tahun');
                                                    $result = $this->db->get('t_stock_opname');
                                                    foreach ($result as $dt) {
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
                            <div class="col-md-6">
                                <form action="<?php echo site_url('t_stock_opname/index'); ?>" method="get">
                                    <div class="input-group">
                                        <div class="input-group">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <div class="input-group-prepend">
                                                    <a href="<?php echo site_url('t_stock_opname'); ?>" class="btn btn-danger waves-effect waves-themed">Reset</a>
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
                                        <th>Nama Jenis Barang</th>
                                        <th>Tahun</th>
                                        <th>Tanggal So</th>
                                        <th>No So</th>
                                        <!-- <th>Kode Kabupaten</th> -->
                                        <!-- <th>Nama Unit</th> -->
                                        <th>Barang</th>
                                        <th>Satuan</th>
                                        <th>Saldo Awal</th>
                                        <th>Tanggal Awal</th>
                                        <th>Jumlah Penerimaan 1</th>
                                        <th>Jumlah Penerimaan 2</th>
                                        <th>Jumlah Persediaan</th>
                                        <th>Jumlah Pengeluaran</th>
                                        <th>Saldo Adm</th>
                                        <th>Saldo Fisik</th>
                                        <th>Harga Satuan</th>
                                        <th>Nilai Persediaan</th>
                                        <th>Selisih Unit</th>
                                        <th>Selisih Rupiah</th>
                                        <!-- <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Updated By</th>
                                        <th>Updated Date</th>
                                        <th>Isdelete</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        foreach ($t_stock_opname_data as $t_stock_opname) {
                                        ?>
                                        <tr>
                                            <td width="10px"><?php echo ++$start ?></td>
                                            <td><?php echo $t_stock_opname->nama_jenis_barang ?></td>
                                            <td><?php echo $t_stock_opname->tahun ?></td>
                                            <td><?php echo $t_stock_opname->tanggal_so ?></td>
                                            <td><?php echo $t_stock_opname->no_so ?></td>
                                            <!-- <td><?php echo $t_stock_opname->kode_kabupaten ?></td> -->
                                            <!-- <td><?php echo $t_stock_opname->nama_unit ?></td> -->
                                            <td><?php echo $t_stock_opname->barang ?></td>
                                            <td><?php echo $t_stock_opname->satuan ?></td>
                                            <td><?php echo $t_stock_opname->saldo_awal ?></td>
                                            <td><?php echo $t_stock_opname->tanggal_awal ?></td>
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
                                            <!-- <td><?php echo $t_stock_opname->created_by ?></td>
                                            <td><?php echo $t_stock_opname->created_date ?></td>
                                            <td><?php echo $t_stock_opname->updated_by ?></td>
                                            <td><?php echo $t_stock_opname->updated_date ?></td>
                                            <td><?php echo $t_stock_opname->isdelete ?></td> -->
                                            <td style="text-align:center" width="200px">
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