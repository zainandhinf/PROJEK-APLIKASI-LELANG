<?php
include '../../php/koneksi.php';

if (isset($_POST['cetak'])) {
    $id_trans = $_POST['id_trans'];
    $query = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_histori IN (" . $id_trans . ")");
    // $query2 = mysqli_query($koneksi, "SELECT * FROM tdetailtransaksi WHERE id_transaksi IN (" . $id_trans . ")");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <title>Laporan Histori</title>
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

    .lines {
        display: inline-block;
        background-color: black;
        width: 80%;
        height: 5px;
    }
    </style>
</head>

<body onafterprint="window.location='../page/datahistorilelang.php'">
    <div class="head">
        <img src="../../assets/img/LELANG4.png" alt="">
        <h1>Laporan Histori Lelang</h1>
    </div>
    <span class="line"></span>
    <div class="body">
        <h2>Data Histori Lelang</h2>
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
        </div>
        <div>
            <?php
            include '../../php/koneksi.php';

            $total_bayar = 0;

            while ($d = mysqli_fetch_array($query)) {
                // $total = $d['total'];
                // $total_bayar += $total;
                $id_lelang = $d['id_lelang'];
                $id_barang = $d['id_barang'];
                $id_user = $d['id_user'];
                $query2 = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang='$id_barang'");
                $query3 = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_lelang='$id_lelang'");
                $d2 = mysqli_fetch_array($query2);
                $d3 = mysqli_fetch_array($query3);
                $id_petugas = $d3['id_petugas'];
                $query4 = mysqli_query($koneksi, "SELECT * FROM tpetugas WHERE id_petugas='$id_petugas'");
                $d4 = mysqli_fetch_array($query4);
                $query5 = mysqli_query($koneksi, "SELECT * FROM tkonsumen WHERE id_user='$id_user'");
                $d5 = mysqli_fetch_array($query5);

                ?>
            <table border="1" id="table-transaksi">
                <p>Nama Lelang =
                    <?= $d2['nama_barang'] ?>
                </p>
                <p>Harga Awal Lelang = Rp.
                    <?= number_format($d3['harga_awal_lelang'], 0, ',', '.') ?>
                </p>
                <p>Nama Petugas Lelang =
                    <?= $d4['nama_petugas'] ?>
                </p>
                <p>
                    Nama Penawar Lelang =
                    <?= $d5['nama_lengkap'] ?>
                </p>
                <h4>Selengkapnya: </h4>
                <tr>
                    <th>Id Histori Lelang</th>
                    <th>Id Lelang</th>
                    <th>Id Barang</th>
                    <!-- <th>Id User</th> -->
                    <th>Tanggal Penawaran</th>
                    <th>Penawaran Harga</th>
                </tr>
                <tr>
                    <td>
                        <?= $d['id_histori']; ?>
                    </td>
                    <td>
                        <?= $d['id_lelang']; ?>
                    </td>
                    <td>
                        <?= $d['id_barang']; ?>
                    </td>
                    <!-- <td>
                        <?= $d['id_user']; ?>
                    </td> -->
                    <td>
                        <?= $d['tanggal_penawaran']; ?>
                    </td>
                    <td>
                        Rp.
                        <?= number_format($d['penawaran_harga'], 0, ',', '.'); ?>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php
            }
            ?>
        </div>

        <!-- <h2>Detail Transaksi</h2>
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
        </div> -->
    </div>



    <script>
    window.print();
    </script>
</body>

</html>