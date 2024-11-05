<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('billing_model'));  
    }

    public function index() {
        $data['products'] = $this->billing_model->getAllProducts();
        $this->load->view('store_admin/billing/add_billing', $data);
    }

    public function getAllProductInfoByProductId() {
        $productId = $this->input->post('product_id');
        if((int)$productId) {
            $productInfo = $this->billing_model->getAllProductInfoByProductId($productId);
            echo json_encode($productInfo);
        }
    }

    public function addBill() {
        $this->form_validation->set_rules('product_id[]', 'Product Name', 'trim|required');
        $this->form_validation->set_rules('quantity[]', 'Product Quantity', 'trim|required');
        $this->form_validation->set_rules('buyer_name', 'Buyer Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[10]|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Something went wrong");
            $this->index();
        } else {
            $orderId = 'ECOM'.rand(0,999999);
            $pId = $this->input->post('product_id');
            $pQty = $this->input->post('quantity');       
            $pPrice = $this->input->post('price');

            for ($i = 0; $i < count($pId); $i++) {
                $orderInfo = array(
                    'order_id'      => $orderId,
                    'p_id'          => $pId[$i],
                    'p_qty'         => $pQty[$i],
                    'p_total_price' => $pQty[$i] * $pPrice[$i],
                    'status'        =>  2,
                    'created_at'    =>  date("Y-m-d H:i:s")
                );

                $res = $this->billing_model->insertOrderInfo($orderInfo);
                if($res > 0) {
                    $currentQuantity = $this->billing_model->getProductQuantity($pId[$i]);
                    $newQuantity = $currentQuantity->quantity - $pQty[$i];

                    $updateProductInfo = array(
                        'quantity'       => $newQuantity,
                    );
                    $res1 = $this->billing_model->updateProductQuantity($updateProductInfo, $pId[$i]);
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
            }

            $buyerDetails = array(
                'order_id' => $orderId,
                'buyer_name' => $this->input->post('buyer_name'),
                'phone' => $this->input->post('phone'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $res2 = $this->billing_model->insertBuyerInfo($buyerDetails);

            if ($res2 > 0) {
                $this->session->set_flashdata('success', "Order has been placed successfully");
                redirect('store-order-success/' . base64_encode($orderId));
            } else {
                $this->session->set_flashdata('error', "Something went wrong");
            }
        }
    }

    public function orderSuccess($id) {
        $data['orderId'] = base64_decode($id);
        $this->load->view("store_admin/order_success", $data);
    }

    public function orderHistory() {
        $status = 2;
        $data['orderHistory'] = $this->billing_model->getAllOrderHistoryByStatus($status);
        $this->load->view('store_admin/order_details/order_history', $data);        
    }

    public function orderDetails($id) {
        $orderId = base64_decode($id);
        $data['ordId'] = $orderId;
        $data['orderDetails'] = $this->billing_model->getAllOrderDetailsByOrderId($orderId);
        $data['buyerDetails'] = $this->billing_model->getBuyerDetailsByOrderId($orderId);
        $this->load->view('store_admin/order_details/order_details', $data);
    }
}
?>