<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class LowProductCorn extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('product_model'));  
    }

    public function checkLowStockProducts() {
        $data['lowStockProducts'] = $this->product_model->checkProductStock();
        if (!empty($data['lowStockProducts'])) {
            $this->sendLowProductEmail($data['lowStockProducts']);
        }
        
    }

    public function sendLowProductEmail($lowStockProducts) {
        $this->load->library('email');
        $to = 'admin@gmail.com';
        $from = 'souvikchowdhury785@gmail.com';
        $fromName = 'Low Products Email';
        $mailSubject = 'Low Products Email';

        $productList = '';
        foreach ($lowStockProducts as $product) {
            $productList .= "<li>" . $product->product_name . " - Stock: " . $product->quantity . $product->weight . "</li>";
        }

        $mailContent = "
            The following items are low in stock (less than 50 units): <ul>{$productList}</ul>";

        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->to($to);
        $this->email->from($from, $fromName);
        $this->email->subject($mailSubject);
        $this->email->message($mailContent);
        return $this->email->send()?true:false;
    }
}
?>