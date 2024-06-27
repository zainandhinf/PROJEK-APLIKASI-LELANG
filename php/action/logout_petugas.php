<?php
session_start();

session_destroy();

header("location:../page/loginpetugas.php?pesan=logout");
?>