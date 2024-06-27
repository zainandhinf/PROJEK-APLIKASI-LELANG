<?php
include '../../php/koneksi.php';
require '../../php/upload.php';

$nama_barang = htmlspecialchars($_POST['nama_barang']);
$tanggal = htmlspecialchars($_POST['tanggal']);
$harga_awal = htmlspecialchars($_POST['harga_awal']);
$deskripsi_barang = htmlspecialchars($_POST['deskripsi_barang']);
$harga = str_replace(".", "", $harga_awal);
$gambar1 = upload();
$gambar2 = upload2();
$gambar3 = upload3();

// var_dump($gambar);
if (!empty($_POST['nama_barang']) && !empty($_POST['tanggal']) && !empty($_POST['harga_awal']) && !empty($_POST['deskripsi_barang'])) {

    mysqli_query($koneksi, "INSERT INTO tbarang VALUES(null,'$nama_barang','$tanggal','$harga','$deskripsi_barang','$gambar1','$gambar2','$gambar3')");
    echo "<script>alert('Data Barang Berhasil Ditambahkan');window.location.href='../page/databarang.php';</script>";
    // header("location:../page/databarang.php");
} else {
    // $_SESSION['nama_petugas'] = $_POST['nama_petugas'];
    // $_SESSION['username'] = $_POST['username'];
    // $_SESSION['id_level'] = $_POST['id_level'];
    echo "<script>alert('Data Tidak Boleh Kosong!');window.location.href='../crud-page/tambah_barang.php';</script>";
}

?>