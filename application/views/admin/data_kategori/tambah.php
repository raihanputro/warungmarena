<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Tambah Data Kategori</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_kategori') ?>">Data Kategori</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_kategori/tambah') ?>">Tambah Data Kategori</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
                <h1>Masukkan Nama Kategori</h1>
                <ul>
                    <li><i class='bx bxs-right-arrow'></i> Nama kategori akan digunakan untuk mengkategorikan barang di Warung Marena.</li>
                    <li><i class='bx bxs-right-arrow'></i> Masukkan nama kategori secara ringkas dan dimengerti pelanggan.</li>
                </ul>
                <form action="<?php echo base_url('admin/data_kategori/tambah') ?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="nama" class="form-control input-admin-category">
                    <button type="submit"class="saveBtn-category">Simpan Kategori</button>
                </form>
			    </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

