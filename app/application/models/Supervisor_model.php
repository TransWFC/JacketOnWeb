<?php
class Supervisor_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_supervisores() {
        $this->db->where('tipo_usu', 'supervisor');
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    public function get_supervisor($id_usu) {
        $query = $this->db->get_where('usuarios', array('id_usu' => $id_usu, 'tipo_usu' => 'supervisor'));
        return $query->row_array();
    }

    public function update_status($id_usu, $estatus) {
        $this->db->where('id_usu', $id_usu);
        return $this->db->update('usuarios', array('estatus' => $estatus));
    }

    public function update_supervisor($id_usu, $nombre, $apellido, $email, $password) {
        $data = array(
            'nom_usu' => $nombre,
            'app_usu' => $apellido,
            'email_usu' => $email,
            'pass_usu' => $password
        );
        $this->db->where('id_usu', $id_usu);
        return $this->db->update('usuarios', $data);
    }
}
