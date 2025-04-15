<?php

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM users WHERE id = '$user_id'";
    $result = $koneksi->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $name = $row['name'];
        $username = $row['username'];
        $photo = 'public/uploads/' . $row['photo_profile'];
        if (file_exists($photo)) {
            $photo_profile = $photo;
        }
    }
}
