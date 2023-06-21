<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Admin</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_admin') ?>">Data Admin</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url('admin/data_admin/tambah') ?>">
						<i class='bx bxs-file-plus' ></i>
						<span class="text">
							<h3></h3>
							<p>Tambah Data Admin</p>
						</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/data_admin/unduh') ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Admin</p>
						</span>
					</a>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<form class="form-search">
						<input class="search-input" type="text" name="cari" placeholder="Cari Id / Nama Admin....." value="<?php echo $search ?>">
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_admin') ?>">Reset</a>
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
								<th colspan="2" style="text-align: center">Aksi</th>
							</tr>
						</thead>
						<?php if($jumlah_data_admin->count != 0) { ?>
							<?php foreach($data_admin as $admn) : ?>
								<tbody>
									<tr>
										<td><?php echo $admn->id ?></td>
										<td><?php echo $admn->role ?></td>
										<td><?php echo $admn->nama ?></td>
										<td><?php echo $admn->username ?></td>
										<td><?php echo $admn->email ?></td>
										<td>
											<?php if($admn->foto == '') { ?>
												<i style="font-size: 30px; margin-right: 6px" class='bx bxs-user-circle'></i>
											<?php } else { ?>
												<img style="border-radius: 50%; margin-right: 6px; width: 30px" src="<?= base_url('uploads/foto/'.$admn->foto) ?>">
											<?php } ?>
										</td>
										<?php if($this->session->userdata('userid') == $admn->id){ ?>
											<td><?php echo anchor('admin/data_admin/edit/'.$admn->id,"<i style='color: blue; font-size: 30px' class='bx bxs-edit'></i>") ?></td>
											<td><?php echo anchor('admin/data_admin/hapus/'.$admn->id,"<i style='color: red; font-size: 30px' class='bx bxs-trash-alt'></i>") ?></td>	
										<?php } else { ?>
											<td colspan="2"><?php echo anchor('admin/data_admin/detail/'.$admn->id,"<i style='color: blue; font-size: 30px' class='bx bx-detail'></i>") ?></td>
										<?php }  ?>
									</tr>
								</tbody>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="8" style="text-align: center;">Tidak ada data admin!</td>
							</tr>
						<?php } ?>
					</table>
				</div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->