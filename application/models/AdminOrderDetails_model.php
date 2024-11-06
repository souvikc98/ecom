<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminOrderDetails_model extends CI_Model
{
    public function getAllOrderHistoryByStatus($status) {

        $this->db->select('order_id, SUM(p_total_price) as total_amount, created_at');
        $this->db->from('order_details');
        $this->db->where("status", $status);
        $this->db->group_by('order_id');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllOrderDetailsByOrderId($orderId) {
        $this->db->select('order_details.*, p.product_name, p.product_image, p.price as product_price, p.weight');
        $this->db->from('order_details');
        $this->db->join('product p', 'order_details.p_id = p.id');
        $this->db->where("order_details.order_id", $orderId);
        $this->db->order_by('order_details.created_at', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getBuyerDetailsByOrderId($orderId) {
        $this->db->select('*');
        $this->db->from('buyer_details');
        $this->db->where("order_id", $orderId);
        $query = $this->db->get();
        $result = $query->row();        
        return $result;
    }
}