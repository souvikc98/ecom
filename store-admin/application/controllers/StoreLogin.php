<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class StoreLogin extends CI_Controller
{
    // This is default constructor of the class
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Storelogin_model');
    }

    // Index Page for this controller.
    public function index() {
        $isPosLoggedIn = $this->session->userdata('isPosLoggedIn');
        
        if(!isset($isPosLoggedIn) || $isPosLoggedIn != TRUE)
        {
            $this->load->view('store_admin/login/login');
        }
        else
        {
            redirect('/store-dashboard');
        }
    }

    // This function used to logged in user
    public function storeLoginMe() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[32]|min_length[8]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Something went wrong');
            $this->index();
        } else {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = md5($this->input->post('password'));

            $result = $this->Storelogin_model->loginMe($email, $password);
            
            if(!empty($result)) {

                $sessionArray = array(
                    'userId'=>$result->id,                    
                    'phone'=>$result->phone,
                    'email'=>$result->email,
                    'name'=>$result->name
                );

                $this->session->set_userdata('isPosLoggedIn', $sessionArray);
    
                redirect('/store-dashboard');
            } else {
                $this->session->set_flashdata('error', 'User Name or password mismatch');
                
                $this->index();
            }
        }
    }

    public function logout() {
        unset($_SESSION);
        $this->session->sess_destroy();
        redirect('store-login');
    }

}

?>