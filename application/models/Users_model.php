<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function loginValidate($username, $password) {
	    $this->db->select('*');
	    $this->db->from('tbl_user');
	    $this->db->where(array('email' => $username, 'password' => $password));
	    $query = $this->db->get();
	    // echo $this->db->last_query(); die;
	    $user = $query->row();
	    
	    if (!empty($user)) {
	        return $user;
	    } else {
	        return array();
	    }
	}

	public function register($registrationInfo) {
		$this->db->insert('tbl_user', $registrationInfo);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}
	
}
?>