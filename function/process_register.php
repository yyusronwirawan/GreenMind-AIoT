<?php
include './config/koneksi.php';
session_start();

$errors = [];
$input_data = ['name' => '', 'username' => '', 'password' => '', 'confirm_password' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $_SESSION['input_data'] = [
        'name' => $name,
        'username' => $username,
        'password' => '',
        'confirm_password' => ''
    ];

    $check_query = "SELECT * FROM users WHERE username = ?";
    $check_stmt = $koneksi->prepare($check_query);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $errors['username'] = "Username sudah terdaftar. Silakan pilih username lain.";
    }

    if (strlen($password) < 8) {
        $errors['password'] = 'Password harus minimal 8 karakter.';
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $errors['password'] = 'Password harus mengandung setidaknya satu huruf besar.';
    } elseif (!preg_match('/[a-z]/', $password)) {
        $errors['password'] = 'Password harus mengandung setidaknya satu huruf kecil.';
    } elseif (!preg_match('/[0-9]/', $password)) {
        $errors['password'] = 'Password harus mengandung setidaknya satu angka.';
    } elseif (!preg_match('/[\W]/', $password)) {
        $errors['password'] = 'Password harus mengandung setidaknya satu karakter khusus.';
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Password dan konfirmasi password tidak sama.';
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $insert_query = "INSERT INTO users (name, username, password) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($insert_query);
        $stmt->bind_param("sss", $name, $username, $hashed_password);

        if ($stmt->execute()) {
            unset($_SESSION['input_data']);
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.');</script>";
        }

        $stmt->close();
    }

    $check_stmt->close();
}
