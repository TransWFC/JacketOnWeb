<?php
class Supervisor_model extends CI_Model {

    public function get_status($id_usu) {
        $this->db->select('estatus');
        $this->db->from('usuarios');
        $this->db->where('id_usu', $id_usu);
        $query = $this->db->get();

        if ($query->num_rows() === 1) {
            return $query->row()->estatus;
        } else {
            return NULL;
        }
    }

    public function update_status($id_usu, $new_status) {
        $this->db->set('estatus', $new_status);
        $this->db->where('id_usu', $id_usu);
        return $this->db->update('usuarios');
    }
}
?>
