<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman - Administrator</title>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/test.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1>
                <img src="assets/img/LELANG6.png" alt="" width="70px" height="70px">
                <h2>The Aunction</h2>
            </h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href=""><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datapegawai.php"><span class="las la-users"></span>
                        <span>Data Pegawai</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="datakonsumen.php" class="active"><span class="las la-users"></span>
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

                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here" />
            </div>

            <div class="user-wrapper">
                <img src="assets/img/akun.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Zainandhi Nur Fathurrohman</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>
            <br>
            <br>
            <h3>EDIT DATA KONSUMEN </h3>
            <h5 class="warning">PERINGATAN!! JANGAN UBAH ID</h5>
            <?php
            include 'koneksi.php';
            $id = $_GET['id_user'];
            $data = mysqli_query($koneksi, "select * from tkonsumen where id_user='$id'");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <form method="POST" action="aksi_edit_konsumen.php">
                    <div class="input">
                        <div class="input-name">
                            <p>Id User</p>
                            <input type="text" name="id_user" value="<?php echo $d['id_user']; ?>" readonly /></td>
                        </div>
                        <div class="input-name">
                            <p>Nama User</p>
                            <input type="text" name="nama_user" value="<?php echo $d['nama_lengkap']; ?>" /></td>
                        </div>
                        <div class="input-name">
                            <p>Username</p>
                            <input type="text" name="username" value="<?php echo $d['username']; ?>" /></>
                        </div>
                        <div class="input-name">
                            <p>Password</p>
                            <input type="password" name="password" value="<?php echo $d['password']; ?>" /></td>
                        </div>
                        <div class="input-name">
                            <p>No Telepon</p>
                            <input type="text" name="no_telepon" value="<?php echo $d['telp']; ?>" /></td>
                        </div>
                        <div class="input-name">
                            <p>Email</p>
                            <input type="text" name="email" value="<?php echo $d['email']; ?>" /></t>
                        </div>
                    </div>
                    <div class="submit petugas">
                        <a href="datakonsumen.php">KEMBALI</a>
                        <input type="submit" value="SIMPAN" name="submit"
                            onclick="return confirm('Yakin Ingin Mengedit Data?')"></td>
                    </div>
                </form>
                <?php
            }
            ?>
        </main>
</body>

</html>