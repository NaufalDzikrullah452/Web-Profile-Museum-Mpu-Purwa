<?php

class About extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
       $this->load->model('back_n/Site_model','site_model');
       $this->load->model('front_n/Home_model','home_model');
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
        $data['title']= "Tentang Kami";
        $this->load->view("partials/front_n/header", $data);
        $this->load->view("partials/front_n/navbar");
        $this->load->view("layout/front_n/v_about");
        $this->load->view("partials/front_n/footer");
       
    }

  
    

}