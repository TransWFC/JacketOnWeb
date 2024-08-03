<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateSupervisor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supervisor_model');
    }

    public function index() {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        $id_usu = $this->input->post('id_usu');
        $nombre = $this->input->post('nom_usu');
        $apellido = $this->input->post('app_usu');
        $email = $this->input->post('email_usu');
        $password = md5($this->input->post('pass_usu')); // Encriptar la contraseña con MD5

        $result = $this->Supervisor_model->update_supervisor($id_usu, $nombre, $apellido, $email, $password);

        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error actualizando supervisor']);
        }
    }
}
