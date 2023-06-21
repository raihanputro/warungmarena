<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-masuk_daftar.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title>Ubah Password Warung Marena</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="<?php echo base_url('auth/ubah_password') ?>" class="sign-in-form">
            <h2 class="title">Ubah Password</h2>
            <p><?= $this->session->userdata('reset_email') ?></p>
            <?php echo $this->session->flashdata('pesanresetpassword') ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password Baru" name="password_1"/>
            </div>
            <?php echo form_error('password_1', '<p class="form-input-error">', '</p>') ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Ulangi Password" name="password_2"/>
            </div>
            <?php echo form_error('password', '<p class="form-input-error">', '</p>') ?>
            <?php echo $this->session->flashdata('pesan') ?>
            <input type="submit" value="Ubah Password" class="btn-submit solid" />
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Sudah inget passwordnya?</h3>
            <p>Lupa memang sudah kodrat nya manusia. Yuk buat kamu yang sudah inget password nya bisa masuk ya dengan akun kamu!</p>
            <a class="btn transparent" href="<?php echo base_url('auth/masuk') ?>">Masuk</a>
          </div>
          <img src="<?php echo base_url() ?>assets/img/online-shopping-store.svg" class="image" alt="" />
        </div>
      </div>
    </div>
    <script>
         $('.close-btn').click(function(){
           $('.alert').removeClass("show");
           $('.alert').addClass("hide");
         });
    </script>
  </body>
</html>
