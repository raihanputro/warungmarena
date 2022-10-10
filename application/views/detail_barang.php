<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Detail Barang</h5>
        <div class="card-body">

            <?php foreach($barang as $brg) : ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>Nama Barang</td>
                                <td><strong><?php echo $brg->nama_brg ?></strong></td>
                            </tr>

                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?php echo $brg->keterangan ?></strong></td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td><strong><?php echo $brg->kategori ?></strong></td>
                            </tr>

                            <tr>
                                <td>Stok</td>
                                <td><strong><?php echo $brg->stok ?></strong></td>
                            </tr>

                            <tr>
                                <td>Harga</td>
                                <td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></div></strong></td>
                            </tr>
                        </table>
                        
                        <form action="<?= base_url('dashboard/tambah_ke_keranjang/'.$brg->id_brg) ?>" method="post">
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control mb-2" name="qty" value="1" />
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
                                </div>
                            </div>
                        </form>
                        <!--<?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg, '<div class="btn btn-sm btn-primary">Tambah ke Keranjang</div>') ?>-->
                        <?php echo anchor('welcome', '<div class="d-inline btn btn-sm btn-danger d-inline-block">Kembali</div>') ?>
                        
                        <form action="<?= base_url('dashboard/tambah_wishlist/'.$brg->id_brg) ?>" method="post" class="d-inline">
                            <input type="hidden" name="status" value="<?= $wishlist==''?'add':'delete' ?>">
                            <button type="submit" class="btn btn-info btn-sm d-inline-block"><?= $wishlist==''?'Tambah Whistlist':'Hapus Whistlist' ?></button>
                        </form>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>