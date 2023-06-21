<div class="container-fluid">
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach($slider as $key => $s) { ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?= $key ?>" class="<?= $key==0?'active':'' ?>"></li>
                <?php } ?>
                <!--<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>-->
                <!--<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>-->
            </ol>
            <div class="carousel-inner">
                <?php foreach($slider as $key => $s) { ?>
                <div class="carousel-item <?= $key==0?'active':'' ?>">
                    <img src="<?php echo base_url('uploads/slider/'.$s->gambar) ?>" class="img-fluid w-100" style="height: 400px;" alt="...">
                    <!--<div class="carousel-caption d-none d-md-block">-->
                    <!--    <h5>First slide label</h5>-->
                    <!--    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>-->
                    <!--</div>-->
                </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    
    <form class="col-md-6">
        <input type="text" class="form-control my-2" name="cari" placeholder="Cari ...">
        
        <button class="btn btn-primary">Cari</button>
    </form>
    
    <div class="row text-center mt-4 mx-0">

        <?php foreach ($barang as $brg) : ?>
        <div class="col-6 col-md-3 mb-2 px-1">
            <!--style="width: 16rem;"-->
            <a href="<?= base_url('dashboard/detail/'.$brg->id_brg) ?>" style="text-decoration:none;" class="text-dark">
                <div class="card">
                    <img src="<?php echo base_url().'/uploads/gambar_barang/'.$brg->gambar ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?php echo $brg->nama_brg ?></h5>
                        <span class="badge rounded-pill bg-success mb-3">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span> <br>
                        <small class="text-muted">Terjual : <?= $brg->terjual ?></small>
                        <!--<?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>-->
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach ?>
    </div>
    <div>