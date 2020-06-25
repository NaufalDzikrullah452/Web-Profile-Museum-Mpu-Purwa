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
		$userid=$this->input->post('user_id',TRUE);
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$pass2=htmlspecialchars($this->input->post('password2',TRUE),ENT_QUOTES);
		$level=htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);
		
		$config['upload_path'] = 'upload/user'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    
	    $this->upload->initialize($config);
	    
	    if(empty($pass) || empty($pass2)){
	    	if(!empty($_FILES['filefoto']['name'])){
		        if ($this->upload->do_upload('filefoto')){
		            $gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	                $config['source_image']='upload/user/'.$gbr['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '80%';
	                $config['width']= 100;
	                $config['height']= 100;
	                $config['new_image']= 'upload/user/'.$gbr['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

		            $gambar=$gbr['file_name'];		
					$this->users_model->update_user_nopass($userid,$nama,$email,$level,$gambar);
					echo $this->session->set_flashdata('msg','info');
					redirect('index.php/back_n/users');
				}else{
		            echo $this->session->set_flashdata('msg','error-img');
		            redirect('index.php/back_n/users');
		    	}
		                 
		    }else{
				$this->users_model->update_user_nopassimg($userid,$nama,$email,$level);
				echo $this->session->set_flashdata('msg','info');
				redirect('index.php/back_n/users');
			}
	    }else{
	    	if($pass == $pass2){
		    	if(!empty($_FILES['filefoto']['name'])){
			        if ($this->upload->do_upload('filefoto')){
			            $gbr = $this->upload->data();
		                //Compress Image
		                $config['image_library']='gd2';
		                $config['source_image']='upload/user/'.$gbr['file_name'];
		                $config['create_thumb']= FALSE;
		                $config['maintain_ratio']= FALSE;
		                $config['quality']= '80%';
		                $config['width']= 100;
		                $config['height']= 100;
		                $config['new_image']= 'upload/user/'.$gbr['file_name'];
		                $this->load->library('image_lib', $config);
		                $this->image_lib->resize();

			            $gambar=$gbr['file_name'];		
						$this->users_model->update_user($userid,$nama,$email,$pass,$level,$gambar);
						echo $this->session->set_flashdata('msg','info');
						redirect('index.php/back_n/users');
					}else{
			            echo $this->session->set_flashdata('msg','error-img');
			            redirect('index.php/back_n/users');
			    	}
			                 
			    }else{
					$this->users_model->update_user_noimg($userid,$nama,$email,$pass,$level);
					echo $this->session->set_flashdata('msg','info');
					redirect('index.php/back_n/users');
				}
		    }else{
		    	echo $this->session->set_flashdata('msg','error');
				redirect('index.php/back_n/users');
		    }
	    }

	}

	function validation(){
		$reserv_id = $this->input->post('reserv_id2',TRUE);
		$this->reservation_model->validation_reservation($reserv_id);
		$this->session->set_flashdata('msg','success-validation');
		redirect('index.php/back_n/reservation');
	}

	function download($id)
	{
		$data = $this->db->get_where('tbl_reservation',['reserv_id'=>$id])->row();
		force_download('upload/reservation/'.$data->reserv_file,NULL);
		echo $this->session->set_flashdata('msg','success-download');
	}

	function delete(){
		$reserv_id = $this->input->post('kode',TRUE);
		$this->reservation_model->delete_reservation($reserv_id);
		echo $this->session->set_flashdata('msg','success-delete');
		redirect('index.php/back_n/reservation');
	}


}
