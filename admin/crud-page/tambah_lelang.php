<?php

require '../../php/koneksi.php';

session_start();
if (isset($_SESSION['login'])) {

    $id_petugas = $_SESSION['id_petugas'];

    $query = "SELECT * FROM tpetugas WHERE id_petugas='$id_petugas'";

    $a = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($a);
    $d = $data['username'];
    $barang = mysqli_query($koneksi, "SELECT * FROM tbarang");
    $jsArray = "var harga = new Array();\n";
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
    <title>Tambah lelang - Administrator</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/test.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/jquery.masknumber.js"></script>
    <style>
    select[name="nama_barang"] {
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        height: 39px;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    select[name="nama_barang"] option {
        font-size: 14px;
        color: #333;
    }

    select[name="nama_barang"] option[value="- Pilih -"] {
        font-style: italic;
        color: #999;
    }

    select[name="nama_barang"] option[selected] {
        font-weight: bold;
    }

    select[name="nama_barang"] option:not([selected]) {
        font-weight: normal;
    }
    </style>
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

            <br />
            <h3>INPUT DATA LELANG</h3>
            <form method="POST" action="../action/aksi_tambah_lelang.php">
                <div class="input">
                    <!-- <div class="input-name">
                        <p>Id Barang</p>
                        <input type="text" name="id_barang" />
                    </div> -->
                    <div class="input-name">
                        <p>Id Barang</p>
                        <select name="nama_barang" id="" onchange="changeValue(this.value)">
                            <option>- Pilih -</option>
                            <?php if (mysqli_num_rows($barang)) { ?>
                            <?php while ($row_brg = mysqli_fetch_array($barang)) { ?>
                            <option value="<?= $row_brg['id_barang'] ?>" data-nama="<?= $row_brg['nama_barang'] ?>">
                                <?= $row_brg['id_barang'] ?> (<?= $row_brg['nama_barang'] ?>)
                                <?php $jsArray .= "harga['" . $row_brg['id_barang'] . "'] = {harga:'" . addslashes($row_brg['harga_awal']) . "', nama:'" . addslashes($row_brg['nama_barang']) . "'};\n"; ?>
                            </option>


                            <?php }
                            } ?>
                        </select>
                    </div>
                    <!-- <div class="input-name">
                        <p>Nama Barang</p>
                        <input type="text" name="nama_barang" />
                    </div> -->
                    <div class="input-name">
                        <p>Tanggal Lelang Mulai</p>
                        <input type="date" name="tanggal_lelang_mulai" />
                    </div>
                    <div class="input-name">
                        <p>Tanggal Lelang Berakhir</p>
                        <input type="date" name="tanggal_lelang_berakhir" />
                    </div>
                    <div class="input-name">
                        <p>Harga Aktif</p>
                        <input type="text" name="harga_aktif" id="angka" />
                    </div>
                    <div class="input-name">
                        <p>Id Petugas</p>
                        <input type="text" name="id_petugas">
                    </div>
                </div>
                <div class="submit petugas">
                    <a href="../page/datalelang.php">KEMBALI</a>
                    <input type="submit" value="SIMPAN" name="submit"
                        onclick="return confirm('Yakin Ingin Menambahkan Data?')">
                </div>
            </form>
        </main>
        <script>
        $(document).ready(function() {
            $("#angka").keyup(function() {
                $(this).maskNumber({
                    integer: true,
                    thousands: "."
                })
            })
        });


        <?= $jsArray; ?>

        function changeValue(id_barang) {
            // var hargaRupiah = harga[id_barang].harga.toLocaleString('id-ID', {
            //     style: 'currency',
            //     currency: 'IDR'
            // });
            document.getElementById('angka').value = harga[id_barang].harga.toString().replace(
                /\B(?=(\d{3})+(?!\d))/g, ".");
            document.getElementById('nama_barang').value = harga[id_barang].nama;
        }
        </script>
</body>

</html>