<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Edit Data Admin</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_admin') ?>">Data Admin</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_admin/edit') ?>">Edit Data Admin</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data-user-add">
				<div class="order"> 
                <h1>Edit Data Admin</h1>
                <ul>
                    <li><i class='bx bxs-right-arrow'></i> Edit Data user akan digunakan untuk mengubah data pelanggan dan admin.</li>
                    <li><i class='bx bxs-right-arrow'></i> Edit Data user digunakan apabila pelanggan terkendala dengan akunnya.</li>
                </ul>
                <form action="<?php echo base_url().'admin/data_admin/edit/'.$row->id  ?>" method="post" enctype="multipart/form-data">
                <table>
                        <tr>
                            <td>Nama Admin</td>
                            <td><input type="text" name="nama" class="form-control input-admin-admin" value="<?php echo $row->nama ?>"></td>
                        </tr>   
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" class="form-control input-admin-admin" value="<?php echo $row->username ?>"></td>
                        </tr>   
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" class="form-control input-admin-admin" value="<?php echo $row->email ?>"></td>
                        </tr>   
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" class="form-control input-admin-admin" value="<?php echo $row->alamat ?>"></td>
                        </tr>   
                        <tr>
                            <td>Rt</td>
                            <td>
                                <select class="form-control" name="rt" placeholder="Rt" required>
                                    <option data-harga="">Pilih Rt / Rw</option>
                                    <option value="RT 07 / RW 09" <?= $row->rt=='RT 07 / RW 09' ? 'selected' : '' ?>>RT 07 / RW 09</option>
                                    <option value="RT 06 / RW 09" <?= $row->rt=='RT 06 / RW 09' ? 'selected' : '' ?>>RT 06 / RW 09</option>
                                    <option value="RT 05 / RW 09" <?= $row->rt=='RT 05 / RW 09' ? 'selected' : '' ?>>RT 05 / RW 09</option>
                                    <option value="RT 04 / RW 09" <?= $row->rt=='RT 04 / RW 09' ? 'selected' : '' ?>>RT 04 / RW 09</option>
                                    <option value="RT 14 / RW 09" <?= $row->rt=='RT 14 / RW 09' ? 'selected' : '' ?>>RT 14 / RW 09</option>
                                </select>   
                            </td>
                        </tr>          
                        <tr>
                            <td>Hp</td>
                            <td><input type="text" name="hp" class="form-control input-admin-admin" value="<?php echo $row->hp ?>"></td>
                        </tr> 
                        <tr>
                            <td>Foto</td>
                            <td>
                                <div class="containerImgSlider">
                                    <div class="img-area" data-img="">
                                        <?php if($row->foto == '') { ?>
                                            <i style="font-size: 90px"  class='bx bxs-user-circle'></i>
                                        <?php } else { ?>
                                            <img  src="<?= base_url('uploads/foto/'.$row->foto) ?>">
                                        <?php } ?>
                                    </div>
                                    <input type="file"  name="foto" class="form-control">
                                    <input type="hidden" name="foto_old" class="form-control" value="<?php echo $row->foto ?>">
                                </div>
                            </td>
                            
                        </tr>    
                    </table>
                    <button type="submit"class="saveBtn-admin">Edit Admin</button>
                    </form>
			    </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

