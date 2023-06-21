<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Pelanggan</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_pelanggan') ?>">Data Pelanggan</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url('admin/data_pelanggan/unduh') ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Pelanggan</p>
						</span>
					</a>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<form class="form-search">
						<input class="search-input" type="text" name="cari" placeholder="Cari Id / Nama Pelanggan....." value="<?php echo $search ?>">
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_pelanggan') ?>">Reset</a>
					</form>
					<table >
						<thead>
							<tr>
								<th style="text-align: center">Id	</th>
								<th style="text-align: center">Role</th>
								<th style="text-align: center">Nama</th>
								<th style="text-align: center">Username</th>
								<th style="text-align: center">Email</th>
								<th style="text-align: center">Foto</th>
								<th colspan="1" style="text-align: center">Aksi</th>
							</tr>
						</thead>
						<?php if($jumlah_data_pelanggan->count != 0) { ?>
							<?php foreach($data_pelanggan as $plgn) : ?>
								<tbody>
									<tr>
										<td><?php echo $plgn->id ?></td>
										<td><?php echo $plgn->role ?></td>
										<td>
											<?php if($plgn-> nama == ''){ echo '-'; } else { echo $plgn->nama; }?>
										
										</td>
										<td><?php echo $plgn->username ?></td>
										<td><?php echo $plgn->email ?></td>
										<td>
											<?php if($plgn->foto == '') { ?>
												<i style="font-size: 30px; margin-right: 6px" class='bx bxs-user-circle'></i>
											<?php } else { ?>
												<img style="border-radius: 50%; margin-right: 6px; width: 30px" src="<?= base_url('uploads/foto/'.$plgn->foto) ?>">
											<?php } ?>
										</td>
										<td><?php echo anchor('admin/data_pelanggan/detail/'.$plgn->id,"<i style='color: blue; font-size: 30px' class='bx bx-detail'></i>") ?></td>
									</tr>
								</tbody>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="7" style="text-align: center;">Tidak ada data pelanggan!</td>
							</tr>
						<?php } ?>
					</table>
				</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->