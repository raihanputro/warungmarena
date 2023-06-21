<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Invoice</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_invoice') ?>">Data Invoice</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url('admin/data_invoice/unduh') ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Invoice</p>
						</span>
					</a>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<form class="form-search">
						<input class="search-input" type="text" name="cari" placeholder="Cari Id Invoice....." value="<?php echo $search ?>">
						<select class="search-input-select" name="cari_status">
							<option <?= $search_status=="Pilih Status"?'selected':'' ?>>Pilih Status</option>
							<option <?= $search_status=="Pending"?'selected':'' ?>>Pending</option>
                            <option <?= $search_status=="Proses"?'selected':'' ?>>Proses</option>
                            <option <?= $search_status=="Selesai"?'selected':'' ?>>Selesai</option>
                            <option <?= $search_status=="Gagal"?'selected':'' ?>>Gagal</option>
                    	</select>
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_invoice') ?>">Reset</a>
					</form>
					<table>
						<thead>
							<tr>
								<th style="text-align: center; width: 10px">Id	</th>
								<th style="text-align: center; width: 100px">Nama</th>
								<th style="text-align: center; width: 200px">Alamat</th>
								<th style="text-align: center; width: 85px;">Tanggal Pesan</th>
								<th style="text-align: center; width: 85px">Batas Bayar</th>
								<th style="text-align: center; width: 10px">Status</th>
								<th style="text-align: center; width: 10px">Aksi</th>
							</tr>
						</thead>
						<?php if($jumlah_data_invoice->count != 0) { ?>
							<?php foreach($data_invoice as $inv) : ?>
								<tbody>
									<tr>
										<td><?php echo $inv->id ?></td>
										<td><?php echo $inv->nama ?></td>
										<td><p style="overflow:hidden;text-align: justify;padding: 0px 15px;"><?php echo $inv->alamat ?></p></td>
										<td><?php echo $inv->tgl_pesan ?></td>
										<td><?php echo $inv->batas_bayar ?></td>
										<td>
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
										<td><?php echo anchor('admin/data_invoice/detail/'.$inv->id,"<i style='color: blue; font-size: 30px' class='bx bx-detail'></i>") ?></td>
									</tr>
								</tbody>
							<?php endforeach ?>
						<?php } else { ?>
							<tr>
								<td colspan="7" style="text-align: center;">Tidak ada data invoice!</td>
							</tr>
						<?php } ?>
					</table>
				</div>
		<!-- MAIN -->
	<!-- CONTENT -->