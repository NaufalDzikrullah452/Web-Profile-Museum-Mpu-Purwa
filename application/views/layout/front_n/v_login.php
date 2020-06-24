<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - SI Museum Mpu Purwa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/backend/images/icon/simuseum.png');?>">
    <link rel="stylesheet" href="<?= config_item('css2') ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>themify-icons.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>metisMenu.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?= config_item('css2') ?>typography.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>default-css.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>styles.css">
    <link rel="stylesheet" href="<?= config_item('css2') ?>responsive.css">
    <!-- modernizr css -->
    <script src="<?= config_item('js2') ?>vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg2">
        <div class="container">
        
            <div class="login-box ptb--100">
           
             
             
                <form action="<?php echo base_url('index.php/Login/auth'); ?>" method="post">
                
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <p>Sistem Infomasi Mpu Purwa Malang </p>
                    </div>
                    <?php echo $this->session->flashdata('msg');?>
                    <div class="login-form-body">
                        <div class="form-gp">
                            
                            <input type="email" name="username" placeholder="Email" required>
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            
                            <input type="password" name="password" placeholder="Password" required>
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button type="submit">Login <i class="ti-arrow-right"></i></button>
                            <br><br>
                            <a href="<?php echo base_url();?>index.php">Kembali</a>
                        </div>
                        </div>
                        </form>
                        </div>
                        </div>
                        </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="<?php echo base_url('assets/backend/js/vendor/jquery-2.2.4.min.js');?>"></script>
    <!-- bootstrap 4 js -->
    <script src="<?= config_item('js2') ?>popper.min.js"></script>
    <script src="<?= config_item('js2') ?>bootstrap.min.js"></script>
    <script src="<?= config_item('js2') ?>owl.carousel.min.js"></script>
    <script src="<?= config_item('js2') ?>metisMenu.min.js"></script>
    <script src="<?= config_item('js2') ?>jquery.slimscroll.min.js"></script>
    <script src="<?= config_item('js2') ?>jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="<?= config_item('js2') ?>plugins.js"></script>
    <script src="<?= config_item('js2') ?>scripts.js"></script>
</body>

</html>