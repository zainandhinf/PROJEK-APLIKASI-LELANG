<?php
include '../../php/koneksi.php';
require '../../php/upload.php';

$id = htmlspecialchars($_POST['id_barang']);
$nama_barang = htmlspecialchars($_POST['nama_barang']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$harga_awal = htmlspecialchars($_POST['harga_awal']);
$harga = str_replace(".", "", $harga_awal);
$deskripsi = htmlspecialchars($_POST['deskripsi_barang']);
$gambarLama = htmlspecialchars($_POST['gambarlama']);

if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
} else {
    $gambar = upload();
}

if (!empty($_POST['nama_barang']) && !empty($_POST['tanggal']) && !empty($_POST['harga_awal']) && !empty($_POST['deskripsi_barang'])) {

    mysqli_query($koneksi, "UPDATE tbarang SET nama_barang='$nama_barang',tanggal='$tanggal',harga_awal='$harga',deskripsi_barang='$deskripsi',gambar_barang='$gambar' WHERE id_barang='$id'");
    echo "<script>alert('Data Barang Berhasil Diubah');window.location.href='../page/databarang.php';</script>";
    // header("location:../page/databarang.php");
} else {
    // $_SESSION['nama_petugas'] = $_POST['nama_petugas'];
    // $_SESSION['username'] = $_POST['username'];
    // $_SESSION['id_level'] = $_POST['id_level'];
    echo "<script>alert('Data Tidak Boleh Kosong!');window.location.href='../crud-page/edit_barang.php';</script>";
}


?>