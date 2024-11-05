<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminProduct extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('product_model', 'category_model'));  
    }

    public function index() {
        if ($this->input->post('searchText')) {
            $searchText = $this->input->post('searchText');
        } else {
            $searchText = '';
        }

        $data['searchText'] = $searchText;
        $data['products'] = $this->product_model->getAllProducts($searchText);
        $this->load->view("admin/product/product_listing", $data);
    }

    public function add() {
        $data['categories'] = $this->category_model->getAllCategories();
        $this->load->view('admin/product/addproduct', $data);
    }

    public function addProduct() {
        $this->form_validation->set_rules('category_id','Category','trim|required');
        $this->form_validation->set_rules('product_name','Product Name','trim|required');

        if($this->form_validation->run() == FALSE)  {
            $this->add();
        } else {
            $data = array(); 
            if(!empty($_FILES['product_image'])){ 
                $config['upload_path'] = "uploads/products/";
                $config['allowed_types'] = 'jpg|jpeg|png'; 
                $config['max_size'] = '10000'; // max_size in kb 
                $config['file_name'] = $_FILES['product_image']['name'];

                $this->load->library('upload',$config); 
                $this->upload->initialize($config);
                if($this->upload->do_upload('product_image')){
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name']; 
                    $data['response'] = 'successfully uploaded '.$filename; 
                }else{ 
                    $data['response'] = 'failed'; 
                } 
            }else{ 
                $data['response'] = 'failed'; 
            }

            $productInfo = array(
                'category_id' => $this->input->post('category_id'), 
                'product_name' => $this->input->post('product_name'), 
                'description' => $this->input->post('description'),
                'quantity' => $this->input->post('quantity'),
                'weight' => $this->input->post('weight'),
                'price' => $this->input->post('price'),
                'product_image' => $filename,  
                'created_at'=>date('Y-m-d H:i:s')
            );

            $result = $this->product_model->addProduct($productInfo);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Product added successfully');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong!!!');  
            }

            redirect('products');
        }
    }

    public function edit($id) {
        $pId = base64_decode($id);
        $data['categories'] = $this->category_model->getAllCategories();
        $data['productInfo'] = $this->product_model->getProductInfoById($pId);
        $this->load->view("admin/product/editproduct", $data);
    }

    public function editProductInfo() {
        $pId = $this->input->post('product_id');
        $this->form_validation->set_rules('category_id','Category','trim|required');
        $this->form_validation->set_rules('product_name','Product Name','trim|required');

        if($this->form_validation->run() == FALSE) {
            $this->edit($pId);
        } else {
            $data = array(); 
            if(!empty($_FILES['product_image'])){
                $config['upload_path'] = "uploads/products/";
                $config['allowed_types'] = 'jpg|jpeg|png'; 
                $config['max_size'] = '10000'; // max_size in kb 
                $config['file_name'] = $_FILES['product_image']['name'];

                $this->load->library('upload',$config); 
                $this->upload->initialize($config);
                if($this->upload->do_upload('product_image')){
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name']; 
                    $data['response'] = 'successfully uploaded '.$filename; 
                }else{ 
                    $data['response'] = 'failed'; 
                    $filename = $this->input->post('old_image');
                } 
            } else { 
                $filename = $this->input->post('old_image');
            }

            $productInfo = array(
                'category_id' => $this->input->post('category_id'), 
                'product_name' => $this->input->post('product_name'), 
                'description' => $this->input->post('description'),
                'quantity' => $this->input->post('quantity'),
                'weight' => $this->input->post('weight'),
                'price' => $this->input->post('price'),
                'product_image' => $filename,  
                'updated_at'=>date('Y-m-d H:i:s')
            );
            // print_r($productInfo); die;
            $result = $this->product_model->editProduct($productInfo, $pId);
            if($result == true) {
                $this->session->set_flashdata('success', 'Product updated successfully');
            }
            else {
                $this->session->set_flashdata('error', 'Updation failed');
            }              
            redirect('products');
        }
        
    }

    public function deleteProduct($id) {
        $pId = base64_decode($id);
        $result = $this->product_model->delete(array('is_deleted' => 1), $pId);
        if ($result == TRUE) {
            $this->session->set_flashdata('success', 'Product deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong!!!');
        }
        redirect('products');  
    }

    public function lowStockProducts() {
        $data['lowProductStock'] = $this->product_model->checkProductStock();
        $this->load->view('admin/product/low_product_stock', $data);
    }
}
?>