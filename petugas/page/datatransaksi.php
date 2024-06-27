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
    <title>Data Transaksi - Petugas</title>
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
                    <a href="datalelangpetugas.php"><span class="las la-clipboard-list"></span>
                        <span>Data Lelang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datatransaksi.php" class="active"><span class="las la-clipboard-list"></span>
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

                Transaksi
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
            <h2>Data Transaksi</h2>
            <br />
            <div class="input-date">
                <form action="" method="POST">
                    <input type="date" name="search">
                    <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <table border="1" id="table-transaksi">
                <tr>
                    <th>Id Transaksi</th>
                    <th>No Transaksi</th>
                    <th>Id User</th>
                    <th>Tanggal Transaksi</th>
                    <!-- <th>Nama Lengkap</th>
                    <th>Alamat Pengiriman</th>
                    <th>Opsi Pengiriman</th>
                    <th>Metode Pembayaran</th> -->
                    <th>Data Pengiriman</th>
                    <th>Subtotal</th>
                    <th>Biaya Pengiriman</th>
                    <th>Pajak</th>
                    <th>Total</th>
                    <th>Bukti Transaksi</th>
                </tr>
                <?php
                include '../../php/koneksi.php';

                if (!isset($_POST['submit-search'])) {
                    $data = mysqli_query($koneksi, "SELECT * FROM ttransaksi WHERE id_petugas='$id_petugas'");
                } else if (isset($_POST['submit-search'])) {
                    $key = htmlspecialchars($_POST['search']);
                    $data = mysqli_query($koneksi, "SELECT * FROM ttransaksi WHERE (id_transaksi LIKE '%$key%' OR id_user LIKE '%$key%' OR tgl_checkout LIKE '%$key%') AND id_petugas='$id_petugas'");
                }
                // $data = mysqli_query($koneksi, "select * from tlelang");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td>
                            <?= $d['id_transaksi']; ?>
                        </td>
                        <td>
                            <?= $d['no_trans']; ?>
                        </td>
                        <td>
                            <?= $d['id_user']; ?>
                        </td>
                        <td>
                            <?= $d['tgl_checkout']; ?>
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
                        <td>
                            Rp.
                            <?= number_format($d['total'], 0, ',', '.'); ?>
                        </td>
                        <td>
                            <a href="../action/cetak.php?id_trans=<?= $d['id_transaksi'] ?>" class="cetak">Lihat</a>
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