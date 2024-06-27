<?php
include '../../php/koneksi.php';

$id_barang = htmlspecialchars($_POST['nama_barang']);
$tanggal_lelang_mulai = htmlspecialchars($_POST['tanggal_lelang_mulai']);
$tanggal_lelang_berakhir = htmlspecialchars($_POST['tanggal_lelang_berakhir']);
$harga_aktif = htmlspecialchars($_POST['harga_aktif']);
$harga = str_replace(".", "", $harga_aktif);
$id_petugas = htmlspecialchars($_POST['id_petugas']);

$data = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang = '$id_barang'");
$data2 = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_barang = '$id_barang'");
$data3 = mysqli_query($koneksi, "SELECT * FROM tpetugas WHERE id_petugas = '$id_petugas'");

// $cek = mysqli_num_rows($data);
// var_dump($cek);

if (mysqli_num_rows($data) > 0) {
  if (mysqli_num_rows($data2) > 0) {
    echo "<script>alert('Barang Sudah pernah dibuat di data lelang!Tidak boleh duplikat!');window.location.href='../page/datalelang.php';</script>";
  } else {
    if (mysqli_num_rows($data3) > 0) {
      if (!empty($_POST['nama_barang']) && !empty($_POST['tanggal_lelang_mulai']) && !empty($_POST['tanggal_lelang_berakhir']) && !empty($_POST['harga_aktif']) && !empty($_POST['id_petugas'])) {

        mysqli_query($koneksi, "INSERT INTO tlelang VALUES(null,'$id_barang','$tanggal_lelang_mulai','$tanggal_lelang_berakhir','$harga','$harga','','$id_petugas','2')");
        echo "<script>alert('Data Lelang Berhasil Ditambahkan');window.location.href='../page/datalelang.php';</script>";
        // header("location:../page/datapetugas.php");
      } else {
        // $_SESSION['nama_petugas'] = $_POST['nama_petugas'];
        // $_SESSION['username'] = $_POST['username'];
        // $_SESSION['id_level'] = $_POST['id_level'];
        echo "<script>alert('Data Tidak Boleh Kosong!');window.location.href='../crud-page/tambah_lelang.php';</script>";
      }
    } else {
      echo "<script>alert('Id Petugas tidak terdapat pada data petugas');window.location.href='../page/datalelang.php';</script>";
    }
  }
} else {
  echo "<script>alert('Id Barang tidak terdapat pada data barang');window.location.href='../page/datalelang.php';</script>";
}


?>