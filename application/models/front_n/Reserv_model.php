<?php

class Reserv_model extends CI_Model{
	
	

    function save_reservation($reserv_id,$sekolah,$penanggung_jwb,$surat_rekomendasi,$telp,$alamat,$email,$jml_peserta,$catatan){
    	$data = array(
            'reserv_id' => $reserv_id,
            'reserv_nama_sekolah' => $sekolah,
            'reserv_penanggung_jwb' => $penanggung_jwb,
            'reserv_file' => $surat_rekomendasi,
            'reserv_telp' => $telp,
            'reserv_alamat' => $alamat,
            'reserv_email' => $email,
            'reserv_jml_peserta' => $jml_peserta,
            'reserv_catatan' => $catatan, 
            'reserv_status' => 0,
    		'reserv_status_message' => 0
    	);
    	$this->db->insert('tbl_reservation', $data);
    }

}