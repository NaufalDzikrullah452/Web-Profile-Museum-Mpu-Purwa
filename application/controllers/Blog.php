<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('front_n/Blog_model','blog_model');
		$this->load->model('front_n/Visitor_model','visitor_model');
		$this->load->model('front_n/Home_model','home_model');
		$this->load->model('back_n/Site_model','site_model');
        $this->visitor_model->count_visitor();
        $this->load->helper('text');
        error_reporting(0);
	}

    function index(){
		//konfigurasi pagination
        $config['base_url'] = site_url('index.php/blog/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_post'); //total row
        $config['per_page'] = 8;  //show record per halaman
		$config["uri_segment"] = 3;  // uri parameter
		$config['use_page_numbers']=TRUE;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

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
	    $x['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_collection_list yang ada pada model mahasiswa_model. 
        $x['data'] = $this->blog_model->get_blog_perpage($config["per_page"], $x['page']);           
		$x['pagination'] = $this->pagination->create_links();

		$site = $this->site_model->get_site_data()->row_array();
        $x['site_name'] = $site['site_name'];
		$x['site_title'] = $site['site_title'];
		$x['site_description'] = $site['site_description'];
		$x['site_maps'] = $site['site_maps'];
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
		$x['judul']="Blog";
		$x['latest_post'] = $this->home_model->get_latest_post();
		$x['popular_post'] = $this->home_model->get_popular_post();
		$x['populer_post'] = $this->blog_model->get_popular_post();
		$query = $this->db->query("SELECT GROUP_CONCAT(category_name) AS category_name FROM tbl_category")->row_array();
		$x['meta_description'] = $query['category_name'];
		$this->load->view('layout/front_n/v_blog',$x);
	}


	function detail($slug){
		$data=$this->blog_model->get_post_by_slug($slug);
		if($data->num_rows() > 0){
		    $q=$data->row_array();
    		$kode=$q['post_id'];
    		$x['title']=$q['post_title'];
    		if(empty($q['post_description'])){
    			$x['description'] = strip_tags(word_limiter($q['post_contents'],24));	
    		}else{
    			$x['description'] = $q['post_description'];
    		}
    		$x['image']=$q['post_image'];
    		$x['slug']=$q['post_slug'];
    		$x['content']=$q['post_contents'];
    		$x['views']=$q['post_views'];
    		$x['comment']=$q['comment_total'];
    		$x['author']=$q['user_name'];
    		$x['category']=$q['category_name'];
    		$x['category_slug']=$q['category_slug'];
    		$x['date']=$q['post_date'];
    		$x['tags']=$q['post_tags'];
    		$x['post_id']=$kode;
    		$category_id = $q['category_id'];
    		$this->blog_model->count_views($kode);
    		$x['related_post']  = $this->blog_model->get_related_post($category_id,$kode);
			$x['show_comments'] = $this->blog_model->show_comments($kode);
			$site = $this->site_model->get_site_data()->row_array();
			$x['site_name'] = $site['site_name'];
			$x['site_title'] = $site['site_title'];
			$x['site_description'] = $site['site_description'];
			$x['site_maps'] = $site['site_maps'];
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
			$x['latest_post'] = $this->home_model->get_latest_post();
			$x['popular_post'] = $this->home_model->get_popular_post();
    		$this->load->view('layout/front_n/v_blog_detail',$x);
		}else{
		    redirect('index.php/blog');
		}
			
	}


	function submit_komentar(){
    	$post_id = htmlspecialchars($this->input->post('post_id',TRUE),ENT_QUOTES);
    	$slug = htmlspecialchars($this->input->post('slug',TRUE),ENT_QUOTES);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[40]|htmlspecialchars');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('comment', 'Comment', 'required');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan input yang Valid!</div>');
			redirect('index.php/blog/'.$slug);
		}else{
			$name=$this->input->post('name',TRUE);
			$email=$this->input->post('email',TRUE);
			$comment=strip_tags(htmlspecialchars($this->input->post('comment',TRUE),ENT_QUOTES));
			$this->blog_model->save_comment($post_id,$name,$email,$comment);
			$this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih atas respon Anda, komentar Anda akan tampil setelah moderasi</div>');
			redirect('index.php/blog/'.$slug);
		}
	}

	

}