<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pacientes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('paciente');
    }
    public function index()
    {
        $data['listado'] = $this->paciente->listar();
        $this->load->view('pacientes', $data);
    }
    public function nuevo()
    {
        $datos = array(
            'PAC_CODIGO'      =>  $this->input->post('codigo'),
            'PAC_NOMBRE'      =>  $this->input->post('nombre'),
            'PAC_PATERNO'     =>  $this->input->post('paterno'),
            'PAC_MATERNO'     =>  $this->input->post('materno'),
			'PAC_CI'          =>  $this->input->post('ci'),
			'PAC_FECHAN'      =>  $this->input->post('fechan'),
			'PAC_SEXO'        =>  $this->input->post('sexo'),
			'PAC_ECIVIL'      =>  $this->input->post('ecivil'),
			'PAC_OCUPACION'   =>  $this->input->post('ocupacion'),
			'PAC_TELEFONO'    =>  $this->input->post('telefono'),
			'PAC_DIRECCION'   =>  $this->input->post('direccion'),
			'PAC_RNOMBRE'     =>  $this->input->post('rnombre'),
			'PAC_RPARENTESCO' =>  $this->input->post('rparentesco'),
			'PAC_RTELEFONO'   =>  $this->input->post('rtelefono'),
			'PAC_ESTADO'      =>  $this->input->post('estado'),
        );
        $id = $this->paciente->nuevo($datos);
        if ( $id > 0 ) {
            echo true;
        } else {
            echo false;
        }
    }
	public function datos($id){
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');	
			$datos = $this->paciente->datos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
	 		show_404();
	 	}
	}
    public function modificar()
    {
        $id = $this->input->post('id');
		$data = array(
            'PAC_CODIGO'      =>  $this->input->post('codigo'),
            'PAC_NOMBRE'      =>  $this->input->post('nombre'),
            'PAC_PATERNO'     =>  $this->input->post('paterno'),
            'PAC_MATERNO'     =>  $this->input->post('materno'),
			'PAC_CI'          =>  $this->input->post('ci'),
			'PAC_FECHAN'      =>  $this->input->post('fechan'),
			'PAC_SEXO'        =>  $this->input->post('sexo'),
			'PAC_ECIVIL'      =>  $this->input->post('ecivil'),
			'PAC_OCUPACION'   =>  $this->input->post('ocupacion'),
			'PAC_TELEFONO'    =>  $this->input->post('telefono'),
			'PAC_DIRECCION'   =>  $this->input->post('direccion'),
			'PAC_RNOMBRE'     =>  $this->input->post('rnombre'),
			'PAC_RPARENTESCO' =>  $this->input->post('rparentesco'),
			'PAC_RTELEFONO'   =>  $this->input->post('rtelefono'),
			'PAC_ESTADO'      =>  $this->input->post('estado'),
        );
		if($this->paciente->modificar($id,$data)==true){
			echo true;
		}else{
			echo false;
		}
    }

    public function eliminar()
    {
        $id = $this->input->post('id');
		echo $this->paciente->eliminar($id);
    }
}
