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
    header("location:../../php/page/loginpetugas.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lelang - Petugas</title>
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
                    <a href="dashboard_petugas.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datalelangpetugas.php" class="active"><span class="las la-clipboard-list"></span>
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
                        <?= $d1 ?>
                    </h4>
                    <small>Petugas</small>
                </div>
            </div>
        </header>


        <main>
            <h2>Data Lelang</h2>
            <br />
            <div class="input-date">
                <form action="" method="POST">
                    <input type="date" name="search">
                    <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <table border="1">
                <tr>
                    <th>Id Lelang</th>
                    <th>Id Barang</th>
                    <th>Tanggal Lelang Mulai</th>
                    <th>Tanggal Lelang Berakhir</th>
                    <th>Harga Aktif</th>
                    <th>Status</th>
                </tr>
                <?php
                include '../../php/koneksi.php';


                if (!isset($_POST['submit-search'])) {
                    $data = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_petugas='$id_petugas'");
                } else if (isset($_POST['submit-search'])) {
                    $key = htmlspecialchars($_POST['search']);
                    $data = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE (id_lelang LIKE '%$key%' OR id_barang LIKE '%$key%' OR tgl_lelang LIKE '%$key%') AND id_petugas='$id_petugas'");
                }
                // $data = mysqli_query($koneksi, "select * from tlelang");
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
                            <?= number_format($d['harga_aktif'], 0, ',', '.'); ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            if ($d['status'] == "dibuka") {
                                echo '<p><a href="../action/status.php?id_lelang=' . $d['id_lelang'] . '&status=selesai
                                " class="dibuka" onclick="return confirm(\'Yakin Ingin Menutup Lelang?\')">Dibuka</a></p>';
                            } else if ($d['status'] == "ditutup") {
                                echo '<p><a href="../action/status.php?id_lelang=' . $d['id_lelang'] . '&status=dibuka
                                " class="ditutup" onclick="return confirm(\'Yakin Ingin Membuka Lelang?\')">Ditutup</a></p>';
                            } else {
                                echo "<p>Lelang Selesai</p>";
                            }
                            ?>
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