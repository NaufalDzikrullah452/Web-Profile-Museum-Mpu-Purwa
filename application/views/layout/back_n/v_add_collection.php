<!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Tambah Data Baru</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><span><a href="<?php echo base_url();?>index.php/back_n/collection">Koleksi Museum</a></span></li>
                                <li><span>Tambah Data Baru</span></li>
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
                
                
                 <form action="<?php echo base_url().'index.php/back_n/collection/save'?>" method="post" enctype="multipart/form-data">
                 <div class="row">
                    <div class="col-md-6 mt-5">
                        <div class="card">
                            <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" name="slug" class="form-control"  placeholder="Permalink" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" name="filefoto" class="dropify" data-height="280" required>
                                        </div>                                    
                                        <div class="form-group">
                                            <label>No.Inventaris</label>
                                            <input type="text" name="nomer"  class="form-control"  placeholder="Nomer/KOTA MALANG" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama"  class="form-control" placeholder="nama benda" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Asal</label>
                                            <input type="text" name="asal"  class="form-control" placeholder="asal benda" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Bahan</label>
                                            <input type="text" name="bahan"  class="form-control" placeholder="bahan benda" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori_id" required>
                                                <option value="">-Kategori Benda-</option>
                                                <?php foreach ($category->result() as $row) : ?>
                                                    <option value="<?php echo $row->collect_category_id;?>"><?php echo $row->collect_category_name;?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                               
                            </div>
                        </div>
                         </div>
                    
                    <div class="col-md-6 mt-5 ">
                     <div class="card h-full">
                            <div class="card-body">
                                    
                                        
                                        <div class="form-group">
                                            <label>Tinggi</label>
                                            <input type="number" name="tinggi"  class="form-control" placeholder="cm" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tebal</label>
                                            <input type="number" name="tebal"  class="form-control" placeholder="cm" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Luas</label>
                                            <input type="number" name="luas"  class="form-control" placeholder="cm" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Lebar</label>
                                            <input type="number" name="lebar"  class="form-control" placeholder="cm" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Panjang</label>
                                            <input type="number" name="panjang"  class="form-control" placeholder="cm" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea name="keterangan" cols="6" rows="6" class="form-control" placeholder="deskripsi benda"></textarea>
                                        </div>
                                       
                                        <div class="form-group mt-5">
                                            <button type="submit" class="btn btn-primary btn-lg" style="width:100%"><i class="ti-save"></i> <span>SIMPAN</span></button>
                                        </div> 
                            </div>
                        </div>
                         </div>
                        </form>
                        </div>
                   <!-- Row -->
                        
                   
               </div>
        <!-- main content area end -->

