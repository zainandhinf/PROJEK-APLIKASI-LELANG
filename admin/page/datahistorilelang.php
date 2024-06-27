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
    <title>Data Histori Lelang - Administrator</title>
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
                    <a href="datahistorilelang.php" class="active"><span class="las la-clipboard-list"></span>
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

                Data Histori Lelang
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
            <div class="laporan-head">
                <div class="head">
                    <form action="" method="POST">
                        <input type="date" name="search">
                        <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
                    </form>
                    <form action="" method="POST">
                        <input type="text" name="search-id" placeholder="Cari berdasarkan id lelang...">
                        <button type="submit" name="submit-search-id"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="cetak-laporan">
                    <form action="../action/cetak_histori.php" method="POST">
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
                    <th>Id Histori Lelang</th>
                    <th>Id Lelang</th>
                    <th>Id Barang</th>
                    <th>Id User</th>
                    <th>Tanggal Penawaran</th>
                    <th>Penawaran Harga</th>
                    <!-- <th>Aksi</th> -->
                    <th></th>
                </tr>
                <?php
                include '../../php/koneksi.php';

                if (!isset($_POST['submit-search']) and !isset($_POST['submit-search-id'])) {
                    $data = mysqli_query($koneksi, "SELECT * FROM thistori_lelang");
                } else if (isset($_POST['submit-search'])) {
                    $key = htmlspecialchars($_POST['search']);
                    $data = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_histori LIKE '%$key%' OR id_barang LIKE '%$key%' OR id_user LIKE '%$key%' OR tanggal_penawaran LIKE '%$key%' OR penawaran_harga LIKE '%$key%'");
                } else if (isset($_POST['submit-search-id'])) {
                    $keyid = htmlspecialchars($_POST['search-id']);
                    $data = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_lelang LIKE '%$keyid%'");
                    // var_dump($keyid);
                }
                // $data = mysqli_query($koneksi, "select * from tlelang");
                while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                        <td>
                            <?= $d['id_histori']; ?>
                        </td>
                        <td>
                            <?= $d['id_lelang']; ?>
                        </td>
                        <td>
                            <?= $d['id_barang']; ?>
                        </td>
                        <td>
                            <?= $d['id_user']; ?>
                        </td>
                        <td>
                            <?= $d['tanggal_penawaran']; ?>
                        </td>
                        <td>
                            Rp.
                            <?= number_format($d['penawaran_harga'], 0, ',', '.'); ?>
                        </td>
                        <td>
                            <!-- <a href="cetak.php?id_trans=<?= $d['id_transaksi'] ?>" class="cetak">Lihat</a> -->
                            <input type="checkbox" value="<?= $d['id_histori']; ?>">
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </main>
    </div>



    <script>
        var table = document.getElementById("table-transaksi");
        var checkboxes = table.querySelectorAll("input[type=checkbox]");
        var total = 0;
        var ids = [];

        // function updateTotal() {
        //     var totalCell = table.rows[table.rows.length - 1].cells[1];
        //     totalCell.innerText = "Rp " + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        // }

        function updateIds() {
            var idTransInput = document.getElementById('id_trans');
            idTransInput.value = ids.join(',');
        }

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                var row = this.closest("tr");
                var subtotalString = row.cells[5].innerText;
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

                // updateTotal();
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
                var subtotalString = row.cells[5].innerText;
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

            // updateTotal();
            updateIds();

            checkAllButton.innerText = checked ? 'Check All' : 'Uncheck All';
            checkAllButton.dataset.checked = !checked;
        }
    </script>
</body>

</html>