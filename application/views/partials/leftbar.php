<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RAMPCHECK <sup>KNG</sup></div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item <?php if ($this->uri->segment('1') == 'dashboard') {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('1') == 'rampcheck') {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?= base_url('rampcheck') ?>">
                    <i class="fas fa-fw fa-check-circle"></i>
                    <span>Rampcheck</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('1') == 'cetak') {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?= base_url('cetak/label') ?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Cetak Label</span></a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('1') == 'master') {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Master</span>
                </a>
                <div id="collapsePages" class="collapse <?php if ($this->uri->segment('1') == 'master') {
                                                            echo "show";
                                                        } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'bus' || $this->uri->segment('2') == 'detail_bus') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('master/bus') ?>">Bus</a>
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'sopir' || $this->uri->segment('2') == 'detail_sopir') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('master/sopir') ?>">Sopir</a>
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'pengguna') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('master/pengguna') ?>">Pengguna</a>
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'struktural') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('master/struktural') ?>">Struktural</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php if ($this->uri->segment('1') == 'laporan') {
                                    echo "active";
                                } ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file-pdf"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if ($this->uri->segment('1') == 'laporan') {
                                                            echo "show";
                                                        } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'rampcheck') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('laporan/rampcheck') ?>">Rampcheck</a>
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'sopir') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('laporan/sopir') ?>">Sopir</a>
                        <a class="collapse-item <?php if ($this->uri->segment('2') == 'bus') {
                                                    echo "active";
                                                } ?>" href="<?= base_url('laporan/bus') ?>">Bus</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item logout" onclick="logout()" href="#">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>