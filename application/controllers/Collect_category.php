<?php
class Collect_category extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('back_n/Collection_category_model','collection_category_model');
		$this->load->model('front_n/Collect_model','collect_model');
		$this->load->model('back_n/Site_model','site_model');
        $this->load->model('front_n/Home_model','home_model');
        $this->load->helper('text');
		error_reporting(0);
	}

	function index(){
		redirect('index.php/collect');
	}

	function detail($slug){
		$this->load->library('pagination');
		$data=$this->collection_category_model->get_collect_by_category($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$category_id=$q['collect_category_id'];
			$kategori_nama=$q['collect_category_name'];
			$jum=$data;
	        $page=$this->uri->segment(4);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=8;
	        $config['base_url'] = base_url('index.php/collect_category/detail/'.$slug.'/') ;
	        $config['total_rows'] = $jum->num_rows();
	        $config['per_page'] = $limit;
	        $config['uri_segment'] = 3;
	        $config['use_page_numbers']=TRUE;
	        
		    //Tambahan untuk styling
        $config['full_tag_open']   = '<nav aria-label="Page navigation"> <ul class="pagination">';
        $config['full_tag_close']  = '</ul></nav>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li class="page-item"><a  href="#"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
        
        $config['next_link']       = ' Next'; 
        $config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '</span></li>';
        
        $config['prev_link']       = ' Prev '; 
        $config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        
        $config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']   = '</span></li>';
         
        $config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']   = '</span></li>';
		
	        $this->pagination->initialize($config);
	        $x['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$x['data']=$this->collection_category_model->collect_category_perpage($category_id,$offset,$limit,$config["per_page"], $x['page']);
			$x['pagination'] = $this->pagination->create_links();
			$site = $this->site_model->get_site_data()->row_array();
			$x['site_name'] = $site['site_name'];
			$x['site_title'] = $site['site_title'];
			$x['site_street_views'] = $site['site_street_views'];
			$x['site_shortcut_icon'] = $site['site_shortcut_icon'];
			$x['site_logo_header'] = $site['site_logo_header'];
			$x['site_logo_footer'] = $site['site_logo_footer'];
			$x['site_address'] = $site['site_address'];
			$x['site_telephone'] = $site['site_telephone'];
			$x['site_email'] = $site['site_email'];
			$x['site_facebook'] = $site['site_facebook'];
			$x['site_twitter'] = $site['site_twitter'];
			$x['site_instagram'] = $site['site_instagram'];
			$x['judul']= $kategori_nama;
			$x['description']= "Koleksi ".$kategori_nama." Museum mpu purwa malang.";
			$x['latest_post'] = $this->home_model->get_latest_post();
			$x['popular_post'] = $this->home_model->get_popular_post();
			$this->load->view('layout/front_n/v_collect_category',$x);
		}else{
			redirect('index.php/collect');
		}
	}


}