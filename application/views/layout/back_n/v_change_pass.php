<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Ubah Password</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url();?>index.php/back_n/dashboard">Dashboard</a></li>
                                <li><span>Ubah Password</span></li>
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
                                <a class="dropdown-item" href="<?php echo base_url();?>" target="_blank"><i class="fa fa-globe" ></i> Web Profil</a>
                                <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout'); ?>"> <i class="fa fa-sign-out"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Ubah Password</h4>

                                    <form  action="<?php echo site_url('index.php/back_n/change_pass/change');?>" method="post">
                                       <div class="form-group">
                                            <label for="example-text-input" class="col-form-label"><strong>Password Lama</strong></label>
                                            <input type="password" name="old_password" class="form-control" id="inputPassword1" placeholder="password lama" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-search-input" class="col-form-label"><strong>Password Baru</strong></label>
                                            <input type="password" name="new_password" class="form-control" id="inputPassword2" placeholder="password baru" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label"><strong>Konfirmasi Password Baru</strong></label>
                                            <input type="password" name="conf_password" class="form-control" id="inputPassword3" placeholder="konfirmasi password baru" required>
                                        </div>

                                        <div class="form-group">
                                        
                                          <button type="submit" class="btn btn-md btn-success">Simpan</button>
                                        
                                      </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                         <!-- Textual inputs end -->
                            </div>
               </div>
        <!-- main content area end -->

