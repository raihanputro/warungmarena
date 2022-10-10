<div class="container">
    <h3>Pesanan</h3>
    
    <table class="table table-bordered table-striped">
        <tr class="text-center">
            <td>Invoice</td>
            <td>Nama</td>
            <td>Total</td>
            <td>Batas Bayar</td>
            <td>Aksi</td>
        </tr>
        <?php foreach($pesanan as $item) { ?>
        <tr class="text-center">
            <td><?= $item->id ?></td>
            <td><?= $item->nama ?></td>
            <td><?= number_format($item->ongkir+$item->subtotal) ?></td>
            <td><?= $item->batas_bayar ?></td>
            <td>
                <a href="<?= base_url('dashboard/upload_bukti/'.$item->id) ?>" class="btn btn-primary">Upload Bukti</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>