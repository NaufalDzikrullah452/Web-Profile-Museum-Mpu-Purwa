  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Kotak Saran</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><span>Kotak Saran</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <?php
                            $user_id=$this->session->userdata('id');
                            $query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
                            if($query->num_rows() > 0):
                            $row = $query->row_array();               
                            ?>
                            <img class="avatar user-thumb" alt="avatar" src="<?php echo base_url().'upload/user/'.$row['user_photo'];?>" width="40" height="40" alt="">
                            <?php else:?>
                            <img class="avatar user-thumb" alt="avatar" src="<?php echo base_url().'upload/user/user_blank.png';?>" width="40" height="40" alt="">
                            <?php endif;?>
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('name');?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo base_url('index.php/back_n/change_pass');?>"><i class="fa fa-key"></i> Ubah Password</a>
                                <a class="dropdown-item" href="<?php echo base_url();?>"><i class="fa fa-globe" target="_blank"></i> Web Profil</a>
                                <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout'); ?>"> <i class="fa fa-sign-out"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                     <div class="col-md mt-3">
                    <div class="search-box pull-right">
                            <form action="<?php echo site_url('index.php/back_n/suggestion/result');?>" method="GET" data-default="150">
                                <input type="text" name="search_query" placeholder="Cari...">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- View Saran -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                            <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>KOTAK SARAN</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span><?php echo date('d M Y',strtotime($date));?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h3><?php echo $name;?></h3>
                                                <h5>Umur : <?php echo $age;?> tahun</h5>
                                                <h5>Alamat : <?php echo $address;?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <ul class="invoice-date">
                                                <li><?php echo $origin;?></li>
                                                <li><?php echo date('H:i',strtotime($date));?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-5">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h6>Saran : </h6>
                                                <p><?php echo $message;?></p>
                                            </div>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                                        </div>
                        </div>
                    </div>
                    <!-- Dark table end -->

                </div>
            </div>
        </div>
        <!-- main content area end -->
