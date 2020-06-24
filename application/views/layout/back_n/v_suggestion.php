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
                    <!-- Dark table start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                            <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead >
                                                <tr>
                                                <th class="text-right" colspan="12">
                                                    <div class="btn-group">
                                                    <?php echo $page;?>
                                                    </div>
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                        <?php foreach($data->result() as $row):?>
                                        <?php if($row->suggestion_status=='0'):?>
                                        <tr class="bg-light">
                                            <td>
                                                <a href="javascript:void(0);" class="dropdown-item btn-delete" data-suggestion_id="<?php echo $row->suggestion_id;?>"><i class="ti-trash"></i></a>
                                            </td>
                                            <td   data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <i class="fa fa-eye" style="color: #e67e22;"></i>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <?php echo $row->suggestion_name;?>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <?php echo $row->suggestion_address;?>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <?php echo date('d M Y',strtotime($row->suggestion_date));?>
                                            </td>
                                        </tr>
                                        <?php else:?>
                                        <tr class="bg-light">
                                            <td>
                                                <a href="javascript:void(0);" class="dropdown-item btn-delete" data-suggestion_id="<?php echo $row->suggestion_id;?>"><i class="ti-trash"></i></a>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <i class="fa fa-eye"></i>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <?php echo $row->suggestion_name;?>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <?php echo $row->suggestion_address;?>
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                            </td>
                                            <td  data-suggestion_id="<?php echo $row->suggestion_id;?>">
                                                <?php echo date('d M Y',strtotime($row->suggestion_date));?>
                                            </td>
                                        </tr>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                                        </div>
                        </div>
                    </div>
                    <!-- Dark table end -->

                             <!-- Modal Delete-->
                            <form  action="<?php echo base_url().'index.php/back_n/suggestion/delete'?>" method="post">
                                <div class="modal fade" id="DeleteModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Hapus Saran</h5>
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
