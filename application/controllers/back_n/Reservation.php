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

	function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'naufal.dzikrullah452@gmail.com';
        $mail->Password = 'anonymous452';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('naufal.dzikrullah452@gmail.com', 'Naufal');
        $mail->addReplyTo('info@example.com', 'CodexWorld');
        
        // Add a recipient
        $mail->addAddress('naufal.dzikrullah978@gmail.com');
        
        // // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
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
