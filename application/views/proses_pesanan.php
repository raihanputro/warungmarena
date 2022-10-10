<div class="container-fluid">
    <?php if (!isset($from)) { ?>
    <div class="alert alert-success">
        <p class="text-center align-middle">Selamat, pesanan anda telah berhasil di proses</p>
        
        <p class="text-center align-middle">Silahkan Transfer ke <?= $metode ?></p>
    </div>
    <?php } else { ?>
    <div class="alert alert-success">
        <h2 class="text-center align-middle">Silahkan Transfer ke <?= $invoice->metode ?></h2>
        <h2 class="text-center align-middle">Batas Bayar <?= $invoice->batas_bayar ?></h2>
        <?php 
            if($invoice->status =='Pending') { 
                $text = "Pesanan anda sudah masuk, Akan segera kami layani";
            } elseif($invoice->status =='Proses') {
                $text = "Pesanan Anda sedang di proses";
            } elseif($invoice->status =='Selesai') {
                $text = "Pesanan anda sudah terkirim";
            }
        ?>
        <h2 class="text-center align-middle"><?= $text ?></h2>
    </div>
    
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
    <?php } ?>
    
    <h3 class="text-center">Upload Bukti Transfer</h3>
    
    <form action="<?= base_url('dashboard/upload/'.$id) ?>" method="post" enctype='multipart/form-data'>
        <input type="file" class="form-control mb-3" name="file" />
        <button class="btn btn-primary">Upload</button>
    </form>
</div>