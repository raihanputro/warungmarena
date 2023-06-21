<!-- CONTENT -->
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Tambah Data Slider</h1>
					<ul class="breadcrumb">
						<li >
							<a class="active" href="<?php echo base_url('admin/data_slider') ?>">Data Slider</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="<?php echo base_url('admin/data_slider/tambah') ?>">Tambah Data Slider</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
                <h1>Masukkan Gambar Slider</h1>
                <ul>
                    <li><i class='bx bxs-right-arrow'></i> Gambar yang diinput akan ditampilkan pada bagian slider halaman home pelanggan.</li>
                    <li><i class='bx bxs-right-arrow'></i> Ukuran panjang dan lebar gambar harus 800 x 267 pixels.</li>
                    <li><i class='bx bxs-right-arrow'></i> Ekstensi file harus JPG/JPEG/PNG.</li>
                </ul>
                    <div class="containerImgSlider">
		            <div class="img-area" data-img="">
		            	<i class='bx bxs-cloud-upload icon'></i>
		            	<h3>Unggah Slider</h3>
		            	<p>Size slider harus kurang dari <span>2MB</span></p>
		            </div>
		            <button class="select-image">Pilih Slider</button>
                    <form action="<?php echo base_url('admin/data_slider/tambah') ?>" method="post" enctype="multipart/form-data">
                    <input type="file" id="fileSliderBtn" name="gambar" class="form-control" hidden>
                    <button type="submit"class="upload-image">Unggah Slider</button>
                    </form>
			    </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

