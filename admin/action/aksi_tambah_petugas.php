<?php
include '../../php/koneksi.php';
require '../../php/upload.php';
$nama_petugas = htmlspecialchars($_POST['nama_petugas']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$id_level = htmlspecialchars($_POST['id_level']);
$gambar = upload();

if (!empty($_POST['nama_petugas']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['id_level'])) {

    mysqli_query($koneksi, "INSERT INTO tpetugas VALUES(null,'$nama_petugas','$username','$password','$id_level','$gambar')");
    echo "<script>alert('Data  Berhasil Ditambahkan');window.location.href='../page/datapetugas.php';</script>";
    // header("location:../page/datapetugas.php");
} else {
    $_SESSION['nama_petugas'] = $_POST['nama_petugas'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['id_level'] = $_POST['id_level'];
    echo "<script>alert('Data Tidak Boleh Kosong!');window.location.href='../crud-page/tambah_petugas.php';</script>";
}
?>