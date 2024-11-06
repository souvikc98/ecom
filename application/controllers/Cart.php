<?php ob_start();
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends CI_Controller {
    public function __construct(){

        parent::__construct();
        $this->load->model('cart_model');
    }

// Add to cart
    public function addToCart($id) {
        $pId = base64_decode($id);
        $isSignedIn = $this->session->userdata('isSignedIn');
        if(!isset($isSignedIn) || $isSignedIn != TRUE) {
            $this->session->set_flashdata('error', 'You have to login for add item into cart!!!');
            $this->load->view("home/signin/signin");
        } else {
            $userId = $isSignedIn['userId'];
            $isProductExistInCart = $this->cart_model->isProductExistInCart($pId, $userId);
            if ($isProductExistInCart > 0) {
                $this->session->set_flashdata('error', "Item already exists in cart, please update item in cart");
                redirect('/cart');
            } else {
                $productData = $this->cart_model->getProductInfo($pId);
                $cartInfo = array(
                    'user_id'          =>      $userId,
                    'product_id'         =>    $productData->id,
                    'price'            =>      $productData->price,
                    'quantity'         =>      1,
                    'created_at'       =>      date("Y-m-d")
                );
                $result = $this->cart_model->insert($cartInfo);
                if($result > 0) {
                    $this->session->set_flashdata('success', "Item successfully added to cart");
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
                redirect('/home');
            }
        }
    }

    public function viewCart() {
        $isSignedIn = $this->session->userdata('isSignedIn');
        if(empty($isSignedIn)){
            redirect('signin');
        }
        $data = array();
        $data['cartInfo'] = $this->cart_model->getCartInfoByUserId($isSignedIn['userId']);
        $this->load->view('home/cart/view_cart',$data);
    }

    public function updateCart() {
        $this->form_validation->set_rules('product_quantity[]','Quantity','trim|required|integer');
        if($this->form_validation->run() == FALSE)  {
            $this->session->set_flashdata('error', "Quantity required or Only number allowed");
            $this->viewCart();
        } else {
            $pQuantity = $this->input->post('product_quantity');       
            $perItemPrices = $this->input->post('per_product_price');
            $cartId = $this->input->post('cart_id');

            for ($i = 0; $i < count($cartId); $i++) {  
                $pQty = $pQuantity[$i];
                $perProductPrice = $perItemPrices[$i];
                $currentCartId = $cartId[$i];
                $totalPrice = $pQty * $perProductPrice;

                $updateCartInfo = array(
                    'quantity'        =>      $pQty,
                    'price'           =>      $totalPrice,
                    'updated_at'     =>       date("Y-m-d")
                );

                $res = $this->cart_model->UpdateCart($updateCartInfo,$currentCartId);
                if($res > 0) {
                    $this->session->set_flashdata('success', "Cart updated successfully"); 
                } else {
                    $this->session->set_flashdata('error', "Something went wrong");
                }
            }
            redirect('cart');
        }
    }

    public function deleteCart($id) {
        $cartId = base64_decode($id);
        if($cartId){
            $result = $this->cart_model->cartDelete($cartId);
            if($result == true){
               $this->session->set_flashdata('success', "Item deletion successfull"); 
            } else {
                $this->session->set_flashdata('error', "Something went wrong");
            }
        } else {
            $this->session->set_flashdata('error', "Something went wrong");
        }
        redirect('cart');
    }
}

?>