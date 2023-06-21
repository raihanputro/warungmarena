<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Kategori</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_kategori') ?>">Data Kategori</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url('admin/data_kategori/tambah') ?>">
						<i class='bx bxs-file-plus' ></i>
						<span class="text">
							<h3></h3>
							<p>Tambah Data Kategori</p>
						</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/data_kategori/unduh') ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Kategori</p>
						</span>
					</a>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<form class="form-search oneInput">
						<input class="search-input" type="text" name="cari" placeholder="Cari Id / Nama Kategori.....">
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_kategori') ?>">Reset</a>
					</form>
					<table>
						<thead>
							<tr>
								<th style="text-align: center">Id	</th>
								<th style="text-align: center">Nama</th>
								<th colspan="2" style="text-align: center">Aksi</th>
							</tr>
						</thead>
						<?php if($jumlah_data_kategori->count != 0) { ?>
							<?php foreach($data_kategori as $ktgr) : ?>
								<tbody>
									<tr>
										<td><?php echo $ktgr->id ?></td>
										<td><?php echo $ktgr->nama ?></td>
										<td><?php echo anchor('admin/data_kategori/edit/'.$ktgr->id,"<i style='color: blue; font-size: 30px' class='bx bxs-edit'></i>") ?></td>
										<td><?php echo anchor('admin/data_kategori/hapus/'.$ktgr->id,"<i style='color: red; font-size: 30px' class='bx bxs-trash-alt'></i>") ?></td>
									</tr>
								</tbody>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="4" style="text-align: center;">Tidak ada data kategori!</td>
							</tr>
						<?php } ?>
					</table>
				</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	
