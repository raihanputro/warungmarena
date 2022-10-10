<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
                            </div>
                            <form method="post" action="<?php echo base_url('registrasi/index') ?>" class="user"> 
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="nama anda" name="nama">
                                    <?php echo form_error('nama', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="usename anda" name="username">
                                    <?php echo form_error('username', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password_1">
                                        <?php echo form_error('password_1', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="telepon anda" name="hp">
                                    <?php echo form_error('hp', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="alamat anda" name="alamat">
                                    <?php echo form_error('alamat', '<div class="text-danger small ml-2 mt-2">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="rt" name="rt" required>
                                        <option data-harga="">PILIH RT / RW</option>
                                        <option value="RT 07 / RW 09">RT 07 / RW 09</option>
                                        <option value="RT 06 / RW 09">RT 06 / RW 09</option>
                                        <option value="RT 05 / RW 09">RT 05 / RW 09</option>
                                        <option value="RT 04 / RW 09">RT 04 / RW 09</option>
                                        <option value="RT 14 / RW 09">RT 14 / RW 09</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar Akun</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah punya akun? silahkan login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>