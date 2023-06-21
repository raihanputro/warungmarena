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
					<h1 style="text-align: center">Data Invoice Warung Marena</h1>
					<p style="text-align: left">Di download oleh: <strong><?php echo $this->session->userdata('username') ?></strong></p>
					<p style="text-align: left">Pada tangal: <strong><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-y H:i:s') ?></strong></p>
					<table  style="width: 100%;border-collapse: collapse;">
						<thead>
							<tr>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-left-radius: 10px;">Id</th>
								<th style="text-align: center; width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Nama</th>
								<th style="text-align: center; width: 100px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Alamat</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Tanggal Pesan</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Batas Bayar</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-right-radius: 10px;">Status</th>
							</tr>
						</thead>
						<?php foreach($data_invoice as $inv) : ?> 
						<tbody>
							<tr>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $inv->id ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $inv->nama ?></td>
                                <td style="padding: 16px 10px;text-align: center;background: #B6DBF6;"><?php echo $inv->alamat ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $inv->tgl_pesan ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $inv->batas_bayar ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;">
									<?php 
										if($inv->status =='Pending') { 
											echo '<span style="font-size: 12px;padding: 6px 50px;color: white;border-radius: 20px;font-weight: 700;background: #FD7238;padding: 6px 60px;">Pending</span>';
										} elseif($inv->status =='Proses') {
											echo '<span style="font-size: 12px;padding: 6px 50px;color: white;border-radius: 20px;font-weight: 700;background: ##FFCE26;padding: 6px 60px;">Proses</span>';
										} elseif($inv->status =='Selesai') {
											echo '<span style="font-size: 12px;padding: 6px 50px;color: white;border-radius: 20px;font-weight: 700;background: #7AA874;padding: 6px 60px;">Selesai</span>';
										} elseif($inv->status == 'Gagal') {
											echo '<span style="font-size: 12px;padding: 6px 50px;color: white;border-radius: 20px;font-weight: 700;background: #E21818;padding: 6px 60px;">Gagal</span>';
										}
									?>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
		</div>
    </body>
</html>