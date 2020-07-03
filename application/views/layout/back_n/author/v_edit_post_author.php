<?php 
    error_reporting(0);
    $b = $data->row_array();
?>
<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Edit Post</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><span><a>Post</a></span></li>
                                <li><span>Edit</span></li>
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
                                <a class="dropdown-item" href="<?php echo base_url();?>"><i class="fa fa-globe"  target="_blank"></i> Web Profil</a>
                                <a class="dropdown-item" href="<?php echo base_url('index.php/login/logout'); ?>"> <i class="fa fa-sign-out"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- overview area start -->
                <div class="row">
                <form action="<?php echo base_url().'index.php/back_n/author/post_author/edit'?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8 mt-5">
                        <div class="card">
                            <div class="card-body">
                              
                                    
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" value="<?php echo $b['post_title'];?>" class="form-control" placeholder="Title" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="slug" class="form-control" value="<?php echo $b['post_slug'];?>" placeholder="Permalink" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Contents</label>
                                            <textarea name="contents" id="summernote"><?php echo $b['post_contents'];?></textarea>
                                        </div>
                                        
                                   
                               
                            </div>
                        </div>
                           
                    </div>

                    <div class="col-md-4 mt-5 ">
                        
                        <div class="card h-full">
                            <div class="card-body">
                                     <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="filefoto" class="dropify" data-height="180" data-default-file="<?php echo base_url().'upload/post/'.$b['post_image'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category" required>
                                                <option value="">-Select Option-</option>
                                                <?php foreach ($category->result() as $row) : ?>
                                                    <?php if($b['post_category_id']==$row->category_id):?>
                                                        <option value="<?php echo $row->category_id;?>" selected><?php echo $row->category_name;?></option>
                                                    <?php else:?>
                                                        <option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <label>Tags</label>
                                        <div style="overflow-y:scroll;height:150px;margin-bottom:30px;">
                                        <?php 
                                            $post_tag=$b['post_tags'];
                                            $strtag=explode(",", $post_tag);
                                            for($j = 0; $j < count($strtag); $j++){

                                            }
                                            foreach ($tag->result() as $row) : ?>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" name="tag[]" value="<?php echo $row->tag_name;?>" <?php if(in_array($row->tag_name, $strtag)) echo 'checked="checked"';?> > <?php echo $row->tag_name;?>
                                                </label>
                                            </div>
                                        <?php endforeach;?>
                                        </div>
                                            <br>
                                            <hr>
                                            <br>       
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea name="description" cols="6" rows="6" class="form-control" placeholder="Meta Description"><?php echo $b['post_description'];?></textarea>
                                        </div>
                                       
                                        <div class="form-group mt-5">
                                            <input type="hidden" name="post_id" value="<?php echo $b['post_id'];?>" required>
                                            <button type="submit" class="btn btn-primary btn-lg" style="width:100%"><i class="fa fa-paper-plane-o"></i> <span>UPDATE</span></button>
                                        </div> 
                            </div>
                        </div>
                            </form>
                            </div>
                    </div>

                   
                        
                   
                    
                </div>
                <!-- overview area end -->
            </div>
        </div>
        <!-- main content area end -->

