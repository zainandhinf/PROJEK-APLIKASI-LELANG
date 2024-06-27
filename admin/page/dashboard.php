<?php

require '../../php/koneksi.php';

session_start();
if (isset($_SESSION['login'])) {

    $id_petugas = $_SESSION['id_petugas'];

    $query = "SELECT * FROM tpetugas WHERE id_petugas='$id_petugas'";

    $a = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($a);
    $d = $data['username'];
} else {
    // user belum login, arahkan ke halaman login
    header("location:../../php/page/loginpetugas.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrator</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/test.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <!-- <link id="pagestyle" href="../../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" /> -->
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1>
                <img src="../../assets/img/LELANG6.png" alt="" width="70px" height="70px">
                <h2>The Aunction</h2>
            </h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datapetugas.php"><span class="las la-users"></span>
                        <span>Data Petugas</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datakonsumen.php"><span class="las la-users"></span>
                        <span>Data Konsumen</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="databarang.php"><span class="las la-clipboard-list"></span>
                        <span>Data Barang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datalelang.php"><span class="las la-clipboard-list"></span>
                        <span>Data Lelang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datahistorilelang.php"><span class="las la-clipboard-list"></span>
                        <span>Data Histori Lelang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datatransaksi.php"><span class="las la-clipboard-list"></span>
                        <span>Data Transaksi</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="laporan.php"><span class="las la-clipboard-list"></span>
                        <span>Laporan</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="akun.php"><span class="las la-user-circle"></span>
                        <span>Akun</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>

                Dashboard
            </h2>

            <div class="user-wrapper">
                <img src="../../assets/img/<?= $data['gambar'] ?>" width="40px" height="40px" alt="">
                <div>
                    <h4>
                        <?= $d ?>
                    </h4>
                    <small>
                        Admin
                    </small>
                </div>
            </div>
        </header>

        <main>
            <?php
            // if (isset($_GET['page'])) {
            // 	$page = $_GET['page'];
            // 	switch ($page) {
            // 		case 'dashboard':
            // 			include ('dashboard.php');
            // 			break;
            // 		case 'petugas':
            // 			include ('datapetugas.php');
            // 			break;
            // 		case 'tutorial':
            // 			include ('tutorial.php');
            // 			break;
            // 		default:
            // 			echo "<center><h3>Maaf, Halaman Tidak Ditemukan !</h3></center>";
            // 			break;	
            // 	}
            // }else{																				
            // 	include ('home.php');
            // }
            
            ?>

            <?php
            include '../../php/koneksi.php';

            $data1 = mysqli_query($koneksi, "SELECT COUNT(*)FROM tpetugas");
            $d1 = mysqli_fetch_array($data1);

            $data2 = mysqli_query($koneksi, "SELECT COUNT(*)FROM tkonsumen");
            $d2 = mysqli_fetch_array($data2);

            $data3 = mysqli_query($koneksi, "SELECT COUNT(*)FROM tbarang");
            $d3 = mysqli_fetch_array($data3);

            $data4 = mysqli_query($koneksi, "SELECT COUNT(*)FROM tlelang");
            $d4 = mysqli_fetch_array($data4);

            ?>
            <div class="col-div-3">
                <div class="box">
                    <p>
                        <?= $d1['COUNT(*)']; ?><br /><span>Petugas</span>
                    </p>
                    <i class="fa fa-user box-icon"></i>
                </div>
            </div>
            <div class="col-div-3">
                <div class="box">
                    <p>
                        <?= $d2['COUNT(*)']; ?><br /><span>Konsumen</span>
                    </p>
                    <!-- <i class="fa fa-list box-icon"></i> -->
                    <i class="fa fa-user box-icon"></i>
                </div>
            </div>
            <div class="col-div-3">
                <div class="box">
                    <p>
                        <?= $d3['COUNT(*)']; ?><br /><span>Barang</span>
                    </p>
                    <i class="fa fa-shopping-bag box-icon"></i>
                </div>
            </div>
            <div class="col-div-3">
                <div class="box">
                    <p>
                        <?= $d4['COUNT(*)']; ?><br /><span>Lelang</span>
                    </p>
                    <!-- <i class="fa fa-tasks box-icon"></i> -->
                    <i class="fa fa-list box-icon"></i>
                </div>
            </div>
            <div class="clearfix"></div>
            <br /><br />
            <div class="col-div-8">
                <div class="box-8">
                    <div class="content-box">
                        <h2>Daftar Pemenang Lelang Akhir-Akhir Ini</h2>
                        <br />
                        <table id="table-dashboard">
                            <tr>
                                <th id="table-dashboard-th">Foto Produk</th>
                                <th id="table-dashboard-th">Nama Barang</th>
                                <th id="table-dashboard-th">Harga Awal</th>
                                <th id="table-dashboard-th">Tanggal Penawaran</th>
                                <th id="table-dashboard-th">Penawaran</th>
                            </tr>
                            <?php
                            include '../../php/koneksi.php';

                            $data5 = mysqli_query($koneksi, "SELECT * FROM `thistori_lelang` INNER JOIN tbarang on thistori_lelang.id_barang=tbarang.id_barang ORDER BY tanggal_penawaran DESC LIMIT 3
                            ");


                            while ($d5 = mysqli_fetch_array($data5)) {
                                // var_dump($d5);
                                ?>
                                <tr>
                                    <td id="table-dashboard-td">
                                        <img src="../../assets/img/<?= $d5['gambar_barang']; ?>" alt="" width="64px"
                                            height="auto">
                                    </td>
                                    <td id="table-dashboard-td">
                                        <?= $d5['nama_barang']; ?>
                                    </td>
                                    <td id="table-dashboard-td">
                                        <?= $d5['harga_awal']; ?>
                                    </td>
                                    <td id="table-dashboard-td">
                                        <?= $d5['tanggal_penawaran']; ?>
                                    </td>
                                    <td id="table-dashboard-td">
                                        <?= $d5['penawaran_harga']; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="col-div-4">
                <div class="box-4">
                    <div class="content-box">
                        <p>Total Sale <span>Sell All</span></p>

                        <div class="circle-wrap">
                            <div class="circle">
                                <div class="mask full">
                                    <div class="fill"></div>
                                </div>
                                <div class="mask half">
                                    <div class="fill"></div>
                                </div>
                                <div class="inside-circle"> 70% </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="clearfix"></div>
    </div>

    </main>

    <!-- <main>

            <div class="dasboard-cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Barang</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Lelang</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Pegawai</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Konsumen</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
            </div>

        </main> -->
    </div>

</body>

</html>