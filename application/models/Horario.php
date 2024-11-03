<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Horario extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->order_by('HOR_ID', 'ASC');
        $this->db->from('horario');    
        $query = $this->db->get();
        return $query->result();
    }

    public function nuevo($datos)
    {
        $this->db->insert('horario', $datos);
        return $this->db->insert_id();
    }
	
	public function datos($id){
		$this->db->select('*');
		$this->db->from('horario');
		$this->db->where('HOR_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}

    public function modificar($id, $datos)
    {
        $this->db->where('HOR_ID', $id);
        if ($this->db->update('horario', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $this->db->where('HOR_ID', $id);
        if ($this->db->delete('horario')) {
            return true;
        } else {
            return false;
        }
    }

}
