<?php
// session_start();

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
    <title>Tambah Petugas - Administrator</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/test.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <style>
    select[name="id_level"] {
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

    select[name="id_level"] option {
        font-size: 14px;
        color: #333;
    }

    select[name="id_level"] option[value="- Pilih -"] {
        font-style: italic;
        color: #999;
    }

    select[name="id_level"] option[selected] {
        font-weight: bold;
    }

    select[name="id_level"] option:not([selected]) {
        font-weight: normal;
    }
    </style>
    <script src="../../js/sweetalert2.all.min.js"></script>
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

            <br />
            <h3>INPUT DATA PETUGAS</h3>
            <form method="POST" action="../action/aksi_tambah_petugas.php" enctype="multipart/form-data">
                <div class="input">
                    <div class="input-name">
                        <p>Nama Petugas</p>
                        <input type="text" name="nama_petugas" value="<?php
                        echo isset($_SESSION['nama_petugas']) ? $_SESSION['nama_petugas'] : ''; ?>" />
                    </div>
                    <!-- <?php
                    var_dump($_SESSION['nama_petugas']);
                    ?> -->
                    <div class="input-name">
                        <p>Username</p>
                        <input type="text" name="username"
                            value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" />
                    </div>
                    <div class="input-name">
                        <p>Password</p>
                        <input type="password" name="password" />
                    </div>
                    <div class="input-name">
                        <p>Id Level</p>
                        <!-- <input type="text" name="id_level"> -->
                        <select name="id_level" id="">
                            <option value="">- Pilih -</option>
                            <option value="1"
                                <?php echo isset($_SESSION['id_level']) && $_SESSION['id_level'] == '1' ? 'selected' : ''; ?>>
                                1(Admin)</option>
                            <option value="2"
                                <?php echo isset($_SESSION['id_level']) && $_SESSION['id_level'] == '2' ? 'selected' : ''; ?>>
                                2(Petugas)</option>
                        </select>
                    </div>
                    <div class="input-name">
                        <p>Tambah Foto Profil (*disarankan gambar berasio 1:1)</p>
                        <img src="" alt="" id="img-prf">
                        <input type="file" name="gambar" id="img-input" />
                    </div>
                </div>
                <br>
                <div class="submit petugas">
                    <a href="../page/datapetugas.php">KEMBALI</a>
                    <input type="submit" value="SIMPAN" name="submit" id="submit-btn"
                        onclick="return confirm('Yakin Ingin Menambahkan Data?')">
                </div>
            </form>
        </main>
</body>


<!-- <script>
    // Ambil tombol submit form
    const submitBtn = document.getElementById('submit-btn');

    // Tambahkan event listener untuk saat tombol submit ditekan
    submitBtn.addEventListener('click', function (e) {
        // Hentikan event default untuk mencegah form submit langsung
        e.preventDefault();

        // Tampilkan dialog konfirmasi
        if (confirm('Anda yakin ingin memasukkan data ke database?')) {
            // Jika pengguna mengklik "OK", submit form secara asinkron menggunakan AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'tambah_petugas.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    // Tampilkan pesan berhasil memasukkan data ke database
                    alert('Data berhasil dimasukkan ke database.');
                }
            };
            xhr.send(new FormData(document.querySelector('form')));
        } else {
            // Jika pengguna mengklik "Batal", jangan lakukan apa-apa
            return;
        }
    });
</script> -->

<script>
const image = document.querySelector("#img-prf");
input = document.querySelector("#img-input");

input.addEventListener("change", () => {
    image.src = URL.createObjectURL(input.files[0]);
});
</script>

</html>