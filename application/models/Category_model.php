<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function getAllCategories($searchText = '') {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('is_deleted', 0);
        if (!empty($searchText)) {
            $this->db->like('category_name', $searchText);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function checkCategoryExist($categoryName) {
        $this->db->select('id');
        $this->db->from('category');
        $this->db->where(array('category_name' => $categoryName, 'is_deleted' => 0));
        $sql = $this->db->get();
        $res = $sql->num_rows();
        return $res;
    }

    public function addCategory($data) {
        $this->db->insert('category', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function getCategoryInforById($categoryId) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id', $categoryId);
        $query= $this->db->get();
        return $query->row();
    }

    public function edit($cateogoryInfo, $id) {
        $this->db->where('id', $id);
        $this->db->update('category', $cateogoryInfo);
        return TRUE;
    }

    

    public function delete($data, $id)
    {
        // $sql = "UPDATE product SET isDeleted = 1 WHERE id='$product_id';";
        // $result = $this->db->query($sql);
        // if ($result) {
        //     $sql1 = "UPDATE product_images SET isDeleted = 1 WHERE product_id='$product_id';";
        //     $result = $this->db->query($sql1);
        // }

        $this->db->where('id', $id);
        $this->db->update('category', $data);
        return TRUE;
    }

    public function getAllProduct()
    {
        $this->db->select('*');
        $this->db->from('product');
        $query= $this->db->get();
        return $query->result();
    }
}