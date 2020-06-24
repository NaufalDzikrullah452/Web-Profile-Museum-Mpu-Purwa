    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/bg_1.jpg');?>);">
            <h2>Reservasi</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reservasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area ">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Booking Online</h2>
                        <p>Untuk study group anda</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                    <?php echo $this->session->flashdata('msg');?>
                        <form action="<?php echo site_url('index.php/reservation/submit_reservation');?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="sekolah" placeholder="nama sekolah">
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="penanggung_jwb" placeholder="nama penanggung jawab">
                                    </div>
                                </div>
                                 <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="surat_rekomendasi" placeholder="surat rekomendasi dari sekolah">
                                        <br>
                                        <smalls style="color:grey;">*Surat rekomendasi dari sekolah (format harus pdf/docx)</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telp" placeholder="no.telp aktif">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="alamat" placeholder="alamat sekolah">
                                    </div>
                                </div>
                                 <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email aktif">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="jml_peserta" placeholder="jumlah peserta">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="catatan" cols="30" rows="10" placeholder="catatan"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src=<?php echo $site_maps;?>></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->