<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estadistica extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
	
	
	public function consultas($ges,$mes,$cod,$esp,$per,$con,$hor)
    {
        $this->db->select('*');
        $this->db->from('consultas C');   
		$this->db->join('pacientes P','C.PAC_ID=P.PAC_ID');
		$this->db->join('designacion D','C.DES_ID=D.DES_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('personal R','D.PER_ID=R.PER_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($ges!=null){ $this->db->where("YEAR(CON_FECHA)",$ges); }
		if($mes!=0){ $this->db->where("MONTH(CON_FECHA)",$mes); }
		if($cod!=0){ $this->db->where("PAC_CODIGO",$cod); }
		if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
		if($per!='0'){ $this->db->where("D.PER_ID",$per); }
		if($con!=0){ $this->db->where("D.COS_ID",$con); }
		if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
		$this->db->where("CON_ESTADO",1);
        $query = $this->db->get();
        //return $query->result();
		return $query->num_rows();
    }
	
	public function consultas_min(){
		$this->db->select('*');
		$this->db->from('consultas');
		$this->db->where("CON_ESTADO",1);
		$this->db->order_by('CON_FECHA', 'asc');
		$result=$this->db->get();
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return null;
		}	
	}
	
	public function consultas_p($ges,$mes,$cod,$esp,$per,$con,$hor,$pat)
    {
        $this->db->select('*');
        $this->db->from('diagnostico I');   
		$this->db->join('consultas C','I.CON_ID=C.CON_ID');
		$this->db->join('pacientes P','C.PAC_ID=P.PAC_ID');
		$this->db->join('designacion D','C.DES_ID=D.DES_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('personal R','D.PER_ID=R.PER_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($ges!=null){ $this->db->where("YEAR(CON_FECHA)",$ges); }
		if($mes!=0){ $this->db->where("MONTH(CON_FECHA)",$mes); }
		if($cod!=0){ $this->db->where("PAC_CODIGO",$cod); }
		if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
		if($pat!=0){ $this->db->where("I.PAT_ID",$pat); }
		if($per!=0){ $this->db->where("D.PER_ID",$per); }
		if($con!=0){ $this->db->where("D.COS_ID",$con); }
		if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
		$this->db->where("CON_ESTADO",1);
        $query = $this->db->get();
        //return $query->result();
		return $query->num_rows();
    }
	
	public function consultas_l($ges,$mes,$cod,$esp,$per,$con,$hor,$lab)
    {
        $this->db->select('*');
        $this->db->from('estudios S');   
		$this->db->join('consultas C','S.CON_ID=C.CON_ID');
		$this->db->join('pacientes P','C.PAC_ID=P.PAC_ID');
		$this->db->join('designacion D','C.DES_ID=D.DES_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('personal R','D.PER_ID=R.PER_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($ges!=null){ $this->db->where("YEAR(CON_FECHA)",$ges); }
		if($mes!=0){ $this->db->where("MONTH(CON_FECHA)",$mes); }
		if($cod!=0){ $this->db->where("PAC_CODIGO",$cod); }
		if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
		if($lab!=0){ $this->db->where("S.LAB_ID",$lab); }
		if($per!=0){ $this->db->where("D.PER_ID",$per); }
		if($con!=0){ $this->db->where("D.COS_ID",$con); }
		if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
		$this->db->where("CON_ESTADO",1);
        $query = $this->db->get();
        //return $query->result();
		return $query->num_rows();
    }
	
    /*public function esoecialidades($anio)
    {
        $this->db->select('*');
        $this->db->from('consultas C');   
		$this->db->join('pacientes P','C.PAC_ID=P.PAC_ID');
		$this->db->join('designacion D','C.DES_ID=D.DES_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('personal R','D.PER_ID=R.PER_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($anio!=null){ $this->db->where("YEAR(CON_FECHA)",$anio); }
        $query = $this->db->get();
        return $query->result();
    }
	
	public function personal($cod,$esp,$con,$hor)
    {
        $this->db->select('*');
        $this->db->from('personal P');   
		$this->db->join('designacion D','P.PER_ID=D.PER_ID');
		$this->db->join('especialidades E','D.ESP_ID=E.ESP_ID');
		$this->db->join('consultorio O','D.COS_ID=O.COS_ID');
		$this->db->join('horario H','D.HOR_ID=H.HOR_ID');
		if($cod!=0){ $this->db->where("PER_CODIGO",$cod); }
		if($esp!=0){ $this->db->where("D.ESP_ID",$esp); }
		if($con!=0){ $this->db->where("D.COS_ID",$con); }
		if($hor!=0){ $this->db->where("D.HOR_ID",$hor); }
        $query = $this->db->get();
        return $query->result();
    }*/

}
