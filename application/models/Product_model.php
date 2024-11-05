<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
    public function getAllProducts($searchText = '') {
        $this->db->select('product.*, category.category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.id');
        $this->db->where('product.is_deleted', 0);
        if (!empty($searchText)) {
            $this->db->group_start();
            $this->db->like('product.product_name', $searchText);
            $this->db->or_like('category.category_name', $searchText);
            $this->db->group_end(); 
        }
        $this->db->order_by('product.id', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function addProduct($data) {
        $this->db->insert('product', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getProductInfoById($product_id) {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->where('product.id', $product_id);
        $query= $this->db->get();
        return $query->row();
    }

    public function editProduct($productInfo, $pId) {
        $this->db->where('id', $pId);
        $this->db->update('product', $productInfo);
        return TRUE;
    }

    public function delete($data, $pId) {
        $this->db->where('id', $pId);
        $this->db->update('product', $data);
        return TRUE;
    }

    public function checkProductStock() {
        $this->db->select('product.*, category.category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.id');
        $this->db->where('quantity <', 50);
        $query = $this->db->get();
        return $query->result();
    }
}