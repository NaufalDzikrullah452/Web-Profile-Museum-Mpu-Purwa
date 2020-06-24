<?php
class Collection_model extends CI_Model{

	//BACKEND
	function get_all_collect(){
		$result = $this->db->query("SELECT collect_id,collect_nama,collect_gambar,collect_asal,collect_slug,collect_bahan,collect_tinggi,collect_tebal,collect_luas,collect_lebar,collect_panjang,collect_keterangan,collect_qrcode,DATE_FORMAT(collect_date,'%d %M %Y') AS collect_date,collect_category_name FROM tbl_collection JOIN tbl_collect_category ON collect_kategori_id=collect_category_id");
		return $result;
	}

	function get_collect_by_id($collect_id){
		$result = $this->db->query("SELECT * FROM tbl_collection WHERE collect_id='$collect_id'");
		return $result;
	}

	function save_collect($nomer,$nama,$gambar,$kategori_id,$asal,$slug,$bahan,$tinggi,$tebal,$luas,$lebar,$panjang,$keterangan,$qrcode){
		$data = array(
			'collect_nomer'    			=> $nomer,
	        'collect_nama' 	   			=> $nama,
	        'collect_gambar' 			=> $gambar,
	        'collect_kategori_id'    	=> $kategori_id,
			'collect_asal' 	   			=> $asal,
			'collect_slug' 	   			=> $slug,
	        'collect_bahan' 			=> $bahan,
			'collect_tinggi' 	   		=> $tinggi,
			'collect_tebal' 	   		=> $tebal,
			'collect_luas' 	   			=> $luas,
			'collect_lebar' 	   		=> $lebar,
			'collect_panjang' 	   	   	=> $panjang,
			'collect_keterangan' 	   	=> $keterangan,
			'collect_qrcode'			=> $qrcode,
			'collect_user_id'			=> $this->session->userdata('id')
		);
		$this->db->insert('tbl_collection', $data);
	}

	function edit_collect_with_img($id,$nomer,$nama,$gambar,$kategori_id,$asal,$slug,$bahan,$tinggi,$tebal,$luas,$lebar,$panjang,$keterangan,$qrcode){
		$result = $this->db->query("UPDATE tbl_collection SET collect_nomer='$nomer',collect_nama='$nama',collect_gambar='$gambar',collect_qrcode='$qrcode',collect_kategori_id='$kategori_id',collect_asal='$asal',collect_slug='$slug',collect_bahan='$bahan',collect_tinggi='$tinggi',collect_tebal='$tebal',collect_luas='$luas',collect_lebar='$lebar',collect_keterangan='$keterangan' WHERE collect_id='$id'");
		return $result;
	}

	function edit_collect_no_img($id,$nomer,$nama,$kategori_id,$asal,$slug,$bahan,$tinggi,$tebal,$luas,$lebar,$panjang,$keterangan,$qrcode){
		$result = $this->db->query("UPDATE tbl_collection SET collect_nomer='$nomer',collect_nama='$nama',collect_qrcode='$qrcode',collect_kategori_id='$kategori_id',collect_asal='$asal',collect_slug='$slug',collect_bahan='$bahan',collect_tinggi='$tinggi',collect_tebal='$tebal',collect_luas='$luas',collect_lebar='$lebar',collect_keterangan='$keterangan' WHERE collect_id='$id'");
		return $result;
	}

	function delete_collect($collect_id){
		$this->db->where('collect_id', $collect_id);
		$this->db->delete('tbl_collection');
	}
	
	//END BACKEND

}