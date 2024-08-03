<?php
class Actividad_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_actividades() {
        $this->db->select('a.id_act, a.actividad, a.descripcion, a.fech_asig, a.fech_lim, a.area,
                           CONCAT(u_asignado.nom_usu, \' \', u_asignado.app_usu) AS asignado_nombre,
                           CONCAT(u_asigno.nom_usu, \' \', u_asigno.app_usu) AS asigno_nombre');
        $this->db->from('actividades a');

        // Unir la tabla usuarios para obtener el nombre del usuario asignado
        $this->db->join('usuarios u_asignado', 'a.id_usu_asignado = u_asignado.id_usu', 'inner');

        // Unir la tabla usuarios para obtener el nombre del usuario que asignó
        $this->db->join('usuarios u_asigno', 'a.id_usu_que_asigno = u_asigno.id_usu', 'inner');

        // Ejecutar la consulta
        $query = $this->db->get();

        // Verificar si hay resultados
        return $query->num_rows() > 0 ? $query->result_array() : [];
    }

    public function get_actividad($id_act) {
        $query = $this->db->get_where('actividades', array('id_act' => $id_act));
        return $query->row_array();
    }

    public function add_actividad($data) {
        if ($this->db->insert('actividades', $data)) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Error al agregar la actividad.'];
        }
    }

    public function update_actividad($id, $data) {
        $this->db->where('id_act', $id);
        $result = $this->db->update('actividades', $data);
        if ($result) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Error al actualizar actividad'];
        }
    }

    public function delete_actividad($id_act) {
        if ($this->db->delete('actividades', array('id_act' => $id_act))) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Error al eliminar la actividad.'];
        }
    }
}
