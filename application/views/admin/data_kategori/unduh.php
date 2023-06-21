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
					<h1 style="text-align: center">Data Kategori Warung Marena</h1>
					<p style="text-align: left">Di download oleh: <strong><?php echo $this->session->userdata('username') ?></strong></p>
					<p style="text-align: left">Pada tangal: <strong><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-y H:i:s') ?></strong></p>
					<table style="width: 100%;border-collapse: collapse;">
						<thead>
							<tr>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-left-radius: 10px;">Id</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-right-radius: 10px;">Nama</th>
							</tr>
						</thead>
						<?php foreach($data_kategori as $ktgr) : ?> 
						<tbody>
							<tr>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $ktgr->id ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $ktgr->nama ?></td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
		</div>
    </body>
</html>