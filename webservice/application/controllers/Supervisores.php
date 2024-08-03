<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisores extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supervisor_model');
    }

    public function toggle_status($id_usu) {
        $current_status = $this->Supervisor_model->get_status($id_usu);

        if ($current_status === NULL) {
            echo json_encode(['success' => false, 'message' => 'Supervisor no encontrado.']);
            return;
        }

        // Alternar el estatus entre activo (1) e inactivo (0)
        $new_status = ($current_status == 1) ? 0 : 1;

        $result = $this->Supervisor_model->update_status($id_usu, $new_status);

        if ($result) {
            echo json_encode(['success' => true, 'new_status' => $new_status]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error actualizando el estado del supervisor.']);
        }
    }
}
?>
