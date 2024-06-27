<?php
include '../../php/koneksi.php';

if (isset($_POST['cetak'])) {
    $id_trans = $_POST['id_trans'];
    $query = mysqli_query($koneksi, "SELECT * FROM ttransaksi WHERE id_transaksi IN (" . $id_trans . ")");
    $query2 = mysqli_query($koneksi, "SELECT * FROM tdetailtransaksi WHERE id_transaksi IN (" . $id_trans . ")");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <title>Laporan Transaksi</title>
    <style>
    html {
        margin: 0;
        padding: 0;
    }

    .head {
        display: flex;
        border-bottom: 1px solid black;
    }

    .head h1 {
        margin-left: 90px;
    }

    .head img {
        height: 70px;
        width: auto;
    }

    .line {
        display: inline-block;
        background-color: black;
        width: 100%;
        height: 5px;
    }

    #table-transaksi {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin-left: 0px;
        background-color: #fff;
        color: #333;
        font-size: 11px;
        font-weight: 400;
        text-align: left;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    #table-transaksi th,
    td {
        padding: 12px;
        text-align: left;
        vertical-align: middle;
        font-weight: bold;
    }

    #table-transaksi .col-9 {
        width: 200px;
    }

    #total td:nth-child(2) {
        width: 3000px;
        margin-right: 1000px;
    }

    #table-transaksi th {
        background-color: #333;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        border-bottom: 2px solid #111;
    }

    #table-transaksi tr:nth-child(even) {
        background-color: #f8f8f8;
    }

    #table-transaksi tr:hover {
        background-color: #f2f2f2;
    }

    #table-transaksi td a {
        color: white;
        text-decoration: none;
    }

    #table-transaksi td a:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    </style>
</head>

<body onafterprint="window.location='../page/laporan.php'">
    <div class="head">
        <img src="../../assets/img/LELANG4.png" alt="">
        <h1>Laporan Transaksi</h1>
    </div>
    <span class="line"></span>
    <div class="body">
        <h2>Data Transaksi</h2>
        <!-- <div class="data-trans">
            <h5>No Transaksi: 202312120001</h5>
            <h5>Id Pemenang: 1</h5>
            <h5>Tanggal Transaksi: 2023-12-12</h5>
            <h5>Nama Lengkap: Zainandhi Nur Fathurrohman</h5>
            <h5>Alamat Pengiriman: Kp.Tangkil RT.06 RW.07 No.36 Kel.Cigugur Tengah Kec.Cimahi Tengah Kota Cimahi 40522
            </h5>
            <h5>Opsi Pengiriman: express</h5>
            <h5>Metode Pembayaran: Kartu Kredit</h5>
            <h5>Subtotal: Rp 999.999.999</h5>
            <h5>Biaya Pengiriman: Rp 999.999.999</h5>
            <h5>Pajak: Rp 999.999.999</h5>
            <h5>Total: Rp 999.999.999</h5>
        </div> -->
        <div>
            <table border="1" id="table-transaksi">
                <tr>
                    <th>Id Transaksi</th>
                    <th>No Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Id User</th>
                    <th>Id Petugas</th>
                    <!-- <th>Nama Lengkap</th>
                    <th>Alamat Pengiriman</th>
                    <th>Opsi Pengiriman</th>
                    <th>Metode Pembayaran</th> -->
                    <th>Data Pengiriman</th>
                    <th>Subtotal</th>
                    <th>Biaya Pengiriman</th>
                    <th>Pajak</th>
                    <th class="col-9">Total</th>
                </tr>
                <?php
                include '../../php/koneksi.php';

                $total_bayar = 0;

                while ($d = mysqli_fetch_array($query)) {
                    $total = $d['total'];
                    $total_bayar += $total;
                    ?>
                <tr>
                    <td>
                        <?= $d['id_transaksi']; ?>
                    </td>
                    <td>
                        <?= $d['no_trans']; ?>
                    </td>
                    <td>
                        <?= $d['tgl_checkout']; ?>
                    </td>
                    <td>
                        <?= $d['id_user']; ?>
                    </td>
                    <td>
                        <?= $d['id_petugas']; ?>
                    </td>
                    <td>
                        Nama Lengkap:
                        <br>
                        <p>
                            <?= $d['nama_lengkap']; ?>
                        </p>
                        <br>
                        <br>
                        Alamat Pengiriman:
                        <br>
                        <p>
                            <?= $d['alamat_pengiriman']; ?>
                        </p>
                        <br>
                        <br>
                        Opsi Pengiriman:
                        <br>
                        <p>
                            <?= $d['opsi_pengiriman']; ?>
                        </p>
                        <br>
                        <br>
                        Metode Pembayaran:
                        <br>
                        <p>
                            <?= $d['metode_pembayaran']; ?>
                        </p>
                        <br>
                        <br>
                        Nomor Telepon:
                        <br>
                        <p>
                            <?= $d['no_telp']; ?>
                        </p>
                    </td>
                    <td>
                        Rp.
                        <?= number_format($d['subtotal'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        Rp.
                        <?= number_format($d['biaya_pengiriman'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        Rp.
                        <?= number_format($d['pajak'], 0, ',', '.'); ?>
                    </td>
                    <td class="col-9">
                        Rp.
                        <?= number_format($d['total'], 0, ',', '.'); ?>
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr id="total">
                    <td colspan="8">Total Pendapatan:
                        Rp.
                        <?= number_format($total_bayar, 0, ',', '.'); ?>
                    </td>
                    <td><span></span></td>
                </tr>
            </table>
        </div>

        <h2>Detail Transaksi</h2>
        <div>
            <table border="1" id="table-transaksi">
                <tr>
                    <th>Id Detail Transaksi</th>
                    <th>Id Transaksi</th>
                    <th>Id Lelang</th>
                    <th>Harga Awal Lelang</th>
                    <th>Penawaran Harga</th>
                    <th>Tanggal Penawaran</th>
                </tr>
                <?php
                include '../../php/koneksi.php';

                while ($d2 = mysqli_fetch_array($query2)) {
                    ?>
                <tr>
                    <td>
                        <?= $d2['id_detailtransaksi']; ?>
                    </td>
                    <td>
                        <?= $d2['id_transaksi']; ?>
                    </td>
                    <td>
                        <?= $d2['id_lelang']; ?>
                    </td>
                    <td>
                        Rp.
                        <?= number_format($d2['harga_awal_lelang'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        Rp.
                        <?= number_format($d2['penawaran_harga'], 0, ',', '.'); ?>
                    </td>
                    <td>
                        <?= $d2['tanggal_penawaran']; ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>



    <script>
    window.print();
    </script>
</body>

</html>