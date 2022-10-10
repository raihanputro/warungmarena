<div class="container-fluid">
    <h4 class="text-center mb-3">KERANJANG BELANJA</h4>

    <table class="table table-bordered table-striped table-hover text-center">
        <tr>
            <th>NO</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>SUB-TOTAL</th>
            <th>AKSI</th>
        </tr>

        <?php $no=1; foreach($this->cart->contents() as $items) : ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $items['name'] ?></td>
                <td>
                    <form action="<?= base_url('dashboard/update_item/'.$items['rowid']) ?>">
                        <div class="row">
                        <input type="number" name="qty" value="<?php echo $items['qty'] ?>" class="form-control col-md-6" min="0">
                        
                        <button type="submit" class="btn btn-primary btn-sm col-md-6">Update</button>
                        </div>
                    </form>
                    
                </td>
                <td align="right">Rp. <?php echo number_format($items['price'], 0,',','.') ?></td>
                <td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></td>
                <td>
                    <a href="<?= base_url('dashboard/update_item/'.$items['rowid']) ?>?qty=0" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>

        <?php endforeach ?>
            <tr>
                <td colspan="4">TOTAL</td>
                <td align="right">Rp. <?php echo number_format($this->cart->total(), 0,',','.' ) ?></td>
            </tr>
    </table>
    <div align="right">
        <a href="<?php echo base_url('dashboard/hapus_keranjang') ?>">
            <div class="btn btn-sm btn-danger mr-2">Hapus Keranjang</div>
        </a>
        <a href="<?php echo base_url('welcome') ?>">
            <div class="btn btn-sm btn-primary mr-2">Lanjutkan belanja</div>
        </a>
        <a href="<?php echo base_url('dashboard/pembayaran') ?>">
            <div class="btn btn-sm btn-success">Pembayaran</div>
        </a>
    </div>
    
    <h4 class="text-center mb-3">WISHLIST</h4>
    
    <div class="row text-center mt-4 mx-0">

        <?php foreach ($wishlist as $brg) : ?>
        <div class="col-6 col-md-3 mb-2 px-1">
            <a href="<?= base_url('dashboard/detail/'.$brg->id_brg) ?>" style="text-decoration:none;" class="text-dark">
                <div class="card">
                    <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" alt="...">
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
</div>