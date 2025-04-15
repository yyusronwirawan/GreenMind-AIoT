<?php
session_start();
include './config/koneksi.php';

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$name = $user['name'];
$username = $user['username'];
$photo_profile = $user['photo_profile'] ? './uploads/' . $user['photo_profile'] : './assets/images/profile/default.jpg';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-color-theme="Cyan_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link
        rel="shortcut icon"
        type="image/png"
        href="./assets/images/logos/favicon.ico" />
    <!-- Core Css -->
    <link rel="stylesheet" href="./assets/tailwind.css" />
    <link rel="stylesheet" href="./assets/css/styles.css" />
    <link href="./assets/fontawesome/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/sweetalert2.min.css" />
    <link href="./style/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/libs/sweetalert2/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

    <title>WSN Monitoring</title>

</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <img src="./assets/images/logos/loader.svg" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <?php include './includes/sidebar.php'; ?>
        <!--  Sidebar End -->