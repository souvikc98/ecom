<?php ob_start();
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
    public function __construct(){

        parent::__construct();
        $this->load->model('home_model');
    }

// Home
    public function index() {
        $data = array();
        $data['categories'] = $this->home_model->getAllCategories();
        $data['products'] = $this->home_model->getAllProductsByLimit();
        $this->load->view("home/index", $data);
    }

    public function getProductsByCategory() {
        $categoryId = $this->input->post('category_id');
        $data['products'] = $this->home_model->getProductsByCategory($categoryId);
        $this->load->view("home/index", $data);
    }

// Product
    public function products() {
        $data = array();
        $data['products'] = $this->home_model->getAllProducts();
        $this->load->view("home/product/products", $data);
    }

// Product Details
    public function productDetails($id) {
        $pId = base64_decode($id);
        $data = array();
        $data['product'] = $this->home_model->getProductDetailsByPId($pId);
        $this->load->view("home/product/product_details", $data);
    }

// Serch Result
    public function search() {
        $this->form_validation->set_rules('search_text','Search Field','trim|required');

        if($this->form_validation->run() == FALSE)  {
            $this->session->set_flashdata('error', 'Search field is required');
            redirect('home');
        } else {
            $searchItem = $this->input->post('search_text');
            $data['searchResult'] = $this->home_model->getProductBySearchItem($searchItem);
            $this->load->view("home/search_result", $data);
        }
    }

}

?>