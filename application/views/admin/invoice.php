<div class="container-fluid text-center">
    <h4>INVOICE PEMESANAN BARANG</h4>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID INVOICE</th>
            <th>NAMA PEMESAN</th>
            <th>ALAMAT PENGIRIMAN</th>
            <th>TANGGAL PEMESANAN</th>
            <th>BATAS PEMBAYARAN</th>
            <th>AKSI</th>
        </tr>

        <?php foreach($invoice as $inv) : ?>

        <tr>
            <td><?php echo $inv->id ?></td>
            <td><?php echo $inv->nama ?></td>
            <td><?php echo $inv->alamat ?></td>
            <td><?php echo $inv->tgl_pesan ?></td>
            <td><?php echo $inv->batas_bayar ?></td>
            <td><?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
        </tr>

        <?php endforeach ?>
    </table>
</div>