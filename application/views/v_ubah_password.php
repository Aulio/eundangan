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
		            <form method="post" action="<?php echo base_url(); ?>register/reset_password/<?php echo $kode; ?>">
				<div class="row">
	           	 	<div class="col-lg-2"></div>
	                <div class="col-lg-8"><br><br>
	                	<div class="panel1 panel1-default">
					<!-- Content Wrapper. Contains page content -->
							<div class="row">
		                         <div class="col-lg-1"></div>
		                         <div class="col-lg-10">	
					   				
						              			<h2><span style="color: #ff3704"><center>Password baru</center></span></h2> 
						              			<p>
									               	Masukkan password baru anda.
						              			</p>
						              				<hr>
						              				<?php if($this->session->flashdata('message')): ?>
					                                    <div class="alert alert-success">
					                                        <?php echo $this->session->flashdata('message'); ?>
					                                    </div>
					                               <?php endif; ?>
						              				<?php if($this->session->flashdata('password_konfirm')): ?>
					                                    <div class="alert alert-danger">
					                                        <?php echo $this->session->flashdata('password_konfirm'); ?>
					                                    </div>
					                               <?php endif; ?>
					                               <?php if($this->session->flashdata('password')): ?>
					                                    <div class="alert alert-danger">
					                                        <?php echo $this->session->flashdata('password'); ?>
					                                    </div>
					                               <?php endif; ?>
					                               
						              			<div class="form-group">
                 								<div class="col-lg-4">
                       	 							<p>Password baru:</p>
                       	 						</div>
                       	 						<div class="col-lg-8">
                       	 							<div class="input-group">
                                   						 <div class="input-group-addon">
                                         					<div class="fa fa-lock "></div>
                                   						 </div>
                        								<input type="password" name="password" class="form-control" required>
                        							</div>
                        						</div><br>
                   	 						</div><br>
                   	 						<div class="form-group">
                 								<div class="col-lg-4">
                       	 							<p>Konfirmasi Password :</p>
                       	 						</div>
                       	 						<div class="col-lg-8">
                       	 							<div class="input-group">
                                   						 <div class="input-group-addon">
                                         					<div class="fa fa-lock "></div>
                                   						 </div>
                        								<input type="password" name="konfirm_password" class="form-control" required>
                        							</div>
                        						</div><br>
                   	 						</div><br>
						              				
						              				<hr>
						              				<div class="col-lg-3"></div>
                   	 								<div class="col-lg-6">
												          <button type="submit" class="btn btn-block btn-flat btn-success">Simpan </button><br>
											         </div>
											         <div class="col-lg-3"></div>
						              				
						              			
						          </div>
						          <div class="col-lg-1"></div>
					    	</div>
					    </div><br><br>
					</div>
				 	<div class="col-lg-2"></div>
				</div>
				</form>
			</center>
		</div>
	