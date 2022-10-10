<body id="page-top">
    <?php 
        $segment1 = $this->uri->segment(1);
        $segment2 = $this->uri->segment(2);
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">
    
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('welcome') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-store"></i>
                </div>
                <div class=" sidebar-brand-text mx-3">Warung Marena
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <!--<li class="nav-item <?= $segment1=='welcome' ? 'active' : '' ?>">-->
            <!--    <a class="nav-link" href="<?php echo base_url('welcome')  ?>">-->
            <!--        <span>Dashboard</span></a>-->
            <!--</li>-->

            <!-- Heading -->

            <div class="sidebar-heading">
                Kategori
            </div>

            <!-- Nav Item - Tables -->
            <?php foreach($kategori as $kate) { ?>
            <li class="nav-item <?= $segment2==$kate->id ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo base_url('dashboard/kategori/'.$kate->id)  ?>">
                    <span><?= $kate->nama ?></span></a>
            </li>
            <?php } ?>
            
            <hr class="sidebar-divider my-0">
            
            <?php if($this->session->userdata('username')) { ?>
            <li class="nav-item <?= $segment2=='pesanan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo base_url('dashboard/pesanan')  ?>">
                    <span>Pesanan</span></a>
            </li>
            <?php } ?>
            
            <!--<li class="nav-item <?= $segment2=='jajanan' ? 'active' : '' ?>">-->
            <!--    <a class="nav-link" href="<?php echo base_url('kategori/jajanan')  ?>">-->
            <!--        <i class="fas fa-fw fa-cookie-bite"></i>-->
            <!--        <span>Jajanan</span></a>-->
            <!--</li>-->

            <!--<li class="nav-item <?= $segment2=='mainan' ? 'active' : '' ?>">-->
            <!--    <a class="nav-link" href="<?php echo base_url('kategori/mainan')  ?>">-->
            <!--        <i class="fas fa-fw fa-futbol"></i>-->
            <!--        <span>Mainan</span></a>-->
            <!--</li>-->

            <!--<li class="nav-item <?= $segment2=='atk' ? 'active' : '' ?>">-->
            <!--    <a class="nav-link" href="<?php echo base_url('kategori/atk')  ?>">-->
            <!--        <i class="fas fa-fw fa-pen"></i>-->
            <!--        <span>Alat Tulis</span></a>-->
            <!--</li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                    <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="<?= base_url('kategori/search') ?>">-->
                    <!--    <div class="input-group">-->
                    <!--        <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."-->
                    <!--            aria-label="Search" aria-describedby="basic-addon2">-->
                    <!--        <div class="input-group-append">-->
                    <!--            <button class="btn btn-primary" type="button">-->
                    <!--                <i class="fas fa-search fa-sm"></i>-->
                    <!--            </button>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</form>-->

                    <!-- Topbar Navbar -->
                    <ul class=" navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!--<li class="nav-item dropdown no-arrow d-sm-none">-->
                        <!--    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"-->
                        <!--        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <i class="fas fa-search fa-fw"></i>-->
                        <!--    </a>-->
                            
                        <!--    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"-->
                        <!--        aria-labelledby="searchDropdown">-->
                        <!--        <form class="form-inline mr-auto w-100 navbar-search">-->
                        <!--            <div class="input-group">-->
                        <!--                <input type="text" class="form-control bg-light border-0 small"-->
                        <!--                    placeholder="Search for..." aria-label="Search"-->
                        <!--                    aria-describedby="basic-addon2">-->
                        <!--                <div class="input-group-append">-->
                        <!--                    <button class="btn btn-primary" type="button">-->
                        <!--                        <i class="fas fa-search fa-sm"></i>-->
                        <!--                    </button>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </form>-->
                        <!--    </div>-->
                        <!--</li>-->

                        <div class="navbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="<?= base_url('dashboard/detail_keranjang') ?>" style="text-decoration:none;">
                                        <i class="fas fa-shopping-cart" style="font-size:22px;"></i>
                                        <span class="badge badge-danger"><?= $this->cart->total_items() ?></span>
                                    </a>
                                </li>
                            </ul>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if($this->session->userdata('username')) { ?>
                                        <li class="ml-2">
                                            <a href="<?= base_url('dashboard/profil') ?>">
                                                <?php if($user->foto == '') { ?>
                                                <div class="sidebar-brand-icon">
                                                    <i class="fas fa-user-circle"></i>
                                                    <?php echo $this->session->userdata('username') ?> 
                                                </div>
                                                <?php } else { ?>
                                                <div>
                                                    <img src="<?= base_url('uploads/foto/'.$user->foto) ?>" class="img-fluid rounded-circle" width="40">
                                                    <?php echo $this->session->userdata('username') ?> 
                                                </div>
                                                <?php } ?>
                                            </a>

                                        </li>
                                        <li class="ml-5 my-auto text-danger">
                                            <?php echo anchor('auth/logout', '<i class="fas fa-sign-out-alt text-danger" style="font-size:22px;"></i>') ?>
                                        </li>
                                <?php } else { ?>
                                        <li class="ml-2">
                                            <?php echo anchor('auth/login', '<i class="fas fa-sign-in-alt" style="font-size:22px;"></i>')  ?>
                                        </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                
                