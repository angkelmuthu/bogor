<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Rekap_nilai_persediaan.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<table width="100%">
    <tr>
        <th colspan="8">
            <h3 class="text-center">PEMERINTAH KABUPATEN BOGOR</h3>
        </th>
    </tr>
    <tr>
        <th colspan="8">
            <h3 class="text-center">REKAP NILAI PERSEDIAAN</h3>
        </th>
    </tr>
    <tr>
        <th colspan="8">
            <h3 class="text-center">PER <?php echo strtoupper(date('d F Y')) ?></h3>
        </th>
    </tr>
</table>
<div class="table-responsive-lg">
    <table class="table table-bordered m-0" border="1" width="100%">
        <tr>
            <th>NO.</th>
            <th>SKPD</th>
            <th>TAHUN</th>
            <th>PERIODE</th>
            <th>HABIS PAKAI</th>
            <th>BARANG YANG AKAN DISERAHKAN KEPADA MASYARAKAT</th>
            <th>TOTAL</th>
            <th>NO BA</th>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td class="text-center">2</td>
            <td class="text-center">3</td>
            <td class="text-center">4</td>
            <td class="text-center">5</td>
            <td class="text-center">6</td>
            <td class="text-center">7</td>
            <td class="text-center">8</td>
        </tr>
        <?php
        $start = 0;
        foreach ($t_rincian_smt_data as $t_rincian_smt) {
        ?>
            <tr>
                <td width="10px"><?php echo ++$start ?></td>
                <td><?php echo $t_rincian_smt->nama_unit ?></td>
                <td><?php echo $t_rincian_smt->tahun ?></td>
                <td><?php echo $t_rincian_smt->periode ?></td>
                <td><?php echo $t_rincian_smt->HABIS_PAKAI ?></td>
                <td><?php echo $t_rincian_smt->BARANG_YANG_AKAN_DISERAHKAN_KEPADA_MASYARAKAT ?></td>
                <td><?php echo $t_rincian_smt->total ?></td>
                <td><?php echo $t_rincian_smt->no_ba ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>