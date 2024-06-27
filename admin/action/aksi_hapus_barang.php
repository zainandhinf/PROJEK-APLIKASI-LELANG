<?php
include '../../php/koneksi.php';

$id = $_GET['id_barang'];

mysqli_query($koneksi, "DELETE FROM tbarang WHERE id_barang='$id'");

header("location:../page/databarang.php");
?>