<?php
class Collection extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('index.php/Login');
            redirect($url);
        };
		$this->load->model('back_n/Collection_category_model','collection_category_model');
		$this->load->model('back_n/Collection_model','collection_model');
		$this->load->library('upload');
		$this->load->helper('text');
	}

	function index(){
		$x['title']= "Daftar Koleksi";
		$x['data'] = $this->collection_model->get_all_collect();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_collection');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_collection');
	}

	function add_new(){
		$x['title']= "Tambah koleksi baru";
		$x['category'] = $this->collection_category_model->get_all_category();
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_add_collection');
		$this->load->view('partials/back_n/footer');
		$this->load->view('partials/back_n/js/js_add_collection');
	}

	function get_edit(){
		$collect_id = $this->uri->segment(4);
		$x['title']= "Edit Data Koleksi";
		$x['category'] = $this->collection_category_model->get_all_category();
		$x['data'] = $this->collection_model->get_collect_by_id($collect_id);
		$this->load->view('partials/back_n/header',$x);
		$this->load->view('partials/back_n/sidebar');
		$this->load->view('layout/back_n/v_edit_collection');
		$this->load->view('partials/back_n/footer');
        $this->load->view('partials/back_n/js/js_edit_collection');
	}

	function save(){
		$config['upload_path'] = 'upload/collection/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['encrypt_name'] = TRUE;

	    $this->upload->initialize($config);

	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $img = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='upload/collection/'.$img['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '90%';
	            $config['width']= 500;
	            $config['height']= 320;
	            $config['new_image']= 'upload/collection/'.$img['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $this->_create_thumbs($img['file_name']);

				$gambar			= $img['file_name'];
				$nomer    		= $this->input->post('nomer');
				$nama	  		= strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
				$kategori_id 	= $this->input->post('kategori_id',TRUE);
				$asal 			= $this->input->post('asal');
				$bahan 			= $this->input->post('bahan');
				$tinggi			= $this->input->post('tinggi');
				$tebal			= $this->input->post('tebal');
				$luas			= $this->input->post('luas');
				$lebar			= $this->input->post('lebar');
				$panjang		= $this->input->post('panjang');

				$preslug  = strip_tags(htmlspecialchars($this->input->post('slug',TRUE),ENT_QUOTES));
				$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
				$trim     = trim($string);
				$praslug  = strtolower(str_replace(" ", "-", $trim));

				$query = $this->db->get_where('tbl_collection', array('collect_slug' => $praslug));
				if($query->num_rows() > 0){
					$uniqe_string = rand();
					$slug = $praslug.'-'.$uniqe_string;
				}else{
					$slug = $praslug;
				}

				$keterangan 	= $this->input->post('keterangan');

				$this->load->library('ciqrcode'); //pemanggilan library QR CODE

				$config['cacheable']    = true; //boolean, the default is true
				$config['cachedir']		= './assets/'; //string, the default is application/cache/
				$config['errorlog']		= './assets/'; //string, the default is application/logs/
				$config['imagedir']		= './upload/collection/qrcode/'; //direktori penyimpanan qr code
				$config['quality']      = true; //boolean, the default is true
				$config['size']         = '9999999999'; //interger, the default is 9999999999
				$config['black']        = array(224,255,255); // array, default is array(255,255,255)
				$config['white']        = array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);
		
				$qrcode=$nama.'.png'; //buat name dari qr code sesuai dengan nim
		
				$params['data'] = 'museummpupurwamalang.com/index.php/collect/translate/'.$preslug.''; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

				$this->collection_model->save_collect($nomer,$nama,$gambar,$kategori_id,$asal,$slug,$bahan,$tinggi,$tebal,$luas,$lebar,$panjang,$keterangan,$qrcode);
				echo $this->session->set_flashdata('msg','success');
				redirect('index.php/back_n/collection');
			}else{
	            echo $this->session->set_flashdata('msg','warning');
	            redirect('index.php/back_n/collection');
	        }

	    }else{
			redirect('index.php/back_n/collection');
		}
	}

	function edit(){
		$config['upload_path'] = 'upload/collection/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
	    $config['encrypt_name'] = TRUE;

	    $this->upload->initialize($config);

	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $img = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='upload/collection/'.$img['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '90%';
	            $config['width']= 500;
	            $config['height']= 320;
	            $config['new_image']= 'upload/collection/'.$img['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $this->_create_thumbs($img['file_name']);

	            $gambar			= $img['file_name'];
	            $id 	  		= $this->input->post('collect_id',TRUE);
				$nomer    		= $this->input->post('nomer');
				$nama	  		= strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
				$kategori_id 	= $this->input->post('kategori_id',TRUE);
				$asal 			= $this->input->post('asal');
				$bahan 			= $this->input->post('bahan');
				$tinggi			= $this->input->post('tinggi');
				$tebal			= $this->input->post('tebal');
				$luas			= $this->input->post('luas');
				$lebar			= $this->input->post('lebar');
				$panjang		= $this->input->post('panjang');

				$preslug  = strip_tags(htmlspecialchars($this->input->post('slug',TRUE),ENT_QUOTES));
				$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
				$trim     = trim($string);
				$praslug  = strtolower(str_replace(" ", "-", $trim));

				$query = $this->db->get_where('tbl_collection', array('collect_slug' => $praslug));
				if($query->num_rows() > 1){
					$uniqe_string = rand();
					$slug = $praslug.'-'.$uniqe_string;
				}else{
					$slug = $praslug;
				}

				$keterangan 	= $this->input->post('keterangan');

				$this->load->library('ciqrcode'); //pemanggilan library QR CODE

				$config['cacheable']    = true; //boolean, the default is true
				$config['cachedir']     = '/upload/collection/qrcode/'; //string, the default is application/cache/
				$config['errorlog']     = '/upload/collection/qrcode/'; //string, the default is application/logs/
				$config['imagedir']     = '/upload/collection/qrcode/'; //direktori penyimpanan qr code
				$config['quality']      = true; //boolean, the default is true
				$config['size']         = '9999999999'; //interger, the default is 9999999999
				$config['black']        = array(224,255,255); // array, default is array(255,255,255)
				$config['white']        = array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);
		
				$qrcode=$nama.'.png'; //buat name dari qr code sesuai dengan nama
		
				$params['data'] = 'museummpupurwamalang.com/index.php/collect/translate/'.$preslug.''; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 50;
				$params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

				$this->collection_model->edit_collect_with_img($id,$nomer,$nama,$gambar,$kategori_id,$asal,$slug,$bahan,$tinggi,$tebal,$luas,$lebar,$panjang,$keterangan,$qrcode);
				echo $this->session->set_flashdata('msg','info');
				redirect('index.php/back_n/collection');
			}else{
	            echo $this->session->set_flashdata('msg','warning');
	            redirect('index.php/back_n/collection');
	        }

	    }else{

	    	$id 	  		= $this->input->post('collect_id',TRUE);
			$nomer    		= $this->input->post('nomer');
			$nama	  		= strip_tags(htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES));
			$kategori_id 	= $this->input->post('kategori_id',TRUE);
			$asal 			= $this->input->post('asal');
			$bahan 			= $this->input->post('bahan');
			$tinggi			= $this->input->post('tinggi');
			$tebal			= $this->input->post('tebal');
			$luas			= $this->input->post('luas');
			$lebar			= $this->input->post('lebar');
			$panjang		= $this->input->post('panjang');

			$preslug  = strip_tags(htmlspecialchars($this->input->post('slug',TRUE),ENT_QUOTES));
			$string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $preslug);
			$trim     = trim($string);
			$praslug  = strtolower(str_replace(" ", "-", $trim));

			$query = $this->db->get_where('tbl_collection', array('collect_slug' => $praslug));
			if($query->num_rows() > 1){
				$uniqe_string = rand();
				$slug = $praslug.'-'.$uniqe_string;
			}else{
				$slug = $praslug;
			}

			$keterangan 	= $this->input->post('keterangan');

			$this->load->library('ciqrcode'); //pemanggilan library QR CODE

				$config['cacheable']    = true; //boolean, the default is true
				$config['cachedir']     = '/upload/collection/qrcode/'; //string, the default is application/cache/
				$config['errorlog']     = '/upload/collection/qrcode/'; //string, the default is application/logs/
				$config['imagedir']     = '/upload/collection/qrcode/'; //direktori penyimpanan qr code
				$config['quality']      = true; //boolean, the default is true
				$config['size']         = '9999999999'; //interger, the default is 9999999999
				$config['black']        = array(224,255,255); // array, default is array(255,255,255)
				$config['white']        = array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);
		
				$qrcode=$nama.'.png'; //buat name dari qr code sesuai dengan nim
		
				$params['data'] = 'museummpupurwamalang.com/index.php/collect/translate/'.$preslug.''; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$qrcode; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			$this->collection_model->edit_collect_no_img($id,$nomer,$nama,$kategori_id,$asal,$slug,$bahan,$tinggi,$tebal,$luas,$lebar,$panjang,$keterangan,$qrcode);
			echo $this->session->set_flashdata('msg','info');
			redirect('index.php/back_n/collection');
		}

	}

	function delete(){
		$collect_id = $this->input->post('id',TRUE);
		$this->collection_model->delete_collect($collect_id);
		echo $this->session->set_flashdata('msg','success-delete');
		redirect('index.php/back_n/collection');
	}


	function _create_thumbs($file_name){
        // Image resizing config
        $config = array(
            array(
                'image_library' => 'GD2',
                'source_image'  => 'upload/collection/'.$file_name,
                'maintain_ratio'=> FALSE,
                'width'         => 800,
                'height'        => 1200,
                'new_image'     => 'upload/collection/'.$file_name
                ));

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item){
            $this->image_lib->initialize($item);
            if(!$this->image_lib->resize()){
                return false;
            }
            $this->image_lib->clear();
        }
    }


}
