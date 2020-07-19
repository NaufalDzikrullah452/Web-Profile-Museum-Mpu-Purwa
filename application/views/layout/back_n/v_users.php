  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">User</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url();?>index.php/back_n/dashboard">Dashboard</a></li>
                                <li><span>User</span></li>
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
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-info btn-sm mb-3" data-toggle="modal" data-target="#myModal">Add New User</button>
                                
                                <div class="data-tables datatable-dark">
                                    <table id="mytable" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Level</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    $no++;
                                            ?>
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $no;?></td>
                                                <td style="vertical-align: middle;">
                                                    <?php if(empty($row->user_photo)):?>
                                                    <img class="img-circle" width="50" src="<?php echo base_url().'upload/user/user_blank.png';?>">
                                                    <?php else:?>
                                                    <img class="img-circle" width="50" src="<?php echo base_url().'upload/user/'.$row->user_photo;?>">
                                                    <?php endif;?>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_name;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_email;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_password;?></td>
                                                <td style="vertical-align: middle;">
                                                    <?php 
                                                        if($row->user_level=='1'){
                                                            echo "Administrator";
                                                        }else{
                                                            echo "Author";
                                                        }
                                                    ?>    
                                                <td style="vertical-align: middle;">
                                                <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#ModalEdit<?php echo $row->user_id;?>"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="dropdown-item delete" href="javascript:void(0);"  data-userid="<?php echo $row->user_id;?>"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                                    </div>
                                               
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->

                     <!-- Modal Add New User Start -->
                                <form  action="<?php echo base_url().'index.php/back_n/users/insert'?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add New User</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="file" name="filefoto" class="dropify" data-height="200">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <input type="text" name="nama" class="form-control" placeholder="Name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="level" required>
                                                                <option value="">No Selected</option>
                                                                <option value="1">Administrator</option>
                                                                <option value="2">Author</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                             <!-- Modal Add New User End -->
                                
                              <!-- Modal Edit User Start -->
                               <?php 
                                    foreach ($data->result() as $row):
                                ?>
                                <form  action="<?php echo base_url().'index.php/back_n/users/update'?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="ModalEdit<?php echo $row->user_id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit User</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                        <input type="file" name="filefoto" class="dropify" data-height="200" data-default-file="<?php echo base_url().'upload/user/'.$row->user_photo;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="nama" value="<?php echo $row->user_name;?>" class="form-control" placeholder="Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" value="<?php echo $row->user_email;?>" class="form-control" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <select class="form-control" name="level" required>
                                                        <?php if($row->user_level=='1'):?>
                                                        <option value="1" selected>Administrator</option>
                                                        <option value="2">Author</option>
                                                        <?php else:?>
                                                        <option value="1">Administrator</option>
                                                        <option value="2" selected>Author</option>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                 </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="user_id" value="<?php echo $row->user_id;?>" required>
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                              <?php endforeach;?>
                             <!-- Modal Edit User End -->

                             <!-- Modal hapus-->
                            <form  action="<?php echo base_url().'index.php/back_n/users/delete'?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="ModalDelete">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete User</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                        <div class="modal-body">
                                            <strong>Anda yakin mau menghapus user ini?</strong>
                                            <div class="form-group">
                                                <input type="hidden" id="txt_kode" name="kode" class="form-control" placeholder="Name" required>
                                            </div>
                                        </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger btn-sm mb-3">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>

                </div>
            </div>
        </div>
        <!-- main content area end -->
