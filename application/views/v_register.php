<!-- Top content -->
<div class="top-content">
  
  <div class="inner-bg">
    <div class="container">
      
      <div class="row">
        <div class="col-sm-5">
          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3><b>Mengapa Member Jadimanten?</b></h3><hr>
              </div>
            </div>
            <div class="form-top">
              <div class="form-top-left">
                <h3 class="block wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="500ms"><i>Jaminan Harga Terbaik</i></h3>
                <p class="block wow fadeInLeft" data-wow-delay=".4s" data-wow-duration="500ms">Khusus member, Anda dijamin mendapat harga termurah setiap hari.</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-usd block wow fadeInRight" data-wow-delay=".4s" data-wow-duration="500ms"></i>
              </div>
            </div>
            <div class="form-top">
              <div class="form-top-left">
                <h3 class="block wow fadeInLeft" data-wow-delay=".6s" data-wow-duration="500ms"><i>Diskon Eksklusif via Email</i></h3>
                <p class="block wow fadeInLeft" data-wow-delay=".6s" data-wow-duration="500ms">Pastikan Anda mendapat info promo terbaru dan diskon khusus member.</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-envelope-o block wow fadeInRight" data-wow-delay=".6s" data-wow-duration="500ms"></i>
              </div>
            </div>
            <div class="form-top">
              <div class="form-top-left">
                <h3 class="block wow fadeInLeft" data-wow-delay=".8s" data-wow-duration="500ms"><i>Atur Pemesanan dan Ajukan Refund dari Semua Perangkat</i></h3>
                <p class="block wow fadeInLeft" data-wow-delay=".8s" data-wow-duration="500ms">Tersinkronisasi otomatis, akses semua detail booking dari mana pun. Ajukan refund online, kami urus sampai tuntas tanpa biaya apa pun.
                </p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-gears block wow fadeInRight" data-wow-delay=".8s" data-wow-duration="500ms"></i>
              </div>
            </div>
          </div>
          
          
          
        </div>
        
        <div class="col-sm-1 middle-border"></div>
        <div class="col-sm-1"></div>
        
        <div class="col-sm-5">
          
          <div class="form-box">
            <div class="form-top">
              <div class="form-top-left">
                <h3>Gabung Jadimanten Sekarang!</h3>
                <p class="block wow bounceInDown" data-wow-delay=".12s">Sudah memiliki akun? Masuk <u><a href="<?php echo base_url(); ?>login">disini</a></u>.</p>
              </div>
              
            </div>
            <div class="form-bottom">
              <form method="post" action="<?php echo base_url(); ?>register" class="registration-form">
                <!-- <form method="post" action="<?php echo base_url(); ?>register" class="form-horizontal"> -->
                <?php if($this->session->flashdata('telepon_konfirm')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('telepon_konfirm'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('telepon')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('telepon'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('message')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-check"></div>&nbsp;<?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('warning')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('warning'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('username')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('username'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('username_konfirm')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('username_konfirm'); ?>
                </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('password')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('password'); ?>
                </div>
                <?php endif; ?>
                
                
                <div class="form-group">
                  
                  <?php if ($this->session->flashdata('NAM')):
                  $NAM = $this->session->flashdata('NAM');
                  else :
                  $NAM="";
                  endif?>
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $NAM; ?>" required>
                  
                </div>
                
                <div class="form-group">
                  <?php if ($this->session->flashdata('TELEPO')):
                  $TELEPO = $this->session->flashdata('TELEPO');
                  else :
                  $TELEPO="";
                  endif?>
                  <input type="number" name="telepon" class="form-control" placeholder="Nomor Telepon" value="<?php echo $TELEPO; ?>" required>
                </div>
                <div class="form-group">
                  <?php if ($this->session->flashdata('KELAMIN')):
                  $KELAMIN = $this->session->flashdata('KELAMIN');
                  else :
                  $KELAMIN="";
                  endif?>
                  <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="<?php echo $KELAMIN; ?>" required>
                </div>
                <div class="form-group">
                  <?php if ($this->session->flashdata('USERNAM')):
                  $USERNAM = $this->session->flashdata('USERNAM');
                  else :
                  $USERNAM="";
                  endif?>
                  <input type="email" name="username" class="form-control" placeholder="Username" value="<?php echo $USERNAM; ?>" required>
                  <p><small><span style="color: #FA2600">*</span><span style="color: #fff"> Username diisi dengan </span><span style="color: #FA2600">email</span><span style="color: #fff">. Username tidak dapat diganti, pastikan </span><span style="color: #FA2600">email</span><span style="color: #fff"> anda benar !</span></small>
                  </p>
              </div>
              <div class="form-group">
                <?php if ($this->session->flashdata('PASSWOR')):
                $PASSWOR = $this->session->flashdata('PASSWOR');
                else :
                $PASSWOR="";
                endif?>
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $PASSWOR; ?>" required>
                
              </div>
              <br>
              <center><p><i><small><span style="color: #fff">Dengan melakukan pendaftaran, saya setuju dengan</span> <u><a href="#">Kebijakan Privasi</a></u> <span style="color: #fff">dan</span> <u><a href="#">Syarat & Ketentuan</a></u> <span style="color: #fff">Jadimanten.</span></small></i></p></center>
              <br>
              <button type="submit" class="btn btn-danger btn-block btn-flat">Daftar</button>
            </form>
          </div>
        </div>
        
      </div>
    </div>
    
  </div>
</div>

</div>