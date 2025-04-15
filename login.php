<?php
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

include './function/process_login.php';
include './includes/auth/header.php';
?>

<!-- component -->
<div class="flex h-screen">
    <div class="w-full bg-white lg:w-1/2 flex items-center justify-center">
        <div class="max-w-lg w-full p-3">
            <h1 class="text-3xl font-semibold mb-3 text-black text-center">Selamat Datang 👋🏻</h1>
            <h1 class="text-sm font-semibold mb-3 text-gray-500 text-center">
                Silahkan login untuk masuk ke WSN Monitoring. 🚀
            </h1>
            <form class="space-y-4" action="" method="POST">
                <div class="mb-6">
                    <label for="username" class="form-label">Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Masukkan Username Anda"
                        value="<?= htmlspecialchars($input_data['username'] ?? '') ?>"
                        required />
                    <?php if (isset($errors['username'])): ?>
                        <div class="text-red-500 text-sm mt-1"><?= $errors['username'] ?></div>
                    <?php endif; ?>
                </div>
                
                <div class="mb-6 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                            required />
                        <span class="input-group-text cursor-pointer" id="togglePassword">
                            <i class="bx bx-hide"></i>
                        </span>
                    </div>
                    <?php if (isset($errors['password'])): ?>
                        <div class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input
                            class="form-check-input primary"
                            type="checkbox"
                            id="remember"
                            name="remember" />
                        <label class="form-check-label text-dark" for="remember">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit" class="w-full text-white p-2 rounded-md  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 transition-colors duration-300" id="submitBtn" style="background-color: #01c0c8">
                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span id="buttonText">Masuk</span>
                    </button>
                </div>
            </form>

            <div class="mt-4 text-sm text-gray-600 text-center">
                <p>
                     Belum punya akun?
                    <a href="register.php" class="text-black hover:underline">Buat akun</a>
                </p>
            </div>
        </div>
    </div>

    <?php include './includes/auth/swiper.php'; ?>
</div>

<?php include './includes/auth/footer.php'; ?>

<script>
    // JavaScript untuk toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#password');
    
    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        // Toggle the eye icon
        this.querySelector('i').classList.toggle('bx-hide');
        this.querySelector('i').classList.toggle('bx-show');
    });
</script>
