<header id="head" class="third">
        <div class="container">
            <div class="row">
                <!-- <div class="col-sm-8">
                    <h1>Kontak kami</h1>
                </div> -->
            </div>
        </div>
    </header> 
		<div class="container">
			<br><br>
		    <center>
		            <!-- /.row -->
		            <form method="post" action="<?php echo base_url(); ?>reset">
				<div class="row">
	           	 	<div class="col-lg-2"></div>
	                <div class="col-lg-8"><br><br>
	                	<div class="panel1 panel1-default">
					<!-- Content Wrapper. Contains page content -->
							<div class="row">
		                         <div class="col-lg-1"></div>
		                         <div class="col-lg-10">	
					   				
						              			<h2><span style="color: #ff3704"><center>Lupa password anda?</center></span></h2> 
						              			<p>
									               	Masukkan email login Anda dibawah ini. Kami akan mengirimkan pesan email beserta link untuk reset password Anda.
						              			</p>

						              				<hr>
						              				<?php if($this->session->flashdata('message')): ?>
                                    <div class="alert alert-danger">
                                       <div class="fa  fa-exclamation-circle"></div> <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                               <?php endif; ?>
						              				<div class="form-group">
						              					<div class="col-lg-2"></div>
		                         						<div class="col-lg-8">
		                         							<?php if ($this->session->flashdata('username')):
                                      							$email_user = $this->session->flashdata('username');
                                      							else :
                                      							$email_user="";
                                      							endif?>
						              						<input type="email" name="username" class="form-control" placeholder="Masukkan username anda" value="<?php echo $username; ?>" required>
						              					</div>
						              					<div class="col-lg-2"></div>
						              				</div>
						              				<br><br>
						              				<hr>
						              				<div class="col-lg-3"></div>
                   	 								<div class="col-lg-6">
												          <button type="submit" class="btn btn-block btn-flat btn-success">Reset </button><br>
											         </div>
											         <div class="col-lg-3"></div><br><br>
						              				
						              			
						          </div>
						          <div class="col-lg-1"></div>
					    	</div>
					    </div><br><br><br><br>
					</div>
				 	<div class="col-lg-2"></div>
				</div>
				</form>
			</center>
		</div>
	