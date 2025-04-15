<?php
include './includes/header.php';
include './function/process_profile.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<div class="page-wrapper">
    <div class="body-wrapper">
        <div class="container-fluid">
            <header class="topbar sticky-top">
                <?php include './includes/topbar.php'; ?>
            </header>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-6">
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" action="" enctype="multipart/form-data">

                                <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                                    <img src="<?= $photo_profile; ?>"
                                        alt="user-avatar"
                                        class="d-block rounded-circle avatar-lg me-3"
                                        width="100"
                                        height="100"
                                        id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Unggah Foto Baru</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="photo" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <?php if ($photo_profile !== './assets/images/profile/default.jpg'): ?>
                                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="deleteImage()">
                                                <i class="bx bx-trash d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Hapus</span>
                                            </button>
                                        <?php endif; ?>
                                        <div>Format JPG, GIF, atau PNG Maksimal 1MB</div>
                                        <?php if (isset($errors['photo'])): ?>
                                            <div class="text-danger"><?= $errors['photo'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                        <div class="card-body pt-4">
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? '') ?>" placeholder="Masukkan nama lengkap" autofocus />
                                    <?php if (isset($errors['name'])): ?>
                                        <div class="text-danger"><?= $errors['name'] ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" value="<?= htmlspecialchars($username ?? '') ?>" placeholder="Masukkan username" autocomplete="FALSE" />
                                    <?php if (isset($errors['username'])): ?>
                                        <div class="text-danger"><?= $errors['username'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="mt-12 d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                    <button class="btn btn-primary" type="submit" id="submitBtn">
                                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span id="buttonText">Simpan</span>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Perbarui Password</h5>
                        <div class="card-body">
                            <form id="form-update-password">
                                <div class="row g-6">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Masukkan password" autocomplete="off" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirmPassword" class="form-label">Password Konfirmasi</label>
                                        <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Konfirmasi password" autocomplete="off" />
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <input type="checkbox" id="showPassword"> <label for="showPassword">Tampilkan Password</label>
                                </div>

                                <div id="error-message" class="text-danger mt-3"></div>

                                <div class="mt-12 d-flex justify-content-end gap-3">
                                    <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                    <button type="button" class="btn btn-warning text-white me-3" id="update-password-btn">
                                        <span id="spinner-password" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        Perbarui
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php include './includes/theme.php'; ?>
</div>

<?php include './includes/footer.php'; ?>
<script>
    document.getElementById('upload').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('uploadedAvatar').setAttribute('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    function deleteImage() {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', './function/delete_image.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    document.getElementById('uploadedAvatar').setAttribute('src', './assets/images/profile/default.jpg');
                    toastr.success(
                        'Foto profil berhasil dihapus.',
                        'Berhasil',
                    );

                    window.location = '/pengaturan.php';
                } else {
                    toastr.error(
                        'Terjadi kesalahan saat menghapus foto profil.',
                        'Gagal',
                    );
                }
            }
        };
        xhr.send('delete=true');
    }

    $(document).ready(function() {
        $('#showPassword').change(function() {
            if ($(this).is(':checked')) {
                $('#password, #confirmPassword').attr('type', 'text');
            } else {
                $('#password, #confirmPassword').attr('type', 'password');
            }
        });

        $('#update-password-btn').click(function(e) {
            e.preventDefault();

            var password = $('#password').val();
            var confirmPassword = $('#confirmPassword').val();
            var $btn = $(this);
            var $spinner = $('#spinner-password');

            $spinner.removeClass('d-none');
            $btn.attr('disabled', 'true');
            $.ajax({
                url: './function/update_password.php',
                type: 'POST',
                data: {
                    password: password,
                    confirmPassword: confirmPassword
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        window.location.href = 'pengaturan.php';
                    } else {
                        $('#error-message').text(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                    $('#error-message').text('Terjadi kesalahan, silakan coba lagi.'); // Pesan error umum
                },
                complete: function() {
                    $spinner.addClass('d-none');
                    $btn.removeAttr('disabled');

                    toastr.success(
                        'Password berhasil diperbarui.',
                        'Berhasil',
                    );
                }
            });
        });
    });
</script>