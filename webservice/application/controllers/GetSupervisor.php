<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetSupervisor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supervisor_model');
    }

    public function index() {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');

        $id_usu = $this->input->get('id_usu');
        $supervisor = $this->Supervisor_model->get_supervisor($id_usu);

        if ($supervisor) {
            echo json_encode($supervisor);
        } else {
            echo json_encode(['error' => 'No supervisor found']);
        }
    }
}
