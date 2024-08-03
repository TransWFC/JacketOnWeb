<?php
class Login_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function login($email, $password) {
        $this->db->where('email_usu', $email);
        $query = $this->db->get('usuarios');

        if ($query->num_rows() == 1) {
            $user = $query->row_array();
            if (md5($password) === $user['pass_usu']) {
                if ($user['tipo_usu'] === 'admin') {
                    return ['success' => true];
                } else {
                    return ['success' => false, 'message' => 'Solo los administradores pueden acceder.'];
                }
            } else {
                return ['success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.'];
            }
        } else {
            return ['success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.'];
        }
    }
}
