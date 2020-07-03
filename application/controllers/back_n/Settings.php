<?php

class Settings extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Site_model','site_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$result = $this->site_model->get_site_data()->row_array();
		$data['title']= "Konfigurasi  Website";
		$data['site_id'] = $result['site_id'];
		$data['site_name'] = $result['site_name'];
		$data['site_title'] = $result['site_title'];
		$data['site_description'] = $result['site_description'];
		$data['site_maps'] = $result['site_maps'];
		$data['site_street_views'] = $result['site_street_views'];
		$data['site_url_video'] = $result['site_url_video'];
        $data['site_shortcut_icon'] = $result['site_shortcut_icon'];
		$data['site_logo_header'] = $result['site_logo_header'];
		$data['site_logo_footer'] = $result['site_logo_footer'];
		$data['site_address'] = $result['site_address'];
		$data['site_telephone'] = $result['site_telephone'];
		$data['site_email'] = $result['site_email'];
		$data['site_facebook'] = $result['site_facebook'];
		$data['site_twitter'] = $result['site_twitter'];
		$data['site_instagram'] = $result['site_instagram'];
		$this->load->view('partials/back_n/header',$data);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_settings');
		$this->load->view('partials/back_n/footer');
		$this->load->view('partials/back_n/js/js_settings');
	}

	function update(){
		
		$site_id = htmlspecialchars($this->input->post('site_id',TRUE),ENT_QUOTES);
		$site_name = htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES);
		$site_title = htmlspecialchars($this->input->post('title',TRUE),ENT_QUOTES);
		$site_description = htmlspecialchars($this->input->post('description',TRUE),ENT_QUOTES);
		$maps = $this->input->post('maps',TRUE);
		$street_views = $this->input->post('street_views',TRUE);
		$url_video = $this->input->post('url_video',TRUE);
		$address = htmlspecialchars($this->input->post('address',TRUE),ENT_QUOTES);
		$telephone = htmlspecialchars($this->input->post('telephone',TRUE),ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$facebook = htmlspecialchars($this->input->post('facebook',TRUE),ENT_QUOTES);
		$twitter = htmlspecialchars($this->input->post('twitter',TRUE),ENT_QUOTES);
		$instagram = htmlspecialchars($this->input->post('instagram',TRUE),ENT_QUOTES);
	
		$config['upload_path'] = 'upload/images/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['encrypt_name'] = FALSE;

	    $this->upload->initialize($config);
	    if(!empty($_FILES['shortcut_icon']['name']) && !empty($_FILES['logo_header']['name']) && !empty($_FILES['logo_footer']['name'])){
            if ($this->upload->do_upload('shortcut_icon')){
	            $img_icon = $this->upload->data();
	            $shortcut_icon=$img_footer['file_name'];
	        }
            if ($this->upload->do_upload('logo_header')){
	            $img_header = $this->upload->data();
	            $logo_header=$img_header['file_name'];
	        }
	        if ($this->upload->do_upload('logo_footer')){
	            $img_footer = $this->upload->data();
	            $logo_footer=$img_footer['file_name'];
            }
	        $this->site_model->update_information($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$url_video,$shortcut_icon,$logo_header,$logo_footer,$address,$telephone,$email,$facebook,$twitter,$instagram);
	        $this->session->set_flashdata('msg','success');
	        redirect('index.php/back_n/settings');

	    }elseif(!empty($_FILES['shortcut_icon']['name']) && empty($_FILES['logo_header']['name']) && empty($_FILES['logo_footer']['name'])){
	    	if ($this->upload->do_upload('shortcut_icon')){
	            $img_icon = $this->upload->data();
	            $shortcut_icon=$img_footer['file_name'];
	        }
	        $this->site_model->update_information_icon($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$url_video,$shortcut_icon,$address,$telephone,$email,$facebook,$twitter,$instagram);
	        $this->session->set_flashdata('msg','success');
            redirect('index.php/back_n/settings');
            
        }elseif(empty($_FILES['shortcut_icon']['name']) && !empty($_FILES['logo_header']['name']) && empty($_FILES['logo_footer']['name'])){
	    	if ($this->upload->do_upload('logo_header')){
	            $img_header = $this->upload->data();
	            $logo_header=$img_header['file_name'];
	        }
	        $this->site_model->update_information_header($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$url_video,$logo_header,$address,$telephone,$email,$facebook,$twitter,$instagram);
	        $this->session->set_flashdata('msg','success');
	        redirect('index.php/back_n/settings');    

	    }elseif(empty($_FILES['shortcut_icon']['name']) && empty($_FILES['logo_header']['name']) && !empty($_FILES['logo_footer']['name'])){
	    	if ($this->upload->do_upload('logo_footer')){
	            $img_footer = $this->upload->data();
	            $logo_footer=$img_footer['file_name'];
	        }
	        $this->site_model->update_information_footer($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$url_video,$logo_footer,$address,$telephone,$email,$facebook,$twitter,$instagram);
	        $this->session->set_flashdata('msg','success');
	        redirect('index.php/back_n/settings');
        
	    }else{
	    	$this->site_model->update_information_nologo($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$url_video,$address,$telephone,$email,$facebook,$twitter,$instagram);
	        $this->session->set_flashdata('msg','success');
	        redirect('index.php/back_n/settings');
	    }
	}
}