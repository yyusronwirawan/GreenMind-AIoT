<?php
include './function/process_register.php';
include './includes/auth/header.php';

$input_data = $_SESSION['input_data'] ?? ['name' => '', 'username' => '', 'password' => '', 'confirm_password' => ''];
?>

<div class="flex h-screen">
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center">
        <div class="max-w-lg w-full p-3">
            <h1 class="text-3xl font-semibold mb-3 text-black text-center">
                Selamat Datang 👋🏻
            </h1>
            <h1 class="text-sm font-semibold mb-3 text-gray-500 text-center">
                Daftar ke akun Anda 🚀
            </h1>
            <form action="" method="post" class="space-y-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300" id="name" name="name" value="<?= htmlspecialchars($input_data['name']) ?>" required autofocus placeholder="Masukkan nama Anda" />
                    <?php if (isset($errors['name'])): ?>
                        <span class="text-red-500 text-sm mt-1"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300" id="username" name="username" value="<?= htmlspecialchars($input_data['username']) ?>" required placeholder="Masukkan username Anda" />
                    <?php if (isset($errors['username'])): ?>
                        <span class="text-red-500 text-sm mt-1"><?= $errors['username'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-4 form-password-toggle">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                        <span class="input-group-text cursor-pointer" onclick="togglePassword('password', this)"><i class="bx bx-hide"></i></span>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <span class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="mb-4 form-password-toggle">
                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="confirm_password" class="form-control border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300" name="confirm_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="confirm_password" required />
                        <span class="input-group-text cursor-pointer" onclick="togglePassword('confirm_password', this)"><i class="bx bx-hide"></i></span>
                    </div>
                    <?php if (isset($errors['confirm_password'])): ?>
                        <span class="text-red-500 text-sm mt-1"><?= $errors['confirm_password'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="my-6">
                    <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                        <label class="form-check-label text-dark" for="terms-conditions">
                            Saya setuju dengan
                            <a href="javascript:void(0);" style="color: #01c0c8;">Syarat & Ketentuan</a>
                        </label>
                    </div>
                </div>
                <div class="mb-6">
                    <button class="w-full text-white p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300" type="submit" id="submitBtn" style="background-color: #01c0c8">
                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span id="buttonText">Register</span>
                    </button>
                </div>
            </form>

            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>
                    Sudah memiliki akun?
                    <a href="login.php" class="text-black hover:underline">Masuk</a>
                </p>
            </div>
        </div>
    </div>

    <?php include './includes/auth/swiper.php'; ?>
</div>

<?php include './includes/auth/footer.php'; ?>

<script>
// Function to toggle password visibility
function togglePassword(inputId, iconElement) {
    var input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        iconElement.innerHTML = '<i class="bx bx-show"></i>';
    } else {
        input.type = "password";
        iconElement.innerHTML = '<i class="bx bx-hide"></i>';
    }
}
</script>
