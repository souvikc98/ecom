<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_Model extends CI_Model {

    public function insert($cartInfo) {
        $this->db->insert('cart', $cartInfo);
        $insertId = $this->db->insert_id();
        return $insertId;
    }

    public function getCountCartRow($uId) {
        $this->db->from('cart');
        $this->db->where("user_id",$uId);
        $result=$this->db->get();
        $res = $result->num_rows();
        return $res;
    }

    public function getProductInfo($pId) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id', $pId);
        $query= $this->db->get();
        // echo $this->db->last_query(); die;
        return $query->row();
    }

    public function getCartInfoByUserId($userId) {
        $this->db->select('cart.*, p.id as pid, p.product_name, p.product_image, p.price as product_price, p.quantity as product_quantity, p.weight');
        $this->db->from('cart');
        $this->db->join('product p', 'cart.product_id = p.id', 'LEFT');
        $this->db->where(array('cart.user_id'=>$userId));
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;
    }

    public function UpdateCart($data,$id) {
     $this->db->where('id',$id);
     if($this->db->update('cart',$data)) {
         return true;          
     } else {
         return false;
     }   
    }

    public function getCartRow($uid) {
        $this->db->from('cart');
        $this->db->where("user_id",$uid);
        $result=$this->db->get();
        $res = $result->row();
        return $res;        
    }

    public function cartDelete($cartId) {
        $this->db->where('id', $cartId);
        $result = $this->db->delete('cart');
        return $result;
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

    public function delete($userId) {
        $this->db->where('user_id', $userId);
        $result = $this->db->delete('cart');
        return $result;
    }

    public function getAllOrderHistoryByUserId($userId) {
        $this->db->select('order_details.order_id, SUM(order_details.p_total_price) as total_amount');
        $this->db->from('order_details');
        $this->db->where("order_details.user_id", $userId);
        $this->db->group_by('order_details.order_id');
        $this->db->order_by('order_details.created_at', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    public function getAllOrderDetailsByOrderId($orderId) {
        $this->db->select('order_details.*, p.product_name, p.product_image, p.price as product_price');
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

    public function isProductExistInCart($pId, $userId) {
        $this->db->from('cart');
        $this->db->where(array('user_id' => $userId, 'product_id' => $pId));
        $result=$this->db->get();
        $res = $result->num_rows();
        return $res;
    }


}