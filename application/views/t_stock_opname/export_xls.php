<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Laporan_Stock_Opname.xls");

header("Pragma: no-cache");

header("Expires: 0");

///////////parameter///////////////////////////
$tahun = $this->uri->segment(3);
$unit = $this->uri->segment(4);
$this->db->where('kode_unit', $unit);
$result = $this->db->get('m_unit_kerja')->row();
?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<table width="100%">
    <tr>
        <th colspan="14">
            <h3 class="text-center">LAMPIRAN BERITA ACARA STOK OPNAME PERSEDIAAN BARANG</h3>
        </th>
    </tr>
    <tr>
        <th colspan="14">
            <h3 class="text-center">NOMOR : </h3>
        </th>
    </tr>
</table>
<div class="table-responsive-lg">
    <table class="table m-0" width="100%">
        <tr>
            <td>UNIT KERJA</td>
            <td>: <?php echo $result->nama_unit ?></td>
        </tr>
        <tr>
            <td>TAHUN</td>
            <td>: <?php echo $tahun ?></td>
        </tr>
    </table>
    <table class="table table-bordered m-0" border="1" width="100%">
        <tr>
            <th class=" text-center" rowspan="2">No.</th>
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
        </tr>
        <?php
        $start = 0;
        $this->db->where('tahun', $tahun);
        $this->db->where('kode_unit', $unit);
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
                </tr>
        <?php
            }
        }
        ?>
    </table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>