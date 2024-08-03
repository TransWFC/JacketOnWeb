<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model'); // Asegúrate de cargar el modelo adecuado
    }

    public function metricas() {
        $data['empleados'] = $this->Usuario_model->get_empleados(); // Obtén los datos de empleados
        $this->load->view('metricas_view', $data);
    }
}
