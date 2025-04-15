<?php
include './includes/auth/header.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

header("refresh:5;url=login.php");
?>

<script>
    var timeleft = 5;
    var downloadTimer = setInterval(function() {
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
        }
        document.getElementById("countdown").textContent = timeleft;
        timeleft -= 1;
    }, 1000);
</script>

<link href="assets/css/logout.css" rel="stylesheet" type="text/css">

<div class="card px-sm-6 px-0 relative md:mx-auto mx-6 w-full flex flex-col justify-center items-center bg-white rounded-lg p-6 z-50 h-screen">
    <div class="text-center mb-7">
        <a href="/" class="grow block mb-8 text-xl font-bold">
            <i class="fas fa-cloud-sun text-3xl mr-2" id="header-icon" style="color: #01c0c8;"></i>
            <span class="text-xl" style="color: #01c0c8">WSN</span>
            <span class="font-extrabold text-xl ml-1" style="color: #01c0c8;">Monitoring</span>
        </a>

        <div class="text-center">
            <h3 class="text-2xl font-semibold text-dark mb-3">Sampai jumpa lagi !</h3>
            <p class="text-base font-medium text-light">Anda telah berhasil keluar.</p>
        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="w-44 h-44 mb-7" viewBox="0 0 328 327" fill="none">
        <circle class="fill-primary/10" r="163.125" transform="matrix(-1 0 0 1 163.942 163.854)" />
        <path class="stroke-primary fill-primary/40" d="M146.715 218.157L100.443 171.885C97.0527 167.964 95.4424 164.144 95.4424 160.409C95.4424 156.683 97.0452 152.872 100.42 148.961C104.331 145.587 108.142 143.984 111.868 143.984C115.603 143.984 119.423 145.594 123.343 148.984L146.012 171.653L146.724 172.365L147.431 171.648L204.137 114.131C208.057 110.742 211.876 109.133 215.61 109.133C219.337 109.133 223.148 110.736 227.06 114.112C230.718 118.308 232.441 122.253 232.441 125.964C232.441 129.674 230.717 133.352 227.06 137.008L227.057 137.012L146.715 218.157Z" stroke-width="2" />
    </svg>
    <p class="text-center text-light">Anda akan diarahkan ke halaman login di <span id="countdown">5</span> seconds</p>
    <p class="shrink text-light text-center">Sudah memiliki akun?<a class='text-dark font-semibold ms-1' href='login.php'><b>Masuk</b></a></p>
</div>
<?php include './includes/auth/footer.php'; ?>