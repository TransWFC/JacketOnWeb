<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Empleado_model');
    }

    public function index() {
        $data['empleados'] = $this->Empleado_model->get_empleados();
        $this->load->view('empleados', $data);
    }

    public function eliminar($id) {
        $this->Empleado_model->update_status($id, 0);
        redirect('empleados');
    }

    public function editar($id) {
        $data['empleado'] = $this->Empleado_model->get_empleado($id);
        $this->load->view('editar_empleado', $data);
    }

    public function actualizar() {
        $id = $this->input->post('id_usu');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password')); // Encriptar la contraseña con MD5

        $this->Empleado_model->update_empleado($id, $nombre, $apellido, $email, $password);
        redirect('empleados');
    }

    public function registrar() {
        $this->load->view('registro_empleados');
    }

    public function registrar_submit() {
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $result = $this->Empleado_model->register($nombre, $apellido, $email, $password);

        if ($result['success']) {
            redirect('empleados');
        } else {
            $data['error'] = $result['message'];
            $this->load->view('registro_empleados', $data);
        }
    }
}
