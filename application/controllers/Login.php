<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    // This is default constructor of the class
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    // Index Page for this controller.
    public function index() {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('admin/login/login');
        }
        else
        {
            redirect('/dashboard');
        }
    }

    // This function used to logged in user
    public function loginMe() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[32]|min_length[8]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Something went wrong');
            $this->index();
        } else {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = md5($this->input->post('password'));

            $result = $this->login_model->loginMe($email, $password);
            
            if(!empty($result)) {

                $sessionArray = array(
                    'userId'=>$result->id,                    
                    'phone'=>$result->phone,
                    'email'=>$result->email,
                    'name'=>$result->name
                );

                $this->session->set_userdata('isLoggedIn', $sessionArray);
    
                redirect('/dashboard');
            } else {
                $this->session->set_flashdata('error', 'User Name or password mismatch');
                
                $this->index();
            }
        }
    }

}

?>