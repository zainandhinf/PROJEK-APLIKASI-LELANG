<?php
require '../../php/koneksi.php';

session_start();
if (isset($_SESSION['login'])) {

    $id_user = $_SESSION['id_user'];
    $id_lelang = htmlspecialchars($_POST['id_lelang']);

    $query1 = "SELECT * FROM tkonsumen WHERE id_user='$id_user'";
    $query2 = "SELECT * FROM `tlelang` INNER JOIN tbarang on tlelang.id_barang=tbarang.id_barang WHERE id_lelang='$id_lelang'";
    $query5 = "SELECT * FROM thistori_lelang WHERE id_lelang='$id_lelang' GROUP BY id_histori DESC";

    $result1 = mysqli_query($koneksi, $query1);
    $result2 = mysqli_query($koneksi, $query2);
    $result5 = mysqli_query($koneksi, $query5);

    $data1 = mysqli_fetch_array($result1);
    $data2 = mysqli_fetch_array($result2);
    $data5 = mysqli_fetch_array($result5);

    // var_dump($id_user);

    if ($data2['status'] == "dibuka") {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $penawaran = htmlspecialchars($_POST['penawaran']);
            $harga_aktif = $data2['harga_aktif'];
            $id_barang = $data2['id_barang'];
            $inputan = str_replace(".", "", $penawaran);

            // if ($data5['id_user'] == $id_user) {
            //     echo "<script>alert('Anda Sudah Pernah Menawar, Tidak Bisa Melakukan Penawaran Berturut-turut!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
            // } else {
                if (is_numeric($inputan)) {
                    if ($inputan > 99999999999) {
                        $inputan = 0;
                        echo "<script>alert('Gagal menambahkan penawaran!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
                    } else if ($inputan > $harga_aktif) {

                        $query3 = "INSERT INTO thistori_lelang (id_histori, id_lelang, id_barang, id_user, penawaran_harga) VALUES (null, '$id_lelang', '$id_barang', '$id_user', '$inputan')";
                        if (mysqli_query($koneksi, $query3)) {
                            $query4 = "SELECT MAX(penawaran_harga) FROM thistori_lelang WHERE id_lelang = '$id_lelang'";

                            if (mysqli_query($koneksi, $query4)) {
                                mysqli_query($koneksi, "UPDATE tlelang SET harga_aktif = '$inputan' WHERE id_lelang = '$id_lelang'");
                                mysqli_query($koneksi, "UPDATE tlelang SET id_user = '$id_user' WHERE id_lelang = '$id_lelang'");
                                echo "<script>alert('Penawaran berhasil dibuat!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
                            } else {
                                echo "<script>alert('Gagal update harga sekarang!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
                            }
                        }
                    } else {
                        echo "<script>alert('Penawaran harus lebih tinggi dari harga sekarang!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
                    }

                } else {
                    echo "<script>alert('Masukkan Penawaran Yang Valid!! Jangan Menginputkan Karakter Lain Selain Angka!!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
                }
            // }
        } else {
            echo "<script>alert('Gagal menambahkan penawaran!');window.location.href='../crud-page/preview.php?id_lelang=" . $id_lelang . "';</script>";
        }
    } else {
        echo "<script>alert('Lelang sudah ditutup!');window.location.href='../konsumenpage.php';</script>";
    }
} else {
    header("location:../../php/page/login.php");
}
?>