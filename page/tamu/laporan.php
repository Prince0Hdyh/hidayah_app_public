<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

// Koneksi database
include "../../koneksi/koneksi.php";

// Load Composer autoload
//require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../../vendor/autoload.php';

use Mpdf\Mpdf;

// Buat objek mPDF
$mpdf = new Mpdf(['orientation' => 'L', 'format' => 'Legal']);

// Awal konten HTML
$content = '
<style>
    .tabel { border-collapse: collapse; width: 100%; }
    .tabel th { padding: 8px 5px; background-color: #ccc; }
    .tabel td { padding: 8px 5px; }
</style>

<h2 style="text-align:center;">Laporan Tamu</h2>
<br>
<table border="1" class="tabel" align="center">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telpon</th>
        <th>Jenis Kelamin</th>
        <th>Ketemu</th>
        <th>Keperluan</th>
        <th>Foto</th>
        <th>TTD</th>
    </tr>';

// Ambil data
$no = 1;
if (isset($_POST['cetak'])) {
    $tgl1 = $_POST['tgl1'];
    $tgl2 = $_POST['tgl2'];
    $sql = $koneksi->query("SELECT * FROM tb_tamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
} else {
    $sql = $koneksi->query("SELECT * FROM tb_tamu");
}

// Loop data
while ($data = $sql->fetch_assoc()) {
    $jk = ($data['jk'] == 'L') ? "Laki-laki" : "Wanita";
    $content .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . date('d F Y', strtotime($data['tanggal'])) . '</td>
        <td>' . $data['jam'] . '</td>
        <td>' . $data['nama'] . '</td>
        <td>' . $data['alamat'] . '</td>
        <td>' . $data['telp'] . '</td>
        <td>' . $jk . '</td>
        <td>' . $data['ketemu'] . '</td>
        <td>' . $data['keperluan'] . '</td>
        <td><img src="../../upload/' . $data['foto'] . '" width="75" height="50"></td>
        <td><img src="../../doc_signs/' . $data['ttd'] . '" width="75" height="50"></td>
    </tr>';
}

$content .= '</table>';

// Output ke PDF
$mpdf->WriteHTML($content);
$mpdf->Output('laporan_tamu.pdf', 'I');