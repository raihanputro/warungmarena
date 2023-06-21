<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-masuk_daftar.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <title>Lupa Password Warung Marena</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="post" action="<?php echo base_url('auth/lupa_password') ?>" class="sign-in-form">
            <h2 class="title">Lupa Password</h2>
            <?php echo $this->session->flashdata('pesanresetpassword') ?>
            <div class="input-field">
            <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="email" id="email" value="<?= set_value('email'); ?>"/>
            </div>
            <?php echo form_error('email', '<p class="form-input-error">', '</p>') ?>
            <?php echo $this->session->flashdata('pesan') ?>
            <input type="submit" value="Reset Password" class="btn-submit solid" />
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
