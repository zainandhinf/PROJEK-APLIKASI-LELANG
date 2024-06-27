<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/img/LELANG6.png">
    <title>Document</title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }

        body {}

        p {
            font-size: 8px;
        }

        .head {
            display: flex;
        }

        .head img {
            width: 75px;
            height: auto;
        }

        .head h4 {
            /* margin-top: 30px; */
            margin-left: 100px;
        }

        .no_trans {
            position: absolute;
            left: 470px;
            top: 50px;
        }

        .lines {
            display: inline-block;
            width: 605px;
            height: 1.5px;
            background-color: black;
        }

        .card {
            display: flex;
            height: 150px;
        }

        .card-title {
            margin-left: 20px;
        }

        .input-rincian {
            margin-left: 0px;
        }

        .card-payment {
            background-color: #fff;
            /* padding: 10px; */
            width: 585px;
            margin-bottom: 15px;
        }

        .card-header {
            border-bottom: 1px solid #ccc;
            /* padding-bottom: 5px; */
            /* margin-bottom: 10px; */
        }

        .card-header h2 {
            font-size: 10px;
            font-weight: 300;
            color: #333;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            /* margin-bottom: 5px; */
        }

        .payment-row p:first-child {
            font-weight: 300;
        }

        .total {
            /* margin-top: 10px; */
            border-top: 1px solid #ccc;
            /* padding-top: 5px; */
        }

        .total p:first-child {
            /* font-weight: 350; */
            font-size: 9px;
        }

        .total p:last-child {
            font-weight: 350;
            font-size: 19px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="head">
        <img src="../../assets/img/LELANG4.png" alt="">
        <h4>Bukti Transaksi</h4>
        <h6 class="no_trans">No Transaksi : 202012120001</h6>
    </div>
    <span class="lines"></span>
    <span class="lines"></span>
    <h4 class="card-title">Detail Penawaran</h4>
    <div class="card">
        <div class="description">
            <h6>
                Nama Barang:
                SmartPhone
            </h6>
            <h6>Tanggal Penawaran:
                20-20-2020
            </h6>
            <h6>
                Harga Awal:
                999.999.999
            </h6>
            <h6>Penawaran Anda:
                999.999.999
            </h6>
            <p>
                Deskripsi Barang:
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa repellendus ab reprehenderit, quae ea
                numquam corporis, dolorum earum, dolorem architecto aperiam. Praesentium, excepturi impedit! Culpa et
                corporis in autem itaque.
            </p>
        </div>
    </div>
    <br>
    <br>
    <span class="lines"></span>
    <h4 class="card-title">Data Pengiriman</h4>
    <div class="input-rincian">
        <div class="card-payment">
            <div class="card-header">
                <h6>Rincian Pengiriman</h6>
            </div>
            <div class="card-body">
                <div class="payment-row" id="nama-lengkap-row">
                    <p>Nama Lengkap</p>
                    <p>Zainandhi Nur Fathurrohman</p>
                </div>
                <div class="payment-row" id="alamat-pengiriman-row">
                    <p>Alamat Pengiriman</p>
                    <p>Kp.Tangkil RT 06 RW 07 No.36 Kel.Cigugur Tengah Kec.Cimahi Tengah Kota Cimahi 40522</p>
                </div>
                <div class="payment-row" id="opsi-pengiriman-row">
                    <p>Opsi Pengiriman</p>
                    <p>Regular</p>
                </div>
                <div class="payment-row" id="metode-pembayaran-row">
                    <p>Metode Pembayaran</p>
                    <p>Kredit</p>
                </div>
            </div>
        </div>
        <span class="lines"></span>
        <h4 class="card-title">Rincian</h1>
            <div class="card-payment">
                <div class="card-header">
                    <h6>Rincian Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="payment-row" id="subtotal">
                        <p>Subtotal</p>
                        <p id="sub_total">Rp
                            999.999.999
                        </p>
                        <input type="hidden" name="subtotal" id="input-subtotal">
                    </div>
                    <div class="payment-row" id="biaya-pengiriman">
                        <p>Biaya Pengiriman</p>
                        <p id="biaya_kirim">Rp 999.999.999</p>
                        <input type="hidden" name="biaya_kirim" id="input-kirim">
                    </div>
                    <div class="payment-row">
                        <p>Pajak</p>
                        <p id="pajak">Rp 5.000</p>
                        <input type="hidden" name="pajak" id="input-pajak">
                    </div>
                    <div class="payment-row total" id="total-pembayaran">
                        <p>Total Pembayaran</p>
                        <p>Rp 999.999.999</p>
                    </div>
                </div>
            </div>
    </div>
</body>

</html>