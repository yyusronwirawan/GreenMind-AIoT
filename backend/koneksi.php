<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  exit;
}

$koneksi = new mysqli("localhost", "forskri1_user_iot", "~#*iZd89EJ4B", "forskri1_db_iot");

if ($koneksi->connect_error) {
  die("Koneksi gagal");
}
