<?php
require "../koneksi.php";

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
  $data1 = $data['data1'];
  $data2 = $data['data2'];
  $data3 = $data['data3'];
  $data4 = $data['data4'];
  $data5 = $data['data5'];
  $data6 = $data['data6'];
  $data7 = $data['data7'];
  $data8 = $data['data8'];

  $sql = "INSERT INTO datanode1 (suhu, kelembapan, cahaya, ktanah, stat_suhu, stat_kelembapan, stat_cahaya, stat_ktanah, waktu) 
            VALUES ('$data1', '$data2', '$data3', '$data4','$data5', '$data6', '$data7', '$data8',NOW())";

  if ($koneksi->query($sql) === TRUE) {
    echo "Data tersimpan!";
  } else {
    echo "Error: " . $koneksi->error;
  }
} else {
  echo "Data tidak valid.";
}

$koneksi->close();
