<?php

include '../../php/koneksi.php';
require_once __DIR__ . '/../../vendor/autoload.php';

$id_trans = $_GET['id_trans'];
$query = mysqli_query($koneksi, "SELECT * FROM ttransaksi WHERE id_transaksi='$id_trans'");
$a = mysqli_fetch_array($query);

$nama_lengkap = $a['nama_lengkap'];
$alamat_pengiriman = $a['alamat_pengiriman'];
$opsi_pengiriman = $a['opsi_pengiriman'];
$metode_pembayaran = $a['metode_pembayaran'];
$no_telp = $a['no_telp'];
$subtotal = number_format($a['subtotal'], 0, ',', '.');
$biaya_pengiriman = number_format($a['biaya_pengiriman'], 0, ',', '.');
$pajak = number_format($a['pajak'], 0, ',', '.');
$total = number_format($a['total'], 0, ',', '.');

$query2 = mysqli_query($koneksi, "SELECT * FROM tdetailtransaksi WHERE id_transaksi='$id_trans'");
$a2 = mysqli_fetch_array($query2);

$harga_awal = number_format($a2['harga_awal_lelang'], 0, ',', '.');

$id_user = $a['id_user'];
$id_lelang = $a2['id_lelang'];

$query3 = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_user='$id_user' AND id_lelang='$id_lelang' ORDER BY penawaran_harga DESC");
$a3 = mysqli_fetch_array($query3);

$id_barang = $a3['id_barang'];
$tanggal_penawaran = $a3['tanggal_penawaran'];
$penawaran_harga = number_format($a3['penawaran_harga'], 0, ',', '.');

$query4 = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang='$id_barang'");
$a4 = mysqli_fetch_array($query4);

$nama_barang = $a4['nama_barang'];
$deskripsi_barang = $a4['deskripsi_barang'];

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <title>Bukti Transaksi</title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        body {}

        p {
            font-size: 8px;
            font-weight: bold;
        }

        .head {
            display: flex;
            border-bottom: 1px solid black;
        }

        .head img {
            width: 75px;
            height: auto;
        }

        .head h4 {
            /* margin-top: 30px; */
            margin-left: 100px;
        }

        .no_trans {
            position: absolute;
            left: 470px;
            top: 50px;
        }

        .lines {
            display: inline-block;
            width: 605px;
            height: 10px;
            background-color: black;
        }

        .card {
            display: flex;
            height: 150px;
        }

        .card-title {
            margin-left: 20px;
        }

        .input-rincian {
            margin-left: 0px;
        }

        .card-payment {
            background-color: #fff;
            /* padding: 10px; */
            width: 585px;
            margin-bottom: 15px;
        }

        .card-header {
            border-bottom: 1px solid #ccc;
            /* padding-bottom: 5px; */
            /* margin-bottom: 10px; */
        }

        .card-header h2 {
            font-size: 10px;
            font-weight: 300;
            color: #333;
        }

        .card-body {
            float: left;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            /* margin-bottom: 5px; */
        }

        .payment-row p:first-child {
            font-weight: 300;
        }

        .total {
            /* margin-top: 10px; */
            border-top: 1px solid #ccc;
            /* padding-top: 5px; */
        }

        .total p:first-child {
            /* font-weight: 350; */
            font-size: 9px;
        }

        .total p:last-child {
            font-weight: 350;
            font-size: 19px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="head">
        <img src="../../assets/img/LELANG4.png" alt="" width="14%" style="position: absolute; top:100px;">
        <h4 style="margin-left: 280px;">Bukti Transaksi</h4>
        <h6 class="no_trans">No Transaksi : ' . $a['no_trans'] . '</h6>
    </div>
    <h4 class="card-title">Detail Penawaran</h4>
    <div class="card">
        <div class="description">
            <p>
                Nama Barang:
                ' . $nama_barang . '
            </p>
            <p>Tanggal Penawaran:
                ' . $tanggal_penawaran . '
            </p>
            <p>
                Harga Awal: Rp.
                ' . $harga_awal . '
            </p>
            <p>Penawaran Anda: Rp.
                ' . $penawaran_harga . '
            </p>
            <p>
                Deskripsi Barang:
                ' . $deskripsi_barang . '
            </p>
        </div>
    </div>
    <span class="lines"></span>
    <h4 class="card-title">Data Pengiriman</h4>
    <div class="input-rincian">
        <div class="card-payment">
            <div class="card-header">
                <h6>Rincian Pengiriman</h6>
            </div>
            <div class="card-body">
                <div class="payment-row" id="nama-lengkap-row">
                    <p>Nama Lengkap</p>
                    <p>' . $nama_lengkap . '</p>
                </div>
                <div class="payment-row" id="alamat-pengiriman-row">
                    <p>Alamat Pengiriman</p>
                    <p>' . $alamat_pengiriman . '</p>
                </div>
                <div class="payment-row" id="opsi-pengiriman-row">
                    <p>Opsi Pengiriman</p>
                    <p>' . $opsi_pengiriman . '</p>
                </div>
                <div class="payment-row" id="metode-pembayaran-row">
                    <p>Metode Pembayaran</p>
                    <p>' . $metode_pembayaran . '</p>
                </div>
                <div class="payment-row" id="no-telp-row">
                    <p>Nomor Telepon</p>
                    <p>' . $no_telp . '</p>
                </div>
            </div>
        </div>
        <span class="lines"></span>
        <h4 class="card-title">Rincian</h1>
            <div class="card-payment">
                <div class="card-header">
                    <h6>Rincian Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="payment-row" id="subtotal">
                        <p>Subtotal</p>
                        <p id="sub_total" style="float:right;">Rp
                            ' . $subtotal . '
                        </p>
                        <input type="hidden" name="subtotal" id="input-subtotal">
                    </div>
                    <div class="payment-row" id="biaya-pengiriman">
                        <p>Biaya Pengiriman</p>
                        <p id="biaya_kirim">Rp ' . $biaya_pengiriman . '</p>
                        <input type="hidden" name="biaya_kirim" id="input-kirim">
                    </div>
                    <div class="payment-row">
                        <p>Pajak</p>
                        <p id="pajak">Rp ' . $pajak . '</p>
                        <input type="hidden" name="pajak" id="input-pajak">
                    </div>
                    <div class="payment-row total" id="total-pembayaran">
                        <p>Total Pembayaran</p>
                        <p>Rp ' . $total . '</p>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();