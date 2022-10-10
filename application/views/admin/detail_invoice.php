<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sl btn-success">No. Invoice : <?php echo $invoice->id ?></div></h4>
    
    <?php if ($invoice->bukti != '') { ?>
        <img src="<?= base_url('uploads/bukti/'.$invoice->bukti) ?>" class="img-fluid" width="550" />
    <?php } ?>
    
    <h6>Update Status</h6>
    <form action="<?= base_url('admin/invoice/updatestatus/'.$invoice->id) ?>" method="post">
        <select class="form-control mb-2" name="status">
            <option value="Pending" <?= $invoice->status=='Pending'?'selected':'' ?> >Pending</option>
            <option value="Proses" <?= $invoice->status=='Proses'?'selected':'' ?>>Proses</option>
            <option value="Selesai" <?= $invoice->status=='Selesai'?'selected':'' ?>>Selesai</option>
        </select>
        <button class="btn btn-primary mb-3">Update</button>    
    </form>
    
    <table class="table table-bordered bg-white">
        <tr>
            <td>Nama Pemesan</td>
            <td><?= $invoice->nama ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $invoice->alamat ?></td>
        </tr>
        <tr>
            <td>No Hp</td>
            <td><?= $invoice->hp ?></td>
        </tr>
        <tr>
            <td>Rt / Rw</td>
            <td><?= $invoice->rt ?></td>
        </tr>
        <tr>
            <td>Metode</td>
            <td><?= $invoice->metode ?></td>
        </tr>
        <tr>
            <td>Tanggal Pesan</td>
            <td><?= date('d-m-Y H:i:s',strtotime($invoice->tgl_pesan)) ?></td>
        </tr>
        <tr>
            <td>Batas Bayar</td>
            <td><?= date('d-m-Y H:i:s',strtotime($invoice->batas_bayar)) ?></td>
        </tr>
    </table>
    
    <table class="table table-bordered table-hover table-striped text-center">
        <tr>
            <th>ID BARANG</th>
            <th>NAMA BARANG</th>
            <th>JUMLAH PESANAN</th>
            <th>HARGA SATUAN</th>
            <th>SUB-TOTAL</th>
        </tr>

        <?php 
            $total = 0; 
            foreach($pesanan as $psn) : $subtotal = $psn->jumlah * $psn->harga; $total += $subtotal;
        ?>

            <tr>
                <td><?php echo $psn->id_brg ?></td>
                <td><?php echo $psn->nama_brg ?></td>
                <td><?php echo $psn->jumlah ?></td>
                <td>Rp. <?php echo number_format($psn->harga, 0,',','.') ?></td>
                <td>Rp. <?php echo number_format($subtotal, 0,',','.') ?></td>
            </tr>

        <?php endforeach ?>
        <tr>
            <td colspan="3" align="center"></td>
            <td>Ongkir</td>
            <td  align="center">Rp. <?php echo number_format($invoice->ongkir, 0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="center">Grand Total</td>
            <td  align="center">Rp. <?php echo number_format($total+$invoice->ongkir, 0,',','.') ?></td>
        </tr>
    </table>

    <a href="<?php echo base_url('admin/invoice/index') ?>"><div class="btn btn-sm btn-primary">Kembali</div></a>
</div>