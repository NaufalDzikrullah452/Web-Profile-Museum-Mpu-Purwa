<?php
class Tag_model extends CI_Model{

	function get_all_tag(){
		$result = $this->db->get('tbl_tags');
		return $result; 
	}

	function add_new_row($tag){
		$data = array(
	        'tag_name' => $tag
		);
		$this->db->insert('tbl_tags', $data);
	}

	function edit_row($id,$tag){
		$data = array(
	        'tag_name' => $tag
		);
		$this->db->where('tag_id', $id);
		$this->db->update('tbl_tags', $data);
	}

	function delete_row($id){
		$this->db->where('tag_id', $id);
		$this->db->delete('tbl_tags');
	}

	function get_blog_by_tags($tag){
		$query = $this->db->query("SELECT tbl_post.*,user_name FROM tbl_post
			LEFT JOIN tbl_user ON post_user_id=user_id
			WHERE post_tags LIKE '%$tag%'");
		return $query;
	}

	function blog_tags_perpage($tag,$offset,$limit){
		$query = $this->db->query("SELECT tbl_post.*,user_name FROM tbl_post
			LEFT JOIN tbl_user ON post_user_id=user_id
			WHERE post_tags LIKE '%$tag%' LIMIT $offset,$limit");
		return $query;
	}
}