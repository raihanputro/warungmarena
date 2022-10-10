<div class="container-fluid">
    <h4 class="text-center">DATA KATEGORI</h4>
    <a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah</a>
    
    <table class="table table-bordered text-center">
        <tr>
            <th text-center>NO</th>
            <th>NAMA</th>
            <th colspan="2">AKSI</th>
        </tr>

        <?php
        $no=1;
        foreach($kategori as $item) : ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $item->nama ?></td>
            <td>
                <?php echo anchor('admin/kategori/edit/' .$item->id, '<div class="btn btn-primary btn-sm"><i
                        class="fas fa-edit"></i>
                </div>') ?>
            </td>
            <td>
                <?php echo anchor('admin/kategori/delete/' .$item->id, '<div class="btn btn-danger btn-sm"><i
                        class="fas fa-trash"></i>
                </div>') ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
</div>

