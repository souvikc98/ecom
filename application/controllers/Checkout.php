<?php ob_start();
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Checkout extends CI_Controller {
    public function __construct(){

        parent::__construct();
        $this->load->model('cart_model');
    }

    public function index() {
        $isSignedIn = $this->session->userdata('isSignedIn');
        $userId = $isSignedIn['userId'];
        $data['checkoutInfo'] = $this->cart_model->getCartInfoByUserId($userId);
        $this->load->view('home/checkout', $data);
    }

    public function placeOrder() {
        $this->form_validation->set_rules('buyer_name', 'Buyer Name', 'trim|required');
        $this->form_validation->set_rules('buyer_address', 'Buyer Address', 'trim|required');
        $this->form_validation->set_rules('landmark', 'Landmark', 'trim|required');
        $this->form_validation->set_rules('pin', 'PIN', 'trim|required|min_length[6]|max_length[6]|numeric');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[10]|max_length[10]|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', "Something went wrong");
            $this->index();
        } else {
            $isSignedIn = $this->session->userdata('isSignedIn');
            $userId = $isSignedIn['userId'];
            $orderId = 'ECOM'.rand(0,999999);

            $pId = $this->input->post('p_id');
            $pQty = $this->input->post('p_qty');       
            $pTotalPrice = $this->input->post('p_total_price');
            for ($i = 0; $i < count($pId); $i++) {
                $orderInfo = array(
                    'user_id'       => $userId,
                    'order_id'      => $orderId,
                    'p_id'          => $pId[$i],
                    'p_qty'         => $pQty[$i],
                    'p_total_price' => $pTotalPrice[$i],
                    'created_at'    =>  date("Y-m-d H:i:s")
                );

                $res = $this->cart_model->insertOrderInfo($orderInfo);
                if($res > 0) {
                    $currentQuantity = $this->cart_model->getProductQuantity($pId[$i]);
                    $newQuantity = $currentQuantity->quantity - $pQty[$i];

                    $updateProductInfo = array(
                        'quantity'       => $newQuantity,
                    );
                    $res1 = $this->cart_model->updateProductQuantity($updateProductInfo, $pId[$i]);
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
            }

            $buyerDetails = array(
                'user_id' => $userId,
                'order_id' => $orderId,
                'buyer_name' => $this->input->post('buyer_name'),
                'buyer_address' => $this->input->post('buyer_address'),
                'landmark' => $this->input->post('landmark'),
                'pin' => $this->input->post('pin'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'created_at' => date('Y-m-d H:i:s')
            );
            $res2 = $this->cart_model->insertBuyerInfo($buyerDetails);

            if ($res2 > 0) {
                $this->cart_model->delete($userId);
                $this->session->set_flashdata('success', "Order has been placed successfully");
                redirect('order-success/' . base64_encode($orderId));
            } else {
                $this->session->set_flashdata('error', "Something went wrong");
            }
        }
    }

    public function successPage($orderId) {
        $orderId = base64_decode($orderId);
        $data['orderId'] = $orderId;
        $this->load->view('home/success_page', $data);
    }

    public function orderHistory() {
        $isSignedIn = $this->session->userdata('isSignedIn');
        $userId = $isSignedIn['userId'];
        $data['orderHistory'] = $this->cart_model->getAllOrderHistoryByUserId($userId);
        // pre($data['orderHistory']); die;
        $this->load->view('home/order_history', $data);
    }

    public function orderDetails($id) {
        $orderId = base64_decode($id);
        $data['orderDetails'] = $this->cart_model->getAllOrderDetailsByOrderId($orderId);
        $data['buyerDetails'] = $this->cart_model->getBuyerDetailsByOrderId($orderId);
        $this->load->view('home/order_details', $data);
    }
}

?>