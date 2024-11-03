<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estudio extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar($id)
    {
        $this->db->select('*');
        $this->db->from('estudios est');
        $this->db->join('laboratorios lab', 'lab.LAB_ID=est.LAB_ID'); 
        $this->db->join('consultas con', 'con.CON_ID=est.CON_ID'); 
        $this->db->where('est.CON_ID', $id);        
        $query = $this->db->get();
        return $query->result();
    }

    public function get_consulta($id)
    {
        $this->db->select('*');
        $this->db->from('consultas con');
        $this->db->join('pacientes pac', 'pac.PAC_ID=con.PAC_ID');  
        $this->db->join('designacion des', 'des.DES_ID=con.DES_ID'); 
        $this->db->join('especialidades esp', 'esp.ESP_ID=des.ESP_ID');
        $query = $this->db->get();
        return $query->row();
    }

    public function agregar_est($datos) 
    {
        $this->db->insert('estudios', $datos);
        return $this->db->insert_id();
    }


}    