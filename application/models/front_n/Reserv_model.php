<?php

class Reserv_model extends CI_Model{
	
	

    function save_reservation($reserv_id,$penanggung_jwb,$surat_rekomendasi,$alamat,$telp,$email,$jml_peserta,$catatan){
    	$data = array(
            'reserv_id' => $reserv_id,
            'reserv_nama_sekolah' => $sekolah,
            'reserv_penanggung_jwb' => $penanggung_jwb,
            'reserv_file' => $surat_rekomendasi,
            'reserv_alamat' => $alamat,
            'reserv_telp' => $telp,
            'reserv_email' => $email,
            'reserv_jml_peserta' => $jml_peserta,
            'reserv_catatan' => $catatan, 
    		
    	);
    	$this->db->insert('tbl_reservation', $data);
    }

}