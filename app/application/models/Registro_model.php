<?php
class Registro_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function register($nombre, $apellido, $email, $password) {
        $password_md5 = md5($password); // Encriptar la contraseña con MD5

        $data = array(
            'nom_usu' => $nombre,
            'app_usu' => $apellido,
            'email_usu' => $email,
            'pass_usu' => $password_md5,
            'tipo_usu' => 'supervisor'
        );

        if ($this->db->insert('usuarios', $data)) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => $this->db->error()['message']];
        }
    }
}
