<?php
include '../../php/koneksi.php';
require '../../php/upload.php';

$id = htmlspecialchars($_POST['id_user']);
$nama_user = htmlspecialchars($_POST['nama_user']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$telp = htmlspecialchars($_POST['no_telepon']);
$email = htmlspecialchars($_POST['email']);
$gambarLama = htmlspecialchars($_POST['gambarlama']);

if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
} else {
    $gambar = upload();
}

$query = mysqli_query($koneksi, "UPDATE tkonsumen SET nama_lengkap='$nama_user',username='$username',password='$password',telp='$telp', email='$email', gambar='$gambar' WHERE id_user='$id'");
if ($query) {
    echo "<script>alert('Pengeditan data berhasil!');window.location.href='../crud-page/edit_konsumen.php';</script>";
}

// header("location:edit_konsumen.php");
?>