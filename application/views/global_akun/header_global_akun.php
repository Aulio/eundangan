<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Jadimanten | Official Website</title>
        <link href="<?php echo base_url(); ?>assets/akun/images/ico/favicon.ico" rel="icon" type="ico">
    <link href="<?php echo base_url(); ?>assets/akun/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/akun/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/akun/css/animate.min.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/akun/css/lightbox.css" rel="stylesheet"> 
    <link href="<?php echo base_url(); ?>assets/akun/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/akun/css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/akun/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/akun/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/akun/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/akun/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body onunload="">
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="<?php echo base_url(); ?>akun/dashboard">
                        <h1><img src="<?php echo base_url(); ?>assets/akun/images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url(); ?>akun/dashboard">Beranda</a></li>
                         <li><a href="#">Buku Tamu</a></li>
                          <li><a href="#">Doa & Harapan</a></li>
                           <li><a href="<?php echo base_url() ?>undangan/data_mempelai"><span style="color: #FA2600"><b>Kelola Undangan</b></span></a></li>
                       
                        <li class="dropdown"><a href="#">
                            <i class="fa fa-user fa-fw"></i>  
                        <?php echo $this->session->userdata('SESS_AKUN_NAMA_USER');?>
                        
                       <i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="<?php echo base_url() ?>akun/profile/detail/<?php echo $this->session->userdata('SESS_AKUN_ID_USER');?>"><i class="fa fa-user fa-fw"></i> Profil</a></li>
                                
                                <li><a href="<?php echo base_url() ?>akun/dashboard/logout_konfirm/<?php echo $this->session->userdata('SESS_AKUN_ID_USER');?>" class="mb-control" data-box="#mb-signout"><i class="fa fa-power-off"></i> keluar</a></li>

                            </ul>
                        </li>                   
                    </ul>
                </div>
               
            </div>
        </div>
    </header>
    <!--/#header-->

<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                   <div class="mb-title"><span class="fa fa-power-off"></span> <strong>Keluar</strong> ?</div>
                    <div class="mb-content">
                        <p>Apakah anda yakin ingin keluar ?</p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            
                            <button class="btn btn-default btn-md mb-control-close"><i class="fa fa-times"></i> Tidak</button>&nbsp;&nbsp;
                            <a href="<?php echo base_url(); ?>akun/dashboard/logout_konfirm/<?php echo $this->session->userdata('SESS_AKUN_ID_USER');?>" id="delete" class="btn btn-success btn-md"><div class="fa fa-check"></div> Ya</a>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
   

   