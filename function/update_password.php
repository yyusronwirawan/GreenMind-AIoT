<?php
include '../config/koneksi.php';
session_start();

header('Content-Type: application/json'); // Set header to JSON

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Anda belum login.']);
    exit();
}

$errors = []; // Array untuk menampung pesan error

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //sesuaikan dengan kebutuhan
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
    } elseif ($password !== $confirmPassword) {
        $errors['password'] = 'Password dan konfirmasi password tidak sama.';
    }

    // Jika tidak ada error, update password
    if (empty($errors)) {
        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("si", $new_password, $user_id);
        $stmt->execute();
        $stmt->close();

        echo json_encode(['status' => 'success', 'message' => 'Password berhasil diperbaharui.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $errors['password']]);
    }
}
exit();
