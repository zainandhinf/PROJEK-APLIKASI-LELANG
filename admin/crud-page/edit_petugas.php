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
    <title>Edit Petugas - Administrator</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                    <a href="../page/dashboard.php"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="../page/datapetugas.php" class="active"><span class="las la-users"></span>
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
                    <a href="../page/datalelang.php"><span class="las la-clipboard-list"></span>
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

                Data Petugas
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
            <h3>EDIT DATA PETUGAS</h3>
            <?php
            include '../../php/koneksi.php';
            $id = $_GET['id_petugas'];
            $data = mysqli_query($koneksi, "SELECT * FROM tpetugas WHERE id_petugas='$id'");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <form method="POST" action="../action/aksi_edit_petugas.php" enctype="multipart/form-data">
                    <div class="input">
                        <input type="hidden" name="id_petugas" value="<?= $d['id_petugas']; ?>" readonly />
                        <input type="hidden" name="gambarlama" value="<?= $d['gambar']; ?>" />
                        <div class="input-name">
                            <p>Nama Petugas</p>
                            <input type="text" name="nama_petugas" value="<?= $d['nama_petugas']; ?>" />
                        </div>
                        <div class="input-name">
                            <p>Username</p>
                            <input type="text" name="username" value="<?= $d['username']; ?>" />
                        </div>
                        <div class="input-name">
                            <p>Password</p>
                            <input type="password" name="password" value="<?= $d['password']; ?>" />
                        </div>
                        <div class="input-name">
                            <p>Id Level</p>
                            <input type="text" name="id_level" value="<?= $d['id_level']; ?>" />
                        </div>
                        <div class="input-name">
                            <p>Edit Foto Profil</p>
                            <img src="../../assets/img/<?= $d['gambar']; ?>" alt="" id="img-prf">
                            <input type="file" name="gambar" id="img-input" />
                        </div>
                    </div>
                    <div class="submit petugas">
                        <a href="../page/datapetugas.php">KEMBALI</a>
                        <input type="submit" value="SIMPAN" name="submit"
                            onclick="return confirm('Yakin Ingin Mengedit Data?')">
                    </div>
                </form>
                <?php
            }
            ?>
        </main>


        <script>
            const image = document.querySelector("#img-prf");
            input = document.querySelector("#img-input");

            input.addEventListener("change", () => {
                image.src = URL.createObjectURL(input.files[0]);
            });
        </script>
</body>

</html>