<?php
class Reservation extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Reservation_model','reservation_model');
		$this->load->library('upload');
		$this->load->library('email');
		$this->load->helper('text');
	}

	function index(){
		$x['title']= "List Booking Pengunjung";
		$x['data'] = $this->reservation_model->get_all_reservation();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_reservation');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_reservation');
	}

	function confirmed(){
		$x['title']= "Booking Valid";
		$x['data'] = $this->reservation_model->get_all_reservation_confirmed();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_reservation_confirmed');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_reservation');
	}

	function detail(){
		$reserv_id = htmlspecialchars($this->uri->segment(4),ENT_QUOTES);
		$result = $this->reservation_model->get_reservation_by_id($reserv_id);
		if($result->num_rows() > 0){
			$row = $result->row_array();
			$x['id'] = $row['reserv_id'];
			$x['tgl'] = $row['reserv_date'];
			$x['sekolah'] = $row['reserv_nama_sekolah'];
			$x['penanggung_jwb'] = $row['reserv_penanggung_jwb'];
			$x['alamat'] = $row['reserv_alamat'];
			$x['surat_rekomendasi'] = $row['reserv_file'];
			$x['telp'] = $row['reserv_telp'];
			$x['email'] = $row['reserv_email'];
			$x['jml_peserta'] = $row['reserv_jml_peserta'];
			$x['catatan'] = $row['reserv_catatan'];
			$x['status_message'] = $row['reserv_status_message'];
			$x['title'] = "Detail Reservasi";
			$this->reservation_model->update_status_by_id($reserv_id);
			$this->load->view('partials/back_n/header',$x);
			$this->load->view('partials/back_n/sidebar');
			$this->load->view('layout/back_n/v_reservation_detail');
			$this->load->view('partials/back_n/footer');
		}else{
			redirect('index.php/back_n/reservation');
		}
	}

	function update(){

		$reserv_id=$this->input->post('reserv_id',TRUE);
		$sekolah=$this->input->post('sekolah',TRUE);
        $penanggung_jwb=$this->input->post('penanggung_jwb',TRUE);
        $telp=$this->input->post('telp',TRUE);
        $alamat=$this->input->post('alamat',TRUE);
	    $email=$this->input->post('email',TRUE);
        $jml_peserta=$this->input->post('jml_peserta',TRUE);
		$catatan=strip_tags(htmlspecialchars($this->input->post('catatan',TRUE),ENT_QUOTES));
		
		$config['upload_path'] = 'upload/reservation'; //path folder
	    $config['allowed_types'] = 'pdf|doc|docx'; //type file
        $config['encrypt_name'] = TRUE; //enskripsi nama file
        $config['max_size'] = 10000; //Max size file
	    
	    $this->upload->initialize($config);
	    if(!empty($_FILES['surat_rekomendasi']['name'])){
            if ($this->upload->do_upload('surat_rekomendasi')){

	            $berkas = $this->upload->data();
				$file=$berkas['file_name'];
				
	        }
	        $this->reservation_model->update_reservation($reserv_id,$sekolah,$penanggung_jwb,$file,$telp,$alamat,$email,$jml_peserta,$catatan);
	        $this->session->set_flashdata('msg','success-edit');
	        redirect('index.php/back_n/reservation');

	    }else{
	    	$this->reservation_model->update_reservation_nofile($reserv_id,$sekolah,$penanggung_jwb,$telp,$alamat,$email,$jml_peserta,$catatan);
	        $this->session->set_flashdata('msg','success-edit');
	        redirect('index.php/back_n/reservation');
	    }
	}

	function validation(){
		$reserv_id = $this->input->post('reserv_id2',TRUE);
		$this->reservation_model->validation_reservation($reserv_id);
		$this->session->set_flashdata('msg','info');
		redirect('index.php/back_n/reservation');
	}

	function download($id)
	{
		$data = $this->db->get_where('tbl_reservation',['reserv_id'=>$id])->row();
		force_download('upload/reservation/'.$data->reserv_file,NULL);
		echo $this->session->set_flashdata('msg','success-download');
	}

	function send()
	{
		$reserv_id=$this->input->post('reserv_id4',TRUE);
		$sekolah=$this->input->post('sekolah',TRUE);
        $penanggung_jwb=$this->input->post('penanggung_jwb',TRUE);
        $telp=$this->input->post('telp',TRUE);
        $alamat=$this->input->post('alamat',TRUE);
	    $email=$this->input->post('email',TRUE);
        $jml_peserta=$this->input->post('jml_peserta',TRUE);
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'naufal.dzikrullah978@gmail.com';
        $mail->Password = 'anonymous452';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('naufal.dzikrullah978@gmail.com', 'Museum Mpu Purwa');
		$mail->addReplyTo('no-replymuseum@example.com', 'Museum Mpu Purwa');
		
		$subjek = $this->input->post('subjek');
		$penerima = $this->input->post('email');
		$sekolah = $this->input->post('sekolah');
		$penanggung_jwb = $this->input->post('penanggung_jwb');
		$telp = $this->input->post('telp');
		$jml_peserta = $this->input->post('jml_peserta');
		$tgl = $this->input->post('tgl');
		$alamat = $this->input->post('alamat');
		$subject = $this->input->post('subjek');
        
        // Add a recipient
        $mail->addAddress($penerima);
        
        // // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = $subjek;
        
        // Set email format to HTML
        $mail->isHTML(true);
        
		// Email body content
		
		$mailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html data-editor-version="2" class="sg-campaigns" xmlns="http://www.w3.org/1999/xhtml"><head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     
      <style type="text/css">
    body, p, div {
      font-family: inherit;
      font-size: 14px;
    }
    body {
      color: #000000;
    }
    body a {
      color: #1188E6;
      text-decoration: none;
    }
    p { margin: 0; padding: 0; }
    table.wrapper {
      width:100% !important;
      table-layout: fixed;
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: 100%;
      -moz-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    img.max-width {
      max-width: 100% !important;
    }
    .column.of-2 {
      width: 50%;
    }
    .column.of-3 {
      width: 33.333%;
    }
    .column.of-4 {
      width: 25%;
    }
    @media screen and (max-width:480px) {
      .preheader .rightColumnContent,
      .footer .rightColumnContent {
        text-align: left !important;
      }
      .preheader .rightColumnContent div,
      .preheader .rightColumnContent span,
      .footer .rightColumnContent div,
      .footer .rightColumnContent span {
        text-align: left !important;
      }
      .preheader .rightColumnContent,
      .preheader .leftColumnContent {
        font-size: 80% !important;
        padding: 5px 0;
      }
      table.wrapper-mobile {
        width: 100% !important;
        table-layout: fixed;
      }
      img.max-width {
        height: auto !important;
        max-width: 100% !important;
      }
      a.bulletproof-button {
        display: block !important;
        width: auto !important;
        font-size: 80%;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      .columns {
        width: 100% !important;
      }
      .column {
        display: block !important;
        width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
      }
    }
  </style>
      <!--user entered Head Start--><link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"><style>
body {font-family: "Poppins", sans-serif;}
</style><!--End Head user entered-->
	</head>';
	
	
		$mailContent .='<body>
      <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size:14px; font-family:inherit; color:#000000; background-color:#e5dcd2;">
        <div class="webkit">
          <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#e5dcd2">
            <tbody><tr>
              <td valign="top" bgcolor="#e5dcd2" width="100%">
                <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="100%">
                      <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr>
                          <td>
                            <!--[if mso]>
    <center>
    <table><tr><td width="600">
  <![endif]-->
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px;" align="center">
                                      <tbody><tr>
                                        <td role="modules-container" style="padding:0px 0px 0px 0px; color:#000000; text-align:left;" bgcolor="#FFFFFF" width="100%" align="left"><table class="module preheader preheader-hide" role="module" data-type="preheader" border="0" cellpadding="0" cellspacing="0" width="100%" style="display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;">
    <tbody><tr>
      <td role="module-content">
        <p></p>
      </td>
    </tr>
  </tbody></table><table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding:30px 0px 30px 0px;" bgcolor="#fdcb6e">
    <tbody>
      <tr role="module-content">
        <td height="100%" valign="top">
          <table class="column" width="600" style="width:600px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
            <tbody>
              <tr>
                <td style="padding:0px;margin:0px;border-spacing:0;"><table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c7fa172a-cdbf-4e85-ac82-60844b32dd62">
    <tbody>
      <tr>
        <td style="font-size:6px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
          <img class="max-width" border="0" style="display:block; color:#000000; text-decoration:none; font-family:Helvetica, arial, sans-serif; font-size:16px;" width="122" alt="" data-proportionally-constrained="true" data-responsive="false" src="https://i.ibb.co/h7cnfFk/143x15.png" height="10">
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="594ac2bc-2bb0-4642-8002-a8c9b543d125" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:10px 0px 0px 0px; line-height:16px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 10px">Jl.Soekarno Hatta Perum. Griya Shanta Blok B No.210, Kota Malang</span></div>
<div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 10px">(+62) 341-404-515</span></div>
<div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 10px">museum.mpupurwa@gmail.com&nbsp;</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
              </tr>
            </tbody>
          </table>
          
        </td>
      </tr>
    </tbody>
  </table><table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="cb31e9b8-b045-4c38-a478-ed2a6e2dc166">
    <tbody>
      <tr>
        <td style="font-size:6px; line-height:10px; padding:0px 0px 0px 0px;" valign="top" align="center">
          <img class="max-width" border="0" style="display:block; color:#000000; text-decoration:none; font-family:Helvetica, arial, sans-serif; font-size:16px;" width="650" alt="" data-proportionally-constrained="true" data-responsive="false" src="https://i.ibb.co/d43B41n/600x189.png" height="300">
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="8fd711e6-aecf-4663-bf53-6607f08b57e9" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:30px 0px 40px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"><strong>BOOKING INVOICE</strong></span></div>
<div style="font-family: inherit; text-align: center"><br></div>
<div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"><strong>Tanggal Pendaftaran</strong></span></div>
<div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px">'.date('M d, Y H:i',strtotime($tgl)).'&nbsp;</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="8fd711e6-aecf-4663-bf53-6607f08b57e9.1" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:0px 40px 40px 40px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: inherit"><span style="color: #80817f; font-size: 12px"><strong>Nama Sekolah:</strong></span><span style="color: #80817f; font-size: 12px"> '.$sekolah.'</span></div>
<div style="font-family: inherit; text-align: inherit"><span style="color: #80817f; font-size: 12px"><strong>Alamat:</strong></span><span style="color: #80817f; font-size: 12px"> '.$alamat.'</span></div>
<div style="font-family: inherit; text-align: inherit"><span style="color: #80817f; font-size: 12px"><strong>No. Telpon:</strong></span><span style="color: #80817f; font-size: 12px"> '.$telp.'</span></div>
<div style="font-family: inherit; text-align: inherit"><span style="color: #80817f; font-size: 12px"><strong>Email:</strong></span><span style="color: #80817f; font-size: 12px"> '.$penerima.'</span></div>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10">
    <tbody>
      <tr>
        <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
          <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="2px" style="line-height:2px; font-size:2px;">
            <tbody>
              <tr>
                <td style="padding:0px 0px 2px 0px;" bgcolor="#80817f"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table><table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding:0px 40px 0px 40px;" bgcolor="#FFFFFF">
    <tbody>
      <tr role="module-content">
        <td height="100%" valign="top">
          <table class="column" width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
            <tbody>
              <tr>
                <td style="padding:0px;margin:0px;border-spacing:0;"><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"><strong>PENANGGUNG JAWAB</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
              </tr>
            </tbody>
          </table>
          
        <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-1">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0;"><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"><strong></strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table><table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-2">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0;"><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1.1" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"><strong>JUMLAH PESERTA</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table></td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10.1">
    <tbody>
      <tr>
        <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
          <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="2px" style="line-height:2px; font-size:2px;">
            <tbody>
              <tr>
                <td style="padding:0px 0px 2px 0px;" bgcolor="#80817f"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table><table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" data-type="columns" style="padding:0px 40px 0px 40px;" bgcolor="#FFFFFF">
    <tbody>
      <tr role="module-content">
        <td height="100%" valign="top">
          <table class="column" width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
            <tbody>
              <tr>
                <td style="padding:0px;margin:0px;border-spacing:0;"><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.2" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px">'.$penanggung_jwb.' Orang&nbsp;</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
              </tr>
            </tbody>
          </table>
          <table class="column" width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
            <tbody>
              <tr>
                <td style="padding:0px;margin:0px;border-spacing:0;"><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1.2" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
              </tr>
            </tbody>
          </table>
        <table width="173" style="width:173px; border-spacing:0; border-collapse:collapse; margin:0px 0px 0px 0px;" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="" class="column column-2">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0;"><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="64573b96-209a-4822-93ec-5c5c732af15c.1.1.1" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:15px 0px 15px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px">'.$jml_peserta.'</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table></td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10.1.2">
    <tbody>
      <tr>
        <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
          <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="1px" style="line-height:1px; font-size:1px;">
            <tbody>
              <tr>
                <td style="padding:0px 0px 1px 0px;" bgcolor="#80817f"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="divider" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="c614d8b1-248a-48ea-a30a-8dd0b2c65e10.1.2.1">
    <tbody>
      <tr>
        <td style="padding:0px 40px 0px 40px;" role="module-content" height="100%" valign="top" bgcolor="">
          <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="1px" style="line-height:1px; font-size:1px;">
            <tbody>
              <tr>
                <td style="padding:0px 0px 1px 0px;" bgcolor="#80817f"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>';

		$mailContent .='<table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="54da3428-feae-4c1a-a740-9c9fdb4e52d7">
    <tbody>
      <tr>
        <td style="padding:0px 0px 50px 0px;" role="module-content" bgcolor="">
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="8fd711e6-aecf-4663-bf53-6607f08b57e9.2" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:10px 0px 20px 0px; line-height:22px; text-align:inherit;" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #80817f; font-size: 12px"><strong>Buat perubahan, Kirim saran Anda!&nbsp;</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="table-layout:fixed;" width="100%" data-muid="0f986857-87df-4c0e-934f-e77105f78192">
      <tbody>
        <tr>
          <td align="center" bgcolor="" class="outer-td" style="padding:0px 0px 0px 0px;">
            <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align:center;">
              <tbody>
                <tr>
                <td align="center" bgcolor="#fdcb6e" class="inner-td" style="border-radius:6px; font-size:16px; text-align:center; background-color:inherit;">
                  <a href="http://localhost/emuseum/index.php/contact" style="background-color:#fdcb6e; border:1px solid #fdcb6e; border-color:#fdcb6e; border-radius:0px; border-width:1px; color:#80817f; display:inline-block; font-size:12px; font-weight:700; letter-spacing:0px; line-height:normal; padding:12px 40px 12px 40px; text-align:center; text-decoration:none; border-style:solid; font-family:inherit;" target="_blank">Kotak Saran</a>
                </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table><table class="module" role="module" data-type="spacer" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="9bbc393c-c337-4d1a-b9f9-f20c740a0d44">
    <tbody>
      <tr>
        <td style="padding:0px 0px 30px 0px;" role="module-content" bgcolor="">
        </td>
      </tr>
    </tbody>
  </table><table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;" data-muid="20d6cd7f-4fad-4e9c-8fba-f36dba3278fc" data-mc-module-version="2019-10-22">
    <tbody>
      <tr>
        <td style="padding:40px 30px 40px 30px; line-height:22px; text-align:inherit; background-color:#80817f;" height="100%" valign="top" bgcolor="#80817f" role="module-content"><div><div style="font-family: inherit; text-align: center"><span style="color: #ffffff; font-size: 12px"><strong>Terima kasih telah menggunakan layanan kami. Kenali Budayamu Cintai Bangsamu </strong></span></div>
<div style="font-family: inherit; text-align: center"><br></div>
<div style="font-family: inherit; text-align: center"><span style="color: #ffffff; font-size: 12px"><strong>KUNJUNGI, LINDUNGI, LESTARIKAN!&nbsp;</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><div data-role="module-unsubscribe" class="module" role="module" data-type="unsubscribe" style="background-color:#fdcb6e; color:#444444; font-size:12px; line-height:20px; padding:16px 16px 16px 16px; text-align:Center;" data-muid="4e838cf3-9892-4a6d-94d6-170e474d21e5">
                                            <div class="Unsubscribe--addressLine"><p class="Unsubscribe--senderName" style="font-size:12px; line-height:20px;">MUSEUM MPU PURWA MALANG</p><p style="font-size:12px; line-height:20px;"><span class="Unsubscribe--senderAddress">Jl.Soekarno Hatta Perum. Griya Shanta Blok B No.210, Kota Malang</span>, <span class="Unsubscribe--senderCity">(+62) 341-404-515</span>, <span class="Unsubscribe--senderState"></span> <span class="Unsubscribe--senderZip">museum.mpupurwa@gmail.com</span></p></div>
                                            <p style="font-size:12px; line-height:20px;"><a class="Unsubscribe--unsubscribeLink" href="http://localhost/emuseum/index.php" target="_blank" style="color:#80817f;">website</a> - <a href="http://localhost/emuseum/index.php" target="_blank" class="Unsubscribe--unsubscribePreferences" style="color:#80817f;">Museum Mpu Purwa</a></p>
                                          </div><table border="0" cellpadding="0" cellspacing="0" class="module" data-role="module-button" data-type="button" role="module" style="table-layout:fixed;" width="100%" data-muid="04084f31-d714-4785-98c7-39de4df9fb7b">
      <tbody>
        <tr>
          <td align="center" bgcolor="#fdcb6e" class="outer-td" style="padding:20px 0px 20px 0px;">
            <table border="0" cellpadding="0" cellspacing="0" class="wrapper-mobile" style="text-align:center;">
              <tbody>
                <tr>
                <td align="center" bgcolor="#f5f8fd" class="inner-td" style="border-radius:6px; font-size:16px; text-align:center; background-color:inherit;"><a href="http://localhost/emuseum/index.php" style="background-color:#f5f8fd; border:1px solid #f5f8fd; border-color:#f5f8fd; border-radius:25px; border-width:1px; color:#a8b9d5; display:inline-block; font-size:10px; font-weight:normal; letter-spacing:0px; line-height:normal; padding:5px 18px 5px 18px; text-align:center; text-decoration:none; border-style:solid; font-family:helvetica,sans-serif;" target="_blank">POWERED BY MUSEUM MPU PURWA</a></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table></td>
                                      </tr>
                                    </tbody></table>
                                    <!--[if mso]>
                                  </td>
                                </tr>
                              </table>
                            </center>
                            <![endif]-->
                          </td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
          </tbody></table>
        </div>
      </center>
    
  
</body></html>';
    	
		
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo $this->session->set_flashdata('msg','error-sent');
			redirect('index.php/back_n/reservation');
        }else{
			echo $this->session->set_flashdata('msg','success-sent');
			redirect('index.php/back_n/reservation');
        }
    }

	function delete(){
		$reserv_id = $this->input->post('kode',TRUE);
		$this->reservation_model->delete_reservation($reserv_id);
		echo $this->session->set_flashdata('msg','success-delete');
		redirect('index.php/back_n/reservation');
	}


}
