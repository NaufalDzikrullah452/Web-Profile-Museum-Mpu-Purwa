<?php
class Collection_category_model extends CI_Model{

	function get_all_category(){
		$result = $this->db->get('tbl_collect_category');
		return $result; 
	}

	function add_new_row($category,$slug){
		$data = array(
	        'collect_category_name' => $category,
	        'collect_category_slug' => $slug
		);
		$this->db->insert('tbl_collect_category', $data);
	}

	function edit_row($id,$category,$slug){
		$data = array(
	        'collect_category_name' => $category,
	        'collect_category_slug' => $slug
		);
		$this->db->where('collect_category_id', $id);
		$this->db->update('tbl_collect_category', $data);
	}

	function delete_row($id){
		$this->db->where('collect_category_id', $id);
		$this->db->delete('tbl_collect_category');
	}

	function get_collect_by_category($slug){
		$query = $this->db->query("SELECT tbl_collection.*,tbl_collect_category.* FROM
			tbl_collection LEFT JOIN tbl_collect_category ON collect_kategori_id=collect_category_id
			WHERE collect_category_slug='$slug'");
		return $query;
	}

	function collect_category_perpage($category_id,$start,$limit){
		$query = $this->db->query("SELECT tbl_collection.*,tbl_collect_category.*,user_name FROM
			tbl_collection LEFT JOIN tbl_collect_category ON collect_kategori_id=collect_category_id
			LEFT JOIN tbl_user ON collect_user_id=user_id
			WHERE collect_category_id='$category_id' LIMIT $start,$limit");
		return $query;
	}

	function count_by_category ($category_id){
		$query = $this->db->query("SELECT COUNT(*) FROM
			tbl_collection LEFT JOIN tbl_collect_category ON collect_kategori_id=collect_category_id
			WHERE collect_category_id='$category_id'");
		return $query;
	}

}