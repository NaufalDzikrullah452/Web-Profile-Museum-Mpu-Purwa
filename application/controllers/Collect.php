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
		$jum=$this->collect_model->get_collection();
	    $page=$this->uri->segment(3);
	    if(!$page):
	        $offset = 0;
	    else:
	        $offset = $page;
	    endif;
	    $limit=12;
	    $config['base_url'] = base_url() . 'collect/page/';
	    $config['total_rows'] = $jum->num_rows();
	    $config['per_page'] = $limit;
	    $config['uri_segment'] = 3;
	    $config['use_page_numbers']=TRUE;

	    //Tambahan untuk styling
        $config['full_tag_open']    = '<div class="row"><div class="col-12"><nav aria-label="Page navigation"><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

	    $config['first_link'] = '<';
	    $config['last_link'] = '>';
	    $config['next_link'] = '>>';
	    $config['prev_link'] = '<<';
	    $this->pagination->initialize($config);
	    $x['page'] =$this->pagination->create_links();
		$x['data']=$this->collect_model->get_collection_perpage($offset,$limit);
		$x['judul']="Koleksi Museum";
		if(empty($this->uri->segment(3))){
			$next_page=2;
			$x['canonical']=site_url('collect');
			$x['url_prev']="";
		}elseif($this->uri->segment(3)=='1'){
			$next_page=2;
			$x['canonical']=site_url('collect');
			$x['url_prev']=site_url('collect');
		}elseif($this->uri->segment(3)=='2'){
			$next_page=$this->uri->segment(3)+1;
			$x['canonical']=site_url('collect/page/'.$this->uri->segment(3));
			$x['url_prev']=site_url('collect');
		}else{
			$next_page=$this->uri->segment(3)+1;
			$prev_page=$this->uri->segment(3)-1;
			$x['canonical']=site_url('collect/page/'.$this->uri->segment(3));
			$x['url_prev']=site_url('collect/page/'.$prev_page);
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
		$x['url_next']=site_url('collect/page/'.$next_page);
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

}