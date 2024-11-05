<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class AdminOrderDetails extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('AdminOrderDetails_model'));  
    }

    public function index() {
        if ($this->input->post('searchText')) {
            $searchText = $this->input->post('searchText');
        } else {
            $searchText = '';
        }
        $data['searchText'] = $searchText;
        $status = 1;
        $data['orderHistory'] = $this->AdminOrderDetails_model->getAllOrderHistoryByStatus($status);
        $this->load->view("admin/order_details/online_order_hitory", $data);
    }

    public function orderDetails($id) {
        $orderId = base64_decode($id);
        $data['orderDetails'] = $this->AdminOrderDetails_model->getAllOrderDetailsByOrderId($orderId);
        $data['buyerDetails'] = $this->AdminOrderDetails_model->getBuyerDetailsByOrderId($orderId);
        $this->load->view('admin/order_details/order_details', $data);
    }

    public function storeOrderHistory() {
        if ($this->input->post('searchText')) {
            $searchText = $this->input->post('searchText');
        } else {
            $searchText = '';
        }
        $data['searchText'] = $searchText;
        $status = 2;
        $data['storeOrderHistory'] = $this->AdminOrderDetails_model->getAllOrderHistoryByStatus($status);
        $this->load->view("admin/order_details/store_order_history", $data);
    }
}
?>