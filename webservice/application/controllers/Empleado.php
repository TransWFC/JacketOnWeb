<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Empleado_model');
    }

    public function index() {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Headers: Content-Type');

        $employees = $this->Empleado_model->get_all_employees();
        echo json_encode($employees);
    }

    public function view($id_usu) {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Headers: Content-Type');

        $employee = $this->Empleado_model->get_employee($id_usu);
        if ($employee) {
            echo json_encode($employee);
        } else {
            echo json_encode(['success' => false, 'message' => 'Empleado no encontrado.']);
        }
    }

    public function update() {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        $data = json_decode(file_get_contents('php://input'), true);
        $id_usu = $data['id_usu'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $email = $data['email'];
        $password = md5($data['password']);

        $result = $this->Empleado_model->update_employee($id_usu, $nombre, $apellido, $email, $password);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error actualizando empleado']);
        }
    }

    public function delete($id_usu) {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Content-Type');

        $result = $this->Empleado_model->delete_employee($id_usu);
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Error eliminando empleado']);
        }
    }
}
