  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">List Booking</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><a>List Booking</a></li>
                                <li><span>Detail</span></li>
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
                    <!-- View Saran -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                            <div class="invoice-area">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="iv-left col-6">
                                                <span>Studi Grup Invoice</span>
                                            </div>
                                            <div class="iv-right col-6 text-md-right">
                                                <span><?php echo date('d M Y',strtotime($tgl));?></span>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12 text-md-right">
                                            <ul class="invoice-date">
                                                <li><?php if($status_message=='1')
                                                    {   echo "<span class='status-p bg-success'>Confirmed</span>";
                                                    }else{
                                                        echo "<span class='status-p bg-danger'>Unconfirmed</span>";
                                                    }?></li>
                                            </ul>
                                        </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h2><?php echo $sekolah;?></h2>
                                                <br>
                                                <h5><?php echo $alamat;?></h5>
                                                <h5> <?php echo $telp;?></h5>
                                                <h5><?php echo $email;?></h5>
                                                <br><br>
                                                <h6>Jumlah Peserta Studi Grup:   &nbsp;&nbsp;<?php echo $jml_peserta;?> Orang</h6>
                                                <br>
                                                <h6>Penanggung Jawab: &nbsp;&nbsp;<?php echo $penanggung_jwb;?> </h6>
                                                <br><br><br><br>
                                                <h6>Surat Rekomendasi:  <a href="<?php echo site_url('index.php/back_n/reservation/download/'.$id);?>">Download file <i class="fa fa-download"></i></a></h6>  
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row align-items-center mt-5">
                                        <div class="col-md-6">
                                            <div class="invoice-address">
                                                <h6>Catatan : </h6>
                                                <p><?php echo $catatan;?></p>
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
