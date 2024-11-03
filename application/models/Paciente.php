<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paciente extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->order_by('PAC_NOMBRE', 'ASC');
        $this->db->from('pacientes');    
        $query = $this->db->get();
        return $query->result();
    }

    public function nuevo($datos)
    {
        $this->db->insert('pacientes', $datos);
        return $this->db->insert_id();
    }
	
	public function datos($id){
		$this->db->select('*');
		$this->db->from('pacientes');
		$this->db->where('PAC_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}

    public function modificar($id, $datos)
    {
        $this->db->where('PAC_ID', $id);
        if ($this->db->update('pacientes', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $this->db->where('PAC_ID', $id);
        if ($this->db->delete('pacientes')) {
            return true;
        } else {
            return false;
        }
    }

}
