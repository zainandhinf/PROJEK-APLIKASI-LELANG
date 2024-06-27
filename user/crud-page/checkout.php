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
    $query2 = "SELECT * FROM `thistori_lelang` INNER JOIN tbarang on thistori_lelang.id_barang=tbarang.id_barang WHERE id_user='$id_user'";
    $query3 = "SELECT MAX(penawaran_harga) FROM thistori_lelang WHERE id_lelang = '$id_lelang'";
    $query4 = "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE id_lelang='$id_lelang'";
    // $test = mysqli_query($koneksi, "SELECT * FROM thistori_lelang WHERE id_lelang = '$id_lelang' ORDER BY penawaran_harga DESC");
    // $test2 = mysqli_fetch_array($test);

    $a = mysqli_query($koneksi, $query);
    $a2 = mysqli_query($koneksi, $query2);
    $a3 = mysqli_query($koneksi, $query3);
    $a4 = mysqli_query($koneksi, $query4);

    $data = mysqli_fetch_array($a);
    $data2 = mysqli_fetch_array($a2);
    $data3 = mysqli_fetch_array($a3);
    $data4 = mysqli_fetch_array($a4);

    $d = $data['username'];
    $_SESSION['id_lelang'] = $_GET['id_lelang'];
    $_SESSION['id_user'] = $id_user;

    // $subtotal = $_POST['subtotal'];
    // $subtotal = str_replace(array('Rp ', '.'), '', $subtotal);
    // $subtotal = intval($subtotal);
    // $test3 = $test2['tanggal_penawaran'];
    // var_dump($test3);
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
    <title>The Aunction - Keranjang</title>
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
            <h3 class="active-navbar"><a href="../page/historiuser.php" class="a-navbar">Histori</a></h3>
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
        <h1 class="card-checkout-title">Detail Penawaran</h1>
        <div class="card-checkout">
            <!-- <div class="img">
                <img src="../../assets/img/<?= $data4['gambar_barang'] ?>" alt="" width="100px">
            </div> -->

            <div class="container">
                <div class="content-slide">
                    <div class="imgslide fade">
                        <div class="numberslide">1 / 3</div>
                        <img src="../../assets/img/<?= $data4['gambar_barang'] ?>" alt="">
                    </div>

                    <div class="imgslide fade">
                        <div class="numberslide">2 / 3</div>
                        <img src="../../assets/img/<?= $data4['gambar_barang_2'] ?>" alt="">
                    </div>

                    <div class="imgslide fade">
                        <div class="numberslide">3 / 3</div>
                        <img src="../../assets/img/<?= $data4['gambar_barang_3'] ?>" alt="">
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
                    <?= $data4['nama_barang'] ?>
                </h1>
                <h4>Tanggal Penawaran:
                    <?= $data2['tanggal_penawaran'] ?>
                </h4>
                <h4>
                    Harga Awal:
                    Rp.
                    <?= number_format($data4['harga_awal'], 0, ',', '.') ?>
                </h4>
                <h4>Penawaran Anda:
                    Rp.
                    <?= number_format($data4['harga_aktif'], 0, ',', '.') ?>
                </h4>
                <p>
                    Deskripsi Barang:
                    <?= $data4['deskripsi_barang'] ?>
                </p>
            </div>
        </div>
        <form method="POST" action="../action/aksi_checkout.php">
            <div class="input">
                <div class="input-data">
                    <h1 class="card-checkout-data">Data Pengiriman</h1>
                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                    <input type="hidden" name="id_lelang" value="<?= $id_lelang ?>">
                    <div class="input-name-data-nama">
                        <p>Nama Lengkap</p>
                        <input type="text" name="nama_lengkap" id="nama-lengkap">
                    </div>
                    <div class="input-name-data-alamat">
                        <p>Alamat Pengiriman</p>
                        <textarea name="alamat" class="alamat-pengiriman-input" id="alamat-pengiriman"></textarea>
                    </div>
                    <div class="input-name-data">
                        <p>Opsi Pengiriman</p>
                        <select name="opsi_pengiriman" id="opsi-pengiriman">
                            <option value="regular">Regular</option>
                            <option value="express">Express</option>
                            <option value="instant">Instant</option>
                        </select>
                    </div>
                    <div class="input-name-data">
                        <p>Metode Pembayaran</p>
                        <select name="metode_pembayaran" id="metode-pembayaran">
                            <option value="Kartu-Kredit">Kartu Kredit</option>
                            <option value="Transfer-Bank">Transfer Bank</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>
                    </div>
                    <div class="input-name-data-telp">
                        <p>Nomor Telepon</p>
                        <input type="text" name="no_telp" id="no-telp">
                    </div>
                </div>
                <div class="input-rincian">
                    <h1>Rincian</h1>
                    <div class="card-payment">
                        <div class="card-header">
                            <h2>Rincian Pengiriman</h2>
                        </div>
                        <div class="card-body">
                            <div class="payment-row" id="nama-lengkap-row">
                                <p>Nama Lengkap</p>
                                <p></p>
                            </div>
                            <div class="payment-row" id="alamat-pengiriman-row">
                                <p>Alamat Pengiriman</p>
                                <p></p>
                            </div>
                            <div class="payment-row" id="opsi-pengiriman-row">
                                <p>Opsi Pengiriman</p>
                                <p></p>
                            </div>
                            <div class="payment-row" id="metode-pembayaran-row">
                                <p>Metode Pembayaran</p>
                                <p></p>
                            </div>
                            <div class="payment-row" id="no-telp-row">
                                <p>Nomor Telepon</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-payment">
                        <div class="card-header">
                            <h2>Rincian Pembayaran</h2>
                        </div>
                        <div class="card-body">
                            <div class="payment-row" id="subtotal">
                                <p>Subtotal</p>
                                <p id="sub_total">Rp
                                    <?= number_format($data4['harga_aktif'], 0, ',', '.') ?>
                                </p>
                                <input type="hidden" name="subtotal" id="input-subtotal">
                            </div>
                            <div class="payment-row" id="biaya-pengiriman">
                                <p>Biaya Pengiriman</p>
                                <p id="biaya_kirim">Rp </p>
                                <input type="hidden" name="biaya_kirim" id="input-kirim">
                            </div>
                            <div class="payment-row">
                                <p>Pajak</p>
                                <p id="pajak">Rp 5.000</p>
                                <input type="hidden" name="pajak" id="input-pajak">
                            </div>
                            <div class="payment-row total" id="total-pembayaran">
                                <p>Total Pembayaran</p>
                                <p>Rp </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout-submit">
                <input type="submit" value="Checkout" onclick="return confirm('Yakin Ingin Melakukan Checkout?')">
            </div>
        </form>

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


        document.getElementById("nama-lengkap").addEventListener("input", updateRincianPengiriman);
        document.getElementById("alamat-pengiriman").addEventListener("input", updateRincianPengiriman);
        document.getElementById("opsi-pengiriman").addEventListener("input", updateRincianPengiriman);
        document.getElementById("metode-pembayaran").addEventListener("input", updateRincianPengiriman);
        document.getElementById("no-telp").addEventListener("input", updateRincianPengiriman);

        function updateRincianPengiriman() {
            // Ambil nilai dari setiap input dan select di div data pengiriman
            var namaLengkap = document.getElementById("nama-lengkap").value;
            var alamatPengiriman = document.getElementById("alamat-pengiriman").value;
            var opsiPengiriman = document.getElementById("opsi-pengiriman").value;
            var metodePembayaran = document.getElementById("metode-pembayaran").value;
            var notelp = document.getElementById("no-telp").value;


            // // Lakukan perhitungan
            // var subtotal = 100000;
            // var biayaPengiriman = 10000;
            // var pajak = 5000;
            // var totalPembayaran = subtotal + biayaPengiriman + pajak;
            var subtotal = parseInt(document.getElementById("subtotal").getElementsByTagName("p")[1].innerHTML.replace(
                /\D/g, ''));
            // var metodePengiriman = document.getElementById("opsi-pengiriman-row").getElementsByTagName("p")[1];
            const metodePengiriman = document.querySelector("#opsi-pengiriman");
            // var biaya_pengiriman_text = document.querySelector("#biaya-pengiriman p:nth-child(2)").textContent;
            // var biaya_pengiriman = parseInt(biaya_pengiriman_text.replace(/\D/g,''));
            var biaya_pengiriman = 0;

            metodePengiriman.addEventListener("change", function () {
                var selectedOption = this.options[this.selectedIndex];
                var metodePengiriman = selectedOption.value;

                if (metodePengiriman === "regular") {
                    biaya_pengiriman = 50000;
                } else if (metodePengiriman === "express") {
                    biaya_pengiriman = 100000;
                } else if (metodePengiriman === "instant") {
                    biaya_pengiriman = 150000;
                }
                var pajak = 5000;
                var total_pembayaran = subtotal + biaya_pengiriman + pajak;
                document.getElementById('total-pembayaran').getElementsByTagName("p")[1].innerHTML = "Rp " +
                    total_pembayaran.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });








            //  var biaya_pengiriman;
            //  metodePengiriman.addEventListener("change", function() {
            //   switch (this.value) {
            //     case "regular":
            //     biaya_pengiriman = "Rp 50.000";
            //     break;
            //     case "express":
            //     biaya_pengiriman = "Rp 100.000";
            //     break;
            //     case "instant":
            //     biaya_pengiriman = "Rp 150.000";
            //     break;
            // }
            // });







            // Perbarui nilai pada setiap elemen yang menampilkan rincian pengiriman
            document.getElementById("nama-lengkap-row").getElementsByTagName("p")[1].innerHTML = namaLengkap;
            document.getElementById("alamat-pengiriman-row").getElementsByTagName("p")[1].innerHTML = alamatPengiriman;
            document.getElementById("opsi-pengiriman-row").getElementsByTagName("p")[1].innerHTML = opsiPengiriman;
            document.getElementById("metode-pembayaran-row").getElementsByTagName("p")[1].innerHTML = metodePembayaran;
            document.getElementById("no-telp-row").getElementsByTagName("p")[1].innerHTML = notelp;
            // document.getElementById("subtotal-row").getElementsByTagName("p")[1].innerHTML = "Rp " + subtotal;
            // document.getElementById("biaya-pengiriman-row").getElementsByTagName("p")[1].innerHTML = "Rp " + biayaPengiriman;
            // document.getElementById("pajak-row").getElementsByTagName("p")[1].innerHTML = "Rp " + pajak;
            // document.getElementById("total-pembayaran-row").getElementsByTagName("p")[1].innerHTML = "Rp " + totalPembayaran;
            // "Rp " + biayaPengiriman
            // "Rp " + totalPembayaran
        }




        const opsiPengiriman = document.querySelector("#opsi-pengiriman");
        const biayaPengiriman = document.querySelector("#biaya-pengiriman p:nth-child(2)");
        var biaya;

        opsiPengiriman.addEventListener("change", function () {
            if (this.value === "regular") {
                biayaPengiriman.textContent = "Rp 50.000";
                biaya = "Rp 50.000";
            } else if (this.value === "express") {
                biayaPengiriman.textContent = "Rp 100.000";
                biaya = "Rp 100.000";
            } else if (this.value === "instant") {
                biayaPengiriman.textContent = "Rp 150.000";
                biaya = "Rp 150.000";
            }
            const kirim = document.querySelector('#biaya_kirim');
            console.log(kirim);
            const inputKirim = document.querySelector('#input-kirim');
            inputKirim.value = kirim.innerText;
        });



        // const biayaPengirimanElement = document.getElementById("biaya-pengiriman").getElementsByTagName("p")[1];

        // let biayaPengiriman = 0;
        // const opsiPengirimanElement = document.getElementById("opsi-pengiriman");
        // opsiPengirimanElement.addEventListener("change", function() {
        //     switch(this.value) {
        //         case "regular":
        //         biayaPengiriman = 50000;
        //         break;
        //         case "express":
        //         biayaPengiriman = 100000;
        //         break;
        //         case "instant":
        //         biayaPengiriman = 150000;
        //         break;
        //     }
        //     biayaPengirimanElement.textContent = "Rp " + biayaPengiriman.toLocaleString();
        //     updateTotal();
        // });

        // function updateTotal() {
        //     const subtotal = parseInt();
        //     const pajak = 5000;
        //     const total = subtotal + biayaPengiriman + pajak;
        //     document.querySelector(".total p:last-child").textContent = "Rp " + total.toLocaleString();
        // }





        // // mengambil nilai subtotal dan menghapus karakter 'Rp ' serta tanda titik
        // let subtotal = document.querySelector('.card-payment .payment-row:nth-child(1) p:nth-child(2)').textContent;
        // subtotal = subtotal.replace('Rp ', '').replace('.', '');

        // // mengambil nilai biaya pengiriman dan menghapus karakter 'Rp ' serta tanda titik
        // let biayaPengiriman = document.querySelector('.card-payment #biaya-pengiriman p:nth-child(2)').textContent;
        // biayaPengiriman = biayaPengiriman.replace('Rp ', '').replace('.', '');

        // // mengambil nilai pajak dan menghapus karakter 'Rp '
        // let pajak = document.querySelector('.card-payment .payment-row:nth-child(3) p:nth-child(2)').textContent;
        // pajak = pajak.replace('Rp ', '');

        // // menghitung total pembayaran
        // let total = parseInt(subtotal) + parseInt(biayaPengiriman) + parseInt(pajak);

        // // mengisi nilai total pembayaran pada elemen yang sesuai
        // document.querySelector('.card-payment .total p:nth-child(2)').textContent = 'Rp ' + total.toLocaleString();

        // document.querySelector('form').addEventListener('submit', function(event) {
        //     event.preventDefault();

        //     // kode JavaScript untuk mengambil nilai subtotal, biaya pengiriman, dan pajak serta menghitung total pembayaran

        //     // mengirim data ke server
        //     this.submit();
        // });


        const subtotal = document.querySelector('#sub_total');
        console.log(subtotal);
        const inputSubtotal = document.querySelector('#input-subtotal');
        inputSubtotal.value = subtotal.innerText;

        const pajak = document.querySelector('#pajak');
        console.log(pajak);
        const inputPajak = document.querySelector('#input-pajak');
        inputPajak.value = pajak.innerText;


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