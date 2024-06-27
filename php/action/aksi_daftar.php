<?php
include '../koneksi.php';
$message = "";

if (isset($_POST['signup'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $notlp = htmlspecialchars($_POST['notlp']);

  try {
    $query = mysqli_query($koneksi, "SELECT * FROM tkonsumen WHERE username='$username'");
    $cek = mysqli_num_rows($query);
    if ($cek >= 1) {
      echo "<script>alert('Username Sudah Terpakai Oleh User Lain, Coba Username Lain!');window.location.href='../page/daftar.php';</script>";
    } else {
      $sql = "INSERT INTO tkonsumen VALUES ('null','$nama','$username','$password','$notlp','$email','profile.png')";
      if (mysqli_query($koneksi, $sql)) {
        $message = "<h6 style ='color: green;'>Pendaftaran Sukses</h6>";
      }
    }
  } catch (\Throwable $th) {
    $message = "<h6 style = 'color: green;'>Pendaftaran Gagal</h6>";
  }
}

?>