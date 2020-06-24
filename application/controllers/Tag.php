<?php
class Tag extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('back_n/Tag_model','tag_model');
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

	function detail($tag){
		$data=$this->tag_model->get_blog_by_tags($tag);
		if($data->num_rows() > 0){
			$jum=$data;
	        $page=$this->uri->segment(4);
	        if(!$page):
	            $offset = 0;
	        else:
	            $offset = $page;
	        endif;
	        $limit=10;
	        $config['base_url'] = base_url() . 'tag/'.$tag.'/';
	        $config['total_rows'] = $jum->num_rows();
	        $config['per_page'] = $limit;
	        $config['uri_segment'] = 4;
	        $config['use_page_numbers']=TRUE;
	        
		    //Tambahan untuk styling
	        $config['full_tag_open'] = "<ul class='pagination'>";
	        $config['full_tag_close'] ="</ul>";
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';
	        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
	        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
	        $config['next_tag_open'] = "<li>";
	        $config['next_tagl_close'] = "</li>";
	        $config['prev_tag_open'] = "<li>";
	        $config['prev_tagl_close'] = "</li>";
	        $config['first_tag_open'] = "<li>";
	        $config['first_tagl_close'] = "</li>";
	        $config['last_tag_open'] = "<li>";
	        $config['last_tagl_close'] = "</li>";

		    $config['first_link'] = '<';
		    $config['last_link'] = '>';
		    $config['next_link'] = '>>';
		    $config['prev_link'] = '<<';
	        $this->pagination->initialize($config);
	        $x['page'] =$this->pagination->create_links();
			$x['data']=$this->tag_model->blog_tags_perpage($tag,$offset,$limit);

			$x['judul']= $tag;
			$x['description']= "Kumpulan artikel ".$tag." sangat bermanfaat untuk menambah wawasan Anda.";
			if(empty($this->uri->segment(4))){
				$next_page=2;
				$x['canonical']=site_url('tag/'.$tag);
				$x['url_prev']="";
			}elseif($this->uri->segment(4)=='1'){
				$next_page=2;
				$x['canonical']=site_url('tag/'.$tag);
				$x['url_prev']=site_url('tag/'.$tag);
			}elseif($this->uri->segment(4)=='2'){
				$next_page=$this->uri->segment(4)+1;
				$x['canonical']=site_url('tag/'.$tag.'/'.$this->uri->segment(4));
				$x['url_prev']=site_url('tag/'.$tag);
			}else{
				$next_page=$this->uri->segment(4)+1;
				$prev_page=$this->uri->segment(4)-1;
				$x['canonical']=site_url('tag/'.$tag.'/'.$this->uri->segment(4));
				$x['url_prev']=site_url('tag/'.$tag.'/'.$prev_page);
			}
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
			$x['url_next']=site_url('tag/'.$tag.'/'.$next_page);
			$x['populer_post'] = $this->blog_model->get_popular_post();
			$this->load->view('layout/front_n/v_blog_tag',$x);
		}else{
			redirect('index.php/blog');
		}
	}


}