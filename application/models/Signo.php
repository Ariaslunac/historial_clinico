<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function agregar_signos($datos)
    {
        $this->db->insert('signos_vitales', $datos);
        return $this->db->insert_id();
    }

    public function listar_s($id)
    {
        $this->db->select('*');
        $this->db->from('signos_vitales vit');
        $this->db->join('consultas c', 'c.CON_ID=vit.CON_ID');
        $this->db->where('vit.CON_ID', $id);        
        $query = $this->db->get();
        return $query->result();
    }

}