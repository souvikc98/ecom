<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model {

    public function getAllProducts() {
        $this->db->select('id, product_name');
        $this->db->from('product');
        $this->db->where('is_deleted', 0);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllProductInfoByProductId($pId) {
        $this->db->select('id, product_name, weight, price');
        $this->db->from('product');
        $this->db->where('id', $pId);
        $query= $this->db->get();
        return $query->row();
    }

    public function insertOrderInfo($orderInfo) {
        $this->db->insert('order_details', $orderInfo);
        $insertId = $this->db->insert_id();
        return $insertId;
    }

    public function getProductQuantity($pId) {
        $this->db->select('quantity');
        $this->db->from('product');
        $this->db->where('id', $pId);
        $query = $this->db->get();
        $res = $query->row();
        return $res;
    }

    public function updateProductQuantity($data, $pId) {
        $this->db->where('id',$pId);
        if($this->db->update('product',$data)) {
            return true;          
        } else {
            return false;
        }
    }

    public function insertBuyerInfo($buyerDetails) {
        $this->db->insert('buyer_details', $buyerDetails);
        $insertId = $this->db->insert_id();
        return $insertId;
    }

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