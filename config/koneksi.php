<?php

$host = "localhost";
$user = "forskri1_user_iot";
$pass = "~#*iZd89EJ4B";
$db = "forskri1_db_iot";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
