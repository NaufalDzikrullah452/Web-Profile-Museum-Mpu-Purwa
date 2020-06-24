<?php

class Contact_model extends CI_Model{
	
	

    function save_suggestion($name,$age,$address,$origin,$message){
    	$data = array(
            'suggestion_name' => $name,
            'suggestion_age' => $age,
            'suggestion_address' => $address,
            'suggestion_origin' => $origin,
    		'suggestion_message' => $message, 
    		
    	);
    	$this->db->insert('tbl_suggestion', $data);
    }

}