<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Koleksi <?php echo $title;?></title>

   <!-- SEO Tags -->
    <meta name="description" content="Koleksi Museum Mpu Purwa Malang"/>
    <link rel="canonical" href="<?php echo $canonical;?>" />
    <?php error_reporting(0); if(empty($url_prev)):?>
    <?php else:?>
    <link rel="prev" href="<?php echo $url_prev;?>" />
    <?php endif;?>
    <link rel="next" href="<?php echo $url_next;?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="Koleksi Museum Mpu Purwa Malang" />
    <meta property="og:url" content="<?php echo $canonical;?>" />
    <meta property="og:image" content="<?php echo base_url().'upload/images/'.$site_shortcut_icon;?>" />
    <meta property="og:image:secure_url" content="<?php echo base_url().'upload/images/'.$site_shortcut_icon;?>" />
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
            <h2>Koleksi Detail</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/collect'); ?>">Koleksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Koleksi Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <a class="product-img" href="<?php echo base_url().'upload/collection/'.$image;?>" title="<?php echo $title; ?>">
                                        <img class="d-block w-100" src="<?php echo base_url().'upload/collection/'.$image;?>" alt="1">
                                    </a>
                                    </div>
                                </div>
                                <ol class="carousel-indicators">
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">Koleksi Museum : <?php echo $title;?></h4>
                            <h4 class="price"><?php echo $nomer;?></h4>
                            <div class="short_overview">
                                <p>Scan for translation</p>
                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <div class="cart clearfix d-flex align-items-center">
                                    <a class="product-img" href="<?php echo base_url().'upload/collection/qrcode/'.$qrcode;?>" title="Koleksi Museum">
                                        <img class="d-block w-25" src="<?php echo base_url().'upload/collection/qrcode/'.$qrcode;?>" alt="1">
                                    </a>
                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span>No. Inventaris:</span> <span><?php echo $nomer;?></span></p>
                                <p><span>Kategori:</span> <span><?php echo $category;?></span></p>
                                <p><span>Bahan:</span> <span><?php echo $bahan;?></span></p>
                                <p><span>Asal:</span> <span><?php echo $asal;?></span></p>
                                <p><span>Ukuran:</span> <span>tinggi <?php echo $tinggi;?>cm, tebal <?php echo $tebal;?>cm,
                                 luas <?php echo $luas;?>cm, lebar <?php echo $lebar;?>cm, panjang  <?php echo $panjang;?>cm</span></p>
                                <p>
                                    <span>Share on:</span>
                                    <span id="share-buttons">
                                   
    
    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=https://museummpupurwamalang.com/index.php/collect/<?php echo $slug;?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
   
    <!-- Twitter -->
    <a href="https://twitter.com/share?url=https://museummpupurwamalang.com/index.php/collect/<?php echo $slug;?>g" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>
    


                                </span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Keterangan Benda</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <p align="justify"><?php echo $keterangan;?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

    <!-- ##### Related Product Area Start ##### -->
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Koleksi Terbaru</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php foreach($latest_collection->result() as $row):?>
                <!-- Single Product Area -->
                <div class="col-12 col-sm-6 col-lg-2">
                    <div class="single-product-area mb-100">
                        <!-- Koleksi Museum -->
                        <div>
                            <a class="product-img" href="<?php echo base_url().'upload/collection/'.$row->collect_gambar;?>" title="<?php echo $row->collect_nama;?>">
                                <img class="d-block w-100" src="<?php echo base_url().'upload/collection/'.$row->collect_gambar;?>" alt="1">
                            </a>
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

            </div>
        </div>
    </div>
    <!-- ##### Related Product Area End ##### -->
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
                                <a href="<?php base_url();?>"><img src="<?php echo base_url().'upload/images/'.$site_logo_footer;?>" alt=""></a>
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
                                    <li><a href="<?php echo site_url('index.php/collect_category/arca');?>">Arca</a></li>
                                    <li><a href="<?php echo site_url('index.php/collect_category/prasasti');?>">Prasasti</a></li>
                                    <li><a href="<?php echo site_url('index.php/about');?>">Museum</a></li>
                                    <li><a href="<?php echo site_url('index.php/blog');?>">Berita / Artikel</a></li>
                                    <li><a href="<?php echo site_url('index.php/reserv');?>">Reservasi</a></li>
                                    <li><a href="<?php echo site_url('index.php/contact');?>">Map</a></li>
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
                            <p> &copy; <script>document.write(new Date().getFullYear());</script> Museum Mpu Purwa Malang</p>
                        </div>
                    </div>
                    <!-- Footer Nav -->
                    <div class="col-12 col-md-6">
                        <div class="footer-nav">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url();?>index.php">Beranda</a></li>
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