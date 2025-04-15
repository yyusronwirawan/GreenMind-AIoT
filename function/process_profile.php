<?php
include './config/koneksi.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$errors = [];
$success_message = '';
$name = $user['name'];
$username = $user['username'];
$photo_profile = $user['photo_profile'] ? './uploads/' . $user['photo_profile'] : './assets/images/profile/default.jpg';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    if (empty($name)) {
        $errors['name'] = 'Nama Lengkap wajib diisi.';
    }

    if (empty($username)) {
        $errors['username'] = 'Username wajib diisi.';
    }

    if (!empty($password) && $password !== $confirmPassword) {
        $errors['password'] = 'Password dan konfirmasi password tidak sama.';
    }

    if (!isset($errors['name']) && !isset($errors['username']) && !isset($errors['password'])) {
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['photo']['tmp_name'];
            $fileName = $_FILES['photo']['name'];
            $fileSize = $_FILES['photo']['size'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = ['jpg', 'gif', 'png'];
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = './uploads/';
                $dest_path = $uploadFileDir . $fileName;

                if ($fileSize > 1048576) {
                    $errors['photo'] = 'Ukuran file tidak boleh lebih dari 1MB.';
                }

                if (file_exists($photo_profile) && $photo_profile !== './assets/images/profile/default.jpg') {
                    unlink($photo_profile);
                }

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $photo_profile = $dest_path;
                    $success_message = 'Profil berhasil diperbarui!';

                    $updateQuery = "UPDATE users SET name = ?, username = ?, photo_profile = ? WHERE id = ?";
                    $stmt = $koneksi->prepare($updateQuery);
                    $stmt->bind_param("sssi", $name, $username, $fileName, $user_id);
                    $stmt->execute();
                } else {
                    $errors['photo'] = 'Gagal memindahkan file yang diupload.';
                }
            } else {
                $errors['photo'] = 'Tipe file tidak valid. Hanya JPG, GIF, atau PNG yang diizinkan.';
            }
        } else {
            $updateQuery = "UPDATE users SET name = ?, username = ? WHERE id = ?";
            $stmt = $koneksi->prepare($updateQuery);
            $stmt->bind_param("ssi", $name, $username, $user_id);
            $stmt->execute();
            $success_message = 'Profil berhasil diperbarui!';
        }
    }
}
