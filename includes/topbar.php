<div class="with-vertical">
    <nav class="navbar navbar-expand-lg p-0">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <div class="nav-icon-hover-bg rounded-circle">
                        <iconify-icon icon="solar:list-bold-duotone" class="fs-7 text-dark"></iconify-icon>
                        
                    </div>
                </a>
            </li>
        </ul>

        <div class="d-none d-lg-flex flex-grow-1 align-items-center justify-content-center w-full">
            <i class="fas fa fa-leaf text-3xl mr-2" id="header-icon" style="color: #01c0c8;"></i>
            <span class="text-xl" style="color: #01c0c8;">Greenhouse</span>
            <span class="font-extrabold text-xl ml-1" style="color: #01c0c8;">Monitoring</span>
        </div>

        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </a>

        <div class="collapse navbar-collapse justify-content-end  mr-12" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link theme-switch nav-icon-hover moon dark-layout" href="javascript:void(0)">
                            <iconify-icon icon="solar:moon-line-duotone" class="moon fs-7"></iconify-icon>
                        </a>
                        <a class="nav-link theme-switch nav-icon-hover sun light-layout" href="javascript:void(0)">
                            <iconify-icon icon="solar:sun-2-line-duotone" class="sun fs-7"></iconify-icon>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link position-relative ms-6" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center flex-shrink-0">
                                <div class="user-profile me-sm-3 me-2">
                                    <img src="<?= $photo_profile ?>" width="45" class="rounded-circle" alt="">
                                </div>
                                <span class="d-sm-none d-block">
                                    <iconify-icon icon="solar:alt-arrow-down-line-duotone"></iconify-icon>
                                </span>

                                <div class="d-none d-sm-block">
                                    <h6 class="fw-bold fs-4 mb-1 profile-name">
                                        <?= $name; ?>
                                    </h6>
                                    <p class="fs-3 lh-base mb-0 profile-subtext">
                                        <?= $username; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="d-flex align-items-center justify-content-between pt-3 px-7">
                                    <h3 class="mb-0 fs-5">Profil User</h3>
                                    <button type="button" class="border-0 bg-transparent" aria-label="Close">
                                        <iconify-icon icon="solar:close-circle-line-duotone" class="fs-7 text-muted"></iconify-icon>
                                    </button>
                                </div>

                                <div class="d-flex align-items-center mx-7 py-9 border-bottom">
                                    <img src="<?= $photo_profile ?>" alt="user" width="90" class="rounded-circle" />
                                    <div class="ms-4">
                                        <h4 class="mb-0 fs-5 fw-normal"><?= $name ?></h4>
                                        <span class="text-muted"><?= $username ?></span>
                                    </div>
                                </div>

                                <div class="message-body">
                                    <a href="pengaturan.php" class="dropdown-item px-7 d-flex align-items-center py-6">
                                        <span class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                            <iconify-icon icon="solar:settings-line-duotone" class="fs-7"></iconify-icon>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                Pengaturan
                                            </h5>
                                            <span class="fs-3 text-nowrap d-block fw-normal mt-1 text-muted">Setting Akun</span>
                                        </div>
                                    </a>
                                </div>

                                <div class="py-6 px-7 mb-1">
                                    <a href="javascript:;" class="btn btn-primary w-100" onclick="confirmLogout(event)">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script>
    //theme-switch light-dark
    const moon = document.querySelector('.moon');
    const sun = document.querySelector('.sun');

    moon.addEventListener('click', () => {
        sessionStorage.removeItem('theme');

        sessionStorage.setItem('theme', 'dark');
    });

    sun.addEventListener('click', () => {
        sessionStorage.removeItem('theme');

        sessionStorage.setItem('theme', 'light');
    });
</script>