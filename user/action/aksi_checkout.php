<?php

include '../../php/koneksi.php';

function generateId()
{
    global $koneksi;
    $data = mysqli_query($koneksi, "SELECT RIGHT(no_trans, 4) + 1 as noUrut FROM `ttransaksi` ORDER BY no_trans DESC LIMIT 1");
    $arr = mysqli_fetch_assoc($data);
    $noUrut = $arr['noUrut'];
    $today = date('Ymd');

    if ($noUrut == NULL) {
        $noTrans = $today . "0001";
    } else {
        if ($noUrut < 10) {
            $noTrans = $today . "000" . $noUrut;
        } else if ($noUrut < 100) {
            $noTrans = $today . "00" . $noUrut;
        } else if ($noUrut < 1000) {
            $noTrans = $today . "0" . $noUrut;
        } else if ($noUrut < 10000) {
            $noTrans = $today . $noUrut;
        } else {
            $noTrans = $today . "0001";
        }
    }

    return $noTrans;
}

$id_lelang = $_POST['id_lelang'];
$a = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_lelang = '$id_lelang'");
$data = mysqli_fetch_array($a);
$id_petugas = $data['id_petugas'];

$id_user = $_POST['id_user'];
$nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
$alamat_pengiriman = htmlspecialchars($_POST['alamat']);
$opsi_pengiriman = htmlspecialchars($_POST['opsi_pengiriman']);
$metode_pembayaran = htmlspecialchars($_POST['metode_pembayaran']);
$no_telp = htmlspecialchars($_POST['no_telp']);

$subtotal = $_POST['subtotal'];
$subtotal = str_replace(array('Rp ', '.'), '', $subtotal);
$subtotal = intval($subtotal);

$biaya_pengiriman = $_POST['biaya_kirim'];
$biaya_pengiriman = str_replace(array('Rp ', '.'), '', $biaya_pengiriman);
$biaya_pengiriman = intval($biaya_pengiriman);

$pajak = $_POST['pajak'];
$pajak = str_replace(array('Rp ', '.'), '', $pajak);
$pajak = intval($pajak);

$total = $subtotal + $biaya_pengiriman + $pajak;

$today = date('Ymd');

// $randomNumber = rand(0, 999);

$query = "INSERT INTO ttransaksi VALUES(null,'" . generateId() . "','$id_user','$id_petugas','$today','$nama_lengkap','$alamat_pengiriman','$opsi_pengiriman','$metode_pembayaran','$no_telp','$subtotal','$biaya_pengiriman','$pajak','$total')";

if (mysqli_query($koneksi, $query)) {
    // $data1 = mysqli_query($koneksi, "SELECT MAX(penawaran_harga) FROM `tlelang` INNER JOIN thistori_lelang on tlelang.id_lelang=thistori_lelang.id_lelang WHERE id_lelang = '$id_lelang'");
    $data1 = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_lelang = '$id_lelang'");
    $a1 = mysqli_fetch_array($data1);
    $data2 = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_lelang = '$id_lelang' ORDER BY penawaran_harga DESC");
    $a2 = mysqli_fetch_array($data2);
    $data3 = mysqli_query($koneksi, "SELECT * FROM ttransaksi WHERE id_user = '$id_user' ORDER BY no_trans DESC");
    $a3 = mysqli_fetch_array($data3);
    $id_trans = $a3['id_transaksi'];
    $harga_awal_lelang = $a1['harga_awal_lelang'];
    $penawaran_harga = $a2['penawaran_harga'];
    $tanggal_penawaran = $a2['tanggal_penawaran'];
    mysqli_query($koneksi, "INSERT INTO tdetailtransaksi VALUES(null,'$id_trans','$id_lelang','$harga_awal_lelang','$penawaran_harga','$tanggal_penawaran')");
    mysqli_query($koneksi, "UPDATE tlelang SET status='dicheckout' WHERE id_lelang='$id_lelang'");
    echo "<script>alert('Checkout Berhasil!!');window.location.href='../page/keranjang.php?id_lelang=" . $id_lelang . "';</script>";
}

?>