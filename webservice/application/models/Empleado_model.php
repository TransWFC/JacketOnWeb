<?php
class Empleado_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_employees() {
        $query = $this->db->get_where('usuarios', ['tipo_usu' => 'empleado']);
        return $query->result_array();
    }

    public function get_employee($id_usu) {
        $query = $this->db->get_where('usuarios', ['id_usu' => $id_usu, 'tipo_usu' => 'empleado']);
        return $query->row_array();
    }

    public function update_employee($id_usu, $nombre, $apellido, $email, $password) {
        $data = array(
            'nom_usu' => $nombre,
            'app_usu' => $apellido,
            'email_usu' => $email,
            'pass_usu' => $password
        );
        $this->db->where('id_usu', $id_usu);
        return $this->db->update('usuarios', $data);
    }

    public function delete_employee($id_usu) {
        return $this->db->delete('usuarios', ['id_usu' => $id_usu, 'tipo_usu' => 'empleado']);
    }
}
