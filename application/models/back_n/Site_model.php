<?php

class Site_model extends CI_Model{
	
	function get_site_data(){
		$query = $this->db->get('tbl_site', 1);
		return $query;
	}

	function update_information($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$shortcut_icon,$logo_header,$logo_footer,$address,$telephone,$email,$facebook,$twitter,$instagram){
		$this->db->set('site_name',$site_name);
		$this->db->set('site_title',$site_title);
		$this->db->set('site_description',$site_description);
		$this->db->set('site_maps',$maps);
		$this->db->set('site_street_views',$street_views);
		$this->db->set('site_shortcut_icon',$shortcut_icon);
		$this->db->set('site_logo_header',$logo_header);
		$this->db->set('site_logo_footer',$logo_footer);
		$this->db->set('site_address',$address);
		$this->db->set('site_telephone',$telephone);
		$this->db->set('site_email',$email);
		$this->db->set('site_facebook',$facebook);
		$this->db->set('site_twitter',$twitter);
		$this->db->set('site_instagram',$instagram);
		$this->db->where('site_id',$site_id);
		$this->db->update('tbl_site');
	}

	function update_information_icon($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$shortcut_icon,$address,$telephone,$email,$facebook,$twitter,$instagram){
		$this->db->set('site_name',$site_name);
		$this->db->set('site_title',$site_title);
		$this->db->set('site_description',$site_description);
		$this->db->set('site_maps',$maps);
		$this->db->set('site_street_views',$street_views);
		$this->db->set('site_shortcut_icon',$shortcut_icon);
		$this->db->set('site_address',$address);
		$this->db->set('site_telephone',$telephone);
		$this->db->set('site_email',$email);
		$this->db->set('site_facebook',$facebook);
		$this->db->set('site_twitter',$twitter);
		$this->db->set('site_instagram',$instagram);
		$this->db->where('site_id',$site_id);
		$this->db->update('tbl_site');
	}

	function update_information_header($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$logo_header,$address,$telephone,$email,$facebook,$twitter,$instagram){
		$this->db->set('site_name',$site_name);
		$this->db->set('site_title',$site_title);
		$this->db->set('site_description',$site_description);
		$this->db->set('site_maps',$maps);
		$this->db->set('site_street_views',$street_views);
		$this->db->set('site_logo_header',$logo_header);
		$this->db->set('site_address',$address);
		$this->db->set('site_telephone',$telephone);
		$this->db->set('site_email',$email);
		$this->db->set('site_facebook',$facebook);
		$this->db->set('site_twitter',$twitter);
		$this->db->set('site_instagram',$instagram);
		$this->db->where('site_id',$site_id);
		$this->db->update('tbl_site');
	}

	function update_information_footer($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$logo_footer,$address,$telephone,$email,$facebook,$twitter,$instagram){
		$this->db->set('site_name',$site_name);
		$this->db->set('site_title',$site_title);
		$this->db->set('site_description',$site_description);
		$this->db->set('site_maps',$maps);
		$this->db->set('site_street_views',$street_views);
		$this->db->set('site_logo_footer',$logo_footer);
		$this->db->set('site_address',$address);
		$this->db->set('site_telephone',$telephone);
		$this->db->set('site_email',$email);
		$this->db->set('site_facebook',$facebook);
		$this->db->set('site_twitter',$twitter);
		$this->db->set('site_instagram',$instagram);
		$this->db->where('site_id',$site_id);
		$this->db->update('tbl_site');
	}

	function update_information_nologo($site_id,$site_name,$site_title,$site_description,$maps,$street_views,$address,$telephone,$email,$facebook,$twitter,$instagram){
		$this->db->set('site_name',$site_name);
		$this->db->set('site_title',$site_title);
		$this->db->set('site_description',$site_description);
		$this->db->set('site_maps',$maps);
		$this->db->set('site_street_views',$street_views);
		$this->db->set('site_address',$address);
		$this->db->set('site_telephone',$telephone);
		$this->db->set('site_email',$email);
		$this->db->set('site_facebook',$facebook);
		$this->db->set('site_twitter',$twitter);
		$this->db->set('site_instagram',$instagram);
		$this->db->where('site_id',$site_id);
		$this->db->update('tbl_site');
	}
}