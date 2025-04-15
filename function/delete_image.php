<?php
session_start();
include '../config/koneksi.php';

$response = ['status' => 'error', 'message' => 'Gagal menghapus gambar.'];

if (isset($_SESSION['user_id']) && isset($_POST['delete'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user data
    $query = "SELECT photo_profile FROM users WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['photo_profile']) {
        $filePath = '../uploads/' . $user['photo_profile'];

        if (file_exists($filePath)) {
            unlink($filePath);

            $updateQuery = "UPDATE users SET photo_profile = null WHERE id = ?";
            $stmt = $koneksi->prepare($updateQuery);
            $stmt->bind_param("i", $user_id);
            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Foto profil berhasil dihapus.';
            }
        }
    }
}

echo json_encode($response);
exit();
