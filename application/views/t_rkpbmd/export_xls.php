<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=rkpbmd.xls");

header("Pragma: no-cache");

header("Expires: 0");


$this->db->select('nama_unit');
$this->db->where('kode_unit', $_GET['kode_unit']);
$result = $this->db->get('m_unit_kerja')->row();
$nama_unit = $result->nama_unit;
?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<table width="100%">
    <tr>
        <th colspan="20">
            <h3 class="text-center">PERUBAHAN USULAN RENCANA KEBUTUHAN PEMELIHARAAN BARANG MILIK DAERAH</h3>
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
        <td colspan="16">: <?php echo $nama_unit ?></td>
    </tr>
</table>
<div class="table-responsive-lg">
    <table class="table table-bordered m-0" border="1" width="100%">
        <tr>
            <th class="text-center" rowspan="3" colspan="4">No</th>
            <th class="text-center" rowspan="3">Program/Kegiatan/Output</th>
            <th class="text-center" colspan="8">Barang Yang Diperlihara</th>
            <th class="text-center" rowspan="3">Nama Pemelihara</th>
            <th class="text-center" colspan="2">Semula</th>
            <th class="text-center" colspan="2">Menjadi</th>
            <th class="text-center" rowspan="3">Alasan Perubahan</th>
            <th class="text-center" rowspan="3">Keterangan</th>
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
                </tr>
            <?php
            }
            ?>
        </ol>
    </table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>