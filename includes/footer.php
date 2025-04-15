<div class="dark-transparent sidebartoggler"></div>
</div>
<script src="./assets/js/vendor.min.js"></script>
<!-- Import Js Files -->
<script src="./assets/sweetalert2.min.js"></script>
<script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="./assets/js/theme/app.init.js"></script>
<script src="./assets/js/theme/theme.js"></script>
<script src="./assets/js/theme/app.min.js"></script>
<script src="./assets/js/theme/sidebarmenu.js"></script>
<script src="./assets/js/theme/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>
<script src="./assets/js/toastr-init.js"></script>
<script src="./assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>

<script>
    function showGreeting() {
        var today = new Date();
        var curHr = today.getHours();
        var greeting = null;
        if (curHr < 12) {
            greeting = 'Selamat Pagi';
        } else if (curHr < 18) {
            greeting = 'Selamat Siang';
        } else {
            greeting = 'Selamat Malam';
        }

        toastr.info(
            'Selamat Datang di WSN Monitoring',
            greeting + ', <?php echo $name; ?>'
        );
    }

    if (!sessionStorage.getItem('greetingShown')) {
        showGreeting();
        sessionStorage.setItem('greetingShown', 'true');
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const toastStatus = localStorage.getItem('toastStatus');

        if (toastStatus === 'success') {
            toastr.success('Data berhasil diperbarui.', 'Berhasil');
            localStorage.removeItem('toastStatus');
        }

        const form = document.querySelector('form');
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('spinner');
        const buttonText = document.getElementById('buttonText');

        if (form)
            form.addEventListener('submit', function() {
                spinner.classList.remove('d-none');
                buttonText.classList.add('d-none');

                submitBtn.setAttribute('disabled', 'true');

                localStorage.setItem('toastStatus', 'success');
            });

    });

    function confirmLogout(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Apa kamu yakin?',
            text: 'Anda akan keluar!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log out!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                sessionStorage.removeItem('greetingShown');
                window.location.href = 'function/logout.php';
            }
        });
    }
</script>

</body>

</html>