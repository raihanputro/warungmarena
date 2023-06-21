<?php $total = 0; ?>
<?php foreach($pendapatan as $i => $item) { ?>
<?php $total += $item['ongkir']+$item['subtotal']; ?>
<?php } ?>

<!-- CONTENT -->
	<!-- MAIN -->
	<main>

		<div class="head-title">
			<div class="left">
				<h1>Dashboard</h1>
				<ul class="breadcrumb">
					<li>
						<a class="active" href="<?php echo base_url('admin/dashboard_admin') ?>">Dashboard</a>
					</li>
					<li><i class='bx bx-chevron-right' ></i></li>
					<li>
						<a class="active" href="<?php echo base_url('admin/dashboard_admin') ?>">Home</a>
					</li>
				</ul>
			</div>
		</div>

		<ul class="box-info">	
			<a href="<?php echo base_url('admin/data_pendapatan') ?>">
				<li id="box-info-pendapatan">
					<i class='bx bx-money'></i>
					<span class="text">
						<h3>Rp. <?= number_format($total) ?></h3>
						<p>Pendapatan</p>
					</span>
				</li>
			</a>
			<a href="<?php echo base_url('admin/data_invoice/?cari=&cari_status=Pending') ?>">
				<li id="box-info-pesanan">
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?= $belumproses->count ?></h3>
						<p>Pesanan</p>
					</span>
				</li>
			</a>
			<a href="<?php echo base_url('admin/data_pelanggan') ?>">
				<li id="box-info-pelanggan">
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3><?= $jumlah_pelanggan->count ?></h3>
						<p>Pelanggan</p>
					</span>
				</li>
			</a>
			<a href="<?php echo base_url('admin/data_admin') ?>">
				<li id="box-info-admin">
					<i class='bx bxs-user-rectangle' ></i>
					<span class="text">
						<h3><?= $jumlah_admin->count ?></h3>
						<p>Admin</p>
					</span>
				</li>
			</a>
		</ul>

		<div class="table-data">
			<div class="order">
				<div class="head">
					<h3>5 Transaksi Terbaru</h3>
				</div>
				<table>
					<thead>
						<tr>
							<th style="border-top-left-radius: 10px;">Pelanggan</th>
							<th>Tanggal pesan</th>
							<th style="border-top-right-radius: 10px;">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php if($jumlah_invoice_terbaru->count != 0) { ?>
							<?php foreach($data_invoice as $inv) : ?>
								<tr>
									<td><?php echo $inv->nama ?></td>
									<td><?php echo $inv->tgl_pesan ?></td>
									<td >
										<?php 
											if($inv->status =='Pending') { 
												echo '<span class="status pending">Pending</span>';
											} elseif($inv->status =='Proses') {
												echo '<span class="status process">Proses</span>';
											} elseif($inv->status =='Selesai') {
												echo '<span class="status completed">Selesai</span>';
											} elseif($inv->status == 'Gagal') {
												echo '<span class="status fail">Gagal</span>';
											}
										?>
									</td>
								</tr>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="3">Tidak ada transaksi terbaru!</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="table-data-user">
			<div class="order">
				<div class="head">
					<h3>5 Pelanggan Terbaru</h3>
				</div>
				<table>
					<thead>
						<tr>
							<th colspan="2" style="border-top-right-radius: 10px;border-top-left-radius: 10px;">Id Pelanggan</th>
						</tr>
					</thead>
					<tbody>
						<?php if($jumlah_pelanggan_terbaru->count != 0) { ?>
							<?php foreach($data_user as $usr) : ?>
								<tr >
									<td style="padding-left: 10px; ">
										<?php if($usr->foto == '') { ?>
											<i style="font-size: 20px;" class='bx bxs-user-circle'></i>
										<?php } else { ?>
											<img style="border-radius: 50%; margin-right: 6px; width: 20px" src="<?= base_url('uploads/foto/'.$usr->foto) ?>">
										<?php } ?>
										
									</td>
									<td style="padding-right: 10px"><?php echo $usr->username ?></td>
								</tr>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="1" style="text-align: center;">Tidak ada pelanggan terbaru!</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
	</main>
	<!-- MAIN -->
</section>
<!-- CONTENT -->