<?php

class Home_model extends CI_Model
{
	public function __construct() {
        parent::__construct();
		$this->load->database();
		
    }

    public function getAllProductsByLimit(){
        $this->db->select('product.*, category.category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.id');
        $this->db->where('product.is_deleted', 0);
        $this->db->limit(12);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllCategories() {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('is_deleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getProductsByCategory($categoryId){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where(array('category_id' => $categoryId, 'is_deleted' => 0));
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getAllProducts(){
        $this->db->select('product.*, category.category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.id');
        $this->db->where('product.is_deleted', 0);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function getProductDetailsByPId($pId){
        $this->db->select('product.*, category.category_name');
        $this->db->from('product');
        $this->db->join('category', 'product.category_id = category.id');
        $this->db->where('product.id', $pId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getProductBySearchItem($searchItem) {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like('product_name', $searchItem);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function isProductExistInCart($pId) {
        // code...
    }
}
?>