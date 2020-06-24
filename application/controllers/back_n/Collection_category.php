<?php
class Collection_category extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Collection_category_model','collection_category_model');
		$this->load->helper('text');
	}

	function index(){
		$x['title']= "Kategori Koleksi";
		$x['data'] = $this->collection_category_model->get_all_category();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_collection_category');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_collect_category');
        $this->load->helper('text');
	}

	function save(){
		$category = strip_tags(htmlspecialchars($this->input->post('category',TRUE),ENT_QUOTES));
		$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $category);
		$trim     = trim($string);
		$slug     = strtolower(str_replace(" ", "-", $trim));
		$this->collection_category_model->add_new_row($category,$slug);
		$this->session->set_flashdata('msg','success');
		redirect('index.php/back_n/collection_category');
	}

	function edit(){
		$id		  = $this->input->post('kode',TRUE);
		$category = strip_tags(htmlspecialchars($this->input->post('category2',TRUE),ENT_QUOTES));
		$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $category);
		$trim     = trim($string);
		$slug     = strtolower(str_replace(" ", "-", $trim));
		$this->collection_category_model->edit_row($id,$category,$slug);
		$this->session->set_flashdata('msg','info');
		redirect('index.php/back_n/collection_category');
	}

	function delete(){
		$id = $this->input->post('id',TRUE);
		$this->collection_category_model->delete_row($id);
		$this->session->set_flashdata('msg','success-delete');
		redirect('index.php/back_n/collection_category');
	}
}