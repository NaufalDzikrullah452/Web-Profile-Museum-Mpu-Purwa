<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion_model extends CI_Model{
	
	function get_all_suggestion(){
		$query = $this->db->get('tbl_suggestion');
		return $query;
	}

	function get_suggestion_by_id($suggestion_id){
		$query = $this->db->get_where('tbl_suggestion', array('suggestion_id' => $suggestion_id));
		return $query;
	}

	function search_suggestion($keyword){
		$this->db->like('suggestion_name', $keyword);
		$this->db->or_like('suggestion_address', $keyword);
		$query = $this->db->get('tbl_suggestion');
		return $query;
	}

	function update_status_by_id($suggestion_id){
		$data = array(
		        'suggestion_status' => 1
		);
		$this->db->where('suggestion_id', $suggestion_id);
		$this->db->update('tbl_suggestion', $data);
	}

	function delete_suggestion($suggestion_id){
		$this->db->where('suggestion_id', $suggestion_id);
		$this->db->delete('tbl_suggestion');
	}
}