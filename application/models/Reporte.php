<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reporte extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function consultas($fei,$fef,$cod,$esp,$per,$con,$hor,$id=null)
    {
        $this->db->select('*');
        $this->db->from('consultas C');   
		$this->db->join('pacientes P','C.PAC_ID=P.PAC_ID');
		$this->db->join('designacion D','C.DES_ID=D.DES_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('personal R','D.PER_ID=R.PER_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($id!=null){
			$this->db->where("C.CON_ID",$id);
		}else{
			if($fei!=null){ $this->db->where("CON_FECHA >=",$fei); } else { $this->db->where("CON_FECHA >=",date("Y-m-d"));}
			if($fef!=null){ $this->db->where("CON_FECHA <=",$fef); } else { $this->db->where("CON_FECHA <=",date("Y-m-d"));}
			if($cod!=0){ $this->db->where("PAC_CODIGO",$cod); }
			if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
			if($per!=0){ $this->db->where("D.PER_ID",$per); }
			if($con!=0){ $this->db->where("D.COS_ID",$con); }
			if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
		}
		$this->db->where("CON_ESTADO",1);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function pacientes($fei,$fef,$cod,$esp,$per,$con,$hor,$id=null)
    {
        $this->db->select('*');
        $this->db->from('consultas C');   
		$this->db->join('pacientes P','C.PAC_ID=P.PAC_ID');
		$this->db->join('designacion D','C.DES_ID=D.DES_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('personal R','D.PER_ID=R.PER_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($id!=null){
			$this->db->where("C.CON_ID",$id);
		}else{
			if($fei!=null){ $this->db->where("CON_FECHA >=",$fei); } else { $this->db->where("CON_FECHA >=",date("Y-m-d"));}
			if($fef!=null){ $this->db->where("CON_FECHA <=",$fef); } else { $this->db->where("CON_FECHA <=",date("Y-m-d"));}
			if($cod!=0){ $this->db->where("PAC_CODIGO",$cod); }
			if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
			if($per!=0){ $this->db->where("D.PER_ID",$per); }
			if($con!=0){ $this->db->where("D.COS_ID",$con); }
			if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
		}
		$this->db->where("CON_ESTADO",1);
        $query = $this->db->get();
        return $query->result();
    }
	
	public function archivos($id){
		$this->db->select('*');
		$this->db->from('archivos');
		$this->db->where('CON_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return null;
		}	
	}
	
	public function signos_vitales($id){
		$this->db->select('*');
		$this->db->from('signos_vitales');
		$this->db->where('CON_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}
	
	public function estudios($id){
		$this->db->select('*');
		$this->db->from('estudios E');
		$this->db->join('laboratorios L','E.LAB_ID=L.LAB_ID');
		$this->db->where('CON_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return null;
		}	
	}
	
	public function diagnostico($id){
		$this->db->select('*');
		$this->db->from('diagnostico D');
		$this->db->join('patologias P','D.PAT_ID=P.PAT_ID');
		$this->db->where('CON_ID', $id);
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return null;
		}	
	}
	
	public function personal($cod,$esp,$con,$hor,$id=null)
    {
        $this->db->select('*');
        $this->db->from('personal P');   
		$this->db->join('designacion D','P.PER_ID=D.PER_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($id!=null){
			$this->db->where("P.PER_ID",$id);
		} else {
			if($cod!=0){ $this->db->where("PER_CODIGO",$cod); }
			if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
			if($con!=0){ $this->db->where("D.COS_ID",$con); }
			if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
		}
        $query = $this->db->get();
        return $query->result();
    }

}
