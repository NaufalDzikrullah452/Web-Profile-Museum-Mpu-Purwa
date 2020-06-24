<?php
class Visitors_museum extends CI_Controller{
    function __construct(){
        parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
        $this->load->model('back_n/Visitors_museum_model','visitors_museum_model');
        $this->load->helper('text');
    }

    function index(){
        $x['title']= "Data Pengunjung";
        $x['bulan'] = $this->visitors_museum_model->get_month()->result();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_visitors_museum');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_visitors_museum');
	}
 
    function data_visitor(){
        $data=$this->visitors_museum_model->visitor_list();
        echo json_encode($data);
    }
 
    function get_visitor(){
        $visit_id=$this->input->get('id');
        $data=$this->visitors_museum_model->get_visitor_by_id($visit_id);
        echo json_encode($data);
    }
 
    function save_visitor(){
        $visit_id=$this->input->post('visit_id');
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $dinas=$this->input->post('dinas');
        $umum=$this->input->post('umum');
        $pelajar=$this->input->post('pelajar');
        $asing=$this->input->post('asing');
        $keterangan=$this->input->post('keterangan');
        $data=$this->visitors_museum_model->save_visitor($visit_id,$bulan,$tahun,$dinas,$umum,$pelajar,$asing,$keterangan);
        echo json_encode($data);
    }
 
    function update_visitor(){
        $visit_id=$this->input->post('visit_id');
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $dinas=$this->input->post('dinas');
        $umum=$this->input->post('umum');
        $pelajar=$this->input->post('pelajar');
        $asing=$this->input->post('asing');
        $keterangan=$this->input->post('keterangan');
        $data=$this->visitors_museum_model->update_visitor($visit_id,$bulan,$tahun,$dinas,$umum,$pelajar,$asing,$keterangan);
        echo json_encode($data);
    }
 
    function delete_visitor(){
        $visit_id=$this->input->post('id');
        $data=$this->visitors_museum_model->delete_visitor($visit_id);
        echo json_encode($data);
    }
 
}