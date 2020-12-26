<?php
if (isset($_GET['tahun'])) {
    $tahun = $_GET['tahun'];
} else {
    $tahun = date('Y');
}
if (isset($_GET['periode'])) {
    $periode = $_GET['periode'];
} else {
    $periode = 1;
}
?>
<main id="js-page-content" role="main" class="page-content">
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
                        <div class="text-center">
                            <?php echo anchor(site_url('t_pengadaan_barang/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-info btn-sm waves-effect waves-themed"'); ?>
                            <?php //echo anchor(site_url('t_pengadaan_barang/excelx/' . $tahun . '/' . $periode), '<i class="fal fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-outline-success btn-sm waves-effect waves-themed"');
                            ?>
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
                                        <form action="<?php echo site_url('t_pengadaan_barang/excelx') ?>" method="GET">
                                            <div class="modal-body text-left">
                                                <div class="form-group">
                                                    <label class="form-label" for="simpleinput">Jenis Belanja</label>
                                                    <?php echo cmb_dinamis('kode_jenis_belanja', 'v_jenis_belanja', 'kode_jenis_belanja', 'nama_jenis_belanja') ?>
                                                </div>
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
                        <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <!-- <th>Tahun</th>
                                    <th>Periode</th> -->
                                    <!-- <th>Kode Kabupaten</th>
                                    <th>Kode Unit</th> -->
                                    <th>Kode Jenis Belanja</th>
                                    <th>Nama Jenis Belanja</th>
                                    <th>Kode Kelompok Barang</th>
                                    <th>Nama Kelompok Barang</th>
                                    <th>Barang</th>
                                    <!-- <th>Spesifikasi Barang</th> -->
                                    <th>Tanggal Kontrak</th>
                                    <th>No Kontrak</th>
                                    <th>Tanggal Ba</th>
                                    <th>No Ba</th>
                                    <!-- <th>Jumlah Barang</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th>Kode Unit Peruntukan</th>
                                    <th>Id Vendor</th>
                                    <th>Keterangan</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Updated By</th>
                                    <th>Updated Date</th>
                                    <th>Isdelete</th> -->
                                    <th width="120px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($all as $dt) { ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $dt->kode_jenis_belanja ?></td>
                                        <td><?php echo $dt->nama_jenis_belanja ?></td>
                                        <td><?php echo $dt->kode_kelompok_barang ?></td>
                                        <td><?php echo $dt->nama_kelompok_barang ?></td>
                                        <td><?php echo $dt->barang ?></td>
                                        <!-- <td>Spesifikasi Barang</td> -->
                                        <td><?php echo $dt->tanggal_kontrak ?></td>
                                        <td><?php echo $dt->no_kontrak ?></td>
                                        <td><?php echo $dt->tanggal_ba ?></td>
                                        <td><?php echo $dt->no_ba ?></td>
                                        <td>
                                            <?php echo anchor(site_url('t_pengadaan_barang/read/' . $dt->id), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-info btn-sm waves-effect waves-themed"'); ?>
                                            <?php echo anchor(site_url('t_pengadaan_barang/update/' . $dt->id), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-sm waves-effect waves-themed"'); ?>
                                            <button type="button" class="btn btn-danger btn-sm waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm<?php echo $dt->id ?>"><i class="fal fa-trash" aria-hidden="true"></i></button>
                                            <div class="modal fade" id="default-example-modal-sm<?php echo $dt->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                            <a href="<?php echo base_url() ?>t_pengadaan_barang/delete/<?php echo $dt->id ?>" class="btn btn-primary">Ya, Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script script script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#dt-basic-example thead tr').clone(true).appendTo('#dt-basic-example thead');
        $('#dt-basic-example thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        var table = $('#dt-basic-example').DataTable({
            //responsive: true,
            orderCellsTop: true,
            fixedHeader: true,
        });
    });
    // $(document).ready(function() {
    //     $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
    //         return {
    //             "iStart": oSettings._iDisplayStart,
    //             "iEnd": oSettings.fnDisplayEnd(),
    //             "iLength": oSettings._iDisplayLength,
    //             "iTotal": oSettings.fnRecordsTotal(),
    //             "iFilteredTotal": oSettings.fnRecordsDisplay(),
    //             "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
    //             "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    //         };
    //     };

    //     var t = $("#dt-basic-example").dataTable({
    //         initComplete: function() {
    //             var api = this.api();
    //             $('#mytable_filter input')
    //                 .off('.DT')
    //                 .on('keyup.DT', function(e) {
    //                     if (e.keyCode == 13) {
    //                         api.search(this.value).draw();
    //                     }
    //                 });
    //         },
    //         oLanguage: {
    //             sProcessing: "loading..."
    //         },
    //         processing: true,
    //         serverSide: true,
    //         ajax: {
    //             "url": "t_pengadaan_barang/json",
    //             "type": "POST"
    //         },
    //         columns: [{
    //                 "data": "id",
    //                 "orderable": false
    //             }, {
    //                 "data": "tahun"
    //             }, {
    //                 "data": "periode"
    //             }, {
    //                 //     "data": "kode_kabupaten"
    //                 // }, {
    //                 //     "data": "kode_unit"
    //                 // }, {
    //                 "data": "kode_jenis_belanja"
    //             }, {
    //                 "data": "nama_jenis_belanja"
    //             }, {
    //                 "data": "kode_kelompok_barang"
    //             }, {
    //                 "data": "nama_kelompok_barang"
    //             }, {
    //                 "data": "barang"
    //             }, {
    //                 //     "data": "spesifikasi_barang"
    //                 // }, {
    //                 "data": "tanggal_kontrak"
    //             }, {
    //                 "data": "no_kontrak"
    //             }, {
    //                 "data": "tanggal_ba"
    //             }, {
    //                 "data": "no_ba"
    //                 // }, {
    //                 //     "data": "jumlah_barang"
    //                 // }, {
    //                 //     "data": "satuan"
    //                 // }, {
    //                 //     "data": "harga_satuan"
    //                 // }, {
    //                 //     "data": "total"
    //                 // }, {
    //                 //     "data": "kode_unit_peruntukan"
    //                 // }, {
    //                 //     "data": "id_vendor"
    //                 // }, {
    //                 //     "data": "keterangan"
    //                 // }, {
    //                 //     "data": "created_by"
    //                 // }, {
    //                 //     "data": "created_date"
    //                 // }, {
    //                 //     "data": "updated_by"
    //                 // }, {
    //                 //     "data": "updated_date"
    //                 // }, {
    //                 //     "data": "isdelete"
    //             },
    //             {
    //                 "data": "action",
    //                 "orderable": false,
    //                 "className": "text-center"
    //             }
    //         ],
    //         order: [
    //             [0, 'desc']
    //         ],
    //         rowCallback: function(row, data, iDisplayIndex) {
    //             var info = this.fnPagingInfo();
    //             var page = info.iPage;
    //             var length = info.iLength;
    //             var index = page * length + (iDisplayIndex + 1);
    //             $('td:eq(0)', row).html(index);
    //         }
    //     });

    // });
</script>