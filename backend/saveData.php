<?php
require("koneksi.php");

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
  $tempNode1 = $data['tempNode1'];
  $tempNode2 = $data['tempNode2'];
  $tempNode3 = $data['tempNode3'];
  $tempNode4 = $data['tempNode4'];
  
  $humyNode1 = $data['humyNode1'];
  $lightNode1 = $data['lightNode1'];
  $kel_taNode1 = $data['kel_taNode1'];

  $humyNode2 = $data['humyNode2'];
  $lightNode2 = $data['lightNode2'];
  $kel_taNode2 = $data['kel_taNode2'];

  $humyNode3 = $data['humyNode3'];
  $lightNode3 = $data['lightNode3'];
  $kel_taNode3 = $data['kel_taNode3'];

  $humyNode4 = $data['humyNode4'];
  $lightNode4 = $data['lightNode4'];
  $kel_taNode4 = $data['kel_taNode4'];
  
    // Status untuk Node 1
  $statTempNode1 = ($tempNode1 < 18) ? "kurang" : (($tempNode1 <= 28) ? "ideal" : "tinggi");
  $statHumyNode1 = ($humyNode1 < 40) ? "kurang" : (($humyNode1 <= 60) ? "ideal" : "tinggi");
  $statLightNode1 = ($lightNode1 < 200) ? "kurang" : (($lightNode1 <= 1000) ? "ideal" : "tinggi");

  // Status untuk Node 2
  $statTempNode2 = ($tempNode2 < 18) ? "kurang" : (($tempNode2 <= 28) ? "ideal" : "tinggi");
  $statHumyNode2 = ($humyNode2 < 40) ? "kurang" : (($humyNode2 <= 60) ? "ideal" : "tinggi");
  $statLightNode2 = ($lightNode2 < 200) ? "kurang" : (($lightNode2 <= 1000) ? "ideal" : "tinggi");

  // Status untuk Node 3
  $statTempNode3 = ($tempNode3 < 18) ? "kurang" : (($tempNode3 <= 28) ? "ideal" : "tinggi");
  $statHumyNode3 = ($humyNode3 < 40) ? "kurang" : (($humyNode3 <= 60) ? "ideal" : "tinggi");
  $statLightNode3 = ($lightNode3 < 200) ? "kurang" : (($lightNode3 <= 1000) ? "ideal" : "tinggi");

  // Status untuk Node 4
  $statTempNode4 = ($tempNode4 < 18) ? "kurang" : (($tempNode4 <= 28) ? "ideal" : "tinggi");
  $statHumyNode4 = ($humyNode4 < 40) ? "kurang" : (($humyNode4 <= 60) ? "ideal" : "tinggi");
  $statLightNode4 = ($lightNode4 < 200) ? "kurang" : (($lightNode4 <= 1000) ? "ideal" : "tinggi");

  // Status kelembaban tanah untuk semua node
  $statKelTaNode1 = ($kel_taNode1 < 50) ? "kurang" : (($kel_taNode1 <= 80) ? "ideal" : "tinggi");
  $statKelTaNode2 = ($kel_taNode2 < 50) ? "kurang" : (($kel_taNode2 <= 80) ? "ideal" : "tinggi");
  $statKelTaNode3 = ($kel_taNode3 < 50) ? "kurang" : (($kel_taNode3 <= 80) ? "ideal" : "tinggi");
  $statKelTaNode4 = ($kel_taNode4 < 50) ? "kurang" : (($kel_taNode4 <= 80) ? "ideal" : "tinggi");

  // SQL queries to insert data into the database
  $sql1 = "INSERT INTO datanode1 (suhu, kelembapan, cahaya, ktanah, stat_suhu, stat_kelembapan, stat_cahaya, stat_ktanah, waktu) 
            VALUES ('$tempNode1', '$humyNode1', '$lightNode1', '$kel_taNode1', '$statTempNode1', '$statHumyNode1', '$statLightNode1', '$statKelTaNode1', NOW())";
  $sql2 = "INSERT INTO datanode2 (suhu, kelembapan, cahaya, ktanah, stat_suhu, stat_kelembapan, stat_cahaya, stat_ktanah, waktu) 
            VALUES ('$tempNode2', '$humyNode2', '$lightNode2', '$kel_taNode2', '$statTempNode2', '$statHumyNode2', '$statLightNode2', '$statKelTaNode2', NOW())";
  $sql3 = "INSERT INTO datanode3 (suhu, kelembapan, cahaya, ktanah, stat_suhu, stat_kelembapan, stat_cahaya, stat_ktanah, waktu) 
            VALUES ('$tempNode3', '$humyNode3', '$lightNode3', '$kel_taNode3', '$statTempNode3', '$statHumyNode3', '$statLightNode3', '$statKelTaNode3', NOW())";
  $sql4 = "INSERT INTO datanode4 (suhu, kelembapan, cahaya, ktanah, stat_suhu, stat_kelembapan, stat_cahaya, stat_ktanah, waktu) 
            VALUES ('$tempNode4', '$humyNode4', '$lightNode4', '$kel_taNode4', '$statTempNode4', '$statHumyNode4', '$statLightNode4', '$statKelTaNode4', NOW())";

            
  if ($koneksi->query($sql1) === TRUE) {
     echo "Data Node 1 Tersimpan!";
  } else {
     echo "Error: " . $koneksi->error;
  }
  if ($koneksi->query($sql2) === TRUE) {
     echo "Data Node 2 Tersimpan!";
  } else {
     echo "Error: " . $koneksi->error;
  }
  if ($koneksi->query($sql3) === TRUE) {
     echo "Data Node 3 Tersimpan!";
  } else {
     echo "Error: " . $koneksi->error;
  }
  if ($koneksi->query($sql4) === TRUE) {
     echo "Data Node 4 Tersimpan!";
  } else {
     echo "Error: " . $koneksi->error;
  }
    
} else {
  echo "Data tidak valid.";
}

$koneksi->close();
?>
