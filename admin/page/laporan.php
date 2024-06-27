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
    <title>Data Transaksi - Administrator</title>
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
                    <a href="laporan.php" class="active"><span class="las la-clipboard-list"></span>
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

                Laporan
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


        <main class="main-petugas">
            <div class="laporan-head">
                <div class="search-laporan">
                    <form action="" method="POST">
                        <div class="date-search">
                            <input type="date" name="search-1">
                            <h3>Sampai</h3>
                            <input type="date" name="search-2">
                            <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="cetak-laporan">
                    <form action="../action/cetak_laporan.php" method="POST">
                        <input type="hidden" id="id_trans" name="id_trans">
                        <button id="cetak" name="cetak"
                            onclick="return confirm('Yakin Ingin Mencetak Laporan?')">Cetak</button>
                    </form>
                </div>
            </div>
            <br>
            <button id="check-all" onclick="toggleCheckAll()" class="check-all">Check All</button>
            <table border="1" id="table-transaksi">
                <tr>
                    <th>Id Transaksi</th>
                    <th>No Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Id User</th>
                    <th>Id Petugas</th>
                    <!-- <th>Nama Lengkap</th>
                    <th>Alamat Pengiriman</th>
                    <th>Opsi Pengiriman</th>
                    <th>Metode Pembayaran</th> -->
                    <th>Data Pengiriman</th>
                    <th>Subtotal</th>
                    <th>Biaya Pengiriman</th>
                    <th>Pajak</th>
                    <th class="col-9">Total</th>
                    <th></th>
                </tr>
                <?php
                include '../../php/koneksi.php';

                if (!isset($_POST['submit-search'])) {
                    $data = mysqli_query($koneksi, "SELECT * FROM ttransaksi");
                } else if (isset($_POST['submit-search'])) {
                    $key1 = htmlspecialchars($_POST['search-1']);
                    $key2 = htmlspecialchars($_POST['search-2']);
                    $data = mysqli_query($koneksi, "SELECT * FROM ttransaksi
                    WHERE tgl_checkout BETWEEN '$key1' AND '$key2'
                    ");
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
                            <?= $d['tgl_checkout']; ?>
                        </td>
                        <td>
                            <?= $d['id_user']; ?>
                        </td>
                        <td>
                            <?= $d['id_petugas']; ?>
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
                        <td class="col-9">
                            Rp.
                            <?= number_format($d['total'], 0, ',', '.'); ?>
                        </td>
                        <td>
                            <!-- <a href="cetak.php?id_trans=<?= $d['id_transaksi'] ?>" class="cetak">Lihat</a> -->
                            <input type="checkbox" value="<?= $d['id_transaksi']; ?>">
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr id="total">
                    <td colspan="9">Total Pendapatan:</td>
                    <td><span></span></td>
                </tr>
            </table>
        </main>
    </div>



    <script>
        var table = document.getElementById("table-transaksi");
        var checkboxes = table.querySelectorAll("input[type=checkbox]");
        var total = 0;
        var ids = [];

        function updateTotal() {
            var totalCell = table.rows[table.rows.length - 1].cells[1];
            totalCell.innerText = "Rp " + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function updateIds() {
            var idTransInput = document.getElementById('id_trans');
            idTransInput.value = ids.join(',');
        }

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                var row = this.closest("tr");
                var subtotalString = row.cells[9].innerText;
                var subtotalNumber = parseFloat(subtotalString.replace(/[^0-9]/g, ''));

                if (this.checked) {
                    total += subtotalNumber;
                    ids.push(row.cells[0].innerText);
                } else {
                    total -= subtotalNumber;
                    var index = ids.indexOf(row.cells[0].innerText);
                    if (index !== -1) {
                        ids.splice(index, 1);
                    }
                }

                updateTotal();
                updateIds();
                console.log(ids);
            });
        });

        function toggleCheckAll() {
            var checkAllButton = document.getElementById('check-all');
            var checked = checkAllButton.dataset.checked === 'true';
            var checkboxes = table.querySelectorAll('input[type="checkbox"]');

            checkboxes.forEach(function (checkbox) {
                checkbox.checked = !checked;

                var row = checkbox.closest("tr");
                var subtotalString = row.cells[9].innerText;
                var subtotalNumber = parseFloat(subtotalString.replace(/[^0-9]/g, ''));

                if (!checked) {
                    total += subtotalNumber;
                    ids.push(row.cells[0].innerText);
                } else {
                    total -= subtotalNumber;
                    var index = ids.indexOf(row.cells[0].innerText);
                    if (index !== -1) {
                        ids.splice(index, 1);
                    }
                }
            });

            updateTotal();
            updateIds();

            checkAllButton.innerText = checked ? 'Check All' : 'Uncheck All';
            checkAllButton.dataset.checked = !checked;
        }
    </script>
</body>

</html>