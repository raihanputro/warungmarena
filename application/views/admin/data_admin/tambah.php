<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Tambah Data Barang</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_admin') ?>">Data Barang</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_admin/tambah') ?>">Tambah Data Admin</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data-user-add">
				<div class="order">
                <h1>Masukkan Data Admin</h1>
                <ul>
                    <li><i class='bx bxs-right-arrow'></i> Menambahkan data yang ada pada Warung Marena.</li>
                    <li><i class='bx bxs-right-arrow'></i> Untuk gambar barang edit dengan background putih.</li>
                </ul>
                <form action="<?php echo base_url('admin/data_barang/tambah') ?>" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td><input type="text" name="nama_brg" class="form-control input-admin-admin"></td>
                        </tr>   
                        <tr>
                            <td>Keterangan</td>
                            <td><input type="text" name="keterangan" class="form-control input-admin-admin"></td>
                        </tr>   
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select class="form-control" name="kategori_id">
                                    <?php foreach($data_kategori as $ktgr) : ?>
                                        <option value="<?= $ktgr->id ?>"><?= $ktgr->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>   
                        <tr>
                            <td>Harga</td>
                            <td><input type="text" name="harga" class="form-control input-admin-admin"></td>
                        </tr>   
                        <tr>
                            <td>Stok</td>
                            <td><input type="text" name="stok" class="form-control input-admin-admin"></td>
                        </tr>   
                        <tr>
                            <td>Gambar Barang</td>
                            <td><input type="file" name="gambar" class="form-control input-admin-admin"></td>
                        </tr>    
                    </table>
                    <button type="submit"class="saveBtn-admin">Simpan Barang</button>
                </form>
			    </div>
		<!-- MAIN -->
	</section>
<!-- CONTENT -->

