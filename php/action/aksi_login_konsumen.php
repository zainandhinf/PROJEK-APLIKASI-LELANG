<?php
session_start();

include '../koneksi.php';

$username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM tkonsumen WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek == 1) {

    $user = mysqli_fetch_assoc($login);
    $_SESSION['login'] = true;
    $_SESSION['id_user'] = $user['id_user'];
    // echo "<script>alert('Berhasil Login!');window.location.href='../../user/konsumenpage.php';</script>";
    header("location:../../user/konsumenpage.php");
} else {
    echo "<script>alert('Login Gagal, Username Atau Password Mungkin Salah!');window.location.href='../page/login.php';</script>";
    // header("location:login.php?pesan=gagal");
}
?>