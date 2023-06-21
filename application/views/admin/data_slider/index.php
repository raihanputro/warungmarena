<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Slider</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_slider') ?>">Data Slider</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url('admin/data_slider/tambah') ?>">
						<i class='bx bxs-file-plus' ></i>
						<span class="text">
							<h3></h3>
							<p>Tambah Data Slider</p>
						</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/data_slider/unduh') ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Slider</p>
						</span>
					</a>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<form class="form-search oneInput">
						<input class="search-input" type="text" name="cari" placeholder="Cari Id Slider.....">
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_pendapatan') ?>">Reset</a>
					</form>
					<table>
						<thead>
							<tr>
								<th style="text-align: center">Id	</th>
								<th style="text-align: center">Gambar</th>
								<th style="text-align: center">Aksi</th>
							</tr>
						</thead>
						<?php if($jumlah_data_slider->count != 0) { ?>
							<?php foreach($data_slider as $sldr) : ?>
								<tbody>
									<tr>
										<td><?php echo $sldr->id ?></td>
										<td><img id="img-slider" src="<?= base_url('uploads/slider/').$sldr->gambar ?>"></td>
            							<td><?php echo anchor('admin/data_slider/hapus/'.$sldr->id,"<i style='color: red; font-size: 30px' class='bx bxs-trash-alt'></i>") ?></td>
									</tr>
								</tbody>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="3" style="text-align: center;">Tidak ada data Slider!</td>
							</tr>
						<?php } ?>
					</table>
				</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->