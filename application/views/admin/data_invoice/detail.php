<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Detail Invoice</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_invoice') ?>">Data Invoice</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_invoice/detail') ?>">Detail Invoice</a>
						</li>
					</ul>
				</div>
			</div>  

            <ul class="box-info-addBtn">
				<li>
					<a href="<?php echo base_url().'admin/data_invoice/unduh_detail/'.$data_invoice->id ?>" target="_blank">
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
                    <h1>Id invoice <?php echo $data_invoice->id ?></h1>
                    <div style="margin-top: 1%;">
                        <h3>Bukti Bayar</h3>
                        <div class="containerImgSlider">
                            <div class="img-area" data-img="">
                                <?php if($data_invoice->bukti == '') { ?>
                                    <i style="font-size: 100px" class='bx bx-x-circle'></i>
                                    <br>
                                    <h3>Tidak ada bukti bayar</h3>
                                <?php } else { ?>
                                    <img  src="<?= base_url('uploads/bukti/'.$data_invoice->bukti) ?>">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 2%; margin-bottom: 2%">
                        <h3>Perbarui Status Pesanan</h6>
                        <form action="<?= base_url('admin/data_invoice/updatestatus/'.$data_invoice->id) ?>" method="post">
                            <select class="form-control mb-2" name="status">
                                <option value="Pending" <?= $data_invoice->status=='Pending'?'selected':'' ?> >Pending</option>
                                <option value="Proses" <?= $data_invoice->status=='Proses'?'selected':'' ?>>Proses</option>
                                <option value="Selesai" <?= $data_invoice->status=='Selesai'?'selected':'' ?>>Selesai</option>
                                <option value="Gagal" <?= $data_invoice->status=='Gagal'?'selected':'' ?>>Gagal</option>
                            </select>
                            <button type="submit" class="saveBtn-category">Perbarui Status</button>    
                        </form>
                    </div>
                    <h3>Data Invoice</h6>
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 50px; border-top-left-radius: 10px;">Nama Pelanggan</th>
                                <th style="text-align: center; width: 100px">Alamat</th>
                                <th style="text-align: center; width: 50px">Rt</th>
                                <th style="text-align: center; width: 100px">Nomor Hp</th>
                                <th style="text-align: center; width: 100px">Metode Pembayaran</th>
                                <th style="text-align: center; width: 100px">Ekspedisi</th>
                                <th style="text-align: center; width: 100px">Tanggal Pesan</th>
                                <th style="text-align: center; width: 100px;border-top-right-radius: 10px;">Batas Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border-bottom-left-radius: 10px;"><?= $data_invoice->nama ?></td>
                                <td><?= $data_invoice->alamat ?></td>								
                                <td><?= $data_invoice->rt ?></td>
                                <td><?= $data_invoice->hp ?></td>
                                <td><?= $data_invoice->metode ?></td>
                                <td><?= $data_invoice->ekspedisi ?></td>
                                <td><?= date('d-m-Y H:i:s',strtotime($data_invoice->tgl_pesan)) ?></td>
                                <td style="border-bottom-right-radius: 10px;"><?= date('d-m-Y H:i:s',strtotime($data_invoice->batas_bayar)) ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="margin-top: 2%">
                    <h3>Data Barang</h6>
					    <table>
					    	<thead>
					    		<tr>
					    			<th style="text-align: center; width: 100px; border-top-left-radius: 10px;">Id Barang</th>
					    			<th style="text-align: center; width: 200px">Nama Barang</th>
					    			<th style="text-align: center; width: 100px">Jumlah Pesanan</th>
					    			<th style="text-align: center; width: 100px">Harga Satuan</th>
					    			<th style="text-align: center; width: 100px;border-top-right-radius: 10px;">Sub Total</th>
					    		</tr>
					    	</thead>
                                <?php $total = 0; foreach($data_pesanan as $psn) : $subtotal = $psn->jumlah * $psn->harga; $total += $subtotal; ?>
					    	<tbody>
					    		<tr>
					    			<td><?php echo $psn->id_brg ?></td>
					    			<td><?php echo $psn->nama_brg ?></td>								
                                    <td><?php echo number_format($psn->jumlah) ?></td>
					    			<td>Rp. <?php echo number_format($psn->harga, 0,',','.') ?></td>
					    			<td>Rp. <?php echo number_format($subtotal, 0,',','.') ?></td>
					    		</tr>
					    	    <?php endforeach ?>
                                <tr>
                                    <td style="border-bottom: 2px solid #f2f2f2;border-top: 2px solid #f2f2f2;font-weight: " colspan="4">Ongkir</td>
                                    <td style="border-bottom: 2px solid #f2f2f2;border-top: 2px solid #f2f2f2">Rp. <?php echo number_format($data_invoice->ongkir, 0,',','.') ?></td>
                                </tr>
                                <tr>
                                    <td style="border-bottom-left-radius: 10px;" colspan="4" >Grand Total</td>
                                    <td style="border-bottom-right-radius: 10px;">Rp. <?php echo number_format($total+$data_invoice->ongkir, 0,',','.') ?></td>
                                </tr>
					    	</tbody>
					    </table>
                    </div>
			    </div>
            </div>
		<!-- MAIN -->
	</section>
<!-- CONTENT -->    

