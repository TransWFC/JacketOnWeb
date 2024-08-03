<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function submit() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->Login_model->login($email, $password);

            if ($result['success']) {
                $data['success'] = true;
                $this->load->view('login', $data);
                header("refresh:3; url=" . site_url('supervisores'));
            } else {
                $data['error'] = $result['message'];
                $data['success'] = false;
                $this->load->view('login', $data);
            }
        }
    }
}
