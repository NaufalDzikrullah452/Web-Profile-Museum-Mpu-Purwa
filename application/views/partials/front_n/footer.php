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
                                <a href="<?php echo site_url();?>"><img src="<?php echo base_url().'upload/images/'.$site_logo_footer;?>" alt=""></a>
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