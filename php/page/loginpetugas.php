<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Aunction - Login Petugas</title>
    <link rel="stylesheet" href="../../assets/css/loginpetugas.css">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <script src="../../js/jquery.masknumber.js"></script>
    <script src="../../js/jquery.js"></script>
</head>

<body>
    <div class="logo">
        <img src="../../assets/img/LELANG4.png" alt="">
    </div>
    <div class="login-box">
        <h2>Login</h2>
        <form action="../action/aksi_login_petugas.php" method="POST" onsubmit="return validateForm()">
            <div class="user-box">
                <input type="text" name="username" id="angka" oninput="removeSymbols(this)">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" oninput="removeSymbols(this)">
                <label>Password</label>
            </div>
            <div class="user-box">
            </div>
            <div class="button-form">
                <button id="submit" class="submit" name="login">
                    Login
                </button>
                <div id="register">
                    <!-- Belum Punya Akun? -->
                    Login Sebagai User?
                    <!-- <a href="daftarpetugas.php">
                        SignUp
                    </a> -->
                    <a href="login.php">Kembali</a>
                </div>
            </div>
        </form>
    </div>


    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            var symbolRegex = /[!@#$%^&*(),.?"'=-:{}|<>]/;

            if (symbolRegex.test(username) || symbolRegex.test(password)) {
                alert("Username dan password tidak boleh mengandung simbol!");
                return false;
            }

            return true;
        }


        // function removeSymbols(input) {
        //     input.value = input.value.replace(/[^\w\s]/gi, '');
        // }

        // document.getElementById("username").addEventListener("input", function(e) {
        //     var input = e.target;
        //     input.value = input.value.replace(/[^\w\s]/gi, '');
        // });

        // document.getElementById("password").addEventListener("input", function(e) {
        //     var input = e.target;
        //     input.value = input.value.replace(/[^\w\s]/gi, '');
        // });


        // function removeSymbols(input) {
        //     input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
        // }

        document.addEventListener("DOMContentLoaded", function () {
            var inputHarga = document.getElementById("harga");
            inputHarga.addEventListener("input", function () {
                var value = this.value;
                value = value.replace(/[^\d]/g, "");
                this.value = value;
            });
        });
    </script>
</body>

</html>