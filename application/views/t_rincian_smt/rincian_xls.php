<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Rincian_nilai_persediaan.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<table width="100%">
    <tr>
        <th colspan="28">
            <h3 class="text-center">PEMERINTAH KABUPATEN BOGOR</h3>
        </th>
    </tr>
    <tr>
        <th colspan="28">
            <h3 class="text-center">RINCIAN NILAI PERSEDIAAN</h3>
        </th>
    </tr>
    <tr>
        <th colspan="28">
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
        <tr>
            <td class="text-center">1</td>
            <td class="text-center">2</td>
            <td class="text-center">3</td>
            <td class="text-center">4</td>
            <td class="text-center">5</td>
            <td class="text-center">6</td>
            <td class="text-center">7</td>
            <td class="text-center">8</td>
            <td class="text-center">9</td>
            <td class="text-center">10</td>
            <td class="text-center">11</td>
            <td class="text-center">12</td>
            <td class="text-center">13</td>
            <td class="text-center">14</td>
            <td class="text-center">15</td>
            <td class="text-center">16</td>
            <td class="text-center">17</td>
            <td class="text-center">18</td>
            <td class="text-center">19</td>
            <td class="text-center">20</td>
            <td class="text-center">21</td>
            <td class="text-center">22</td>
            <td class="text-center">23</td>
            <td class="text-center">24</td>
            <td class="text-center">25</td>
            <td class="text-center">26</td>
            <td class="text-center">27</td>
            <td class="text-center">28</td>
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
    </table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>