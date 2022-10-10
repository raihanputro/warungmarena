<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>
    <?php foreach($barang as $brg) : ?>
    <form method="post" action="<?php echo base_url().'admin/data_barang/update'  ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label>GAMBAR</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        
        <input type="hidden" name="gambar_old" class="form-control" value="<?php echo $brg->gambar ?>">
        
        <div class="form-group">
            <label>NAMA BARANG</label>
            <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
        </div>
        <div class="form-group">
            <label>KETERANGAN</label>
            <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
            <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
        </div>
        <div class="form-group">
            <label>KATEGORI</label>
            <select class="form-control" name="kategori_id">
                <?php foreach($kategori as $item) { ?>
                <option value="<?= $item->id ?>" <?= $brg->kategori_id==$item->id?'selected':'' ?>><?= $item->nama ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>HARGA</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
        </div>
        <div class="form-group">
            <label>STOK</label>
            <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
    </form>
    <?php endforeach ?>
</div>