<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnostico extends CI_Model
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
    public function listar_p($id)
    {
        // $this->db->from('patologias pat');
        // $this->db->join('especialidades esp', 'pat.ESP_ID=esp.ESP_ID');
        // $query = $this->db->get();
        // return $query->result();


        $this->db->select('*');
        $this->db->from('patologias pat');
        $this->db->join('diagnostico d', 'd.PAT_ID=pat.PAT_ID');
        $this->db->join('consultas c', 'c.CON_ID=d.CON_ID'); 
        $this->db->where('d.CON_ID', $id);        
        $query = $this->db->get();
        return $query->result();
    }

    public function listar_pato($id)
    {
        $this->db->from('diagnostico dig');
        $this->db->join('consultas con', 'con.CON_ID=dig.CON_ID');
        $this->db->join('patologias pat', 'pat.PAT_ID=dig.PAT_ID');
         $this->db->where('dig.CON_ID', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function datos_patologia($id)
    {
        $this->db->from('diagnostico');
        $this->db->where('DIA_ID', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function agregar_dig($datos)
    {
        $this->db->insert('diagnostico', $datos);
        return $this->db->insert_id();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('DIA_ID', $id);
        if ($this->db->update('diagnostico', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function borrar($id)
    {
        $this->db->where('DIA_ID', $id);
        if ($this->db->delete('diagnostico')) {
            return true;
        } else {
            return false;
        }
    }
}
   