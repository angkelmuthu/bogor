<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=rkbmd.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<table width="100%">
    <tr>
        <th colspan="20">
            <h3 class="text-center">PERUBAHAN USULAN RENCANA KEBUTUHAN BARANG MILIK DAERAH</h3>
        </th>
    </tr>
    <tr>
        <th colspan="20">
            <h3 class="text-center">(PERUBAHAN RENCANA PENGADAAN )</h3>
        </th>
    </tr>
    <tr>
        <th colspan="20">
            <h3 class="text-center">TAHUN ANGGARAN <?php echo $_GET['tahun'] ?></h3>
        </th>
    </tr>
</table>
<table width="100%">
    <tr>
        <td colspan="4">PEMERINTAH PROVINSI</td>
        <td colspan="16">: JAWA BARAT</td>
    </tr>
    <tr>
        <td colspan="4">KABUPATEN/KOTA</td>
        <td colspan="16">: BOGOR</td>
    </tr>
    <tr>
        <td colspan="4">PENGGUNA BARANG</td>
        <td colspan="16">:</td>
    </tr>
</table>
<div class="table-responsive-lg">
    <table class="table table-bordered m-0" border="1" width="100%">
        <tr>
            <th class="text-center" rowspan="2" colspan="4">No</th>
            <th class="text-center" rowspan="2">Program/Kegiatan/Output</th>
            <th class="text-center" rowspan="2">Kode Barang</th>
            <th class="text-center" rowspan="2">Nama Barang</th>
            <th class="text-center" colspan="2">Semula</th>
            <th class="text-center" colspan="2">Menjadi</th>
            <th class="text-center" rowspan="2">Alasan Perubahan</th>
            <th class="text-center" colspan="2">Kebutuhan Maksimum </th>
            <th class="text-center" colspan="4">Data Daftar Barang yang Dapat Dioptimalisasikan</th>
            <th class="text-center" colspan="2">Kebutuhan Riil BMD </th>
        </tr>
        <tr>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Kode Barang</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Satuan</th>
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
        </tr>
        <ol class="mb-g">
            <?php
            $program = 0;
            $kegiatan = 0;
            $output = 0;
            $barang = 0;
            $this->db->where('isdelete', '0');
            $this->db->where('kode_unit', $_GET['kode_unit']);
            $this->db->where('tahun', $_GET['tahun']);
            $t_rkbmd_data = $this->db->get('t_rkbmd')->result();
            foreach ($t_rkbmd_data as $t_rkbmd) {
                ?>
                <tr>
                    <?php if ($t_rkbmd->level == 1) { ?>
                        <td><?php echo ++$program ?>.</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td colspan="16"><?php echo $t_rkbmd->nama ?></td>
                    <?php } elseif ($t_rkbmd->level == 2) { ?>
                        <td></td>
                        <td><?php echo ++$kegiatan ?>.</td>
                        <td></td>
                        <td></td>
                        <td colspan="16"><?php echo $t_rkbmd->nama ?></td>
                    <?php } elseif ($t_rkbmd->level == 3) {  ?>
                        <td></td>
                        <td></td>
                        <td><?php echo ++$output ?>.</td>
                        <td></td>
                        <td colspan="16"><?php echo $t_rkbmd->nama ?></td>
                    <?php } elseif ($t_rkbmd->level == 4) {  ?>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo ++$barang ?></td>
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
                    <?php } ?>
                </tr>
            <?php
            }
            ?>
        </ol>
    </table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>