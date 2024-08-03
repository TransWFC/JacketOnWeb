<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Registro_model');
    }

    public function index() {
        $this->load->view('registro');
    }

    public function submit() {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('registro');
        } else {
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->Registro_model->register($nombre, $apellido, $email, $password);

            if ($result['success']) {
                $data['success'] = true;
                $this->load->view('registro', $data);
                header("refresh:3; url=" . site_url('supervisores'));
            } else {
                $data['error'] = $result['message'];
                $data['success'] = false;
                $this->load->view('registro', $data);
            }
        }
    }
}
