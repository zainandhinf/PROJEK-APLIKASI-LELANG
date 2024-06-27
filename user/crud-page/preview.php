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
    $id_lelang = $_GET['id_lelang'];

    $query = "SELECT * FROM tkonsumen WHERE id_user='$id_user'";
    $query2 = "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE id_lelang='$id_lelang'";
    $query3 = "SELECT MAX(penawaran_harga) FROM thistori_lelang WHERE id_lelang = '$id_lelang'";

    $a = mysqli_query($koneksi, $query);
    $a2 = mysqli_query($koneksi, $query2);
    $a3 = mysqli_query($koneksi, $query3);

    $data = mysqli_fetch_array($a);
    $data2 = mysqli_fetch_array($a2);
    $data3 = mysqli_fetch_array($a3);

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
    <title>The Aunction - Preview</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <link rel="stylesheet" href="../../assets/css/glider.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../../js/jquery.js"></script>
    <script src="../../js/jquery.masknumber.js"></script>
    <script src="../../js/glider.min.js"></script>
    <style>
    .glider-contain {
        background-color: blue;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-1">
            <h3 class="active-navbar"><a href="../konsumenpage.php" class="a-navbar">Home</a></h3>
            <h3><a href="../page/historiuser.php" class="a-navbar">Histori</a></h3>
            <h3><a href="../page/about.php" class="a-navbar">About</a></h3>
            <h3><a href="../page/contact.php" class="a-navbar">Contact</a></h3>
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

                <a href="edit_konsumen.php" class="sub-menu-link">
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
        <div class="preview-1">
            <!-- <div class="img"> -->
            <!-- <img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="" width="100px"> -->
            <!-- <div class="glider-contain">
                    <div class="glider">
                        <div><img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="" width="100px"></div>
                        <div><img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="" width="100px"></div>
                        <div><img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="" width="100px"></div>
                        <div><img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="" width="100px"></div>
                    </div>

                    <button aria-label="Previous" class="glider-prev">«</button>
                    <button aria-label="Next" class="glider-next">»</button>
                    <div role="tablist" class="dots"></div>
                </div> -->


            <!-- </div> -->

            <div class="container">
                <div class="content-slide">
                    <div class="imgslide fade">
                        <div class="numberslide">1 / 3</div>
                        <img src="../../assets/img/<?= $data2['gambar_barang'] ?>" alt="">
                    </div>

                    <div class="imgslide fade">
                        <div class="numberslide">2 / 3</div>
                        <img src="../../assets/img/<?= $data2['gambar_barang_2'] ?>" alt="">
                    </div>

                    <div class="imgslide fade">
                        <div class="numberslide">3 / 3</div>
                        <img src="../../assets/img/<?= $data2['gambar_barang_3'] ?>" alt="">
                    </div>

                    <a class="prev" onClick="nextslide(-1)">&#10094;</a>
                    <a class="next" onClick="nextslide(1)">&#10095;</a>
                </div>

                <div class="page">
                    <span class="dot" onClick="dotslide(1)"></span>
                    <span class="dot" onClick="dotslide(2)"></span>
                    <span class="dot" onClick="dotslide(3)"></span>
                </div>

            </div>
            <div class="description">
                <h1>
                    <?= $data2['nama_barang'] ?>
                </h1>
                <h4>Penawaran Terbaru:
                    <?= number_format($data3[0], 0, ',', '.') ?>
                </h4>
                <p>
                    Harga Awal:
                    <?= number_format($data2['harga_awal_lelang'], 0, ',', '.') ?>
                </p>
                <p>
                    Status:
                    <?= $data2['status'] ?>
                </p>
                <p>
                    Deskripsi Barang:
                    <?= $data2['deskripsi_barang'] ?>
                </p>
                <p>
                    Tanggal Dibuka:
                    <?= $data2['tgl_lelang'] ?>
                </p>
                <p>
                    Tanggal Ditutup:
                    <?= $data2['tgl_lelang_berakhir'] ?>
                </p>
            </div>
        </div>
        <div class="preview-2">
            <div class="input-lelang">
                <h2>Penawaran</h2>
                <form action="../action/aksi_penawaran.php" method="POST">
                    <div class="input">
                        <div class="input-name">
                            <input type="hidden" value="<?= $data2['id_lelang']; ?>" name="id_lelang">
                            <input type="text" name="penawaran" placeholder="Masukkan Harga Penawaran" id="angka">
                        </div>
                        <div class="buat">
                            <input type="submit" value="BUAT" name="submit"
                                onclick="return confirm('Yakin Ingin Melakukan Penawaran?')">
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <h2>Penawaran Terakhir</h2>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelelang</th>
                        <th>Penawaran</th>
                        <th>Tanggal Penawaran</th>
                    </tr>
                    <?php
                    include '../../php/koneksi.php';
                    $a3 = mysqli_query($koneksi, "SELECT h.id_histori, h.id_lelang, h.id_barang, k.username, h.tanggal_penawaran, h.penawaran_harga 
                        FROM thistori_lelang h
                        JOIN tkonsumen k ON h.id_user = k.id_user
                        WHERE h.id_lelang = $id_lelang
                        AND NOT EXISTS (
                            SELECT 1
                            FROM thistori_lelang 
                            WHERE id_lelang = h.id_lelang 
                            AND id_user = h.id_user 
                            AND penawaran_harga > h.penawaran_harga
                        )
                        ORDER BY h.penawaran_harga DESC;

                        ");
                    $nomor = 1;
                    while ($data3 = mysqli_fetch_array($a3)) {
                        ?>
                    <tr>
                        <td>
                            <?= $nomor++ ?>
                        </td>
                        <td>
                            <?= $data3['username'] ?>
                        </td>
                        <td>
                            <?= number_format($data3['penawaran_harga'], 0, ',', '.') ?>
                        </td>
                        <td>
                            <?= $data3['tanggal_penawaran'] ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
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
    });


    // new Glider(document.querySelector('.glider'), {
    //     slidesToShow: 1,
    //     dots: '#dots',
    //     draggable: true,
    //     arrows: {
    //         prev: '.glider-prev',
    //         next: '.glider-next'
    //     }
    // });


    var slideIndex = 1;
    showSlide(slideIndex);

    function nextslide(n) {
        showSlide(slideIndex += n);
    }

    function dotslide(n) {
        showSlide(slideIndex = n);
    }

    function showSlide(n) {
        var i;
        var slides = document.getElementsByClassName("imgslide");
        var dot = document.getElementsByClassName("dot");

        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {

            slides[i].style.display = "none";
        }

        for (i = 0; i < slides.length; i++) {

            dot[i].className = dot[i].className.replace(" active", "");
        }

        slides[slideIndex - 1].style.display = "block";

        dot[slideIndex - 1].className += " active";



    }
    </script>
</body>

</html>