<?php
// session_start();

require '../../php/koneksi.php';


// if (!isset($_SESSION["login"])) {

//     $d = "login";
//     $page = "login.php";

// } else{

//     $data = $_SESSION['id_user'];
//     $id = $_SESSION['id_user'];

//     $query = "SELECT * FROM tkonsumen WHERE id_user='$id'";

//     $a = mysqli_query($koneksi,$query);
//     // $data = mysqli_fetch_array($a);
//     var_dump($data);

//     $d = $data['username'];
// }

session_start();
if (isset($_SESSION['login'])) {

    $id_petugas = $_SESSION['id_petugas'];

    $query = "SELECT * FROM tpetugas WHERE id_petugas='$id_petugas'";

    $a = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($a);

    $d1 = $data['username'];


} else {
    // user belum login, arahkan ke halaman login
    header("location:../../php/page/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Petugas</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/test.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
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
        <span class="span-sidebar"></span>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datalelangpetugas.php"><span class="las la-clipboard-list"></span>
                        <span>Data Lelang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datatransaksi.php"><span class="las la-clipboard-list"></span>
                        <span>Transaksi</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="laporan_petugas.php"><span class="las la-clipboard-list"></span>
                        <span>Laporan</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="akun_petugas.php"><span class="las la-user-circle"></span>
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

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div> -->

            <div class="search-box">
                <form action="" method="post">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div class="user-wrapper">
                <img src="../../assets/img/<?= $data['gambar'] ?>" width="40px" height="40px" alt="">
                <div>
                    <h4>
                        <?= $d1 ?>
                    </h4>
                    <small>Petugas</small>
                </div>
            </div>
        </header>


        <main>
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
    </div>

</body>

</html>