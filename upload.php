<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

include "koneksi/koneksi.php";

date_default_timezone_set('Asia/Jakarta');

// Ambil data dari form
$nama = isset($_POST['nama']) ? htmlspecialchars(strip_tags($_POST['nama'])) : '';
$alamat = isset($_POST['alamat']) ? htmlspecialchars(strip_tags($_POST['alamat'])) : '';
$telp = isset($_POST['telp']) ? htmlspecialchars(strip_tags($_POST['telp'])) : '';
$instansi = isset($_POST['instansi']) ? htmlspecialchars(strip_tags($_POST['instansi'])) : '';
$perlu = isset($_POST['perlu']) ? htmlspecialchars(strip_tags($_POST['perlu'])) : '';
$jk = isset($_POST['jk']) ? $_POST['jk'] : '';
$temu = isset($_POST['temu']) ? htmlspecialchars(strip_tags($_POST['temu'])) : '';
$unit_kerja = isset($_POST['unit_kerja']) ? (int)$_POST['unit_kerja'] : 0;

$image = $_POST['image'] ?? '';

// Fungsi format nomor WA (dari telp)
function formatNoWA($no) {
    $no = preg_replace('/[^0-9]/', '', $no); // hanya angka
    if (substr($no, 0, 1) == '0') {
        $no = '62' . substr($no, 1);
    }
    return $no;
}

// Format no_hp dari telp
$no_hp = formatNoWA($telp);

// Simpan foto base64 ke file jika ada
$filename = null;
if (!empty($image)) {
    $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
    $image = str_replace(' ', '+', $image);
    $data = base64_decode($image);
    $filename = 'foto_' . time() . '.jpg';
    $upload_path = 'upload/' . $filename;
    if (!file_put_contents($upload_path, $data)) {
        die("Gagal menyimpan foto.");
    }
}

if (empty($nama)) {
    echo "<script>alert('Nama tidak boleh kosong'); window.history.back();</script>";
    exit;
}

$stmt = $koneksi->prepare("INSERT INTO tb_tamu (nama, alamat, telp, jk, keperluan, tanggal, jam, ketemu, foto, instansi, no_hp, id_unit_kerja) VALUES (?, ?, ?, ?, ?, CURDATE(), CURTIME(), ?, ?, ?, ?, ?)");

if (!$stmt) {
    die("Prepare statement gagal: " . $koneksi->error);
}

$stmt->bind_param(
    "sssssssssi",
    $nama,
    $alamat,
    $telp,
    $jk,
    $perlu,
    $temu,
    $filename,
    $instansi,
    $no_hp,       // no_hp diisi dari telp yang sudah diformat
    $unit_kerja
);

if ($stmt->execute()) {
    header("Location: index.php?status=success");
    exit;
} else {
    $error = $stmt->error;
    echo "<script>alert('Pencatatan gagal disimpan. Error: " . addslashes($error) . "'); window.history.back();</script>";
    exit;
}
?>
