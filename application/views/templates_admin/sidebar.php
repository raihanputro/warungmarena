<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard_admin') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class=" sidebar-brand-text mx-3">Admin
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard_admin') ?>">
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/data_barang') ?>">
                    <span>Data Barang</span></a>
            </li>
            
             <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/kategori') ?>">
                    <span>Kategori</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/invoice') ?>">
                    <span>Invoice</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/slider') ?>">
                    <span>Slider</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!--<form-->
                    <!--    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">-->
                    <!--    <div class="input-group">-->
                    <!--        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."-->
                    <!--            aria-label="Search" aria-describedby="basic-addon2">-->
                    <!--        <div class="input-group-append">-->
                    <!--            <button class="btn btn-primary" type="button">-->
                    <!--                <i class="fas fa-search fa-sm"></i>-->
                    <!--            </button>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!--<li class="nav-item dropdown no-arrow d-sm-none">-->
                        <!--    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"-->
                        <!--        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <i class="fas fa-search fa-fw"></i>-->
                        <!--    </a>-->
                            <!-- Dropdown - Messages -->
                            <!--<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"-->
                            <!--    aria-labelledby="searchDropdown">-->
                            <!--    <form class="form-inline mr-auto w-100 navbar-search">-->
                            <!--        <div class="input-group">-->
                            <!--            <input type="text" class="form-control bg-light border-0 small"-->
                            <!--                placeholder="Search for..." aria-label="Search"-->
                            <!--                aria-describedby="basic-addon2">-->
                            <!--            <div class="input-group-append">-->
                            <!--                <button class="btn btn-primary" type="button">-->
                            <!--                    <i class="fas fa-search fa-sm"></i>-->
                            <!--                </button>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->
                        <!--</li>-->

                        <div class="navbar">
                            <div class="topbar-divider d-none d-sm-block"></div>           
                            <ul class="nav navbar-nav navbar-right">
                                <?php if($this->session->userdata('username')) { ?>
                                        <li>
                                            <div>Selamat Datang <?php echo $this->session->userdata('username') ?></div>
                                        </li>
                                        <li class="ml-2">
                                            <?php echo anchor('auth/logout', 'Logout') ?>
                                        </li>
                                <?php } else { ?>
                                        <li>
                                            <?php echo anchor('auth/login', 'Login')  ?>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                        
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </ul>
                </nav>
                <!-- End of Topbar -->