<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Signin extends CI_Controller {

    public function __construct(){
        parent::__construct();

        // Session
        $this->load->library('session');
        // Helper
        $this->load->helper(array('cias_helper', 'form_helper'));
        // // Model
        $this->load->model(array('Users_model'));
    }

    public function index() {
        $isSignedIn = $this->session->userdata('isSignedIn');
        
        if(!isset($isSignedIn) || $isSignedIn != TRUE) {
            $this->load->view('home/signin/signin');
        } else {
            redirect('/home');
        }
    }

   	public function loginSubmit(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[32]|min_length[8]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Something went wrong');
            $this->index();
        } else {
      		$userName = strtolower($this->security->xss_clean($this->input->post('email'))); 
    		$password = md5($this->input->post('password'));
            $loginValidate = $this->Users_model->loginValidate($userName, $password);
            if (!empty($loginValidate)) {
    			$sessionArray = array(
    				'userId'		=>		$loginValidate->id,
                    'name'			=>		$loginValidate->name,
    				'email'			=>		$loginValidate->email,
    				'phone'			=>		$loginValidate->phone
                );
    	        $this->session->set_userdata('isSignedIn', $sessionArray);

                $this->session->set_flashdata('success', 'Welcome to Dashboard');
                    redirect('home');
            } else{
                $this->session->set_flashdata('error', 'User Name or password mismatch');
                $this->index();
            }
        }
   	}

    public function signup() {
        $this->load->view('home/signin/signup');
    }

    public function register(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|max_length[10]|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[32]|min_length[8]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Something went wrong');
            $this->signup();
        } else {
            $registrationInfo = array(
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'email' => strtolower($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'created_at' => date('Y-m-d H:i:s')
            );

            $result = $this->Users_model->register($registrationInfo);
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Registration successfull');
                redirect('signin');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong');
                redirect('signup');
            }
            
        }
    }
   
   	public function logout() {
        unset($_SESSION);
  		$this->session->sess_destroy();
		redirect('signin');
   	}
}
?>