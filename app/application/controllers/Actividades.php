<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Actividad_model');
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['actividades'] = $this->Actividad_model->get_actividades();
        $this->load->view('activities', $data);
    }

    public function agregar() {
        $data['empleados'] = $this->Usuario_model->get_empleados();
        $data['supervisores'] = $this->Usuario_model->get_supervisores();
        $this->load->view('agregar_actividad', $data);
    }

    public function submit() {
        $this->form_validation->set_rules('actividad', 'Actividad', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('fech_asig', 'Fecha asignada', 'required');
        $this->form_validation->set_rules('fech_lim', 'Fecha límite', 'required');
        $this->form_validation->set_rules('area', 'Área', 'required');
        $this->form_validation->set_rules('id_usu_asignado', 'Asignado', 'required');
        $this->form_validation->set_rules('id_usu_que_asigno', 'Quien asignó', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['empleados'] = $this->Usuario_model->get_empleados();
            $data['supervisores'] = $this->Usuario_model->get_supervisores();
            $this->load->view('agregar_actividad', $data);
        } else {
            $data = array(
                'actividad' => $this->input->post('actividad'),
                'descripcion' => $this->input->post('descripcion'),
                'fech_asig' => $this->input->post('fech_asig'),
                'fech_lim' => $this->input->post('fech_lim'),
                'area' => $this->input->post('area'),
                'id_usu_asignado' => $this->input->post('id_usu_asignado'),
                'id_usu_que_asigno' => $this->input->post('id_usu_que_asigno')
            );

            $result = $this->Actividad_model->add_actividad($data);

            if ($result['success']) {
                $data['success'] = true;
                $this->load->view('agregar_actividad', $data);
                header("refresh:3; url=" . site_url('actividades'));
            } else {
                $data['error'] = $result['message'];
                $data['success'] = false;
                $this->load->view('agregar_actividad', $data);
            }
        }
    }

    public function editar($id) {
        // Asegúrate de que `get_actividad` devuelva un array
        $data['actividad'] = $this->Actividad_model->get_actividad($id);
        
        // Asegúrate de que `get_empleados` y `get_supervisores` devuelvan arrays
        $data['empleados'] = $this->Usuario_model->get_empleados();
        $data['supervisores'] = $this->Usuario_model->get_supervisores();
        
        // Verifica si `$data['actividad']` es un array
        if (!is_array($data['actividad'])) {
            show_error('Los datos de la actividad no se han cargado correctamente.');
            return;
        }
        
        // Verifica si `$data['empleados']` y `$data['supervisores']` son arrays
        if (!is_array($data['empleados']) || !is_array($data['supervisores'])) {
            show_error('Los datos de empleados o supervisores no se han cargado correctamente.');
            return;
        }
        
        $this->load->view('editar_actividad', $data);
    }    
    
    

    public function actualizar() {
        $this->form_validation->set_rules('actividad', 'Actividad', 'required');
        $this->form_validation->set_rules('fech_asig', 'Fecha asignada', 'required');
        $this->form_validation->set_rules('fech_lim', 'Fecha límite', 'required');
        $this->form_validation->set_rules('area', 'Área', 'required');
        $this->form_validation->set_rules('id_usu_asignado', 'Asignado', 'required');
        $this->form_validation->set_rules('id_usu_que_asigno', 'Asignó', 'required');
    
        $id_act = $this->input->post('id_act');
    
        if ($this->form_validation->run() == FALSE) {
            $this->editar($id_act);
        } else {
            $data = array(
                'actividad' => $this->input->post('actividad'),
                'descripcion' => $this->input->post('descripcion'),
                'fech_asig' => $this->input->post('fech_asig'),
                'fech_lim' => $this->input->post('fech_lim'),
                'area' => $this->input->post('area'),
                'id_usu_asignado' => $this->input->post('id_usu_asignado'),
                'id_usu_que_asigno' => $this->input->post('id_usu_que_asigno')
            );
    
            $result = $this->Actividad_model->update_actividad($id_act, $data);
    
            if ($result['success']) {
                $data['success'] = true;
                $this->load->view('editar_actividad', $data);
                header("refresh:3; url=" . site_url('actividades'));
            } else {
                $data['error'] = $result['message'];
                $data['success'] = false;
                $this->load->view('editar_actividad', $data);
            }
        }
    }
    

    public function eliminar($id) {
        $this->Actividad_model->delete_actividad($id);
        redirect('actividades');
    }
}
