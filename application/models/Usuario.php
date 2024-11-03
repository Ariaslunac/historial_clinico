<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->order_by('USU_CODIGO', 'ASC');
        $this->db->from('usuarios U');
		$this->db->join('personal P', 'P.PER_ID=U.PER_ID');
		/*$this->db->join('designacion D', 'D.DES_ID=U.DES_ID');  
        $this->db->join('personal P', 'P.PER_ID=D.PER_ID');   */  
        $query = $this->db->get();
        return $query->result();
    }
	
	public function listar_personal()
    {
        $this->db->order_by('PER_NOMBRE', 'ASC');
        $this->db->select('*');
		$this->db->from('personal'); 
		/*$this->db->from('designacion D');   
        $this->db->join('horario H', 'H.HOR_ID=D.HOR_ID');
        $this->db->join('personal P', 'P.PER_ID=D.PER_ID');
        $this->db->join('consultorio C', 'C.COS_ID=D.COS_ID'); */
        $query = $this->db->get();
        return $query->result();
    }

    public function nuevo($datos)
    {
        $this->db->insert('usuarios', $datos);
        return $this->db->insert_id();
    }
	
	public function datos($id){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('USU_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}

    public function modificar($id, $datos)
    {
        $this->db->where('USU_ID', $id);
        if ($this->db->update('usuarios', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $this->db->where('USU_ID', $id);
        if ($this->db->delete('usuarios')) {
            return true;
        } else {
            return false;
        }
    }
	
    public function validar($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('usuarios U');
		//$this->db->join('designacion D','U.DES_ID=D.DES_ID');
		$this->db->join('personal P','U.PER_ID=P.PER_ID');
        $this->db->where('USU_CODIGO', $user);
        $this->db->where('USU_CLAVE', $pass);
		
        $res = $this->db->get();
        if ($res->num_rows()>0) {
            $usr = $res->row();
            $data = array(
                'id'     =>  $usr->USU_ID,
				'pid'     =>  $usr->PER_ID,
                'codigo'   =>  $usr->USU_CODIGO,
				'nombre'   =>  $usr->PER_NOMBRE . " " . $usr->PER_PATERNO . " " . $usr->PER_MATERNO,
				'tipo'   =>  $usr->USU_TIPO,
				//'did'   =>  $usr->DES_ID,
                'login'  =>  true
            );
            $this->session->set_userdata($data);
            return $usr->USU_TIPO;
        } else {
            return false;
        }
    }
}
