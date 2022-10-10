<div class="container-fluid">
    <h4 class="text-center mb-3">PEMBAYARAN</h4>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          
            <h3 class="text-center">Input alamat pengiriman dan pembayaran</h3>
            <form action="<?php echo base_url('dashboard/proses_pesanan') ?>" method="post">
                    
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="isi nama lengkap anda" class="form-control" value="<?= $user->nama ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="hp" placeholder="isi nomor telepon anda" class="form-control" value="<?= $user->hp ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input type="text" name="alamat" placeholder="isi alamat lengkap anda" class="form-control" value="<?= $user->alamat ?>" required>
                    </div>
                    
                    <div class="form-group">
                            <label>RT/RW</label>
                            <select class="form-control" id="rt" name="rt" required>
                                <option data-harga="0">PILIH</option>
                                <option value="RT 07 / RW 09|2000" data-harga="2000" <?= $user->rt=='RT 07 / RW 09' ? 'selected' : '' ?>>RT 07 / RW 09</option>
                                <option value="RT 06 / RW 09|3000" data-harga="3000" <?= $user->rt=='RT 06 / RW 09' ? 'selected' : '' ?>>RT 06 / RW 09</option>
                                <option value="RT 05 / RW 09|4000" data-harga="4000" <?= $user->rt=='RT 05 / RW 09' ? 'selected' : '' ?>>RT 05 / RW 09</option>
                                <option value="RT 04 / RW 09|5000" data-harga="5000" <?= $user->rt=='RT 04 / RW 09' ? 'selected' : '' ?>>RT 04 / RW 09</option>
                                <option value="RT 14 / RW 09|6000" data-harga="6000" <?= $user->rt=='RT 14 / RW 09' ? 'selected' : '' ?>>RT 14 / RW 09</option>
                            </select>
                        </div>
                    
                    <div class="form-group">
                        <label>Jasa Pengiriman</label>
                        <select class="form-control" name="ekspedisi" id="ekspedisi" required>
                            <option value="">PILIH</option>
                            <option value="ANTAR">ANTAR</option>
                            <option value="AMBIL SENDIRI">AMBIL DI WARUNG</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Pilih Metode Pembayaran</label>
                        <select class="form-control" name="metode" required>
                            <option>PILIH</option>
                            <option>BANK MANDIRI  - 1260007835720 A/N Raihan Putro Maulana Rizky</option>
                            <option>BANK BCA DIGITAL - 006511494796 A/N Raihan Putro Maulana Rizky</option>
                            <option>BANK JAGO - 107342681660 A/N Raihan Putro Maulana Rizky</option>
                            <option>GOPAY - 085156637952 A/N Raihan Putro Maulana Rizky</option>
                            <option>DANA - 085156637952 A/N Raihan Putro Maulana Rizky</option>
                            <option>Bayar di Warung</option>
                            <option>COD (Cash On Delivery)</option>
                        </select>
                    </div>
                    <?php 
                    $grand_total = 0;  
                    if($keranjang = $this->cart->contents())
                    {
                        foreach($keranjang as $item)
                        {
                            $grand_total = $grand_total + $item['subtotal'];
                        }

                        echo "<input type='hidden' name='subtotal' value='$grand_total'><span id='subtotal' hidden>$grand_total</span><h4 id='template' hidden>Total belanja anda : Rp. ".number_format($grand_total, 0,',','.') . "</h4><h4 id='total'>Total belanja anda : Rp. ".number_format($grand_total, 0,',','.') . "</h4>";
                   
                ?>

                    <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
            </form>

            <?php
             }else{
                 echo "<h4>Keranjang belanja masih kosong";
             }
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>