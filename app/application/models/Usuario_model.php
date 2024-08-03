<?php
class Usuario_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_empleados() {
        $this->db->where('tipo_usu', 'empleado');
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    public function get_supervisores() {
        $this->db->where('tipo_usu !=', 'empleado'); // Supervisores y admins
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }
}
