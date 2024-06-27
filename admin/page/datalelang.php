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
    <title>Data Lelang - Administrator</title>
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
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php"><span class="las la-igloo"></span>
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
                    <a href="datalelang.php" class="active"><span class="las la-clipboard-list"></span>
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

                Data Lelang
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div> -->

            <div class="search-box">
                <form action="" method="POST">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <div class="user-wrapper">
                <img src="../../assets/img/<?= $data['gambar'] ?>" width="40px" height="40px" alt="">
                <div>
                    <h4>
                        <?= $data['username'] ?>
                    </h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>


        <main>
            <div class="head">
                <a href="../crud-page/tambah_lelang.php" class="tambah">Tambah Data Lelang</a>
                <br />
                <form action="" method="POST">
                    <input type="date" name="search">
                    <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <br />
            <table border="1">
                <tr>
                    <th>Id Lelang</th>
                    <th>Id Barang</th>
                    <th>Tanggal Lelang Mulai</th>
                    <th>Tanggal Lelang Berakhir</th>
                    <th>Harga Aktif</th>
                    <th>Id Petugas</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include '../../php/koneksi.php';

                if (!isset($_POST['submit-search'])) {
                    $data = mysqli_query($koneksi, "SELECT * FROM tlelang");
                } else if (isset($_POST['submit-search'])) {
                    $key = htmlspecialchars($_POST['search']);
                    $data = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_lelang LIKE '%$key%' OR id_barang LIKE '%$key%' OR tgl_lelang LIKE '%$key%' OR harga_aktif LIKE '%$key%' OR id_petugas LIKE '%$key%'");
                }
                //$data = mysqli_query($koneksi, "select * from tlelang");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td>
                            <?= $d['id_lelang']; ?>
                        </td>
                        <td>
                            <?= $d['id_barang']; ?>
                        </td>
                        <td>
                            <?= $d['tgl_lelang']; ?>
                        </td>
                        <td>
                            <?= $d['tgl_lelang_berakhir']; ?>
                        </td>
                        <td>
                            <?= number_format($d['harga_aktif'], 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= $d['id_petugas']; ?>
                        </td>
                        <td>
                            <a href="../crud-page/edit_lelang.php?id_lelang=<?= $d['id_lelang'];
                            ?>">Edit | </a>
                            <a href="../action/aksi_hapus_lelang.php?id_lelang=<?= $d['id_lelang'];
                            ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </main>
    </div>

</body>

</html>