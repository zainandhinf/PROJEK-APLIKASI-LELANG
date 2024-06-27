<?php

include 'koneksi.php';

if (isset($_POST['submit-search'])) {
    $key = htmlspecialchars($_POST['search']);
    $data = mysqli_query($koneksi, "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE nama_barang LIKE '%$key%'");
}
?>