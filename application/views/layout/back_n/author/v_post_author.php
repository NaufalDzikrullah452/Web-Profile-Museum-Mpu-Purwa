  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Post</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Dashboard</a></li>
                                <li><span>Post</span></li>
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
                                <a href="<?php echo site_url('index.php/back_n/author/post_author/add_new');?>" class="btn btn-info btn-sm mb-3">Tambah Baru</a>
                                
                                <div class="data-tables datatable-dark">
                                    <table id="data-table" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Tgl Publish</th>
                                                <th>Kategori</th>
                                                <th>Views</th>
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
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row->post_title;?></td>
                                                    <td><?php echo $row->post_date;?></td>
                                                    <td><?php echo $row->category_name;?></td>
                                                    <td><?php echo $row->post_views;?></td>
                                                    <td style="text-align: center;">
                                                        <a href="<?php echo site_url('index.php/back_n/author/post_author/get_edit/'.$row->post_id);?>" class="btn btn-xs"><span class="fa fa-pencil"></span></a>
                                                        <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->post_id;?>"><span class="fa fa-trash"></span></a>
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
                             <!-- Modal hapus-->
        <form action="<?php echo site_url('index.php/back_n/author/post/delete');?>" method="post">
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Delete Post</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                Anda yakin mau menghapus post ini?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" required>
                            <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-xs">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                </div>
            </div>
        </div>
        <!-- main content area end -->
