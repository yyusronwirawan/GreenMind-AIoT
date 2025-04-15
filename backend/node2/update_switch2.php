<?php
// Koneksi ke database
require "../koneksi.php";

// Cek apakah ada data di tabel
$result = $koneksi->query("SELECT * FROM switch_node2");
if ($result->num_rows == 0) {
  // Jika tidak ada data, tambahkan baris pertama dengan nilai default
  $koneksi->query("INSERT INTO switch_node2 (switch1, switch2, switch3, switch4) VALUES (0, 0, 0, 0)");
}

// Ambil data dari request
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$status = $data['status'];

// Tentukan nama kolom berdasarkan ID switch
$column = "switch" . $id;

// Buat query SQL
$sql = "UPDATE switch_node2 SET $column = $status WHERE 1";

if ($koneksi->query($sql) === TRUE) {
  echo "sukses mengubah switch2";
} else {
  echo "Error: " . $koneksi->error;
}

// Tutup koneksi
$koneksi->close();
