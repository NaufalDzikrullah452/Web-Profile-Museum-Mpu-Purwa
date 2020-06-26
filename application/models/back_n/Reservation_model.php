<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_model extends CI_Model{
	
	function get_all_reservation(){
		$query = $this->db->get('tbl_reservation');
		return $query;
	}

	function get_all_reservation_confirmed(){
		$result = $this->db->query("SELECT reserv_id,DATE_FORMAT(reserv_date,'%d %M %Y %H:%i') AS reserv_date,reserv_nama_sekolah,reserv_penanggung_jwb,reserv_file,reserv_telp,reserv_alamat,reserv_email,reserv_jml_peserta,reserv_catatan,reserv_status,reserv_status_message FROM tbl_reservation WHERE reserv_status_message='1' ORDER BY reserv_id");
		return $result;
	}

	function get_reservation_by_id($reserv_id){
		$query = $this->db->get_where('tbl_reservation', array('reserv_id' => $reserv_id));
		return $query;
	}

	function validation_reservation($reserv_id){
		$this->db->set('reserv_status_message', '1');
		$this->db->where('reserv_id', $reserv_id);
		$this->db->update('tbl_reservation');
	}

	function update_status_by_id($reserv_id){
		$data = array(
		        'reserv_status' => 1
		);
		$this->db->where('reserv_id', $reserv_id);
		$this->db->update('tbl_reservation', $data);
	}

	function update_reservation($reserv_id,$sekolah,$penanggung_jwb,$file,$telp,$alamat,$email,$jml_peserta,$catatan){
		$this->db->set('reserv_nama_sekolah',$sekolah);
		$this->db->set('reserv_penanggung_jwb',$penanggung_jwb);
		$this->db->set('reserv_file',$file);
		$this->db->set('reserv_telp',$telp);
		$this->db->set('reserv_alamat',$alamat);
		$this->db->set('reserv_email',$email);
		$this->db->set('reserv_jml_peserta',$jml_peserta);
		$this->db->set('reserv_catatan',$catatan);
		$this->db->where('reserv_id',$reserv_id);
		$this->db->update('tbl_reservation');
	}

	function update_reservation_nofile($reserv_id,$sekolah,$penanggung_jwb,$telp,$alamat,$email,$jml_peserta,$catatan){
		$this->db->set('reserv_nama_sekolah',$sekolah);
		$this->db->set('reserv_penanggung_jwb',$penanggung_jwb);
		$this->db->set('reserv_telp',$telp);
		$this->db->set('reserv_alamat',$alamat);
		$this->db->set('reserv_email',$email);
		$this->db->set('reserv_jml_peserta',$jml_peserta);
		$this->db->set('reserv_catatan',$catatan);
		$this->db->where('reserv_id',$reserv_id);
		$this->db->update('tbl_reservation');
	}

	function delete_reservation($reserv_id){
		$this->db->where('reserv_id', $reserv_id);
		$this->db->delete('tbl_reservation');
	}
}