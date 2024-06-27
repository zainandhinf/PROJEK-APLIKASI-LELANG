<?php
include '../../php/koneksi.php';

$id = $_GET['id_lelang'];

mysqli_query($koneksi, "DELETE FROM tlelang WHERE id_lelang='$id'");

header("location:../page/datalelang.php");
?>