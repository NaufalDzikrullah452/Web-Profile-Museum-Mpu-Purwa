<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Suggestion_model','suggestion_model');
		error_reporting(0);
		$this->load->helper('text');
	}

	function index(){
		$count = $this->db->get_where('tbl_suggestion');
        $page = $this->uri->segment(4);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=10;
        $config['base_url'] = base_url().'index.php/back_n/suggestion/index/';
        $config['total_rows'] = $count->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;

        //Tambahan untuk styling
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
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

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
		$data['page'] = $this->pagination->create_links();
		$data['title'] = "Kotak Saran";
		$data['data'] = $this->suggestion_model->get_all_suggestion($offset,$limit);
		$this->load->view('partials/back_n/header',$data);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_suggestion');
		$this->load->view('partials/back_n/footer');
		$this->load->view('partials/back_n/js/js_suggestion');
	}

	function read(){
		$suggestion_id = htmlspecialchars($this->uri->segment(4),ENT_QUOTES);
		$result = $this->suggestion_model->get_suggestion_by_id($suggestion_id);
		if($result->num_rows() > 0){
			$row = $result->row_array();
			$x['name'] = $row['suggestion_name'];
			$x['age'] = $row['suggestion_age'];
			$x['address'] = $row['suggestion_address'];
			$x['origin'] = $row['suggestion_origin'];
			$x['message'] = $row['suggestion_message'];
			$x['date'] = $row['suggestion_date'];
			$x['title'] = "Kotak Saran";
			$this->suggestion_model->update_status_by_id($suggestion_id);
			$this->load->view('partials/back_n/header',$x);
			$this->load->view('partials/back_n/sidebar');
			$this->load->view('layout/back_n/v_suggestion_detail');
			$this->load->view('partials/back_n/footer');
		}else{
			redirect('index.php/back_n/suggestion');
		}
	}

	function result(){
		$keyword = htmlspecialchars($this->input->get('search_query',TRUE),ENT_QUOTES);
		$data = $this->suggestion_model->search_suggestion($keyword);
		if($data->num_rows() > 0){
			$x['data'] = $data;
			$x['title'] = "Kotak Saran";
			$this->load->view('partials/back_n/header',$x);
			$this->load->view('partials/back_n/sidebar');
			$this->load->view('layout/back_n/v_suggestion');
			$this->load->view('partials/back_n/footer');
			$this->load->view('partials/back_n/js/js_suggestion');
		}else{
			$this->session->set_flashdata('msg','info');
			redirect('index.php/back_n/suggestion');
		}
	}

	function delete(){
		$suggestion_id = $this->input->post('id',TRUE);
		$this->suggestion_model->delete_suggestion($suggestion_id);
		$this->session->set_flashdata('msg','success');
		redirect('index.php/back_n/suggestion');
	}
}