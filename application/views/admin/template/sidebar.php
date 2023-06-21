<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="<?php echo base_url('/admin/dashboard') ?>" class="brand">
			<i class='bx bxs-store-alt'></i>
			<span class="text">Admin Warung Marena</span>
		</a>
		<ul class="side-menu top">
			<li class="<?php echo $dashboard_admin_active; ?>" >
				<a href="<?php echo base_url('admin/dashboard') ?>">
					<i class='bx bxs-home'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="<?php echo $data_barang_active; ?>">
				<a href="<?php echo base_url('/admin/data_barang') ?>">
					<i class='bx bxs-package'></i>
					<span class="text">Data Barang</span>
				</a>
			</li>
			<li class="<?php echo $data_kategori_active; ?>">
				<a href="<?php echo base_url('/admin/data_kategori/') ?>">
					<i class='bx bxs-box'></i>
					<span class="text">Data Kategori</span>
				</a>
			</li>
			<li class="<?php echo $data_invoice_active; ?>">
				<a href="<?php echo base_url('/admin/data_invoice/') ?>">
					<i class='bx bxs-receipt'></i>
					<span class="text">Data Invoice</span>
				</a>
			</li>
			<li class="<?php echo $data_pendapatan_active; ?>">
				<a href="<?php echo base_url('/admin/data_pendapatan/') ?>">
					<i class='bx bx-money'></i>
					<span class="text">Data Pendapatan</span>
				</a>
			</li>
			<li class="<?php echo $data_slider_active; ?>">
				<a href="<?php echo base_url('/admin/data_slider/') ?>">
					<i class='bx bxs-photo-album'></i>
					<span class="text">Data Slider</span>
				</a>
			</li>
			<li class="<?php echo $data_pelanggan_active; ?>">
				<a href="<?php echo base_url('/admin/data_pelanggan/') ?>">
					<i class='bx bxs-id-card'></i>
					<span class="text">Data Pelanggan</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li class="<?php echo $data_admin_active; ?> admin">
				<a href="<?php echo base_url('/admin/data_admin/') ?>">
					<i class='bx bxs-user-voice'></i>
					<span class="text">Data Admin</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('auth/logout') ?>" class="logout">
					<i class='bx bxs-left-arrow-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
<section id="content">
    <!-- NAVBAR -->
  
    <nav>
	    <i class='bx bx-menu' ></i>  
	</nav>
	<!-- NAVBAR -->
	

