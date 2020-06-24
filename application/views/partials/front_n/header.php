<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $title; ?></title>

   

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url().'upload/images/'.$site_shortcut_icon;?>">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/style.css');?>">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="<?php echo base_url().'upload/images/'.$site_shortcut_icon;?>" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="<?php echo base_url();?>"  ><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: <?php echo $site_email;?></span></a>
                                <a href="<?php echo base_url();?>"  ><i class="fa fa-phone" aria-hidden="true"></i> <span>Telp: <?php echo $site_telephone;?></span></a>
                            </div>

                           
                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Login -->
                                <div class="login">
                                    <a href="<?php echo base_url();?>index.php/Login"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>