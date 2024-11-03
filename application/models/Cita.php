<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar_citas()
    {
        $this->db->from('citas cit');
        $this->db->join('designacion des', 'des.DES_ID=cit.DES_ID');
        $this->db->join('pacientes pac', 'pac.PAC_ID=cit.PAC_ID');
        $query = $this->db->get();
        return $query->result();
    }

    public function datos_cita($id)
    {
        $this->db->from('citas cit');
        $this->db->join('designacion des', 'cit.DES_ID=des.DES_ID');
        $this->db->where('CIT_ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function agregar($datos)
    {
        $this->db->insert('citas', $datos);
        return $this->db->insert_id();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('CIT_ID', $id);
        if ($this->db->update('citas', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id)
    {
        $this->db->where('CIT_ID', $id);
        if ($this->db->delete('citas')) {
            return true;
        } else {
            return false;
        }
    }

    public function turnos($esp)
    {
        $this->db->select('*');
        $this->db->from('horario hor');
        $this->db->join('designacion des', 'hor.HOR_ID=des.HOR_ID');
        $this->db->join('personal per', 'des.PER_ID=per.PER_ID');
        $this->db->join('consultorio con', 'des.COS_ID=con.COS_ID');
        $this->db->where('des.ESP_ID', $esp);
        $query = $this->db->get();
        return $query->result();
    }
}