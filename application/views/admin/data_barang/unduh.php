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
					<h1 style="text-align: center">Data Barang Warung Marena</h1>
					<p style="text-align: left">Di download oleh: <strong><?php echo $this->session->userdata('username') ?></strong></p>
					<p style="text-align: left">Pada tangal: <strong><?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-y H:i:s') ?></strong></p>
					<table  style="width: 100%;border-collapse: collapse;">
						<thead>	
							<tr>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-left-radius: 10px;">Id</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Nama</th>
								<th style="text-align: center; width: 200px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Keterangan</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Kategori</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Harga</th>
								<th style="text-align: center; width: 50px;padding: 30px 10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;">Stok</th>
								<th style="text-align: center; width: 50px;padding: 30px10px;font-size: 17px;text-align: center;background-color: #005DD1;color: white;border-top-right-radius: 10px;">Foto</th>
							</tr>
						</thead>
						<?php foreach($data_barang as $brg) : ?> 
						<tbody>
							<tr>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $brg->id_brg ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $brg->nama_brg ?></td>
								<td style="padding: 16px 10px;text-align: center;background: #B6DBF6;"><p style="overflow:hidden;width: 500px;text-align: justify"><?php echo $brg->keterangan ?><p></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $brg->kategori ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $brg->harga ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><?php echo $brg->stok ?></td>
								<td style="padding: 16px 0;text-align: center;background: #B6DBF6;"><img style="border-radius: 50%; margin-right: 6px; width: 60px" src="<?= base_url('uploads/gambar_barang/'.$brg->gambar) ?>"></td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
		</div>
    </body>
</html>