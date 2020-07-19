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
    <meta name="description" content="Koleksi Museum Mpu Purwa Malang  "/>
    <link rel="canonical" href="<?php echo $canonical;?>" />
    <?php error_reporting(0); if(empty($url_prev)):?>
    <?php else:?>
    <link rel="prev" href="<?php echo $url_prev;?>" />
    <?php endif;?>
    <link rel="next" href="<?php echo $url_next;?>" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $title;?>" />
    <meta property="og:description" content="Koleksi Museum Mpu Purwa Malang " />
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
        <div id="google_translate_element"></div>

 <!-- ***** Navbar Area ***** -->
    </header>
    <!-- ##### Header Area End ##### -->
    <!-- ##### Breadcrumb Area Start ##### -->
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
                                        <a class="product-img" href="<?php echo base_url().'upload/collection/'.$image;?>" title="Koleksi Museum">
                                        <img class="d-block w-100" src="<?php echo base_url().'upload/collection/'.$image;?>" alt="1">
                                    </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">Koleksi Museum : <?php echo $title;?></h4>
                            <h4 class="title"><?php echo $nomer;?></h4>
                            <div class="short_overview">
                            </div>

                            <div class="products--meta">
                                <p><span>No. Inventaris:</span> <span><?php echo $nomer;?></span></p>
                                <p><span>Kategori:</span> <span><?php echo $category;?></span></p>
                                <p><span>Bahan:</span> <span><?php echo $bahan;?></span></p>
                                <p><span>Asal:</span> <span><?php echo $asal;?></span></p>
                                <p><span>Ukuran:</span> <span>tinggi <?php echo $tinggi;?>cm, tebal <?php echo $tebal;?>cm,
                                 luas <?php echo $luas;?>cm, lebar <?php echo $lebar;?>cm, panjang  <?php echo $panjang;?>cm</span></p>
                                <p><span>Keterangan Benda:</span> <span><p align="justify"><?php echo $keterangan;?> </p></span></p>
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
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab">&copy;
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
                                Property Of Museum Mpu Purwa Malang</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

        <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/bg-footer.jpg');?>);">
        <!-- Main Footer Area -->
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
    <!-- custom -->
    <script type="text/javascript">
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>