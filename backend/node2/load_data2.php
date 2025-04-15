<?php
require "../koneksi.php";

echo json_encode($koneksi->query("SELECT * FROM datanode2 ORDER BY id DESC LIMIT 1")->fetch_assoc());

$koneksi->close();
