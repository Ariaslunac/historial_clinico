<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consultorio extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->order_by('COS_NRO', 'ASC');
        $this->db->from('consultorio');    
        $query = $this->db->get();
        return $query->result();
    }

    public function nuevo($datos)
    {
        $this->db->insert('consultorio', $datos);
        return $this->db->insert_id();
    }
	
	public function datos($id){
		$this->db->select('*');
		$this->db->from('consultorio');
		$this->db->where('COS_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}

    public function modificar($id, $datos)
    {
        $this->db->where('COS_ID', $id);
        if ($this->db->update('consultorio', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $this->db->where('COS_ID', $id);
        if ($this->db->delete('consultorio')) {
            return true;
        } else {
            return false;
        }
    }

}
