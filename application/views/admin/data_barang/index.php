<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Barang</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_barang') ?>">Data Barang</a>
						</li>
					</ul>
				</div>
			</div>
			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url('admin/data_barang/tambah') ?>">
						<i class='bx bxs-file-plus' ></i>
						<span class="text">
							<h3></h3>
							<p>Tambah Data Barang</p>
						</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/data_barang/unduh') ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Barang</p>
						</span>
					</a>
				</li>
			</ul>
			<div class="table-data">
				<div class="order">
					<form class="form-search">
						<input class="search-input" type="text" name="cari" placeholder="Cari Id /Nama Barang....." value="<?php echo $search ?>">
						<select class="search-input-select" name="cari_kategori" value="<?php echo $search_kategori ?>">
							<option>Pilih Kategori</option>
							<?php foreach($data_kategori as $ktgr) { ?>
							<option <?= $search_kategori==$ktgr->nama?'selected':'' ?>><?= $ktgr->nama ?></option>
							<?php } ?>
                    	</select>
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_barang') ?>">Reset</a>
					</form>
					<table>
						<thead>
							<tr>
								<th style="text-align: center; width: 50px">Id</th>
								<th style="text-align: center; width: 100px">Nama</th>
								<th style="text-align: center; width: 400px">Keterangan</th>
								<th style="text-align: center; width: 100px">Kategori</th>
								<th style="text-align: center; width: 100px">Harga</th>
								<th style="text-align: center; width: 100px">Stok</th>
								<th style="text-align: center; width: 100px">Foto</th>
								<th colspan="2" style="text-align: center; width: 200px">Aksi</th>
							</tr>
						</thead>
						<?php if($jumlah_data_barang->count != 0) { ?>
							<?php foreach($data_barang as $brg) : ?> 
							<tbody>
								<tr>
									<td><?php echo $brg->id_brg ?></td>
									<td><?php echo $brg->nama_brg ?></td>
									<td ><p style="overflow:hidden;width: 550px;text-align: justify"><?php echo $brg->keterangan ?><p></td>
									<td><?php echo $brg->kategori ?></td>
									<td><?php echo $brg->harga ?></td>
									<td><?php echo $brg->stok ?></td>
									<td><img style="width: 70px" src="<?= base_url('uploads/gambar_barang/'.$brg->gambar) ?>"></td>
									<td><?php echo anchor('admin/data_barang/edit/'.$brg->id_brg,"<i style='color: blue; font-size: 30px' class='bx bxs-edit'></i>") ?></td>
            						<td><?php echo anchor('admin/data_barang/hapus/'.$brg->id_brg,"<i style='padding: 10px 10px;color: red; font-size: 30px' class='bx bxs-trash-alt'></i>") ?></td>	
								</tr>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="8" style="text-align: center;">Tidak ada data barang!</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

							
						