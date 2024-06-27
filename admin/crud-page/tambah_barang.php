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
    <title>Tambah Barang - Administrator</title>
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
                    <a href="../page/databarang.php" class="active"><span class="las la-clipboard-list"></span>
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

                Data Barang
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
            <br />
            <h3>INPUT DATA BARANG</h3>
            <form method="POST" action="../action/aksi_tambah_barang.php" enctype="multipart/form-data">
                <div class="input">
                    <div class="input-name">
                        <p>Nama Barang</p>
                        <input type="text" name="nama_barang" />
                    </div>
                    <div class="input-name">
                        <p>Tanggal</p>
                        <input type="date" name="tanggal" />
                    </div>
                    <div class="input-name">
                        <p>Harga Awal</p>
                        <input type="text" name="harga_awal" id="angka" />
                    </div>
                    <div class="input-name">
                        <p>Deskripsi Barang</p>
                        <input type="text" name="deskripsi_barang">
                    </div>
                </div>
                <div class="img-barang">
                    <p>Tambah Foto Produk (*disarankan gambar berasio 1:1)</p>
                    <div class="input-img-barang">
                        <div class="input-barang">
                            <img src="" alt="" id="img-brng-1">
                            <p>Foto Pertama</p>
                            <input type="file" name="gambar" id="img-input-1" />
                        </div>
                        <div class="input-barang">
                            <img src="" alt="" id="img-brng-2">
                            <p>Foto Kedua</p>
                            <input type="file" name="gambar2" id="img-input-2" />
                        </div>
                        <div class="input-barang">
                            <img src="" alt="" id="img-brng-3">
                            <p>Foto Ketiga</p>
                            <input type="file" name="gambar3" id="img-input-3" />
                        </div>
                    </div>
                </div>
                <div class="submit barang">
                    <a href="../page/databarang.php">KEMBALI</a>
                    <input type="submit" value="SIMPAN" onclick="return confirm('Yakin Ingin Menambahkan Data?')">
                </div>
            </form>
        </main>
        <script>
            $(document).ready(function () {
                $("#angka").keyup(function () {
                    $(this).maskNumber({
                        integer: true,
                        thousands: "."
                    })
                })
            });

            const image1 = document.querySelector("#img-brng-1");
            input1 = document.querySelector("#img-input-1");

            input1.addEventListener("change", () => {
                image1.src = URL.createObjectURL(input1.files[0]);
            });

            const image2 = document.querySelector("#img-brng-2");
            input2 = document.querySelector("#img-input-2");

            input2.addEventListener("change", () => {
                image2.src = URL.createObjectURL(input2.files[0]);
            });

            const image3 = document.querySelector("#img-brng-3");
            input3 = document.querySelector("#img-input-3");

            input3.addEventListener("change", () => {
                image3.src = URL.createObjectURL(input3.files[0]);
            });
        </script>
</body>

</html>