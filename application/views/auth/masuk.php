<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-masuk_daftar.css" />
    <title>Masuk Warung Marena</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup signin">
          <form method="post" action="<?php echo base_url('auth/masuk') ?>" class="sign-in-form">
            <h2 class="title">Masuk</h2>
            <?php echo $this->session->flashdata('pesanaktivasi') ?>
            <div class="input-field">
            <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="email" id="email" value="<?= set_value('email'); ?>"/>
            </div>
            <?php echo form_error('email', '<p class="form-input-error">', '</p>') ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password" value="<?= set_value('password'); ?>"/>
            </div>
            <?php echo form_error('password', '<p class="form-input-error">', '</p>') ?>
            <?php echo $this->session->flashdata('pesan') ?>
            <input type="submit" value="Masuk" class="btn-submit solid" />
            <a class="forget-password" href="<?php echo base_url('auth/lupa_password') ?>">Lupa Password?</a>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Belum Punya Akun?</h3>
            <p style="">Buat akun untuk berbelanja di Warung Marena. Dengan membuat akun kamu bisa mudah bertransaksi di Warung Marena</p>
            <a class="btn transparent" href="<?php echo base_url('auth/daftar') ?>">Daftar</a>
          </div>
          <img src="<?php echo base_url() ?>assets/img/online-shopping-store.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>
