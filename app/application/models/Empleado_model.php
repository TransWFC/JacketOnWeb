<?php
class Empleado_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_empleados() {
        $this->db->where('tipo_usu', 'empleado');
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    public function get_empleado($id_usu) {
        $query = $this->db->get_where('usuarios', array('id_usu' => $id_usu, 'tipo_usu' => 'empleado'));
        return $query->row_array();
    }

    public function update_status($id_usu, $estatus) {
        $this->db->where('id_usu', $id_usu);
        return $this->db->update('usuarios', array('estatus' => $estatus));
    }

    public function update_empleado($id_usu, $nombre, $apellido, $email, $password) {
        $data = array(
            'nom_usu' => $nombre,
            'app_usu' => $apellido,
            'email_usu' => $email,
            'pass_usu' => $password
        );
        $this->db->where('id_usu', $id_usu);
        return $this->db->update('usuarios', $data);
    }

    public function register($nombre, $apellido, $email, $password) {
        $data = array(
            'nom_usu' => $nombre,
            'app_usu' => $apellido,
            'email_usu' => $email,
            'pass_usu' => $password,
            'tipo_usu' => 'empleado',
            'estatus' => 1 // Establecer el estatus como activo por defecto
        );

        // Verificar si el email ya existe
        $this->db->where('email_usu', $email);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            return ['success' => false, 'message' => 'El email ya está registrado.'];
        }

        if ($this->db->insert('usuarios', $data)) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => $this->db->error()['message']];
        }
    }
}
?>
