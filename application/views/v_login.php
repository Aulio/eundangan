

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Masuk ke Akun Anda</h3>
                                    <p>Masukkan Username dan Kata Sandi :</p>
                                    <small><p><u><a href="#">Lupa Kata Sandi ?</a></u></p></small>
                                </div>
                               
                            </div>
                            <div class="form-bottom">
                                <?php if($this->session->flashdata('message')): ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <?php endif; ?>
                                <?php if($this->session->flashdata('warning')): ?>
                                <div class="alert alert-warning">
                                    <?php echo $this->session->flashdata('warning'); ?>
                                </div>
                                <?php endif; ?>
                            <form role="form" action="<?php echo base_url('login/cek'); ?>" method="post">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                       <?php if ($this->session->flashdata('username')):
                                        $username = $this->session->flashdata('username');
                                        else :
                                        $username="";
                                        endif?>
                                        <input class="form-control" placeholder="Username"  name="username" value="<?php echo $username; ?>" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Kata Sandi</label>
                                        <input class="form-control" name="password" placeholder="Kata Sandi" type="password" >
                                    </div>
                                    <button type="submit" class="btn">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login wow bounceInUp animated slide" data-wow-delay=".6s">
                            <h3>Belum punya akun jadimanten? Daftar <u><a href="<?php echo base_url(); ?>register">di sini</a></u>.</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>



