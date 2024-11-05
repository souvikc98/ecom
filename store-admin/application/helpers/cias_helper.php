<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
    /**
 * This function is used to print the content of any data
 */
    if ( !function_exists('assets_url') )
    {
        function assets_url()
        {
            $ci=& get_instance();
            return $ci->config->item('assets_url');
        }
    }

    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    if (!function_exists('dd')) {
        function dd($args = '', $die = true)
        {
            echo "<pre>";
            print_r($args);
            echo "</pre>";
            if($die){
                die;
            }
        }
    }

    function limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos   = array_keys($words);
            $text  = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
    }
    

    if (!function_exists('getCartTotal')) {
        function getCartTotal($userId) {
            $ci =& get_instance();
            $ci->load->database();
            $ci->db->select('id');
            $ci->db->from('cart');
            $ci->db->where('user_id', $userId);
            $query = $ci->db->get();
            return $query->num_rows();
        }
    }

?>