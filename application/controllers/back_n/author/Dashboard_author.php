<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_author extends CI_Controller
{
    function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
        $this->load->model('back_n/Comment_model','comment_model');
        $this->load->model('back_n/Suggestion_model','suggestion_model');
        $this->load->model('back_n/Visitor_model','visitor_model');
		error_reporting(0);
		$this->load->helper('text');
	}

    public function index(){

        $visitor = $this->visitor_model->visitor_statistics();
		foreach($visitor as $result){
        $bulan[] = $result->tgl; 
        $value[] = (float) $result->jumlah;
        }
        $data['title']= "Dashboard";
        $this->load->helper('url');
        $data['month'] = json_encode($bulan);
        $data['value'] = json_encode($value);
        $data['all_visitors'] = $this->visitor_model->count_all_visitors();
		$data['all_collection'] = $this->visitor_model->count_all_collection(); 
		$data['all_suggestion'] = $this->visitor_model->count_all_suggestion();
		$data['all_comments'] = $this->visitor_model->count_all_comments();
		$data['top_five_articles'] = $this->visitor_model->top_five_articles();
		
		$monthly_visitors = $this->visitor_model->count_visitor_this_month();
		if($monthly_visitors->num_rows() > 0){
			$row = $monthly_visitors->row_array();
			$visitor_this_month = $row['tot_visitor'];
		}
		$chrome_visitors = $this->visitor_model->count_chrome_visitors();
		if($chrome_visitors->num_rows() > 0){
			$row = $chrome_visitors->row_array();
			$visitor_chrome = $row['chrome_visitor'];
			$data['chrome_visitor'] = ($visitor_chrome / $visitor_this_month) * 100;
		}else{
			$data['chrome_visitor'] = 0;
		}
		$firefox_visitors = $this->visitor_model->count_firefox_visitors();
		if($firefox_visitors->num_rows() > 0){
			$row = $firefox_visitors->row_array();
			$visitor_firefox = $row['firefox_visitor'];
			$data['firefox_visitor'] = ($visitor_firefox / $visitor_this_month) * 100;
		}else{
			$data['firefox_visitor'] = 0;
		}
		$explorer_visitors = $this->visitor_model->count_explorer_visitors();
		if($explorer_visitors->num_rows() > 0){
			$row = $explorer_visitors->row_array();
			$visitor_explorer = $row['explorer_visitor'];
			$data['explorer_visitor'] = ($visitor_explorer / $visitor_this_month) * 100;
		}else{
			$data['explorer_visitor'] = 0;
		}
		$safari_visitors = $this->visitor_model->count_safari_visitors();
		if($safari_visitors->num_rows() > 0){
			$row = $safari_visitors->row_array();
			$visitor_safari = $row['safari_visitor'];
			$data['safari_visitor'] = ($visitor_safari / $visitor_this_month) * 100;
		}else{
			$data['safari_visitor'] = 0;
		}
		$opera_visitors = $this->visitor_model->count_opera_visitors();
		if($opera_visitors->num_rows() > 0){
			$row = $opera_visitors->row_array();
			$visitor_opera = $row['opera_visitor'];
			$data['opera_visitor'] = ($visitor_opera / $visitor_this_month) * 100;
		}else{
			$data['opera_visitor'] = 0;
		}
		$robot_visitors = $this->visitor_model->count_robot_visitors();
		if($robot_visitors->num_rows() > 0){
			$row = $robot_visitors->row_array();
			$visitor_robot = $row['robot_visitor'];
			$data['robot_visitor'] = ($visitor_robot / $visitor_this_month) * 100;
		}else{
			$data['robot_visitor'] = 0;
		}
		$other_visitors = $this->visitor_model->count_other_visitors();
		if($other_visitors->num_rows() > 0){
			$row = $other_visitors->row_array();
			$visitor_other = $row['other_visitor'];
			$data['other_visitor'] = ($visitor_other / $visitor_this_month) * 100;
		}else{
			$data['other_visitor'] = 0;
		}
        $this->load->view("partials/back_n/author/header",$data);
        $this->load->view("partials/back_n/author/sidebar");
        $this->load->view('layout/back_n/author/v_dashboard_author');
        $this->load->view("partials/back_n/author/footer");
        $this->load->view('partials/back_n/js/js_dashboard');
        

        
    }
  

   

}