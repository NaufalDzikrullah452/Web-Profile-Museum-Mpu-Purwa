<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?php echo $title;?></title>

   <!-- SEO Tags -->
    <meta name="description" content="Website Museum Mpu Purwa Malang <?php echo $meta_description;?> "/>
    <link rel="canonical" href="<?php echo $canonical;?>" />
    <?php error_reporting(0); if(empty($url_prev)):?>
    <?php else:?>
    <link rel="prev" href="<?php echo $url_prev;?>" />
    <?php endif;?>
    <link rel="next" href="<?php echo $url_next;?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="Website Museum Mpu Purwa Malang <?php echo $meta_description;?> " />
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
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/bg_2.jpg');?>);">
            <h2>BLOG Detail</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo site_url();?>"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo site_url('index.php/blog');?>">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12 col-md-8">
                    <div class="blog-posts-area">

                        <!-- Post Details Area -->
                        <div class="single-post-details-area">
                            <div class="post-content">
                                <h4 class="post-title"><?php echo $title;?></h4>
                                <div class="post-meta mb-30">
                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d M Y',strtotime($date));?></a>
                                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $author;?></a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($views);?></a>
                                </div>
                                <div class="post-thumbnail mb-30">
                                    <img src="<?php echo base_url().'upload/post/'.$image;?>" alt="" width="900px" height="400px">
                                </div>
                                <?php echo $content;?>
                            </div>
                        </div>

                        <!-- Post Tags & Share -->
                        <div class="post-tags-share d-flex justify-content-between align-items-center">
                            <!-- Tags -->
                            <ol class="popular-tags d-flex align-items-center flex-wrap">
                                <li><span>Tag:</span></li>
                                <?php 
                                $split_tag=explode(",", $tags);
                                foreach ($split_tag as $tag) : 
                            ?>
							<li><a href="<?php echo site_url('index.php/tag/detail/'.$tag);?>">#<?php echo $tag;?></a></li>
							<?php endforeach;?>
                            </ol>

                            <!-- Share -->
                            <div class="post-share" >
                                <span id="share-button">
                                <!-- Facebook -->
                                <a href="http://www.facebook.com/sharer.php?u=https://museummpupurwamalang.com/index.php/blog/<?php echo $slug;?>" target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                                </a>
                            
                                <!-- Twitter -->
                                <a href="https://twitter.com/share?url=https://museummpupurwamalang.com/index.php/blog/<?php echo $slug;?>g" target="_blank">
                                    <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                                </a>
                                </span>
                            </div>
                            <!-- end Share -->
                        </div>

                        <!-- Comment Area Start -->
                        <div class="comment_area clearfix">
                            <h4 class="headline"><?php echo $comment;?> Comments</h4>
                            <?php foreach ($show_comments->result() as $row):?>
                            <ol>
                                <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-flex">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="<?php echo base_url().'upload/comment/'.$row->comment_image;?>" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5><?php echo $row->comment_name;?></h5>
                                                <span class="comment-date"><?php echo date('d M Y H:i:s',strtotime($row->comment_date));?></span>
                                            </div>
                                            <p><?php echo $row->comment_message;?></p>
                                        </div>
                                    </div>

                                    <?php
                                        $comment_id=$row->comment_id;
                                        $query = $this->db->query("SELECT * FROM tbl_comment WHERE comment_status='1' AND comment_parent='$comment_id'");
                                        foreach ($query->result() as $i) :
                                    ?>
                                    <ol class="children">
                                        <li class="single_comment_area">
                                            <div class="comment-wrapper d-flex">
                                                <!-- Comment Meta -->
                                                <div class="comment-author">
                                                    <img src="<?php echo base_url().'upload/comment/'.$row->comment_image;?>" alt="">
                                                </div>
                                                <!-- Comment Content -->
                                                <div class="comment-content">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <h5><?php echo $i->comment_name;?></h5>
                                                        <span class="comment-date"><?php echo date('d M Y H:i:s',strtotime($i->comment_date));?></span>
                                                    </div>
                                                    <p><?php echo $i->comment_message;?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                    <?php endforeach;?>

                            <?php endforeach;?>
                            </ol>
                        </div>
                         <!-- Comment Area End -->

                        <!-- Leave A Comment -->
                        <div class="leave-comment-area clearfix">
                            <div class="comment-form">
                                <h4 class="headline">Tinggalkan Komentar</h4>

                                <div class="contact-form-area">
                                <?php echo $this->session->flashdata('msg');?>
                                    <!-- Comment Form -->
                                    <form action="<?php echo site_url('index.php/send_comment');?>" method="post">
                                    <input type="hidden" name="post_id" value="<?php echo $post_id;?>" required>
                                    <input type="hidden" name="slug" value="<?php echo $slug;?>" required>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" placeholder="Nama">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment"  cols="30" rows="10" placeholder="Komentar"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn alazea-btn">Send Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Leave A Comment -->

                    </div>
                </div>

                <!-- Blog Sidebar Area -->
                <div class="col-12 col-sm-9 col-md-4">
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
                                <h4>Artikel Terkait</h4>
                            </div>
                            <?php foreach($related_post->result() as $row):?>
                            <!-- Single Latest Posts -->
                            <div class="single-latest-post d-flex align-items-center">
                                <div class="post-thumb">
                                <a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>">
                                    <img src="<?php echo base_url().'upload/post/'.$row->post_image;?>" alt="">
                                </a>
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
    </section>
    <!-- ##### Blog Content Area End ##### -->
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