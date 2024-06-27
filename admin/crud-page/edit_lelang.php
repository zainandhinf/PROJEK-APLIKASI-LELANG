<?php
error_reporting(0);

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
    <title>Edit Lelang - Administrator</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/test.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/jquery.masknumber.js"></script>
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
                    <a href="../page/dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/datapetugas.php"><span class="las la-users"></span>
                        <span>Data Petugas</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/datakonsumen.php"><span class="las la-users"></span>
                        <span>Data Konsumen</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/databarang.php"><span class="las la-clipboard-list"></span>
                        <span>Data Barang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/datalelang.php" class="active"><span class="las la-clipboard-list"></span>
                        <span>Data Lelang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/datahistorilelang.php"><span class="las la-clipboard-list"></span>
                        <span>Data Histori Lelang</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/datatransaksi.php"><span class="las la-clipboard-list"></span>
                        <span>Data Transaksi</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/laporan.php"><span class="las la-clipboard-list"></span>
                        <span>Laporan</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/akun.php"><span class="las la-user-circle"></span>
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
            <br>
            <br>
            <h3>EDIT DATA LELANG</h3>
            <?php
            include '../../php/koneksi.php';
            $id = $_GET['id_lelang'];
            $data = mysqli_query($koneksi, "SELECT * FROM tlelang WHERE id_lelang='$id'");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <form method="POST" action="../action/aksi_edit_lelang.php">
                    <div class="input">
                        <input type="hidden" name="id_lelang" value="<?= $d['id_lelang']; ?>" />
                        <div class="input-name">
                            <p>Id Barang</p>
                            <input type="text" name="id_barang" value="<?= $d['id_barang']; ?>" readonly />
                        </div>
                        <div class="input-name">
                            <p>Tanggal Lelang</p>
                            <input type="date" name="tanggal_lelang" value="<?= $d['tgl_lelang']; ?>" />
                        </div>
                        <div class="input-name">
                            <p>Harga Aktif</p>
                            <input type="text" name="harga_aktif" id="angka"
                                value="<?= number_format($d['harga_aktif'], 0, ',', '.') ?>" />
                        </div>
                        <div class="input-name">
                            <p>Id Petugas</p>
                            <input type="text" name="id_petugas" value="<?= $d['id_petugas']; ?>">
                        </div>
                    </div>
                    <div class="submit petugas">
                        <a href="../page/datalelang.php">KEMBALI</a>
                        <input type="submit" value="SIMPAN" name="submit"
                            onclick="return confirm('Yakin Ingin Mengedit Data?')">
                    </div>
                </form>
                <?php
            }
            ?>
        </main>
        <script>
            $(document).ready(function () {
                $("#angka").keyup(function () {
                    $(this).maskNumber({
                        integer: true,
                        thousands: "."
                    })
                })
            })
        </script>
</body>

</html>