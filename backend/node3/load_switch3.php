<?php
// Koneksi ke database
header('Content-Type: application/json'); // Menetapkan header konten sebagai JSON

require "../koneksi.php";

// Cek koneksi
if ($koneksi->connect_error) {
  echo json_encode(['error' => 'Koneksi gagal: ' . $koneksi->connect_error]);
  exit();
}

// Ambil data dari database
$sql = "SELECT switch1, switch2, switch3, switch4 FROM switch_node3 WHERE 1 LIMIT 1";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
  // Ambil data sebagai array
  $row = $result->fetch_assoc();
  echo json_encode($row);
} else {
  echo json_encode(['switch1' => 0, 'switch2' => 0, 'switch3' => 0, 'switch4' => 0]);
}

// Tutup koneksi
$koneksi->close();
