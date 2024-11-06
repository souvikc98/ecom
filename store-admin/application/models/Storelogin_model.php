<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Storelogin_model extends CI_Model
{
    // This function used to check the login credentials of the user
    function loginMe($email, $password)
    {
        $this->db->select('*');
        $this->db->from('tbl_pos_admin');
        $this->db->where(array('email' => $email, 'password' => $password));
        $query = $this->db->get();    
        $user = $query->row();
        
        if(!empty($user)){
            return $user;
        } else {
            return array();
        }
    }
}

?>