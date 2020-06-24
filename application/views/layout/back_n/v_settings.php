<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Konfigurasi Website</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><span>Konfigurasi</span></li>
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
                <!-- overview area start -->
                
                 <form action="<?php echo base_url().'index.php/back_n/settings/update'?>" method="post" enctype="multipart/form-data">
                 <div class="row">
                     
                    <div class="col-md-12 mt-5">
                        <div class="card h-full">
                            <div class="card-body">
                                        <div class="form-group">
                                            <label>Nama Website</label>
                                            <input type="text" name="name"  class="form-control" value="<?php echo $site_name;?>" placeholder="nama website" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Website</label>
                                            <input type="text" name="title"  class="form-control" value="<?php echo $site_title;?>" placeholder="judul website" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="address"  class="form-control" value="<?php echo $site_address;?>" placeholder="alamat musuem" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" name="telephone"  class="form-control" value="<?php echo $site_telephone;?>" placeholder="no. telpon museum" required>
                                        </div>
                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <input type="email" name="email"  class="form-control" value="<?php echo $site_email;?>" placeholder="e-mail alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Facebook URL</label>
                                            <input type="text" name="facebook" class="form-control" value="<?php echo $site_facebook;?>" placeholder="Facebook URL">
                                        </div>

                                        <div class="form-group">
                                            <label>Twitter URL</label>
                                            <input type="text" name="twitter" class="form-control" value="<?php echo $site_twitter;?>" placeholder="Twitter URL">
                                        </div>

                                        <div class="form-group">
                                            <label>Instagram URL</label>
                                            <input type="text" name="instagram" class="form-control" value="<?php echo $site_instagram;?>" placeholder="Linkedin URL">
                                        </div>
                                        <div class="form-group">
                                            <label>Shortcut Icon</label>
                                                <input type="file" name="shortcut_icon" class="form-control" >
                                                <p class="help-block">Gambar harus beresolusi 512 x 512 Pixels dan format png.</p>
                                                <img src="<?php echo base_url().'upload/images/'.$site_shortcut_icon;?>"  width="50px" height="50px" class="thumbnail">
                                        </div>

                                        <div class="form-group">
                                            <label>Logo Header</label>
                                            
                                                <input type="file" name="logo_header" class="form-control" >
                                                <p class="help-block">Logo harus beresolusi 183 x 59 Pixels.</p>
                                                <img src="<?php echo base_url().'upload/images/'.$site_logo_header;?>" class="thumbnail">
                                        </div>

                                        <div class="form-group">
                                            <label>Logo Footer</label>
                                                <input type="file" name="logo_footer" class="form-control" >
                                                <p class="help-block">Logo harus beresolusi 183 x 59 Pixels.</p>
                                                <img src="<?php echo base_url().'upload/images/'.$site_logo_footer;?>" class="thumbnail"></div>
                                        </div>
                               
                            </div>
                        </div>
                            </div>
                         
                    <div class="row">
                    <div class="col-md-12 mt-5 ">
                     <div class="card h-full">
                            <div class="card-body">
                                       
                                        <div class="form-group">
                                            <label>Konfigurasi Maps</label>
                                            <textarea name="maps" cols="6" rows="6" class="form-control" placeholder="URL map"><?php echo $site_maps;?></textarea>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Konfigurasi Map Street View</label>
                                            <textarea name="street_views" cols="6" rows="6" class="form-control" placeholder="URL map"><?php echo $site_street_views;?></textarea>
                                        </div>
                                                   
                                        <div class="form-group">
                                            <label>Deskripsi Website</label>
                                            <textarea name="description" cols="6" rows="6" class="form-control" placeholder="deskripsi website"><?php echo $site_description;?></textarea>
                                        </div>
                                       
                                        <div class="form-group mt-5">
                                            <input type="hidden" name="site_id" value="<?php echo $site_id?>" required>
                                            <button type="submit" class="btn btn-primary btn-lg" style="width:100%"><i class="fa fa-save"></i> <span>UPDATE</span></button>
                                        </div> 
                            </div>
                        </div>
                         </div>
                       
                        </div>
                         </form>
                        
                  </div>  <!-- Row -->
                        
                   
               </div>
        <!-- main content area end -->