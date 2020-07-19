<?php

class Collect_model extends CI_Model{
	
	function get_collection(){
		$query = $this->db->get('tbl_collection');
		return $query;
	}


	function get_collection_by_slug($slug){
		$query = $this->db->query("SELECT tbl_collection.*,user_name,tbl_collect_category.* FROM tbl_collection 
			LEFT JOIN tbl_user ON collect_user_id=user_id
			LEFT JOIN tbl_collect_category ON collect_kategori_id=collect_category_id
			WHERE collect_slug='$slug' GROUP BY collect_id LIMIT 1");
		return $query;
	}

	function get_latest_collection(){
		$this->db->select('tbl_collection.*, user_name');
		$this->db->from('tbl_collection');
		$this->db->join('tbl_user', 'collect_user_id=user_id','left');
		$this->db->order_by('collect_id', 'DESC');
		$this->db->limit(6);
		$query = $this->db->get();
		return $query;
	}


    function search_collection($query){
    	$result = $this->db->query("SELECT tbl_collection.*,user_name FROM tbl_collection
			LEFT JOIN tbl_user ON collect_user_id=user_id
			LEFT JOIN tbl_collect_category ON collect_kategori_id=collect_category_id
			WHERE collect_nama LIKE '%$query%' OR collect_category_name LIKE '%$query%' LIMIT 12");
    	return $result;
	}

	 function get_collection_list($limit, $start){
        $query = $this->db->get('tbl_collection', $limit, $start);
        return $query;
    }

}