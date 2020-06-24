<?php
class Users extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Users_model','users_model');
		$this->load->model('back_n/Comment_model','comment_model');
		$this->load->library('upload');
		error_reporting(0);
		$this->load->helper('text');
	}

	function index(){
		$x['title']= "Daftar User";
		$x['data']=$this->users_model->get_users();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_users');
		$this->load->view('partials/back_n/footer');
		$this->load->view('partials/back_n/js/js_users');
		$this->load->helper('text');
	}

	function insert(){
		$nama=htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
		$pass2=htmlspecialchars($this->input->post('password2',TRUE),ENT_QUOTES);
		$level=htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);
		
		$config['upload_path'] = 'upload/user'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	    
	    $this->upload->initialize($config);
	    
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
					$this->users_model->insert_user($nama,$email,$pass,$level,$gambar);
					echo $this->session->set_flashdata('msg','success');
					redirect('index.php/back_n/users');
				}else{
		            echo $this->session->set_flashdata('msg','error-img');
		            redirect('index.php/back_n/users');
		    	}
		                 
		    }else{
				$this->users_model->insert_user_noimg($nama,$email,$pass,$level);
				echo $this->session->set_flashdata('msg','success');
				redirect('index.php/back_n/users');
			}
	    }else{
	    	echo $this->session->set_flashdata('msg','error');
			redirect('index.php/back_n/users');
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

	function delete(){
		$userid=$this->input->post('kode',TRUE);
		$this->users_model->delete_user($userid);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('index.php/back_n/users');
	}


}