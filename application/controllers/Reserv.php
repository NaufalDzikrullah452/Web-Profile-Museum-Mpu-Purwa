<?php

class Reserv extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('back_n/Site_model','site_model');
        $this->load->model('front_n/Home_model','home_model');
        $this->load->model('front_n/Reserv_model','reserv_model');
        $this->load->model('back_n/Reservation_model','site_model');
        $this->load->library('upload');
		$this->load->helper('text');

    }

    public function index()
    {
        $this->load->helper('url');
        $site = $this->site_model->get_site_data()->row_array();
        $data['site_name'] = $site['site_name'];
		$data['site_title'] = $site['site_title'];
		$data['site_description'] = $site['site_description'];
		$data['site_maps'] = $site['site_maps'];
		$data['site_street_views'] = $site['site_street_views'];
        $data['site_shortcut_icon'] = $site['site_shortcut_icon'];
		$data['site_logo_header'] = $site['site_logo_header'];
		$data['site_logo_footer'] = $site['site_logo_footer'];
		$data['site_address'] = $site['site_address'];
		$data['site_telephone'] = $site['site_telephone'];
		$data['site_email'] = $site['site_email'];
		$data['site_facebook'] = $site['site_facebook'];
		$data['site_twitter'] = $site['site_twitter'];
		$data['site_instagram'] = $site['site_instagram'];
		$data['latest_post'] = $this->home_model->get_latest_post();
		$data['popular_post'] = $this->home_model->get_popular_post();
        $data['title']= "Reservasi";
        $this->load->view("partials/front_n/header",$data);
        $this->load->view("partials/front_n/navbar");
        $this->load->view("layout/front_n/v_reserv");
        $this->load->view("partials/front_n/footer");
       
    }

    function submit_reservation(){
        $reserv_id=$this->input->post('reserv_id',TRUE);
		$this->load->library('form_validation');

        $this->form_validation->set_rules('sekolah', 'Sekolah', 'required|min_length[3]|max_length[40]|htmlspecialchars');
        $this->form_validation->set_rules('penanggung_jwb', 'Age', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jml_peserta', 'Jml_peserta', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan');
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan inputan atau format file yang sesuai!</div>');
			redirect('index.php/reserv');
		}else{

			$sekolah=$this->input->post('sekolah',TRUE);
            $penanggung_jwb=$this->input->post('penanggung_jwb',TRUE);
            $telp=$this->input->post('telp',TRUE);
            $alamat=$this->input->post('alamat',TRUE);
            $email=$this->input->post('email',TRUE);
            $jml_peserta=$this->input->post('jml_peserta',TRUE);
			$catatan=strip_tags(htmlspecialchars($this->input->post('catatan',TRUE),ENT_QUOTES));

        $config['upload_path'] = 'upload/reservation'; //path folder
	    $config['allowed_types'] = 'pdf|doc|docx'; //type file
        $config['encrypt_name'] = TRUE; //enskripsi nama file
        $config['max_size'] = 10000; //Max size file

        $this->upload->initialize($config);

	        if ($this->upload->do_upload('dokumen')){

                    $berkas = $this->upload->data();
                    $surat_rekomendasi=$berkas['file_name'];	

                    $this->reserv_model->save_reservation($reserv_id,$sekolah,$penanggung_jwb,$surat_rekomendasi,$telp,$alamat,$email,$jml_peserta,$catatan);
                    $this->session->set_flashdata('msg','<div class="alert alert-info">Terima kasih atas kerjasama Anda, booking Anda akan kami proses, kami kabari via email</div>');
					redirect('index.php/reserv');
				}else{
		            echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Mohon masukkan format file yang sesuai!</div>');
		            redirect('index.php/reserv');
		    	}
		                 
		    }
	    }
          
	}