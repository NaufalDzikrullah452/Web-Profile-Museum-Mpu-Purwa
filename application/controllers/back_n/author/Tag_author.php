<?php
class Tag_author extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Tag_model','tag_model');
		$this->load->model('back_n/Comment_model','comment_model');
		error_reporting(0);
		$this->load->helper('text');
	}

	function index(){
		$x['title']= "Tag Post";
		$x['data'] = $this->tag_model->get_all_tag();
		$this->load->view('partials/back_n/author/header',$x);
		$this->load->view('partials/back_n/author/sidebar');
		$this->load->view('layout/back_n/author/v_tag_author');
		$this->load->view('partials/back_n/author/footer');
		$this->load->view('partials/back_n/js/js_tag');
		$this->load->helper('text');
	}

	function save(){
		$tag = strip_tags(htmlspecialchars($this->input->post('tag',TRUE),ENT_QUOTES));
		$this->tag_model->add_new_row($tag);
		$this->session->set_flashdata('msg','success');
		redirect('index.php/back_n/author/tag_author');
	}

	function edit(){
		$id		 = $this->input->post('kode',TRUE);
		$tag 	 = strip_tags(htmlspecialchars($this->input->post('tag2',TRUE),ENT_QUOTES));
		$this->tag_model->edit_row($id,$tag);
		$this->session->set_flashdata('msg','info');
		redirect('index.php/back_n/author/tag_author');
	}

	function delete(){
		$id = $this->input->post('id',TRUE);
		$this->tag_model->delete_row($id);
		$this->session->set_flashdata('msg','success-delete');
		redirect('index.php/back_n/author/tag_author');
	}
}