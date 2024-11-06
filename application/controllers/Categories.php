<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index() {
		if ($this->input->post('searchText')) {
	        $searchText = $this->input->post('searchText');
	    } else {
	        $searchText = '';
	    }
		$data['searchText'] = $searchText;
		$data['categories'] = $this->Category_model->getAllCategories($searchText);
		$this->load->view('admin/categories/listing', $data);
	}

	public function add(){
		$this->load->view('admin/categories/add');
	}

	public function addCategory(){
		$this->form_validation->set_rules('category_name','Category Name','trim|required');
        if($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
			$categoryName = $this->input->post('category_name');
			$checkCategoryExist = $this->Category_model->checkCategoryExist($categoryName);
			// print_r($checkCategoryExist); die;
			if ($checkCategoryExist == 0) {
				$cateogory = array(
					'category_name' => $this->input->post('category_name'),
					'created_at' => date('Y-m-d H:i:s')
				);
				$result = $this->Category_model->addCategory($cateogory);

				if ($result > 0) {
					$this->session->set_flashdata('success', 'Category added successfully');
				} else {
					$this->session->set_flashdata('error', 'Something went wrong!!!');	
				}
			} else {
				$this->session->set_flashdata('error', 'Category already exists');		
			}
				
			redirect('categories');
		}
	}

	public function edit($id) {
		$categoryId = base64_decode($id);
		$data['categoryInfo'] = $this->Category_model->getCategoryInforById($categoryId);
		$this->load->view('admin/categories/edit', $data);
	}

	public function editCategoryInfo() {
        $id = $this->input->post('category_id');
        $this->form_validation->set_rules('category_name','Category Name','trim|required');

        if($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
			$cateogoryInfo = array(
				'category_name' => $this->input->post('category_name'),
				'updated_at' => date('Y-m-d H:i:s')
			);

	        $result = $this->Category_model->edit($cateogoryInfo, $id);
	        if ($result == TRUE) {
	        	$this->session->set_flashdata('success', 'Category updated successfully');
	        } else {
	        	$this->session->set_flashdata('error', 'Something went wrong!!!');
	        }
	      	redirect('categories');  
	    }
	}

	public function delete($id) {
		$catId = base64_decode($id);
		$result = $this->Category_model->delete(array('is_deleted' => 1), $catId);
		if ($result == TRUE) {
        	$this->session->set_flashdata('success', 'Category deleted successfully');
        } else {
        	$this->session->set_flashdata('error', 'Something went wrong!!!');
        }
      	redirect('categories');  
	}
}
?>