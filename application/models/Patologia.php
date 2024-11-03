<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patologia extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar_patologias()
    {
        $this->db->from('patologias pat');
        $this->db->join('especialidades esp', 'pat.ESP_ID=esp.ESP_ID');
        $query = $this->db->get();
        return $query->result();
    }

    public function datos_patologia($id)
    {
        $this->db->from('patologias');
        $this->db->where('PAT_ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function agregar($datos)
    {
        $this->db->insert('patologias', $datos);
        return $this->db->insert_id();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('PAT_ID', $id);
        if ($this->db->update('patologias', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id)
    {
        $this->db->where('PAT_ID', $id);
        if ($this->db->delete('patologias')) {
            return true;
        } else {
            return false;
        }
    }
}