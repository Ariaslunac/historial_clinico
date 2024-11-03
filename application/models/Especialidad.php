<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Especialidad extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->order_by('ESP_NOMBRE', 'ASC');
        $this->db->from('especialidades');    
        $query = $this->db->get();
        return $query->result();
    }

    public function nuevo($datos)
    {
        $this->db->insert('especialidades', $datos);
        return $this->db->insert_id();
    }
	
	public function datos($id){
		$this->db->select('*');
		$this->db->from('especialidades');
		$this->db->where('ESP_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}

    public function modificar($id, $datos)
    {
        $this->db->where('ESP_ID', $id);
        if ($this->db->update('especialidades', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $this->db->where('ESP_ID', $id);
        if ($this->db->delete('especialidades')) {
            return true;
        } else {
            return false;
        }
    }

}
