<?php
include '../../php/koneksi.php';

$id = htmlspecialchars($_POST['id_lelang']);
$id_barang = htmlspecialchars($_POST['id_barang']);
$tanggal_lelang = htmlspecialchars($_POST['tanggal_lelang']);
$harga_aktif = htmlspecialchars($_POST['harga_aktif']);
$harga = str_replace(".", "", $harga_aktif);
$id_petugas = htmlspecialchars($_POST['id_petugas']);

if (!empty($_POST['id_barang']) && !empty($_POST['tanggal_lelang']) && !empty($_POST['harga_aktif']) && !empty($_POST['id_petugas'])) {

    mysqli_query($koneksi, "UPDATE tlelang SET id_barang='$id_barang',tgl_lelang='$tanggal_lelang',harga_aktif='$harga',id_petugas=$id_petugas WHERE id_lelang='$id'");
    echo "<script>alert('Data Lelang Berhasil Diubah');window.location.href='../page/datalelang.php';</script>";
    // header("location:../page/datalelang.php");
} else {
    // $_SESSION['nama_petugas'] = $_POST['nama_petugas'];
    // $_SESSION['username'] = $_POST['username'];
    // $_SESSION['id_level'] = $_POST['id_level'];
    echo "<script>alert('Data Tidak Boleh Kosong!');window.location.href='../crud-page/edit_lelang.php';</script>";
}


?>