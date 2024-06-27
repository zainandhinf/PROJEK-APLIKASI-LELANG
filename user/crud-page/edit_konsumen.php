<?php
error_reporting(0);

require '../../php/koneksi.php';
require '../../php/upload.php';

session_start();

// function upload()
// {

//     $namaFile = $_FILES['gambar']['name'];
//     $ukuranFile = $_FILES['gambar']['size'];
//     $error = $_FILES['gambar']['error'];
//     $tmpName = $_FILES['gambar']['tmp_name'];

//     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar = explode('.', $namaFile);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));
//     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "<script>alert('Maaf...yang anda upload bukan gambar')</script>";
//     }

//     //cek jika ukurannya terlalu besar
//     if ($ukuranFile > 2000000) {
//         echo "<script>alert('Ukuran gambar terlalu besar!')</script>";
//         return false;
//     }

//     //lolos pengecekan gambar siap diupload
//     //generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;

//     move_uploaded_file($tmpName, '../../assets/img/' . $namaFileBaru);
//     echo "<script>alert('<?php var_dump($namaFile);

// }

if (isset($_SESSION['login'])) {

    $id_user = $_SESSION['id_user'];

    $query = "SELECT * FROM tkonsumen WHERE id_user='$id_user'";

    $a = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_array($a);

    // $d = $data['username'];
    // if (isset($_SESSION['submit'])) {
    //     $id = htmlspecialchars($_POST['id_user']);
    //     $nama_user = htmlspecialchars($_POST['nama_user']);
    //     $username = htmlspecialchars($_POST['username']);
    //     $password = htmlspecialchars($_POST['password']);
    //     $telp = htmlspecialchars($_POST['no_telepon']);
    //     $email = htmlspecialchars($_POST['email']);
    //     $gambarLama = htmlspecialchars($_POST['gambarlama']);

    //     if ($_FILES['gambar']['error'] === 4) {
    //         $gambar = $gambarLama;
    //     } else {
    //         $gambar = upload();
    //     }

    //     mysqli_query($koneksi, "UPDATE tkonsumen SET nama_lengkap='$nama_user',username='$username',password='$password',telp='$telp', email='$email', gambar='$gambar' WHERE id_user='$id'");


    // }


} else {

    header("location:../../php/page/login.php");

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile -
        <?= $data['username']; ?>
    </title>
    <link rel="stylesheet" href="../../assets/css/edit_konsumen.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="kembali">
        <a href="../konsumenpage.php">
            <i class="fa-solid fa-arrow-left"></i> KEMBALI</a>
    </div>
    <div class="user-profile">
        <div class="user-info">
            <h1>User Profile</h1>
            <div class="first">
                <div class="profile">
                    <img src="../../assets/img/<?php echo $data['gambar'] ?>" />
                </div>
                <h2>
                    <?= $data['username']; ?>
                </h2>
                <h4>
                    <?= $data['nama_lengkap']; ?>
                </h4>
            </div>
            <div class=" second">
                <p>Email =
                    <?= $data['email']; ?>
                </p>
                <p>Contact =
                    <?= $data['telp']; ?>
                </p>
            </div>
            <div class="third">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>

        <div class="user-detail">
            <h1>Edit Profile</h1>

            <form action="../action/aksi_edit_konsumen.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr class="edit-profile">
                        <td><input type="hidden" name="id_user" value="<?= $data['id_user']; ?>" />
                        </td>
                    </tr>
                    <tr class="edit-profile">
                        <td><input type="hidden" name="gambarlama" value="<?= $data['gambar']; ?>" />
                        </td>
                    </tr>
                    <tr class="edit-profile">
                        <td>Nama User</td>
                        <td><input type="text" name="nama_user" value="<?= $data['nama_lengkap']; ?>" /></td>
                    </tr>
                    <tr class="edit-profile">
                        <td>Username</td>
                        <td><input type="text" name="username" value="<?= $data['username']; ?>" /></td>
                    </tr>
                    <tr class="edit-profile">
                        <td>Password</td>
                        <td><input type="password" name="password" value="<?= $data['password']; ?>" /></td>
                    </tr>
                    <tr class="edit-profile">
                        <td>No Telepon</td>
                        <td><input type="text" name="no_telepon" value="<?= $data['telp']; ?>" /></td>
                    </tr>
                    <tr class="edit-profile">
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?= $data['email']; ?>" /></td>
                    </tr>
                    <tr class="edit-profile">
                        <td>Edit Foto Profil</td>
                        <p>(*disarankan gambar berasio 1:1)</p>
                        <td><input type="file" name="gambar" /></td>
                    </tr>
                    <tr class=" button">
                        <td></td>
                        <td><input type="submit" value="SIMPAN" name="submit"
                                onclick="return confirm('Yakin Ingin Mengedit Data?')"></td>
                    </tr>
                </table>
            </form>
            <!-- <div class="user-info-lelang">
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga Penawaran</th>
                        <th>Tanggal Lelang</th>
                    </tr>
                    <?php
                    include '../../php/koneksi.php';
                    $a2 = mysqli_query($koneksi, "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE id_user='$id_user'");
                    while ($data2 = mysqli_fetch_array($a2)) {
                        ?>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <?php echo $data2['nama_barang'] ?>
                            </td>
                            <td>
                                <?php echo $data2['harga_aktif'] ?>
                            </td>
                            <td>
                                <?php echo $data2['tgl_lelang'] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div> -->
        </div>

    </div>
</body>

</html>