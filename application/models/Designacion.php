<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designacion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar_designaciones()
    {
        $this->db->from('designacion des');
        $this->db->join('especialidades esp', 'des.ESP_ID=esp.ESP_ID');
        $this->db->join('personal per', 'des.PER_ID=per.PER_ID');
        $this->db->join('consultorio cos', 'des.COS_ID=cos.COS_ID');
        $this->db->join('horario hor', 'des.HOR_ID=hor.HOR_ID');
        $query = $this->db->get();
        return $query->result();
    }

    public function datos_designacion($id)
    {
        $this->db->from('designacion');
        $this->db->where('DES_ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function agregar($datos)
    {
        $this->db->insert('designacion', $datos);
        return $this->db->insert_id();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('DES_ID', $id);
        if ($this->db->update('designacion', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id)
    {
        $this->db->where('DES_ID', $id);
        if ($this->db->delete('designacion')) {
            return true;
        } else {
            return false;
        }
    }
}