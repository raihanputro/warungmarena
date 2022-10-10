<div class="container mb-9">
    <h3>Ubah Profile</h3>
    
    <form method="post" action="<?= base_url('dashboard/profil') ?>" enctype='multipart/form-data'>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
      </div>
      
      <input type="hidden" name="gambarold" value="<?= $profil->foto ?>">
      
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $profil->nama ?>">
      </div>
      
      <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control" placeholder="Password">
      </div>
      
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $profil->alamat ?>">
      </div>
      
       <div class="form-group">
                            <label>RT/RW</label>
                            <select class="form-control" id="rt" name="rt" required>
                                <option>PILIH</option>
                                <option value="RT 07 / RW 09" <?= $user->rt=='RT 07 / RW 09' ? 'selected' : '' ?>>RT 07 / RW 09</option>
                                <option value="RT 06 / RW 09" <?= $user->rt=='RT 06 / RW 09' ? 'selected' : '' ?>>RT 06 / RW 09</option>
                                <option value="RT 05 / RW 09" <?= $user->rt=='RT 05 / RW 09' ? 'selected' : '' ?>>RT 05 / RW 09</option>
                                <option value="RT 04 / RW 09" <?= $user->rt=='RT 04 / RW 09' ? 'selected' : '' ?>>RT 04 / RW 09</option>
                                <option value="RT 14 / RW 09" <?= $user->rt=='RT 14 / RW 09' ? 'selected' : '' ?>>RT 14 / RW 09</option>
                            </select>
                        </div>
      
      <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="hp" class="form-control" placeholder="Telepon" value="<?= $profil->hp ?>">
      </div>
      
                        
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>