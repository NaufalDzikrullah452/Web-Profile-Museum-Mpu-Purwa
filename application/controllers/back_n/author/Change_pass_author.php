<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_pass_author extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Changepass_model','changepass_model');
		$this->load->helper('text');
	}

	function index(){
		$data['title']= "Ubah Password";
		$this->load->view('partials/back_n/author/header',$data);
		$this->load->view('partials/back_n/author/sidebar');
		$this->load->view('layout/back_n/author/v_change_pass_author');
		$this->load->view('partials/back_n/author/footer');
		$this->load->view('partials/back_n/js/js_changepass');
	}

	function change(){
		$user_id = $this->session->userdata('id');
		if(!empty($user_id)){
			$old_password = htmlspecialchars($this->input->post('old_password',TRUE),ENT_QUOTES);
			$new_password = htmlspecialchars($this->input->post('new_password',TRUE),ENT_QUOTES);
			$conf_password = htmlspecialchars($this->input->post('conf_password',TRUE),ENT_QUOTES);
			$old_pass = md5($old_password);
			$new_pass = md5($new_password);
			$checking_old_password = $this->changepass_model->checking_old_password($user_id,$old_pass);
			if($checking_old_password->num_rows() > 0){
				if($new_password == $conf_password){
					$this->changepass_model->change_password($user_id,$new_pass);
					$this->session->set_flashdata('msg','success');
					redirect('index.php/back_n/author/change_pass_author');
				}else{
					$this->session->set_flashdata('msg','error-notmatch');
					redirect('index.php/back_n/author/change_pass_author');
				}
			}else{
				$this->session->set_flashdata('msg','error-notfound');
				redirect('index.php/back_n/author/change_pass_author');
			}
		}else{
			$this->session->set_flashdata('msg','error');
			redirect('index.php/back_n/author/change_pass_author');
		}
	}
}