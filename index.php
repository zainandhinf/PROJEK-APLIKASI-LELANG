<?php

session_start();

// if (!isset($_SESSION["login"])) {

//     $d = "login";
//     $page = "login.php";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Count</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="head">
        <div class="head-1">
            <img src="assets/img/LELANG.png" alt="" class="logo">
            <div class="welcome">
                <h1>Selamat Datang Di Website Lelang The Aunction</h1>
            </div>
        </div>
        <input class="search" placeholder="Search">
    </div>

    <div id="navbar-index">
        <div id="navbar-1-index">
            <h3><a href="#" id="a-navbar-index">Home</a></h3>
            <h3><a href="#" id="a-navbar-index">About</a></h3>
            <h3><a href="#" id="a-navbar-index">Contact</a></h3>
        </div>
        <div id="navbar-2-index">
            <h3 id="login-index">
                <a href="php/page/login.php" id="a-navbar-index" name="login ">
                    <i class="fa-sharp fa-solid fa-right-to-bracket"></i>
                    Login/SignUp
                </a>
            </h3>
        </div>
    </div>

    <div class="content">

    </div>

    <div class="footer">
        <div class="footer-bottom">
            <p align="center">&copy; 2023 The Aunction. All rights reserved.</p>
            <p align="center">Designed by Zainandhi Nur Fathurrohman</p>
        </div>
    </div>
</body>

</html>