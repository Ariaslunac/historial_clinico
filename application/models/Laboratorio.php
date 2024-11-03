<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar_laboratorios()
    {
        $this->db->from('laboratorios lab');
        $this->db->join('especialidades esp', 'lab.ESP_ID=esp.ESP_ID');
        $query = $this->db->get();
        return $query->result();
    }

    public function datos_laboratorio($id)
    {
        $this->db->from('laboratorios');
        $this->db->where('LAB_ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function agregar($datos)
    {
        $this->db->insert('laboratorios', $datos);
        return $this->db->insert_id();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('LAB_ID', $id);
        if ($this->db->update('laboratorios', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id)
    {
        $this->db->where('LAB_ID', $id);
        if ($this->db->delete('laboratorios')) {
            return true;
        } else {
            return false;
        }
    }
}