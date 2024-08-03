<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Registro_model');
    }

    public function index() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Allow-Methods: POST");

        $data = json_decode(file_get_contents('php://input'), true);
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'];
        $password = $data['password'];

        if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Por favor complete todos los campos.']);
            return;
        }

        $result = $this->Registro_model->register($nombre, $apellido, $email, $password);
        echo json_encode($result);
    }
}
