<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Komentar</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo base_url();?>index.php/back_n/dashboard">Dashboard</a></li>
                                <li><span>Komentar</span></li>
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
                 <div id="main-wrapper">
                <div class="row">
                    <div class="col-md mt-3">
                    <div class="search-box pull-right">
                            <form action="<?php echo site_url('index.php/back_n/comment/results');?>" method="GET" data-default="150">
                                <input type="text" name="search_query" placeholder="Cari...">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                  
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" class="active">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab"  aria-selected="true">Semua <span class="badge badge-info"><?php echo $total_rows;?></span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo site_url('index.php/back_n/comment/unpublish');?>">Tinjauan <span class="badge badge-danger"><?php echo $total_unpublish;?></span></a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                                <?php foreach ($data->result() as $row) :?>
                            <div class="card-body">

                               
                                    <div class="pull-left m-r-md">
                                <a href="javascript:void(0);" class="btn-image" data-comment_id="<?php echo $row->comment_id;?>" data-name="<?php echo $row->comment_name;?>" data-email="<?php echo $row->comment_email;?>">
                                    <?php if(!empty($row->comment_image)):?>
                                        <img class="img-fluid mr-4" src="<?php echo base_url().'upload/comment/'.$row->comment_image;?>" width="80" height="80  alt="<?php echo $row->comment_name?>">
                                    <?php else:?>
                                        <img class="img-fluid mr-4" src="<?php echo base_url().'upload/comment/user_blank.png'?>" width="80" height="80  alt="<?php echo $row->comment_name?>">
                                    <?php endif;?>
                                </a>
                                    </div>
                                <div class="pull-right m-r-md">
                                  <div class="btn-group">
                                     <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      Action <span class="caret"></span>
                                     </button>
                                     <div class="dropdown-menu dropdown-menu-right" role="menu">
                                     <?php if($row->comment_status=='0'):?>
                                     <a href="javascript:void(0);" class="dropdown-item btn-publish" data-comment_id="<?php echo $row->comment_id;?>"><i class="fa fa-send"></i> Publish</a>
                                     <a href="javascript:void(0);" class="dropdown-item btn-edit" data-comment_id="<?php echo $row->comment_id;?>" data-comment_msg="<?php echo $row->comment_message;?>"><i class="fa fa-edit"></i> Edit</a>
                                     <a href="javascript:void(0);" class="dropdown-item btn-delete" data-comment_id="<?php echo $row->comment_id;?>"><i class="fa fa-trash"></i> Delete</a>
                                     <?php else:?>
                                     <a href="javascript:void(0);" class="dropdown-item btn-reply" data-comment_id="<?php echo $row->comment_id;?>" data-post_id="<?php echo $row->post_id;?>"><i class="fa fa-reply"></i> Reply</a>
                                     <a href="javascript:void(0);" class="dropdown-item btn-edit" data-comment_id="<?php echo $row->comment_id;?>" data-comment_msg="<?php echo $row->comment_message;?>"><i class="fa fa-edit"></i> Edit</a>
                                     <a href="javascript:void(0);" class="dropdown-item btn-delete" data-comment_id="<?php echo $row->comment_id;?>"><i class="fa fa-trash"></i> Delete</a>
                                     <?php endif;?>
                                     </div>
                                </div>
                                    </div>                  
                                    <div class="media-body">
                                        <h5 class="mb-1"><a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>" target="_blank"><?php echo $row->post_title;?></a></h5> 
                                        <a href="javascript:void(0);" ><b><?php echo $row->comment_name?></b>, <?php echo $row->comment_date;?></a> <?php if($row->comment_status=='0'){ echo "<span class='badge badge-danger'>Unpublish</span>";}else{}?>
                                        <div>
                                            <p><?php echo $row->comment_message;?></p>
                                        </div>
                                    </div>
                                    
                               
                                <!-- Reply -->
                                <?php 
                                    $comment_id=$row->comment_id;
                                    $result = $this->db->query("SELECT comment_id,DATE_FORMAT(comment_date,'%d %M %Y %H:%i') AS comment_date,comment_name,comment_email,comment_message,post_id,post_title,post_slug FROM tbl_comment JOIN tbl_post ON comment_post_id=post_id WHERE comment_parent='$comment_id' ORDER BY comment_id ASC");
                                    foreach ($result->result() as $row) :
                                ?>
                                <div class="mt-5 child-media">
                                    <div class="pull-left m-r-md">
                                <?php
                                    $user_id=$this->session->userdata('id');
                                    $query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
                                    if($query->num_rows() > 0):
                                    $i = $query->row_array();
                                ?>
                                    <img class="img-fluid mr-4" src="<?php echo base_url().'upload/user/'.$i['user_photo'];?>" width="80" height="80"  alt="<?php echo $row->comment_name?>">
                                    <?php else:?>
                                    <img class="img-fluid mr-4" src="<?php echo base_url().'upload/comment/user_blank.png'?>"  width="80" height="80" alt="<?php echo $row->comment_name?>">
                                    <?php endif;?>
                                    </div>
                                <div class="pull-right m-r-md">
                                  <div class="btn-group">
                                     <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                      Action <span class="caret"></span>
                                     </button>
                                     <div class="dropdown-menu dropdown-menu-right" role="menu">
                                     <a href="javascript:void(0);" class="dropdown-item btn-edit" data-comment_id="<?php echo $row->comment_id;?>" data-comment_msg="<?php echo $row->comment_message;?>"><i class="fa fa-edit"></i> Edit</a>
                                     <a href="javascript:void(0);" class="dropdown-item btn-delete" data-comment_id="<?php echo $row->comment_id;?>"><i class="fa fa-trash"></i> Hapus</a>
                                     </div>
                                </div>
                                    </div>                  
                                    <div class="media-body">
                                        <h5 class="mb-3 text-info"><a href="<?php echo site_url('index.php/blog/'.$row->post_slug);?>" target="_blank"><?php echo $row->post_title;?></a></h5> 
                                        <a href="javascript:void(0);" class="text-primary"><b><?php echo $row->comment_name?></b>, <?php echo $row->comment_date;?></a> <?php if($row->comment_status=='0'){ echo "<span class='badge badge-danger'>Unpublish</span>";}else{}?>
                                        <div style="margin-left: 6.5%;">
                                            <p><?php echo $row->comment_message;?></p>
                                        </div>
                                    </div>
                                    </div>
                                
                                <?php endforeach;?>
                            </div> 
                                 <?php endforeach;?>
                                <?php echo $page;?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                    </div>

        <!-- MODAL REPLY -->
        <form action="<?php echo site_url('index.php/back_n/comment/reply');?>" method="post">
            <div class="modal fade" id="ReplyModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Balas Komentar</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea name="comments" class="summernote"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="comment_id" required>
                            <input type="hidden" name="post_id" required>
                            <button type="button" class="btn btn-default btn-sm mb-3" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm mb-3">Balas</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <!-- MODAL EDIT -->
        <form action="<?php echo site_url('index.php/back_n/comment/edit');?>" method="post">
            <div class="modal fade" id="EditModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Komentar</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea name="comments2" id="comment" class="summernote comment"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="comment_id2" required>
                            <button type="button" class="btn btn-default btn-sm mb-3" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm mb-3">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--PUBLISH MODAL-->
        <form action="<?php echo site_url('index.php/back_n/comment/publish');?>" method="post">
            <div class="modal fade" id="PublishModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Publish Komentar</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                Anda yakin mau mempublish komentar ini?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="comment_id4" required>
                            <button type="button" class="btn btn-default btn-sm mb-3" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm mb-3">Publish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--DELETE RECORD MODAL-->
        <form action="<?php echo site_url('index.php/back_n/comment/delete');?>" method="post">
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Hapus Komentar</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                Anda yakin mau menghapus komentar ini?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="comment_id3" required>
                            <button type="button" class="btn btn-default btn-sm mb-3" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm mb-3">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--CHANGE IMAGE MODAL-->
        <form action="<?php echo site_url('index.php/back_n/comment/change');?>" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="ImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Ubah Gambar</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" readonly>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" readonly>
                            </div>

                            <div class="form-group">
                                <input type="file" name="file" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="comment_id5" required>
                            <button type="button" class="btn btn-default btn-sm mb-3" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm mb-3">Change</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
                  </div>  <!-- Row -->
                        
                   </div>
               </div>
        <!-- main content area end -->

