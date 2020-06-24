<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{
	


	function get_latest_post(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_id', 'DESC');
		$this->db->limit(3);
		$query = $this->db->get();
		return $query;
	}

	function get_popular_post(){
		$this->db->select('tbl_post.*, user_name');
		$this->db->from('tbl_post');
		$this->db->join('tbl_user', 'post_user_id=user_id','left');
		$this->db->order_by('post_views', 'DESC');
		$this->db->limit(2);
		$query = $this->db->get();
		return $query;
	}
	

}