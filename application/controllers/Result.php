<?php

class Result extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('front_n/Blog_model','blog_model');
		$this->load->model('front_n/Visitor_model','visitor_model');
		$this->load->model('back_n/Site_model','site_model');
       	$this->load->model('front_n/Home_model','home_model');
		$this->visitor_model->count_visitor();
        $this->load->helper('text');
        error_reporting(0);
	}
	function index(){
		redirect('index.php/blog');
	}

	function search(){
		$query = strip_tags(htmlspecialchars($this->input->get('search_query',TRUE),ENT_QUOTES));
		$result = $this->blog_model->search_blog($query);
		if ($result->num_rows() > 0) {
			$x['data'] = $result;
			$x['judul']= 'Hasil Pencarian :'.' "'.$query.'"';
		}else{
			$x['data'] = $result;
			$x['judul']= 'Hasil Pencarian : "Tidak Temukan"';
		}
		$x['populer_post'] = $this->blog_model->get_popular_post();
		$site = $this->site_model->get_site_data()->row_array();
		$x['site_name'] = $site['site_name'];
		$x['site_title'] = $site['site_title'];
		$x['site_description'] = $site['site_description'];
		$x['site_maps'] = $site['site_maps'];
		$x['site_street_views'] = $site['site_street_views'];
		$x['site_shortcut_icon'] = $site['site_shortcut_icon'];
		$x['site_logo_header'] = $site['site_logo_header'];			$x['site_logo_footer'] = $site['site_logo_footer'];
		$x['site_address'] = $site['site_address'];
		$x['site_telephone'] = $site['site_telephone'];
		$x['site_email'] = $site['site_email'];
		$x['site_facebook'] = $site['site_facebook'];
		$x['site_twitter'] = $site['site_twitter'];
		$x['site_instagram'] = $site['site_instagram'];
		$x['latest_post'] = $this->home_model->get_latest_post();
		$x['popular_post'] = $this->home_model->get_popular_post();
		$this->load->view('layout/front_n/v_blog_search',$x);
	}
}