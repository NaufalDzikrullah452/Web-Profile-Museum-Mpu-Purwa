<?php
class Users_model extends CI_Model{
	
	function get_users(){
		$hsl=$this->db->query("SELECT * FROM tbl_user");
		return $hsl;
	}

	function insert_user($nama,$email,$pass,$level,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_user(user_name,user_email,user_password,user_level,user_photo) VALUES ('$nama','$email',MD5('$pass'),'$level','$gambar')");
		return $hsl;
	}

	function insert_user_noimg($nama,$email,$pass,$level){
		$hsl=$this->db->query("INSERT INTO tbl_user(user_name,user_email,user_password,user_level) VALUES ('$nama','$email',MD5('$pass'),'$level')");
		return $hsl;
	}

	function update_user_nopass($userid,$nama,$email,$level,$gambar){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_level='$level',user_photo='$gambar' WHERE user_id='$userid'");
		return $hsl;
	}

	function update_user_nopassimg($userid,$nama,$email,$level){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_level='$level' WHERE user_id='$userid'");
		return $hsl;
	}

	function update_user($userid,$nama,$email,$pass,$level,$gambar){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_password=MD5('$pass'),user_level='$level',user_photo='$gambar' WHERE user_id='$userid'");
		return $hsl;
	}

	function update_user_noimg($userid,$nama,$email,$pass,$level){
		$hsl=$this->db->query("UPDATE tbl_user SET user_name='$nama',user_email='$email',user_password=MD5('$pass'),user_level='$level' WHERE user_id='$userid'");
		return $hsl;
	}


	function delete_user($userid){
		$hsl=$this->db->query("DELETE FROM tbl_user WHERE user_id='$userid'");
		return $hsl;
	}
}