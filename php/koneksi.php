<?php
$koneksi = mysqli_connect("localhost", "root", "", "db-aplikasi-lelang");

if (!$koneksi) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>