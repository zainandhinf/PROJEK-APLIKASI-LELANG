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

    $a = mysqli_query($koneksi, $query);

    $data = mysqli_fetch_array($a);


    $d = $data['username'];
    // $test = $_POST['penawaran'];
    // var_dump($test);
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
    <title>The Aunction - About</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .about {
        padding: 20px;
    }

    .about-1 {
        padding: 100px;
    }

    .about-2 {
        padding: 100px;
    }

    .about ul li {
        padding: 10px;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-1">
            <h3><a href="../konsumenpage.php" class="a-navbar">Home</a></h3>
            <h3><a href="historiuser.php" class="a-navbar">Histori</a></h3>
            <h3 class="active-navbar"><a href="#" class="a-navbar">About</a></h3>
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
        <br>
        <br>
        <div class="about">
            <div class="about-1">
                <h1>Cara Mengikuti Lelang</h1>
                <ul>
                    <li>User bisa melakukan login terlebih dahulu</li>
                    <li>Lalu user bisa mencari lelang yang akan diikuti</li>
                    <li>User bisa melihat preview lelang terlebih dahulu</li>
                    <li>Jika dirasa sudah yakin akan mengikuti lelang tersebut, maka user bisa melakukan penawaran pada
                        input penawaran setelah deskripsi lelang</li>
                    <li>Sebelum melakukan penawaran, user harus melihat terlebih dahulu harga penawaran terbaru</li>
                    <li>Jika sudah, user bisa menginputkan harga penawaran, dan harga penawaran harus lebih besar dari
                        penawaran terbaru</li>
                    <li>Jika sudah melakukan penawaran maka akan otomatis tersimpan di histori lelang</li>
                </ul>
            </div>
            <div class="about-2">
                <h1>Alur Untuk Memenangkan Lelang</h1>
                <ul>
                    <li>Setelah user melakukan lelang, maka akan histori penawaran tersebut akan disimpan di histori
                        lelang
                    </li>
                    <li>Setelah itu user bisa menunggu hingga lelang ditutup oleh pihak lelang/petugas</li>
                    <li>Setelah lelang selesai, jika user tersebut memenangkan lelang, maka otomatis akan masuk ke
                        keranjang
                    </li>
                    <li>Jika sudah dikeranjang maka user bisa melakukan checkout untuk megkonfirmasi pengiriman</li>
                </ul>
            </div>
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

    // var rupiah = document.getElementById('rupiah');
    // rupiah.addEventListener('keyup', function (e) {
    //     rupiah.value = formatRupiah(this.value, 'Rp. ');
    // })

    // function formatRupiah(angka, prefix) {
    //     var number_string = angka.replace(/[^,\d]/g, '').toString(),
    //         split = number_string.split(','),
    //         sisa = split[0].lenght % 3,
    //         rupiah = split[0].substr(0, sisa),
    //         ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    //     if (ribuan) {
    //         separator = sisa ? '.' : '';
    //         rupiah += separator + ribuan.join('.');
    //     }

    //     rupiah = split[1] != underfined ? rupiah + ',' + split[1] : rupiah;
    //     return previx == underfined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    // }
    </script>
    <script>
    $(document).ready(function() {
        $("#angka").keyup(function() {
            $(this).maskNumber({
                integer: true,
                thousands: "."
            })
        })
    })
    </script>
</body>

</html>