        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?php echo base_url();?>index.php/back_n/dashboard"><img src="<?php echo base_url('assets/backend/images/icon/logo.png');?>" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="<?php echo base_url();?>index.php/back_n/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-list-ul"></i>
                                    <span>Booking</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url();?>index.php/back_n/reservation">List Booking</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/back_n/reservation/confirmed">Booking Valid</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-thumb-tack"></i>
                                    <span>Post Artikel</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url();?>index.php/back_n/post/add_new">Tambah Baru</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/back_n/post">List Post</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/back_n/category">Kategori</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/back_n/tag">Tag Post</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url();?>index.php/back_n/comment"><i class="fa fa-comment"></i> <span>Komentar</span></a></li><li>
                            
                           <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-university"></i>
                                    <span>Koleksi Museum</span></a>
                                <ul class="collapse">
                                    <li><a href="<?php echo base_url();?>index.php/back_n/collection/add_new">Tambah Data Baru</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/back_n/collection">List Koleksi</a></li>
                                    <li><a href="<?php echo base_url();?>index.php/back_n/collection_category">Kategori Koleksi</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="<?php echo base_url();?>index.php/back_n/suggestion"><i class="fa fa-inbox"></i> <span>Kotak Saran</span></a></li>
                            <li><a href="<?php echo base_url();?>index.php/back_n/visitors_museum"><i class="fa fa-users"></i> <span>Data Pengunjung</span></a></li>
                            <li><a href="<?php echo base_url();?>index.php/back_n/users"><i class="fa fa-user"></i> <span>User</span></a></li><li>
                            <li><a href="<?php echo base_url();?>index.php/back_n/settings"><i class="fa fa-gear"></i> <span>Konfigurasi</span></a></li><li>    
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->