<!DOCTYPE html>
<html>
    <head>
        <title></title>
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
		<div class="table-data" style="font-family:'Poppins', sans-serif;display: flex;flex-wrap: wrap;grid-gap: 24px;margin-top: 24px;width: 100%;color: #342E37;">
				<div class="order">
					<h1 style="text-align: center">Invoice <?= $data_invoice->id ?> Warung Marena</h1>
                    <p style="text-align: left">Di download oleh: <strong><?php echo $this->session->userdata('username') ?></strong></p>
					<p style="text-align: left">Pada tangal: <strong><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-y H:i:s') ?></strong></p>
                        <h3>Bukti Bayar</h3>
                        <div class="containerImgSlider">
                            <div class="img-area" data-img="">
                                <?php if($data_invoice->bukti == '') { ?>
                                    <i style="font-size: 20px" class='bx bx-x-circle'></i>
                                    <h3>Tidak ada bukti bayar</h3>
                                <?php } else { ?>
                                    <img  src="<?= base_url('uploads/bukti/'.$data_invoice->bukti) ?>">
                                <?php } ?>
                            </div>
                        </div>
                    <h3>Data Pengiriman</h6>
                    <table style="width: 100%;border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-left-radius: 10px;">Nama Pelanggan</th>
                                <th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Alamat</th>
                                <th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Rt</th>
                                <th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Nomor Hp</th>
                                <th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Metode Pembayaran</th>
                                <th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Ekspedisi</th>
                                <th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Tanggal Pesan</th>
                                <th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-right-radius: 10px;">Batas Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= $data_invoice->nama ?></td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= $data_invoice->alamat ?></td>								
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= $data_invoice->rt ?></td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= $data_invoice->hp ?></td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= $data_invoice->metode ?></td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= $data_invoice->ekspedisi ?></td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= date('d-m-Y H:i:s',strtotime($data_invoice->tgl_pesan)) ?></td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?= date('d-m-Y H:i:s',strtotime($data_invoice->batas_bayar)) ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <h3>Data Barang</h6>
					<table style="width: 100%;border-collapse: collapse;">
						<thead>
							<tr>
								<th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-left-radius: 10px;">Id Barang</th>
								<th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Nama Barang</th>
								<th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Jumlah Pesanan</th>
								<th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Harga Satuan</th>
								<th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-right-radius: 10px;">Sub Total</th>
							</tr>
						</thead>
                        <tbody>
                            <?php $total = 0; foreach($data_pesanan as $psn) : $subtotal = $psn->jumlah * $psn->harga; $total += $subtotal; ?>						
							<tr>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $psn->id_brg ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $psn->nama_brg ?></td>
                                <td style="padding: 16px 10px;text-align: center;background: #B6DBF6;"><?php echo number_format($psn->jumlah) ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php  echo number_format($psn->harga, 0,',','.') ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo number_format($subtotal, 0,',','.') ?></td>
							</tr>
						    <?php endforeach ?>
                            <tr>
                                    <td style="padding: 16px 0;text-align: center;background: #B6DBF6;font-weight: 700;font-size: 17px; border-top: 1px solid white;" colspan="4">Ongkir</td>
                                    <td style="padding: 16px 0;text-align: center;background: #B6DBF6;font-weight: 700;font-size: 17px;border-top: 1px solid white;;">Rp. <?php echo number_format($data_invoice->ongkir, 0,',','.') ?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0;text-align: center;background: #B6DBF6;;font-weight: 700;font-size: 17px;border-top: 1px solid white;" colspan="4" >Grand Total</td>
                                    <td style="padding: 16px 0;text-align: center;background: #B6DBF6;font-weight: 700;font-size: 17px;border-top: 1px solid white;">Rp. <?php echo number_format($total+$data_invoice->ongkir, 0,',','.') ?></td>
                                </tr>
						</tbody>
					</table>
				</div>
		</div>
    </body>
</html>