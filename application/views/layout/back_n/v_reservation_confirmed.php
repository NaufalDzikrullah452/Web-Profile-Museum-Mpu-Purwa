  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">List Booking</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><span>List Booking</span></li>
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
                                
                                <div class="data-tables datatable-dark">
                                    <table id="mytable" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th><i class="fa fa-circle"></i></th>
                                                <th>Nama Sekolah</th>
                                                <th>Tanggal</th>
                                                <th>Email</th>
                                                <th>Jumlah Peserta</th>
                                                <th>Surat Rekomendasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    $no++;
                                            ?>
                                            <?php if($row->reserv_status=='0'):?>
                                            <tr>
                                                <td style="vertical-align: middle;"><strong><?php echo $no;?></strong></td>
                                                <td>
                                                <?php if($row->reserv_status_message=='1')
                                                    {   echo '<i tabindex="0" class="fa fa-check-circle" role="button" data-placement="bottom" data-toggle="popover" data-trigger="focus" title="" data-content="Data sudah diperiksa" data-original-title="Data Valid" style="color: #27ae60;"></i>';
                                                    }else{
                                                    }?>
                                                </td>
                                                <td style="vertical-align: middle;"><strong><?php echo $row->reserv_nama_sekolah;?></strong></td>
                                                <td style="vertical-align: middle;"><strong><?php echo date('d-M-Y',strtotime($row->reserv_date));?></strong></td>
                                                <td style="vertical-align: middle;"><strong><?php echo $row->reserv_email;?></strong></td>
                                                <td style="vertical-align: middle;"><strong><?php echo $row->reserv_jml_peserta;?></strong></td>
                                                <td style="vertical-align: middle;"><a href="<?php echo site_url('index.php/back_n/reservation/download/'.$row->reserv_id);?>">Download file</a></td>
                                                <td style="vertical-align: middle;">
                                                <div class="btn-group">
                                                        <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <a class="dropdown-item edit" href="javascript:void(0);" data-toggle="modal" data-target="#ModalEdit<?php echo $row->reserv_id;?>"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item validation" href="javascript:void(0);" data-toggle="modal" data-target="#ModalValid<?php echo $row->reserv_id;?>"><i class="fa fa-check"></i> Validasi</a>
                                                    <a class="dropdown-item" href="<?php echo site_url('index.php/back_n/reservation/detail/'.$row->reserv_id);?>"><i class="fa fa-external-link"></i> Detail</a>
                                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" ><i class="fa fa-mail-reply"></i> Balas</a>
                                                    <a class="dropdown-item delete" href="javascript:void(0);"  data-userid="<?php echo $row->reserv_id;?>"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                                    </div>
                                               
                                                </td>
                                            </tr>
                                            <?php else:?>
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $no;?></td>
                                                <td>
                                                <?php if($row->reserv_status_message=='1')
                                                    {   echo '<i tabindex="0" class="fa fa-check-circle" role="button" data-placement="bottom" data-toggle="popover" data-trigger="focus" title="" data-content="Data sudah diperiksa" data-original-title="Data Valid" style="color: #27ae60;"></i>';
                                                    }else{
                                                    }?>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $row->reserv_nama_sekolah;?></td>
                                                <td style="vertical-align: middle;"><?php echo date('d-M-Y',strtotime($row->reserv_date));?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->reserv_email;?> </td>
                                                <td style="vertical-align: middle;"><?php echo $row->reserv_jml_peserta;?></td>
                                                <td style="vertical-align: middle;"><a href="<?php echo site_url('index.php/back_n/reservation/download/'.$row->reserv_id);?>">Download file</a></td>
                                                <td style="vertical-align: middle;">
                                                <div class="btn-group">
                                                        <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <a class="dropdown-item edit" href="javascript:void(0);" data-toggle="modal" data-target="#ModalEdit<?php echo $row->reserv_id;?>"><i class="fa fa-edit"></i> Edit</a>
                                                            <a class="dropdown-item validation" href="javascript:void(0);" data-toggle="modal" data-target="#ModalValid<?php echo $row->reserv_id;?>"><i class="fa fa-check"></i> Validasi</a>
                                                            <a class="dropdown-item" href="<?php echo site_url('index.php/back_n/reservation/detail/'.$row->reserv_id);?>"><i class="fa fa-external-link"></i> Detail</a>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" ><i class="fa fa-mail-reply"></i> Balas</a>
                                                            <a class="dropdown-item delete" href="javascript:void(0);"  data-userid="<?php echo $row->reserv_id;?>"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                                    </div>
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
                    <!-- Dark table end -->
                                
                              <!-- Modal Edit Reserv Start -->
                               <?php 
                                    foreach ($data->result() as $row):
                                ?>
                                <form  action="<?php echo base_url().'index.php/back_n/reservation/update'?>" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="ModalEdit<?php echo $row->user_id;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data</h5>
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
                             <!-- Modal Edit Reserv End -->
                             <!--Validation MODAL-->
                            <form action="<?php echo site_url('index.php/back_n/reservation/validation');?>" method="post">
                                <div class="modal fade" id="ModalValid" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Validasi Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                            <div class="modal-body">
                                                <div class="alert alert-info">
                                                    Anda yakin mau memvalidasi data ini?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="comment_id4" required>
                                                <button type="button" class="btn btn-default btn-sm mb-3" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3">Validasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--Validation MODAL-->           
                             <!-- Modal hapus-->
                            <form  action="<?php echo base_url().'index.php/back_n/reservation/delete'?>" method="post" enctype="multipart/form-data">
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
