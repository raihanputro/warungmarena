<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Edit Data Barang</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_barang') ?>">Data Barang</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_barang/edit') ?>">Edit Data Barang</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data-user-add">
				<div class="order"> 
                <h1>Edit Data Barang</h1>
                <ul>
                    <li><i class='bx bxs-right-arrow'></i> Edit Data barang digunakan untuk mengubah data barang yang dijual di Warung Marena.</li>
                    <li><i class='bx bxs-right-arrow'></i> Edit Data barang diperuntukan apabila ada kesalahan dan perubahan informasi barang.</li>
                </ul>
                <form action="<?php echo base_url().'admin/data_barang/edit/'.$row->id_brg  ?>" method="post" enctype="multipart/form-data">
                <table>
                        <tr>
                            <td>Nama Barang</td>
                            <td>
                                <input type="text" name="nama_brg" class="form-control input-admin-admin" value="<?php echo $row->nama_brg ?>">
                            </td>
                        </tr>   
                        <tr>
                            <td>Keterangan Barang</td>
                            <td><input type="text" name="keterangan" class="form-control input-admin-admin" value="<?php echo $row->keterangan ?>"></td>
                        </tr>   
                        <tr>
                            <td>Kategori Barang</td>
                            <td>
                                <select class="form-control" name="kategori_id">
                                    <?php foreach($data_kategori as $ktgr) { ?>
                                    <option value="<?= $ktgr->id ?>" <?= $row->kategori_id==$ktgr->id?'selected':'' ?>><?= $ktgr->nama ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>   
                        <tr>
                            <td>Harga Barang</td>
                            <td><input type="text" name="harga" class="form-control input-admin-admin" value="<?php echo $row->harga ?>"></td>
                        </tr>   
                        <tr>
                            <td>Stok Barang</td>
                            <td><input type="text" name="stok" class="form-control input-admin-admin" value="<?php echo $row->harga ?>"></td>
                        </tr>
                        <tr>
                            <td>Gambar Barang</td>
                            <td>
                                <div class="containerImgSlider">
                                    <div class="img-area" data-img="">
                                        <?php if($row->gambar == '') { ?>
                                            <i style="font-size: 90px"  class='bx bxs-user-circle'></i>
                                        <?php } else { ?>
                                            <img  src="<?= base_url('uploads/gambar_barang/'.$row->gambar) ?>">
                                        <?php } ?>
                                    </div>
                                    <input type="file" name="gambar" class="form-control">
                                    <input type="hidden" name="gambar_old" class="form-control" value="<?php echo $row->gambar ?>">
                                </div>
                            </td>
                            
                        </tr>    
                    </table>
                    <button type="submit"class="saveBtn-admin">Edit Barang</button>
                    </form>
			    </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

