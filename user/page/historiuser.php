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

    $id_user = $_SESSION['id_user'];

    $query = "SELECT * FROM tkonsumen WHERE id_user='$id_user'";
    $query2 = "SELECT * FROM `thistori_lelang` INNER JOIN tbarang on thistori_lelang.id_barang=tbarang.id_barang WHERE id_user='$id_user'";

    $a = mysqli_query($koneksi, $query);
    $a2 = mysqli_query($koneksi, $query2);

    $data = mysqli_fetch_array($a);
    $data2 = mysqli_fetch_array($a2);

    $d = $data['username'];

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
    <title>The Aunction - Histori Lelang</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="navbar">
        <div class="navbar-1">
            <h3><a href="../konsumenpage.php" class="a-navbar">Home</a></h3>
            <h3 class="active-navbar"><a href="#" class="a-navbar">Histori</a></h3>
            <h3><a href="about.php" class="a-navbar">About</a></h3>
            <h3><a href="contact.php" class="a-navbar">Contact</a></h3>
        </div>
        <div class="user-wrapper">
            <img src="../../assets/img/<?= $data['gambar'] ?>" width="30px" height="30px" onclick="toogleMenu()">
            <h4>
                <?= substr($d, 0, 10) ?>
            </h4>
            <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="../../assets/img/<?= $data['gambar'] ?>" width="50px" height="50px" alt="">
                    <h2>
                        <?= substr($d, 0, 10) ?>
                    </h2>
                </div>
                <hr>

                <a href="../crud-page/edit_konsumen.php" class="sub-menu-link">
                    <i class="fa-solid fa-user"></i>
                    <p>Info Profile</p>
                    <span>&#10095;</span>
                </a>
                <!-- <a href="#" class="sub-menu-link">
                    <i class="fa-solid fa-gear"></i>
                    <p>Settings & Privacy</p>
                    <span>></span>
                </a>
                <a href="#" class="sub-menu-link">
                    <i class="fa-solid fa-circle-info"></i>
                    <p>Help & Support</p>
                    <span>></span>
                </a> -->
                <a href="../../php/action/logout.php" class="sub-menu-link"
                    onclick="return confirm('Yakin Ingin Logout?')">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Logout</p>
                    <span>&#10095;</span>
                </a>

            </div>
        </div>
    </div>

    <div class="preview">
        <div class="cart-title">
            <a href="#" class="active">Lelang</a>
            <span></span>
            <a href="keranjang.php">Keranjang</a>
        </div>
        <div class="cart">

            <h1>Histori Lelang Anda</h1>
            <div class="dibuka">
                <span></span>
                <h3>Lelang Yang Diikuti</h3>
                <span></span>
            </div>
            <?php
            include '../../php/koneksi.php';
            $a2 = mysqli_query($koneksi, "SELECT * FROM `thistori_lelang` INNER JOIN tbarang on thistori_lelang.id_barang=tbarang.id_barang WHERE id_user='$id_user'");
            while ($data2 = mysqli_fetch_array($a2)) {
                ?>
            <div class="card-histori">
                <div class="card-histori-img">
                    <div>
                        <img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="" height="40px">
                    </div>
                </div>
                <span></span>
                <div class="card-histori-nama">
                    <h3>Nama Barang</h3>
                    <p>
                        <?= $data2['nama_barang'] ?>
                    </p>
                </div>
                <span></span>
                <div class="card-histori-tgl">
                    <h3>Tanggal Penawaran</h3>
                    <h4>
                        <?= $data2['tanggal_penawaran'] ?>
                    </h4>
                </div>
                <span></span>
                <div class="card-histori-penawaran">
                    <h3>Penawaran</h3>
                    <h4>
                        Rp.
                        <?= number_format($data2['penawaran_harga'], 0, ',', '.') ?>
                    </h4>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="footer">
        <div class="footer-bottom">
            <p align="center">&copy; 2023 The Aunction. All rights reserved.</p>
            <p align="center">Designed by Zainandhi Nur Fathurrohman</p>
        </div>
    </div>

    <script>
    let subMenu = document.getElementById("subMenu");
    const nama = document.querySelector(".user-wrapper");
    const menu = document.querySelector(".sub-menu-wrap");

    function toogleMenu() {
        subMenu.classList.toogle("open-menu");
    }

    nama.addEventListener('click', () => {
        nama.classList.toggle('nama-buka');
        menu.style.overflow = 'visible';

        const namaBuka = document.querySelector(".nama-buka");
        if (namaBuka) {
            nama.classList.toggle('nama');
            menu.style.overflow = 'hidden';
        }
    });
    </script>
</body>

</html>