<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $judul;?></title>

   <!-- SEO Tags -->
    <meta name="description" content="Kumpulan artikel <?php echo $meta_description;?> dan banyak lagi..."/>
    <link rel="canonical" href="<?php echo $canonical;?>" />
    <?php error_reporting(0); if(empty($url_prev)):?>
    <?php else:?>
    <link rel="prev" href="<?php echo $url_prev;?>" />
    <?php endif;?>
    <link rel="next" href="<?php echo $url_next;?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $judul;?>" />
    <meta property="og:description" content="Kumpulan artikel <?php echo $meta_description;?> dan banyak lagi..." />
    <meta property="og:url" content="<?php echo $canonical;?>" />
    <meta property="og:image" content="<?php echo base_url().'theme/images/logo.png'?>" />
    <meta property="og:image:secure_url" content="<?php echo base_url().'theme/images/logo.png'?>" />
    <meta property="og:image:width" content="560" />
    <meta property="og:image:height" content="315" />
    <!-- / SEO plugin. -->

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

 <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="<?php echo base_url();?>index.php" class="nav-brand"><img src="<?php echo base_url().'upload/images/'.$site_logo_header;?>" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo site_url();?>">Beranda</a></li>
                                    <li><a href="<?php echo site_url('index.php/about');?>">Tentang Kami</a></li>
                                    <li><a href="<?php echo site_url('index.php/blog');?>">Blog</a></li>
                                    <li><a href="<?php echo site_url('index.php/collect');?>">Koleksi</a></li>
                                    <li><a href="#">Kontak</a>
                                        <ul class="dropdown">
                                            <li><a href="<?php echo site_url('index.php/reserv');?>">Reservasi</a></li>
                                    <li><a href="<?php echo site_url('index.php/contact');?>">Map & Kontak</a></li>
                                    </li>
                                </ul>
                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/bg_1.jpg');?>);">
            <h2>Search </h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pencarian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="alazea-blog-area mb-100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-8">
                        <div class="shop-page-count">
                            <p><b><?php echo strtoupper($judul);?></b></p>
                        </div>
                <div class="row">
                    
                        <!-- Single Blog Post Area -->
                        <?php foreach ($data->result() as $row):?>
                        <div class="col-12 col-lg-6">
                            <div class="single-blog-post mb-50">
                                <div class="post-thumbnail mb-30">
                                    <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><img src="<?php echo base_url().'upload/post/'.$row->post_image;?>" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>" class="post-title">
                                        <h5><?php echo $row->post_title;?></h5>
                                    </a>
                                    <div class="post-meta">
                                        <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d M Y',strtotime($row->post_date));?></a>
                                        <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $row->user_name;?></a>
                                        <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row->post_views;?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?> 

                    </div>

                    <!-- Pagination -->
                   <?php echo $page;?>
                    <!-- End Pagination -->
                </div>
                
                <div class="col-12 col-md-4">
                    <div class="post-sidebar-area">

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <form method="get" action="<?php echo site_url('index.php/result/search');?>" class="search-form">
                                <input type="text" name="search_query"  placeholder="Cari disini..." required>
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Blog Populer</h4>
                            </div>

                            <!-- Single Posts -->
                            <?php foreach ($populer_post->result() as $row):?>
                            <div class="single-latest-post d-flex align-items-center">
                                <div class="post-thumb">
                                    <img src="<?php echo base_url().'upload/post/'.$row->post_image;?>" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>" class="post-title">
                                        <h6><?php echo $row->post_title;?></h6>
                                    </a>
                                    <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>" class="post-date"><?php echo date('d M Y',strtotime($row->post_date));?></a>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>

                        <!-- ##### Single Widget Area ##### -->
                        <div class="single-widget-area">
                            <!-- Title -->
                            <div class="widget-title">
                                <h4>Kategori </h4>
                            </div>
                            <!-- Tags -->
                            <ol class="popular-tags d-flex flex-wrap">
                            <?php 
							$query=$this->db->get('tbl_category', 5);
							foreach ($query->result() as $row):
						    ?>
                                <li><a href="<?php echo site_url('index.php/category/'.$row->category_slug);?>"><?php echo strtoupper($row->category_name);?></a></li>
                            <?php endforeach;?>
                            </ol>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/bg-footer.jpg');?>);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="#"><img src="<?php echo base_url().'upload/images/'.$site_logo_footer;?>" alt=""></a>
                            </div>
                            <p><?php echo $site_description;?></p>
                           
                            <div class="row">
                                <a ><img src="<?php echo base_url('assets/frontend/img/core-img/pemkot.png');?>" alt="">&emsp;&emsp;</a>
                                <a ><img src="<?php echo base_url('assets/frontend/img/core-img/cagarbudaya.png');?>" alt="">&emsp;</a>
                                <a ><img src="<?php echo base_url('assets/frontend/img/core-img/museumdihati.png');?>" alt="">&emsp;</a>
                                </div>
                           
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>QUICK LINK</h5>
                            </div>
                            <nav class="widget-nav">
                                <ul>
                                    <li><a href="#">Arca</a></li>
                                    <li><a href="#">Prasasti</a></li>
                                    <li><a href="#">Museum</a></li>
                                    <li><a href="#">Berita / Artikel</a></li>
                                    <li><a href="#">Booking</a></li>
                                    <li><a href="#">Map</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>Artikel Populer</h5>
                            </div>

                            <?php 
                                foreach($popular_post->result() as $row):?>
                            <!-- Single Best Seller Products -->
                            <div class="single-best-seller-product d-flex align-items-center"> 
                                <div class="product-info">
                                    <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><p><?php echo $row->post_title;?></p></a>
                                <div class="post-meta">
                                <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo date('d M Y',strtotime($row->post_date));?></a>
                                <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>"><i class="fa fa-user" aria-hidden="true"></i>  <?php echo $row->user_name;?></a>
                                </div> 
                                </div>
                            </div>
                            <?php endforeach;?>

                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>KONTAK</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Alamat:</span> <?php echo $site_address;?></p>
                                <p><span>Telepon:</span> <?php echo $site_telephone;?></p>
                                <p><span>Email:</span> <?php echo $site_email;?></p>
                                <p><span>Jam Buka:</span> Setiap Hari: 8.00 - 15.00</p>
                            </div>
                            <br>
                            <div class="social-info">
                                <a href="<?php echo $site_facebook;?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="<?php echo $site_twitter;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="<?php echo $site_instagram;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url();?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url();?>about">Tentang Kami</a></li>
                                    <li><a href="<?php echo base_url();?>collect">Koleksi</a></li>
                                    <li><a href="<?php echo base_url();?>reserv">Reservasi</a></li>
                                    <li><a href="<?php echo base_url();?>kontak">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?= config_item('js1') ?>jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= config_item('js1') ?>bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= config_item('js1') ?>bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?= config_item('js1') ?>plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?= config_item('js1') ?>active.js"></script>
</body>

</html>