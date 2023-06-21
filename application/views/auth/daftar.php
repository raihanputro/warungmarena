<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-masuk_daftar.css" />
    <title>Daftar Warung Marena</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup signup">
          <form method="post" action="<?php echo base_url('auth/daftar') ?>" class="sign-up-form">
            <h2 class="title">Daftar</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" value="<?= set_value('username'); ?>"/>  
            </div>
            <?php echo form_error('username', '<p class="form-input-error">', '</p>') ?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="email" value="<?= set_value('email'); ?>"/>
            </div>
            <?php echo form_error('email', '<p class="form-input-error">', '</p>') ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password_1"/>
            </div>
            <?php echo form_error('password_1', '<p class="form-input-error">', '</p>') ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Ulangi Password" name="password_2"/>
            </div>
            <input type="submit" class="btn-submit solid" value="Daftar" />
          </form>   
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Sudah Punya Akun?</h3>
            <p>Masuk menggunakan akun yang sudah dibuat untuk berbelanja di Warung Marena.</p>
            <a class="btn transparent" href="<?php echo base_url('auth/masuk') ?>">Masuk</a>
          </div>
          <img src="<?php echo base_url() ?>assets/img/empty-cart.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </body>
</html>
