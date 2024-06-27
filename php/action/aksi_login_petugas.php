<?php
session_start();

include '../koneksi.php';

$username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
$password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));

$login = mysqli_query($koneksi, "SELECT * FROM `tpetugas` INNER JOIN tlevel on tpetugas.id_level=tlevel.id_level WHERE tpetugas.username='$username' AND tpetugas.password='$password'");
$cek = mysqli_num_rows($login);

if ($cek == 1) {

    $data = mysqli_fetch_assoc($login);

    if ($data['level'] == "administrator") {
        $_SESSION['login'] = true;
        $_SESSION['id_petugas'] = $data['id_petugas'];
        // echo "<script>alert('Berhasil Login!');window.location.href='../../admin/adminpage.php';</script>";
        header("location:../../admin/adminpage.php");
    } else if ($data['level'] == "petugas") {
        $_SESSION['login'] = true;
        $_SESSION['id_petugas'] = $data['id_petugas'];
        // echo "<script>alert('Berhasil Login!');window.location.href='../../petugas/petugaspage.php';</script>";
        header("location:../../petugas/petugaspage.php");
    } else {
        echo "<script>alert('Login Gagal, Username Atau Password Mungkin Salah!');window.location.href='../page/loginpetugas.php';</script>";
        // header("location:loginpetugas.php?pesan=gagal");
    }
} else {
    echo "<script>alert('Login Gagal, Username Atau Password Mungkin Salah!');window.location.href='../page/loginpetugas.php';</script>";
    // header("location:loginpetugas.php?pesan=gagal");
}
?>