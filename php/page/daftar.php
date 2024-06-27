<?php
include '../action/aksi_daftar.php'
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Aunction - SignUp</title>
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
</head>

<body>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
        <defs>
            <linearGradient id="bg">
                <stop offset="0%" style="stop-color:#1F8A70"></stop>
                <stop offset="50%" style="stop-color:#1F8A70"></stop>
                <stop offset="100%" style="stop-color:#1F8A70"></stop>
            </linearGradient>
            <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
    s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>
        <g>
            <use xlink:href='#wave' opacity=".3">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                    calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".6">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                    calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacty=".9">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                    calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
        </g>
    </svg>
    <div class="login-box">
        <h2 class="signup">SignUp</h2>
        <form action="daftar.php" method="POST">
            <div class="user-box">
                <input type="text" name="nama">
                <label>Nama Lengkap</label>
            </div>
            <div class="user-box">
                <input type="text" name="username">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="text" name="email">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password">
                <label>Password</label>
            </div>
            <div class="user-box">
                <input type="text" name="notlp">
                <label>No Telepon</label>
            </div>
            <?= $message ?>
            <div class="button-form">
                <button id="submit" name="signup">
                    SignUp
                </button>
                <div id="register">
                    Sudah Punya Akun?
                    <a href="login.php">
                        Login
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>