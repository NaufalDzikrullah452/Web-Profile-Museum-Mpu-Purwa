<?php
class Reservation extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Reservation_model','reservation_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$x['title']= "List Booking Pengunjung";
		$x['data'] = $this->reservation_model->get_all_reservation();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_reservation');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_reservation');
	}


	function detail(){
		$reserv_id = htmlspecialchars($this->uri->segment(4),ENT_QUOTES);
		$result = $this->reservation_model->get_reservation_by_id($reserv_id);
		if($result->num_rows() > 0){
			$row = $result->row_array();
			$x['tgl'] = $row['reserv_date'];
			$x['sekolah'] = $row['reserv_nama_sekolah'];
			$x['penanggung_jwb'] = $row['reserv_penanggung_jwb'];
			$x['alamat'] = $row['reserv_alamat'];
			$x['surat_rekomendasi'] = $row['reserv_file'];
			$x['telp'] = $row['reserv_telp'];
			$x['email'] = $row['reserv_email'];
			$x['jml_peserta'] = $row['reserv_jml_peserta'];
			$x['catatan'] = $row['reserv_catatan'];
			$x['status_message'] = $row['reserv_status_message'];
			$x['title'] = "Detail Reservasi";
			$this->reservation_model->update_status_by_id($reserv_id);
			$this->load->view('partials/back_n/header',$x);
			$this->load->view('partials/back_n/sidebar');
			$this->load->view('layout/back_n/v_reservation_detail');
			$this->load->view('partials/back_n/footer');
		}else{
			redirect('index.php/back_n/reservation');
		}
	}

	function download($id)
	{
		$data = $this->db->get_where('tbl_reservation',['reserv_id'=>$id])->row();
		force_download('upload/reservation/'.$data->reserv_file,NULL);
		echo $this->session->set_flashdata('msg','success-download');
	}

	function delete(){
		$reserv_id = $this->input->post('id',TRUE);
		$this->reservation_model->delete_post($reserv_id);
		echo $this->session->set_flashdata('msg','success-delete');
		redirect('index.php/back_n/reservation');
	}


}
