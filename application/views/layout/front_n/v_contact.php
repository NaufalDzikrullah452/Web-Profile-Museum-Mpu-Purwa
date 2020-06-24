    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(<?php echo base_url('assets/frontend/img/bg-img/bg_1.jpg');?>);">
            <h2>Kontak</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Info Start ##### -->
    <div class="contact-area-info section-padding-0-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Contact Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="contact--thumbnail">
                        <img src="<?php echo base_url('assets/frontend/img/bg-img/haldep5.jpg');?>" alt="">
                    </div>
                </div>

                <div class="col-12 col-md-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Kontak Kami</h2>
                        <p>Hubungi kami </p>
                    </div>
                    <!-- Contact Information -->
                    <div class="contact-information">
                        <p><span>Alamat:</span> <?php echo $site_address;?></p>
                        <p><span>Telepon:</span> <?php echo $site_telephone;?></p>
                        <p><span>Email:</span> <?php echo $site_email;?></p>
                        <p><span>Jam Buka:</span> Setiap Hari: 8.00 - 15.00</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Contact Area Info End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h2>Kotak Saran</h2>
                        <p>Buat perubahan, berikan saran anda</p>
                    </div>
                    <!-- Contact Form Area -->
                    <div class="contact-form-area mb-100">
                    <?php echo $this->session->flashdata('msg');?>
                        <form action="<?php echo site_url('index.php/contact/submit_suggestion');?>" method="post">
                            <div class="row">
                                 <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Nama / Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="age"  placeholder="Usia / Age">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Alamat / Address">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <input  type="radio" name="origin" value="Domestik" >
                                        <label>
                                            Domestik
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                       <input  type="radio" name="origin" value="Non-Domestik" >
                                        <label>
                                            Non-Domestik
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" cols="40" rows="20" placeholder="Saran Anda"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Kirim Saran</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Google Maps -->
                    <div class="map-area mb-100">
                        <iframe src=<?php echo $site_street_views;?>></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->