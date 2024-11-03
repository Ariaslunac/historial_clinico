<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar_personal()
    {
        $this->db->from('personal');
        $query = $this->db->get();
        return $query->result();
    }

    public function agregar($datos)
    {
        $this->db->insert('personal', $datos);
        return $this->db->insert_id();
    }

    public function datos_persona($id)
    {
        $this->db->from('personal');
        $this->db->where('PER_ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('PER_ID', $id);
        if ($this->db->update('personal', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id)
    {
        $this->db->where('PER_ID', $id);
        if ($this->db->delete('personal')) {
            return true;
        } else {
            return false;
        }
    }
}