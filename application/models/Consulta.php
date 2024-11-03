<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consulta extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        $this->db->select('*');
        $this->db->from('consultas con');
        $this->db->join('pacientes pac', 'pac.PAC_ID=con.PAC_ID');  
        $this->db->join('designacion des', 'des.DES_ID=con.DES_ID'); 
        $this->db->join('especialidades esp', 'esp.ESP_ID=des.ESP_ID');   
		if($this->session->userdata('tipo')>1){$this->db->where("PER_ID",$this->session->userdata('pid'));}
        $this->db->order_by('con.CON_FECHA', 'DESC');
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
        $this->db->join('personal per', 'per.PER_ID=des.PER_ID');
        $this->db->join('consultorio cos', 'cos.COS_ID=des.COS_ID');
        //$this->db->join('horario hor', 'hor.HOR_ID=des.HOR_ID');
        // $this->db->join('signos_vitales sig', 'sig.CON_ID=con.CON_ID');
        $this->db->where('con.CON_ID', $id);       
        $query = $this->db->get();
        return $query->row();
    }

    function guardar_consulta($datos) {
        $this->db->insert('consultas', $datos);
        return $this->db->insert_id();
    }

    public function actualizar($id, $datos)
    {
        $this->db->where('CON_ID', $id);
        if ($this->db->update('consultas', $datos)) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminar($id)
    {
        $this->db->where('CON_ID', $id);
        if ($this->db->delete('consultas')) {
            return true;
        } else {
            return false;
        }
    }

    public function modi($id, $datos)
    {
        $this->db->where('CON_ID', $id);
        if ($this->db->update('consultas', $datos)) {
            return true;
        } else {
            return false;
        }
    }


}    