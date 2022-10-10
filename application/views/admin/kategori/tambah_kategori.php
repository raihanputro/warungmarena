<div class="container-fluid">
    <h3><i class="fas fa-edit"></i> TAMBAH KATEGORI</h3>

    <form method="post" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>NAMA KATEGORI</label>
            <input type="text" name="nama" class="form-control" value="<?= @$row->nama ?>">
        </div>
        
        <button type="submit" class="btn btn-primary btn-sm">SIMPAN</button>
    </form>

</div>