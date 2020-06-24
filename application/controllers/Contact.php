<?php

class Contact extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('front_n/Contact_model','contact_model');
        $this->load->model('back_n/Site_model','site_model');
        $this->load->model('front_n/Home_model','home_model');
        $this->load->helper('text');
        error_reporting(0);
       
    }

    public function index()
    {
        $this->load->helper('url');
        $site = $this->site_model->get_site_data()->row_array();
        $data['site_name'] = $site['site_name'];
		$data['site_title'] = $site['site_title'];
		$data['site_description'] = $site['site_description'];
		$data['site_maps'] = $site['site_maps'];
		$data['site_street_views'] = $site['site_street_views'];
        $data['site_shortcut_icon'] = $site['site_shortcut_icon'];
		$data['site_logo_header'] = $site['site_logo_header'];
		$data['site_logo_footer'] = $site['site_logo_footer'];
		$data['site_address'] = $site['site_address'];
		$data['site_telephone'] = $site['site_telephone'];
		$data['site_email'] = $site['site_email'];
		$data['site_facebook'] = $site['site_facebook'];
		$data['site_twitter'] = $site['site_twitter'];
		$data['site_instagram'] = $site['site_instagram'];
		$data['latest_post'] = $this->home_model->get_latest_post();
		$data['popular_post'] = $this->home_model->get_popular_post();
        $data['title']= "Map & Kontak";
        $this->load->view("partials/front_n/header",$data);
        $this->load->view("partials/front_n/navbar");
        $this->load->view("layout/front_n/v_contact");
        $this->load->view("partials/front_n/footer");
       
    }

    function submit_suggestion(){
		$this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
        $this->form_validation->set_rules('age', 'Age', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('origin', 'Origin', 'required');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('index.php/contact');
		}else{
			$name=$this->input->post('name',TRUE);
            $age=$this->input->post('age',TRUE);
            $address=$this->input->post('address',TRUE);
            $origin=$this->input->post('origin',TRUE);
			$message=strip_tags(htmlspecialchars($this->input->post('message',TRUE),ENT_QUOTES));
			$this->contact_model->save_suggestion($name,$age,$address,$origin,$message);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih atas saran Anda</div>');
			redirect('index.php/contact');
		}
	}
    

}