<?php
$page = basename($_SERVER['PHP_SELF']);
?>

<aside class="left-sidebar with-vertical">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img text-center">
            <i class="fas fa fa-leaf text-3xl mr-2" id="header-icon" style="color: #01c0c8;"></i>
            <span class="text-xl" style="color: #01c0c8">WSN</span>
            <span class="font-extrabold text-xl ml-1" style="color: #01c0c8;">Monitoring</span>

        </a>

        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
        </a>
    </div>

    <div class="scroll-sidebar" data-simplebar>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="mb-0">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg <?= $page == 'index.php' ? 'active' : '' ?>" href="/" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>

                        <span class="hide-menu ps-1">Node Sensor 1</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg <?= $page == 'node2.php' ? 'active' : '' ?>" href="node2.php" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Node Sensor 2</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg <?= $page == 'node3.php' ? 'active' : '' ?>" href="node3.php" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Node Sensor 3</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg <?= $page == 'node4.php' ? 'active' : '' ?>" href="node4.php" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:screencast-2-line-duotone" class="fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Node Sensor 4</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-bold-duotone" class="nav-small-cap-icon fs-5"></iconify-icon>
                    <span class="hide-menu">APP</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link primary-hover-bg <?= $page == 'pengaturan.php' ? 'active' : '' ?>" href="pengaturan.php" aria-expanded="false">
                        <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                            <iconify-icon icon="solar:user-circle-line-duotone" class="nav-small-cap-icon fs-6"></iconify-icon>
                        </span>
                        <span class="hide-menu ps-1">Pengaturan Akun</span>
                    </a>
                </li>
            </ul>

        </nav>
    </div>

    <div class=" fixed-profile mx-3 mt-3">
        <div class="card bg-primary-subtle mb-0 shadow-none">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between gap-3">
                    <a href="pengaturan.php" class="d-flex align-items-center gap-3">
                        <img src="<?= $photo_profile ?>" width="45" height="45" class="img-fluid rounded-circle" alt="" />
                        <div>
                            <h6 class="mb-1 heading-6">
                                <?= $name; ?>
                            </h6>
                            <p class="mb-0">
                                <?= $username; ?>
                            </p>
                        </div>
                    </a>
                    <a href="#" onclick="confirmLogout(event)" class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Logout">
                        <iconify-icon icon="solar:logout-line-duotone" class="fs-8"></iconify-icon>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</aside>