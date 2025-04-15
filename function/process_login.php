<?php
include './config/koneksi.php';
session_start();

if (isset($_COOKIE['remember_me']) && !isset($_SESSION['username'])) {
    $remember_token = $_COOKIE['remember_me'];

    $query = "SELECT * FROM users WHERE remember_token = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $remember_token);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['username'] = $row['username'];
        header('Location: /index.php');
        exit();
    }
}

$errors = [];
$input_data = ['username' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $input_data['username'] = $username;

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];

            if ($remember) {
                $remember_token = bin2hex(random_bytes(16));
                setcookie('remember_me', $remember_token, time() + (86400 * 30), "/", "", true, true);

                $update_query = "UPDATE users SET remember_token = ? WHERE username = ?";
                $update_stmt = $koneksi->prepare($update_query);
                $update_stmt->bind_param("ss", $remember_token, $username);
                $update_stmt->execute();
                $update_stmt->close();
            }

            header('Location: /index.php');
            exit();
        } else {
            $errors['username'] = "Username atau password salah!";
        }
    } else {
        $errors['username'] = "Username tidak terdaftar di database.";
    }

    $stmt->close();
}
