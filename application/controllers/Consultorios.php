<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultorios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('consultorio');
    }
    public function index()
    {
        $data['listado'] = $this->consultorio->listar();
        $this->load->view('consultorios', $data);
    }
    public function nuevo()
    {
        $datos = array(
            'COS_CODIGO'  =>  $this->input->post('codigo'),
            'COS_NRO'     =>  $this->input->post('nro'),
            'COS_DESC'    =>  $this->input->post('desc'),
            'COS_ESTADO'  =>  $this->input->post('estado')
        );
        $id = $this->consultorio->nuevo($datos);
        if ( $id > 0 ) {
            echo true;
        } else {
            echo false;
        }
    }
	public function datos($id){
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');	
			$datos = $this->consultorio->datos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
	 		show_404();
	 	}
	}
    public function modificar()
    {
        $id = $this->input->post('id');
		$data = array(
            'COS_CODIGO'  =>  $this->input->post('codigo'),
            'COS_NRO'     =>  $this->input->post('nro'),
            'COS_DESC'    =>  $this->input->post('desc'),
            'COS_ESTADO'  =>  $this->input->post('estado')
        );
		if($this->consultorio->modificar($id,$data)==true){
			echo true;
		}else{
			echo false;
		}
    }

    public function eliminar()
    {
        $id = $this->input->post('id');
		echo $this->consultorio->eliminar($id);
    }
}
