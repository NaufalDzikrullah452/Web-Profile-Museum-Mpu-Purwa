<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Collect extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('front_n/Collect_model','collect_model');
        $this->load->model('back_n/Collection_model','collection_model');
        $this->load->model('front_n/Home_model','home_model');
		$this->load->model('back_n/Site_model','site_model');
        $this->load->helper('text');
        error_reporting(0);
	}

    function index(){
		//konfigurasi pagination
        $config['base_url'] = site_url('index.php/collect/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_collection'); //total row
        $config['per_page'] = 12;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$config['use_page_numbers']=TRUE;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

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
 
        //panggil function get_collection_list yang ada pada model mahasiswa_model. 
        $x['data'] = $this->collect_model->get_collection_list($config["per_page"], $x['page']);           
		$x['pagination'] = $this->pagination->create_links();
        
		$site = $this->site_model->get_site_data()->row_array();
		$x['judul']="Koleksi Museum";
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
		$this->load->view('layout/front_n/v_collect',$x);
	}


	function detail($slug){
		$data=$this->collect_model->get_collection_by_slug($slug);
		if($data->num_rows() > 0){
		    $q=$data->row_array();
    		$kode=$q['collect_id'];
            $x['title']=$q['collect_nama'];
            $x['nomer']=$q['collect_nomer'];
            $x['asal']=$q['collect_asal'];
            $x['bahan']=$q['collect_bahan'];
            $x['image']=$q['collect_gambar'];
            $x['tinggi']=$q['collect_tinggi'];
            $x['tebal']=$q['collect_tebal'];
            $x['luas']=$q['collect_luas'];
            $x['lebar']=$q['collect_lebar'];
            $x['panjang']=$q['collect_panjang'];
    		$x['slug']=$q['collect_slug'];
            $x['keterangan']=$q['collect_keterangan'];
            $x['qrcode']=$q['collect_qrcode'];
    		$x['author']=$q['user_name'];
    		$x['category']=$q['collect_category_name'];
    		$x['category_slug']=$q['collect_category_slug'];
    		$x['date']=$q['collect_date'];
    		$x['collect_id']=$kode;
    		$collect_category_id = $q['collect_category_id'];
    		$x['latest_collection']  = $this->collect_model->get_latest_collection();
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
    		$this->load->view('layout/front_n/v_collect_detail',$x);
		}else{
		    redirect('index.php/collect');
		}
			
	}

	function translate($slug){
		$data=$this->collect_model->get_collection_by_slug($slug);
		if($data->num_rows() > 0){
		    $q=$data->row_array();
    		$kode=$q['collect_id'];
            $x['title']=$q['collect_nama'];
            $x['nomer']=$q['collect_nomer'];
            $x['asal']=$q['collect_asal'];
            $x['bahan']=$q['collect_bahan'];
            $x['image']=$q['collect_gambar'];
            $x['tinggi']=$q['collect_tinggi'];
            $x['tebal']=$q['collect_tebal'];
            $x['luas']=$q['collect_luas'];
            $x['lebar']=$q['collect_lebar'];
            $x['panjang']=$q['collect_panjang'];
    		$x['slug']=$q['collect_slug'];
            $x['keterangan']=$q['collect_keterangan'];
            $x['qrcode']=$q['collect_qrcode'];
    		$x['author']=$q['user_name'];
    		$x['category']=$q['collect_category_name'];
    		$x['category_slug']=$q['collect_category_slug'];
    		$x['date']=$q['collect_date'];
    		$x['collect_id']=$kode;
    		$collect_category_id = $q['collect_category_id'];
    		$x['latest_collection']  = $this->collect_model->get_latest_collection();
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
    		$this->load->view('layout/front_n/v_collect_translate',$x);
		}else{
		    redirect('index.php/collect');
		}
			
	}

}