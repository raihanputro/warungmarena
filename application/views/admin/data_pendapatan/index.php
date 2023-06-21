<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Data Pendapatan</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/dashboard') ?>">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_pendapatan') ?>">Data Pendapatan</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info-addBtn">
				<li>
					<a href="<?php echo $a_href ?>" target="_blank">
						<i class='bx bxs-file-pdf' ></i>
						<span class="text">
							<h3></h3>
							<p>Download Data Pendapatan</p>
						</span>
					</a>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<form class="form-search pendapatan">
						<div class="input-date-from" >
							<label style="color: black">Dari</label>
							<input type="date" name="dari" value="<?= @$_GET['dari'] ?>" class="search-input" >
						</div>
						<div class="input-date-from">
							<label style="color: black">Sampai</label>
							<input type="date" name="sampai" value="<?= @$_GET['sampai'] ?>" class="search-input">
						</div>
						<button class="searchBtn" type="submit">Cari</button>
						<a class="resetBtn" href="<?= base_url('admin/data_pendapatan') ?>">Reset</a>
					</form>
					<table>
						<thead>
							<tr>
								<th style="text-align: center; width: 10px">No</th>
								<th style="text-align: center; width: 100px">Nama</th>
								<th style="text-align: center; width: 200px;">Alamat</th>
								<th style="text-align: center; width: 85px">Ongkir</th>
								<th style="text-align: center; width: 10px">Subtotal</th>
								<th style="text-align: center; width: 10px">Total</th>
							</tr>
						</thead>
						<tbody>
						<?php if($jumlah_data_pendapatan->count != 0) { ?>
							<?php $no = 0; $total = 0;?>
							<?php  foreach($data_pendapatan as $pdtn) : ?>
                        	<?php $total += $pdtn->ongkir+$pdtn->subtotal;?>
							<tr>
								<td><?php echo $no+=1 ?></td>
								<td><?php echo $pdtn->nama ?></td>
								<td><?php echo date('d-m-Y',strtotime($pdtn->tgl_pesan)) ?></td>
								<td><?php echo number_format($pdtn->ongkir) ?></td>
								<td><?php echo number_format($pdtn->subtotal) ?></td>
                                <td><?= number_format($pdtn->ongkir+$pdtn->subtotal) ?></td>							
                            </tr>
							<?php endforeach ?>
							<tr>
								<td style="font-weight: 700;font-size: 17px;" colspan="5" >Total Pendapatan</td>
								<td style="font-weight: 700;font-size: 17px;" colspan="1" ><?= number_format($total) ?></td>
							</tr>
						<?php } else { ?>
							<tr>
								<td colspan="6">Tidak ada data pendapatan!</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>	
				</div>
		<!-- MAIN -->
	<!-- CONTENT -->