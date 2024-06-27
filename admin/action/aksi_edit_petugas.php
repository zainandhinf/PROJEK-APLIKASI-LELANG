<?php
include '../../php/koneksi.php';
require '../../php/upload.php';

$id = htmlspecialchars($_POST['id_petugas']);
$nama_petugas = htmlspecialchars($_POST['nama_petugas']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$id_level = htmlspecialchars($_POST['id_level']);
$gambarLama = htmlspecialchars($_POST['gambarlama']);

if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
} else {
    $gambar = upload();
}

if (!empty($_POST['nama_petugas']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['id_level'])) {

    mysqli_query($koneksi, "UPDATE tpetugas SET nama_petugas='$nama_petugas',username='$username',password='$password',id_level='$id_level',gambar='$gambar' WHERE id_petugas='$id'");
    echo "<script>alert('Data Petugas Berhasil Diubah');window.location.href='../page/datapetugas.php';</script>";
    // header("location:../page/datapetugas.php");
} else {
    // $_SESSION['nama_petugas'] = $_POST['nama_petugas'];
    // $_SESSION['username'] = $_POST['username'];
    // $_SESSION['id_level'] = $_POST['id_level'];
    echo "<script>alert('Data Tidak Boleh Kosong!');window.location.href='../crud-page/edit_petugas.php';</script>";
}


?>