<?php
// session_start();

require '../php/koneksi.php';


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

    $a = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($a);

    $d1 = $data['username'];


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
    <title>The Aunction</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/img/LELANG6.png">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="head">
        <div class="head-1">
            <img src="../assets/img/LELANG.png" alt="" class="logo">
            <div class="welcome">
                <h1>Selamat Datang
                    <?= substr($d1, 0, 9) ?> Di Website Lelang The Aunction
                </h1>
            </div>
        </div>
        <!-- <div class="search-form">
            <form class="form">
                <label for="search">
                    <input class="input" type="text" required="" placeholder="Search here" id="search">
                    <div class="fancy-bg"></div>
                    <div class="search">
                        <svg viewBox="0 0 24 24" aria-hidden="true"
                            class="r-14j79pv r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-4wgw6l r-f727ji r-bnwqim r-1plcrui r-lrvibr">
                            <g>
                                <path
                                    d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <button class="close-btn" type="reset">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </label>
            </form>
        </div> -->
        <div class="search-box">
            <form action="" method="POST">
                <input type="text" name="search" placeholder="Search...">
                <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <div class="navbar">
        <div class="navbar-1">
            <h3 class="active-navbar"><a href="#" class="a-navbar">Home</a></h3>
            <h3><a href="page/historiuser.php" class="a-navbar">Histori</a></h3>
            <h3><a href="page/about.php" class="a-navbar">About</a></h3>
            <h3><a href="page/contact.php" class="a-navbar">Contact</a></h3>
        </div>
        <div class="user-wrapper">
            <img src="../assets/img/<?= $data['gambar'] ?>" width="30px" height="30px">
            <h4>
                <?= substr($d1, 0, 100) ?>
            </h4>
            <i class="fa-solid fa-chevron-down" style="color: #ffffff;"></i>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
            <div class="sub-menu">
                <div class="user-info">
                    <img src="../assets/img/<?= $data['gambar'] ?>" width="50px" height="50px" alt="">
                    <h2>
                        <?= substr($d1, 0, 10) ?>
                    </h2>

                </div>
                <hr>

                <a href="crud-page/edit_konsumen.php" class="sub-menu-link">
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
                <a href="../php/action/logout.php" class="sub-menu-link"
                    onclick="return confirm('Yakin Ingin Logout?')">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Logout</p>
                    <span>&#10095;</span>
                </a>

            </div>
        </div>
    </div>

    <div class="content">
        <?php
        include '../php/koneksi.php';

        if (!isset($_POST['submit-search'])) {
            $data1 = mysqli_query($koneksi, "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE status='dibuka'");
        } else if (isset($_POST['submit-search'])) {
            $key = htmlspecialchars($_POST['search']);
            $data1 = mysqli_query($koneksi, "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE nama_barang LIKE '%$key%' AND status='dibuka'");
        }

        while ($d1 = mysqli_fetch_array($data1)) {
            $id_lelang = $d1['id_lelang'];
            $data2 = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_lelang='$id_lelang' GROUP BY penawaran_harga DESC");
            $cek = mysqli_num_rows($data2);

            if ($cek == 0) {
                $harga_penawaran_terakhir = 0;
            } else {
                $d2 = mysqli_fetch_array($data2);
                $harga_penawaran_terakhir = $d2['penawaran_harga'];
            }
            ?>
        <div class="card">
            <a href="crud-page/preview.php?id_lelang=<?= $d1['id_lelang']; ?>">
                <div class="card-img"><img src="../assets/img/<?= $d1['gambar_barang']; ?>" alt="" width="165px"
                        height="165px">
                </div>
                <div class="card-info">
                    <p class="text-title">
                        <?= substr($d1['nama_barang'], 0, 10) ?> ...
                    </p>
                    <p class=" text-body">
                        <?= substr($d1['deskripsi_barang'], 0, 15) ?>...
                    </p>
                </div>
                <div class="card-footer">
                    <span class="text-title">
                        <?= number_format($d1['harga_awal_lelang'], 0, ',', '.') ?>
                    </span>
                    <div class="card-button">
                        <a href="crud-page/preview.php?id_lelang=<?= $d1['id_lelang']; ?>">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path
                                    d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z">
                                </path>
                                <path
                                    d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z">
                                </path>
                                <path
                                    d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z">
                                </path>
                            </svg>
                        </a>
                    </div>

                </div>
                <h5>
                    Penawaran Terbaru:
                    <br>
                    <?= number_format($harga_penawaran_terakhir, 0, ',', '.') ?>
                </h5>
            </a>
        </div>
        <?php
        }
        ?>
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

    function toggleMenu() {
        subMenu.classList.toggle("open-menu");
    }

    console.log(subMenu);

    nama.addEventListener('click', () => {
        nama.classList.toggle('nama-buka');
        menu.style.overflow = 'visible';

        const namaBuka = document.querySelector(".nama-buka");
        if (!namaBuka) {
            nama.classList.toggle('nama');
            menu.style.overflow = 'hidden';
        }
    });
    </script>

</body>

</html>