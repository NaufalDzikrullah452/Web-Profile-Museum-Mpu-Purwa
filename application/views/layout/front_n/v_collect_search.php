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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/l26.jpg');?>">
            <h2>Koleksi</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Koleksi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                           <p><?php echo strtoupper($judul);?></p>
                        </div>
                        <!-- Search by Terms -->
                        <div class="single-widget-area">
                            <form method="get" action="<?php echo site_url('index.php/collect_result/search');?>" class="search-form">
                                <input type="text" name="search_query"  placeholder="Cari koleksi disini..." required>
                                <button type="submit"><i class="icon_search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">

                        <!-- Shop Widget -->
                        <div class="shop-widget price mb-50">
                            <h4 class="widget-title">Koleksi Museum Mpu Purwa</h4>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="8" data-max="30" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="8" data-value-max="30" data-label-result="Koleksi:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Kategori</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <a href="<?php echo site_url('index.php/collect_category/');?>">
                                    <label class="custom-control-label">Semua Koleksi <span class="text-muted">(72)</span></label>
                                </a>
                                </div>
                                <!-- Single Checkbox -->
                                 <?php 
							    $query=$this->db->get('tbl_collect_category', 5);
							    foreach ($query->result() as $row):
						        ?>
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                <a href="<?php echo site_url('index.php/collect_category/'.$row->collect_category_slug);?>">
                                    <label class="custom-control-label"><?php echo strtoupper($row->collect_category_name);?> <span class="text-muted">(20)</span></label>
                                </a>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>

                      
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">

                            <!-- Single Product Area -->
                            <?php foreach ($data->result() as $row):?>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="single-product-area mb-50">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img class="d-block w-100" src="<?php echo base_url().'upload/collection/'.$row->collect_gambar;?>" alt="">
                                    </div>
                                    <!-- Product Info -->
                                    <div class="product-info mt-15 text-center">
                                        <a href="<?php echo site_url('index.php/collect/'.$row->collect_slug);?>">
                                             <h6> <?php echo $row->collect_nama;?></h6>
                                        </a>
                                        <p><?php echo date('d M Y',strtotime($row->collect_date));?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>

                        <!-- Pagination -->
                        <?php echo $page;?>
                        <!-- End Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->
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
                                    <li><a href="<?php echo base_url();?>index.php/about">Tentang Kami</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/collect">Koleksi</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/reserv">Reservasi</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/contact">Kontak</a></li>
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