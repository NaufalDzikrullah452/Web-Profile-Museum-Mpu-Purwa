<?php

class Collect_result extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('front_n/Collect_model','collect_model');
		$this->load->model('back_n/Site_model','site_model');
       	$this->load->model('front_n/Home_model','home_model');
        $this->load->helper('text');
        error_reporting(0);
	}
	function index(){
		redirect('index.php/collect');
	}

	function search(){
		$query = strip_tags(htmlspecialchars($this->input->get('search_query',TRUE),ENT_QUOTES));
		$result = $this->collect_model->search_collection($query);
		if ($result->num_rows() > 0) {
			$x['data'] = $result;
			$x['judul']= 'Hasil Pencarian :'.' "'.$query.'"';
		}else{
			$x['data'] = $result;
			$x['judul']= 'Hasil Pencarian : "Tidak Temukan"';
		}
		$site = $this->site_model->get_site_data()->row_array();
		$x['site_name'] = $site['site_name'];
		$x['site_title'] = $site['site_title'];
		$x['site_description'] = $site['site_description'];
		$x['site_shortcut_icon'] = $site['site_shortcut_icon'];
		$x['site_logo_header'] = $site['site_logo_header'];
		$x['site_logo_footer'] = $site['site_logo_footer'];
		$x['site_address'] = $site['site_address'];
		$x['site_telephone'] = $site['site_telephone'];
		$x['site_email'] = $site['site_email'];
		$x['site_facebook'] = $site['site_facebook'];
		$x['site_twitter'] = $site['site_twitter'];
		$x['site_instagram'] = $site['site_instagram'];
		$x['latest_post'] = $this->home_model->get_latest_post();
		$x['popular_post'] = $this->home_model->get_popular_post();
		$this->load->view('layout/front_n/v_collect_search',$x);
	}
}