<?php
include '../../php/koneksi.php';

$id = $_GET['id_lelang'];
$status = $_GET['status'];

mysqli_query($koneksi, "UPDATE tlelang set status='$status' WHERE id_lelang=$id");

header("location:../page/datalelangpetugas.php");
?>