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
					<h1 style="text-align: center">Data Pendapatan Warung Marena</h1>
					<p style="text-align: left">Di download oleh: <strong><?php echo $this->session->userdata('username') ?></strong></p>
					<p style="text-align: left">Pada tangal: <strong><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-y H:i:s') ?></strong></p>
					<table style="width: 100%;border-collapse: collapse;">
						<thead>
							<tr>
								<th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-left-radius: 10px;">No</th>
								<th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Nama</th>
								<th style="width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Alamat</th>
								<th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Ongkir</th>
								<th style="width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-right-radius: 10px;">Sub Total</th>
							</tr>
						</thead>
                        <tbody>
                            <?php $no = 0; $total = 0;?>
                            <?php  foreach($data_pendapatan as $pdtn) : ?>
                            <?php $total += $pdtn->ongkir+$pdtn->subtotal;?>						
							<tr>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $no+=1 ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $pdtn->nama ?></td>
                                <td style="padding: 16px 10px;text-align: center;background: #B6DBF6;"><?php echo date('d-m-Y',strtotime($pdtn->tgl_pesan)) ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo number_format($pdtn->ongkir) ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo number_format($pdtn->subtotal) ?></td>
							</tr>
						    <?php endforeach ?>
                            <tr>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;font-weight: 700;font-size: 17px;" colspan="4">Total Pendapatan</td>
                                <td style="padding: 16px 0;text-align: center;background: #B6DBF6;font-weight: 700;font-size: 17px;"><?= number_format($total) ?></td>
                            </tr>
						</tbody>
					</table>
				</div>
		</div>
    </body>
</html>