  <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Data Pengunjung</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="#">Dashboard</a></li>
                                <li><span>Data Pengunjung</span></li>
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
                                <a href="#" class="btn btn-info btn-sm mb-3" data-toggle="modal" data-target="#AddModal">Tambah Baru</a>
                                
                                <div id="reload" class="data-tables datatable-dark">
                                    <table id="data-table" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Dinas</th>
                                                <th>Umum</th>
                                                <th>Pelajar</th>
                                                <th>Asing</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="show_data">
                                         
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
                                <!-- Modal Add New Visitor Start -->
                                <form method="post">
                                <div class="modal fade" id="AddModal" aria-hidden="true">
                                <input type="hidden" value="" name="visit_id" id="visit_museum_id"/> 
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Data Pengunjung</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <select class="form-control" name="bulan" id="visit_month_id">
													        <option value="">Pilih Bulan</option>
														<?php 
														foreach($bulan as $row):?>
														    <option value="<?php echo $row->month_id;?>"><?php echo $row->month_name;?></option>
														<?php endforeach;?>
													    </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_year" data-plugin-masked-input data-input-mask=" 9999" placeholder="tahun" name="tahun" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_dinas" name="dinas" class="form-control" placeholder="pengunjung dinas">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_umum" name="umum" class="form-control" placeholder="pengunjung umum">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_pelajar" name="pelajar" class="form-control" placeholder="pengunjung pelajar">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_asing" name="asing" class="form-control" placeholder="pengunjung asing">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="visit_note" rows="3" name="keterangan" placeholder="keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal" aria-hiden="true">Batal</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3" id="btn_save">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                             <!-- Modal Add New Visitor End -->
                                
                            <!-- Modal Edit Start -->
                                <form method="post">
                                <div class="modal fade" id="EditModal" aria-hidden="true">
                                <input type="hidden" value="" id="visit_museum_id2" name="visit_id_edit"/> 
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data Pengunjung</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                        <select class="form-control" name="bulan_edit" id="visit_month_id2">
													        <option value="">Pilih Bulan</option>
														<?php 
														foreach($bulan as $row):?>
														    <option value="<?php echo $row->month_id;?>"><?php echo $row->month_name;?></option>
														<?php endforeach;?>
													    </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_year2" name="tahun_edit" data-plugin-masked-input data-input-mask=" 9999" placeholder="tahun"  class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_dinas2" name="dinas_edit" class="form-control" placeholder="pengunjung dinas">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_umum2" name="umum_edit" class="form-control" placeholder="pengunjung umum">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_pelajar2" name="pelajar_edit" class="form-control" placeholder="pengunjung pelajar">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" id="visit_asing2" name="asing_edit" class="form-control" placeholder="pengunjung asing">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="visit_note2" rows="3" name="keterangan_edit" placeholder="keterangan"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm mb-3" data-dismiss="modal" aria-hiden="true">Batal</button>
                                                <button type="submit" class="btn btn-success btn-sm mb-3" id="btn_update">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </form>
                             <!-- Modal Edit End -->

                            <!-- Modal hapus-->
                            <form method="post">
                                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                            <div class="modal-body">
                                                <div class="alert alert-info">
                                                    Anda yakin mau menghapus post ini?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="id" id="textid" required>
                                                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Cancel</button>
                                                <button type="submit" id="btn_delete" class="btn_delete btn btn-success btn-xs">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                </div>
            </div>
        </div>
        <!-- main content area end -->
