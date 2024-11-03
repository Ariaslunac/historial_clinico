<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function agregar_archivos($datos)
    {
        $this->db->insert('archivos', $datos);
        return $this->db->insert_id();
    }

    public function listar($id)
    {
        $this->db->select('*');
        $this->db->from('archivos arc');
        $this->db->join('consultas con', 'con.CON_ID=arc.CON_ID'); 
        $this->db->where('arc.CON_ID', $id);        
        $query = $this->db->get();
        return $query->result();
    }

}