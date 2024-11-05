<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        $this->load->view("admin/profile/dashboard");
    }

    public function logout() {
        unset($_SESSION);
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>