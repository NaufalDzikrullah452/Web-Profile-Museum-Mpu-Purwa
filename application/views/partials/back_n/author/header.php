<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/backend/images/icon/simuseum.png');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/themify-icons.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/metisMenu.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/slicknav.min.css');?>">
    
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/typography.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/default-css.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/styles.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/responsive.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/dropify.min.css');?>">
    <!-- Plugin -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/toastr/jquery.toast.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/summernote-master/summernote.css');?>">
    <!-- modernizr css -->
    <script src="<?php echo base_url('assets/backend/js/vendor/modernizr-2.8.3.min.js');?>"></script>
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
    <!-- page container area start -->
    <div class="page-container">
     <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- navbutton -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            
                            <?php
                                    $count_comment = $this->db->get_where('tbl_comment', array('comment_status' => '0'));
                            ?>
                            <li class="dropdown">
                                <i class="ti-comment-alt dropdown-toggle" data-toggle="dropdown">
                                <span><?php echo $count_comment->num_rows();?></span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">Anda memiliki <?php echo $count_comment->num_rows();?> komentar baru ! <a href="<?php echo site_url('index.php/back_n/author/comment_author/unpublish');?>">semua</a></span>
                                    <div class="nofity-list">
                                        <?php 
                                            $query_cmt = $this->db->get_where('tbl_comment', array('comment_status' => '0'), 6);
                                            foreach ($query_cmt->result() as $row) :
                                        ?>
                                        <a href="<?php echo site_url('index.php/back_n/author/comment_author/unpublish');?>" class="notify-item">
                                        <div class="notify-thumb">
                                            <img class="img-circle" src="<?php echo base_url().'upload/user/user_blank.png';?>" alt="">
                                        </div>
                                            <div class="notify-text">
                                                <p><?php echo $row->comment_name;?></p>
                                                <span class="msg"><?php echo word_limiter($row->comment_message,5);?></span>
                                                <span><?php echo date('d-m-Y H:i:s', strtotime($row->comment_date));?></span>
                                            </div>
                                        </a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </li>
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-close"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->