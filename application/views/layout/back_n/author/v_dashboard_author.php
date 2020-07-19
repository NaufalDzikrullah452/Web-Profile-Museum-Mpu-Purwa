        <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url();?>index.php/back_n/author/dashboard_author">Home</a></li>
                                <li><span>Dashboard</span></li>
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
                                <a class="dropdown-item" href="<?php echo base_url('index.php/back_n/author/change_pass_author');?>"><i class="fa fa-key"></i> Ubah Password</a>
                                <a class="dropdown-item" href="<?php echo base_url();?>"  target="_blank"><i class="fa fa-globe"></i> Web Profil</a>
                                <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout'); ?>"> <i class="fa fa-sign-out"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-star"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Koleksi Museum</h4>
                                        <p>Latest</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $all_collection;?> Koleksi</h2>
                                    </div>
                                </div>
                                <canvas id="coin_sales1" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-group"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pengunjung Website</h4>
                                        <p>Latest</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $all_visitors;?> Pengunjung</h2>
                                    </div>
                                </div>
                                <canvas id="coin_sales2" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-inbox"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kotak Saran</h4>
                                        <p>Latest</p>
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2><?php echo $all_suggestion;?> Saran</h2>
                                    </div>
                                </div>
                                <canvas id="coin_sales3" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->
                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <h4 class="header-title mb-0">Visitor This Month</h4>
                        </div>
                        <div id="visitors_web"></div>
                    </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 coin-distribution">
                        <div class="card h-full">
                            <div class="card-body">
                                <h4 class="header-title mb-0">Visitors Browser</h4>
                                <div id="visitors_browser"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- overview area end -->
                    <!-- Top artikel Table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Top 5 Artikel</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Judul Artikel</th>
                                                    <th scope="col" style="text-align: right;">Views</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           <?php
                                                $no=0;
                                                foreach ($top_five_articles->result() as $row) :
                                                    $no++;
                                            ?>
                                               <tr>
                                                   <th scope="row"><?php echo $no;?></th>
                                                   <td><?php echo $row->post_title;?></td>
                                                   <td style="text-align: right;"><?php echo number_format($row->post_views);?></td>
                                               </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Top artikel Table end -->
            </div>
        </div>
        <!-- main content area end -->

