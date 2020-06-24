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