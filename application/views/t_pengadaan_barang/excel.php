<?php

header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=Laporan_Pengadaan_barang.xls");

header("Pragma: no-cache");

header("Expires: 0");

///////////jenis belanja///////////////////////////
$this->db->select('nama_jenis_belanja');
$this->db->where('kode_jenis_belanja', $_GET['kode_jenis_belanja']);
$this->db->group_by('kode_jenis_belanja');
$result = $this->db->get('t_pengadaan_barang')->row();
$jenis_belanja = $result->nama_jenis_belanja;

///////////pegawai///////////////////////////
$this->db->where('id', $_GET['id']);
$result = $this->db->get('m_pegawai')->row();
$nip = $result->nip;
$nama = $result->nama;
$jabatan = $result->jabatan;
?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<table width="100%">
    <tr>
        <th colspan="13">
            <h3 class="text-center">DAFTAR HASIL PENGADAAN BARANG</h3>
        </th>
    </tr>
    <tr>
        <th colspan="13">
            <h3 class="text-center">TAHUN ANGGARAN <?php echo $_GET['tahun'] ?></h3>
        </th>
    </tr>
</table>
<table width="100%">
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-left">Unit Kerja</th>
        <th class="text-left">: <?php echo $this->session->userdata('nama_unit') ?></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-left">Jenis Belanja</th>
        <th class="text-left">: <?php echo $jenis_belanja ?></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th class="text-left">Tahun</th>
        <th class="text-left">: <?php echo $_GET['tahun'] ?> (Periode <?php echo $_GET['periode'] ?>)</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
</table>
<div class="table-responsive-lg">
    <table class="table table-bordered m-0" border="1" width="100%">
        <tr>
            <th class="text-center" rowspan="2" width="30px">No</th>
            <th class="text-center" rowspan="2">NOMOR REKENING</th>
            <th class="text-center" rowspan="2">JENIS BARANG</th>
            <th class="text-center" colspan="2">SPK/KONTRAK</th>
            <th class="text-center" colspan="2">BA PENERIMAAN BARANG</th>
            <th class="text-center" rowspan="2">JUMLAH BARANG</th>
            <th class="text-center" rowspan="2">HARGA SATUAN (Rp)</th>
            <th class="text-center" rowspan="2">JUMLAH HARGA (RP)</th>
            <th class="text-center" rowspan="2">DIPERGUNAKAN PADA UNIT</th>
            <th class="text-center" rowspan="2">NAMA PERUSAHAAN</th>
            <th class="text-center" rowspan="2">KETERANGAN</th>
        </tr>
        <tr>
            <th class="text-center">TANGGAL</th>
            <th class="text-center">NOMOR</th>
            <th class="text-center">TANGGAL</th>
            <th class="text-center">NOMOR</th>
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
        </tr>

        <?php
        $this->db->select('kode_jenis_belanja,nama_jenis_belanja,sum(total) as ttl');
        $this->db->where('kode_unit', $this->session->userdata('kode_unit'));
        $this->db->where('tahun', $_GET['tahun']);
        $this->db->where('periode', $_GET['periode']);
        $this->db->where('isdelete', '0');
        $this->db->group_by('kode_jenis_belanja');
        $result = $this->db->get('v_pengadaan_barang')->result();
        foreach ($result as $dt) {
        ?>
            <tr>
                <td></td>
                <td><?php echo $dt->kode_jenis_belanja; ?></td>
                <td><?php echo $dt->nama_jenis_belanja; ?></td>
                <td colspan="6"></td>
                <td><?php echo $dt->ttl; ?></td>
                <td colspan="3"></td>
            </tr>
            <?php
            $i = 1;
            $this->db->where('kode_unit', $this->session->userdata('kode_unit'));
            $this->db->where('tahun', $_GET['tahun']);
            $this->db->where('periode', $_GET['periode']);
            $this->db->where('isdelete', '0');
            $this->db->where('kode_jenis_belanja', $dt->kode_jenis_belanja);
            $result2 = $this->db->get('v_pengadaan_barang')->result();
            foreach ($result2 as $dt2) {
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $dt2->kode_kelompok_barang; ?></td>
                    <td><?php echo $dt2->nama_kelompok_barang; ?></td>
                    <td><?php echo $dt2->tanggal_kontrak; ?></td>
                    <td><?php echo $dt2->no_kontrak; ?></td>
                    <td><?php echo $dt2->tanggal_ba; ?></td>
                    <td><?php echo $dt2->no_ba; ?></td>
                    <td><?php echo $dt2->jumlah_barang . ' ' . $dt2->satuan; ?></td>
                    <td><?php echo $dt2->harga_satuan; ?></td>
                    <td><?php echo $dt2->total; ?></td>
                    <td><?php echo $dt2->nama_unit_peruntukan; ?></td>
                    <td><?php echo $dt2->nama_perusahaan; ?></td>
                    <td><?php echo $dt2->keterangan; ?></td>
                </tr>
        <?php
                $i++;
            }
        }
        ?>

    </table>
    <table width="100%">
        <tr></tr>
        <tr></tr>
        <tr>
            <th colspan="9"></th>
            <th colspan="4"><?php echo date('d-m-Y'); ?></th>
        </tr>
        <tr>
            <th colspan="9"></th>
            <th colspan="4"><?php echo $jabatan; ?></th>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <th colspan="9"></th>
            <th colspan="4"><?php echo $nama; ?></th>
        </tr>
        <tr>
            <th colspan="9"></th>
            <th colspan="4">NIP.<?php echo $nip; ?></th>
        </tr>
    </table>
</div>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>