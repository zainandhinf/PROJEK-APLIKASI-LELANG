<?php
include 'koneksi.php';

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        die;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Maaf...yang anda upload bukan gambar')</script>";
        die;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 2000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!')</script>";
        die;
    }

    //lolos pengecekan gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    $_SESSION['z'] = $namaFileBaru;

    move_uploaded_file($tmpName, '../../assets/img/' . $namaFileBaru);

    return $namaFileBaru;
}




function upload2()
{

    $namaFile2 = $_FILES['gambar2']['name'];
    $ukuranFile2 = $_FILES['gambar2']['size'];
    $error2 = $_FILES['gambar2']['error'];
    $tmpName2 = $_FILES['gambar2']['tmp_name'];

    if ($error2 === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        die;
    }

    $ekstensiGambarValid2 = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar2 = explode('.', $namaFile2);
    $ekstensiGambar2 = strtolower(end($ekstensiGambar2));
    if (!in_array($ekstensiGambar2, $ekstensiGambarValid2)) {
        echo "<script>alert('Maaf...yang anda upload bukan gambar')</script>";
        die;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile2 > 2000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!')</script>";
        die;
    }

    //lolos pengecekan gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru2 = uniqid();
    $namaFileBaru2 .= '.';
    $namaFileBaru2 .= $ekstensiGambar2;
    $_SESSION['z'] = $namaFileBaru2;

    move_uploaded_file($tmpName2, '../../assets/img/' . $namaFileBaru2);

    return $namaFileBaru2;
}




function upload3()
{

    $namaFile3 = $_FILES['gambar3']['name'];
    $ukuranFile3 = $_FILES['gambar3']['size'];
    $error3 = $_FILES['gambar3']['error'];
    $tmpName3 = $_FILES['gambar3']['tmp_name'];

    if ($error3 === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
        die;
    }

    $ekstensiGambarValid3 = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar3 = explode('.', $namaFile3);
    $ekstensiGambar3 = strtolower(end($ekstensiGambar3));
    if (!in_array($ekstensiGambar3, $ekstensiGambarValid3)) {
        echo "<script>alert('Maaf...yang anda upload bukan gambar')</script>";
        die;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile3 > 2000000) {
        echo "<script>alert('Ukuran gambar terlalu besar!')</script>";
        die;
    }

    //lolos pengecekan gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru3 = uniqid();
    $namaFileBaru3 .= '.';
    $namaFileBaru3 .= $ekstensiGambar3;
    $_SESSION['z'] = $namaFileBaru3;

    move_uploaded_file($tmpName3, '../../assets/img/' . $namaFileBaru3);

    return $namaFileBaru3;
}



// function uploadFoto($namaFile, $ukuranMax, $jenisFile)
// {
//     $namaSementara = $_FILES[$namaFile]['tmp_name'];
//     $_SESSION['z'] = $namaSementara;
//     $namaFileBaru = uniqid() . '.' . pathinfo($_FILES[$namaFile]['name'], PATHINFO_EXTENSION);
//     $ukuranFile = $_FILES[$namaFile]['size'];
//     $fileValid = true;

//     // Cek apakah file yang diupload benar-benar foto
//     // $check = getimagesize($namaSementara);
//     // if ($check === false) {
//     //     echo "File yang diupload bukan foto.";
//     //     $fileValid = false;
//     // }

//     // Cek apakah ukuran file tidak melebihi batas maksimum
//     if ($ukuranFile > $ukuranMax) {
//         echo "Ukuran file terlalu besar. Maksimal $ukuranMax byte.";
//         $fileValid = false;
//     }

//     // Cek apakah jenis file yang diupload sesuai dengan yang diizinkan
//     if (!in_array($jenisFile, ['jpg', 'jpeg', 'png', 'gif'])) {
//         echo "Jenis file yang diupload tidak diizinkan. Hanya file dengan ekstensi .jpg, .jpeg, .png, atau .gif yang diizinkan.";
//         $fileValid = false;
//     }

//     // Jika file lolos pengecekan, pindahkan file ke folder tujuan dan kembalikan nama file baru
//     if ($fileValid) {
//         move_uploaded_file($namaSementara, 'assets/img/' . $namaFileBaru);
//         return $namaFileBaru;
//     } else {
//         return false;
//     }
// }

?>