  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Tag Post</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><span><a>Post</a></span></li>
                                <li><span>Tag</span></li>
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
                                <button type="button" class="btn btn-info btn-sm mb-3" data-toggle="modal" data-target="#myModal">Tambah data</button>
                                <div class="data-tables datatable-dark">
                                    <table id="data-table" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Tag</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    $no++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row->tag_name;?></td>
                                                    <td style="text-align: center;">
                                                        <a href="javascript:void(0);" class="btn btn-xs btn-edit" data-id="<?php echo $row->tag_id;?>" data-tag="<?php echo $row->tag_name;?>"><span class="fa fa-pencil"></span></a>
                                                        <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->tag_id;?>"><span class="fa fa-trash"></span></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->

                    <!-- Modal Add Start -->
                                <form  action="<?php echo base_url().'index.php/back_n/tag/save'?>" method="post">
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Tag Post</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="col-md-10">
                                                         <div class="form-group">
                                                            <input type="text" name="tag" class="form-control" placeholder="Tag Name" required>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                             <!-- Modal Add End -->
                                
                            <!-- Modal Edit Start -->
                                <form  action="<?php echo base_url().'index.php/back_n/tag/edit'?>" method="post">
                                <div class="modal fade" id="EditModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Tag</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                        <div class="modal-body">
                                      
                                            <div class="col-md-10">
                                             <div class="form-group">
                                                    <input type="text" name="tag2" class="form-control" placeholder="Nama Tag" required>
                                             </div>
                                                
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="kode" required>
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                             <!-- Modal Edit End -->

                             <!-- Modal Delete-->
                            <form  action="<?php echo base_url().'index.php/back_n/tag/delete'?>" method="post">
                                <div class="modal fade" id="DeleteModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Tag</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                        <div class="modal-body">
                                            <strong>Anda yakin mau menghapus data ini?</strong>
                                        </div>

                                            <div class="modal-footer">
                                                <input type="hidden" name="id" required>
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger btn-sm mb-3">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                             <!-- Modal Delete -->

                </div>
            </div>
        </div>
        <!-- main content area end -->
