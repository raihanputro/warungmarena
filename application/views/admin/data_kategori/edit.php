<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Edit Data Kategori</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_kategori') ?>">Data Kategori</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_kategori/edit') ?>">Edit Data Kategori</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
                <h1>Edit Nama Kategori</h1>
                <ul>
                    <li><i class='bx bxs-right-arrow'></i> Edit Nama kategori akan digunakan untuk mengubah nama kategori barang di Warung Marena.</li>
                    <li><i class='bx bxs-right-arrow'></i> Edit nama kategori secara ringkas dan dimengerti pelanggan.</li>
                </ul>
                <form  method="post" enctype="multipart/form-data">
                    <input type="text" name="nama" class="form-control input-admin-category" value="<?= @$row->nama ?>">
                    <button type="submit"class="saveBtn-category">Edit Kategori</button>
                </form>
			    </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

