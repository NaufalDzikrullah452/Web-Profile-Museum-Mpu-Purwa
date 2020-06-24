<?php
class Category_model extends CI_Model{

	function get_all_category(){
		$result = $this->db->get('tbl_category');
		return $result; 
	}

	function add_new_row($category,$slug){
		$data = array(
	        'category_name' => $category,
	        'category_slug' => $slug
		);
		$this->db->insert('tbl_category', $data);
	}

	function edit_row($id,$category,$slug){
		$data = array(
	        'category_name' => $category,
	        'category_slug' => $slug
		);
		$this->db->where('category_id', $id);
		$this->db->update('tbl_category', $data);
	}

	function delete_row($id){
		$this->db->where('category_id', $id);
		$this->db->delete('tbl_category');
	}

	function get_blog_by_category($slug){
		$query = $this->db->query("SELECT tbl_post.*,tbl_category.* FROM
			tbl_post LEFT JOIN tbl_category ON post_category_id=category_id
			WHERE category_slug='$slug'");
		return $query;
	}

	function blog_category_perpage($category_id,$offset,$limit){
		$query = $this->db->query("SELECT tbl_post.*,tbl_category.*,user_name FROM
			tbl_post LEFT JOIN tbl_category ON post_category_id=category_id
			LEFT JOIN tbl_user ON post_user_id=user_id
			WHERE category_id='$category_id' LIMIT $offset,$limit");
		return $query;
	}

}