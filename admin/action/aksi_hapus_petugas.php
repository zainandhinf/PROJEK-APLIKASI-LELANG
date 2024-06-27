<?php
include '../../php/koneksi.php';

$id = $_GET['id_petugas'];

mysqli_query($koneksi, "DELETE FROM tpetugas WHERE id_petugas='$id'");

header("location:../page/datapetugas.php");
?>