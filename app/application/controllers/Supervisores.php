<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Supervisor_model');
    }

    public function index() {
        $data['supervisores'] = $this->Supervisor_model->get_supervisores();
        $this->load->view('supervisores', $data);
    }

    public function eliminar($id) {
        $this->Supervisor_model->update_status($id, 0);
        redirect('supervisores');
    }

    public function editar($id) {
        $data['supervisor'] = $this->Supervisor_model->get_supervisor($id);
        $this->load->view('editar_supervisor', $data);
    }

    public function actualizar() {
        $id = $this->input->post('id_usu');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password')); // Encriptar la contraseña con MD5

        $this->Supervisor_model->update_supervisor($id, $nombre, $apellido, $email, $password);
        redirect('supervisores');
    }
}
