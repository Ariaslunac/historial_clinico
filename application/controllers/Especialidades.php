<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('especialidad');
    }
    public function index()
    {
        $data['listado'] = $this->especialidad->listar();
        $this->load->view('especialidades', $data);
    }
    public function nuevo()
    {
        $datos = array(
            'ESP_CODIGO'  =>  $this->input->post('codigo'),
            'ESP_NOMBRE'  =>  $this->input->post('nombre'),
            'ESP_DESC'    =>  $this->input->post('desc'),
			'ESP_COSTO'   =>  $this->input->post('costo'),
            'ESP_ESTADO'  =>  $this->input->post('estado')
        );
        $id = $this->especialidad->nuevo($datos);
        if ( $id > 0 ) {
            echo true;
        } else {
            echo false;
        }
    }
	public function datos($id){
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');	
			$datos = $this->especialidad->datos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
	 		show_404();
	 	}
	}
    public function modificar()
    {
        $id = $this->input->post('id');
		$data = array(
            'ESP_CODIGO'  =>  $this->input->post('codigo'),
            'ESP_NOMBRE'  =>  $this->input->post('nombre'),
            'ESP_DESC'    =>  $this->input->post('desc'),
			'ESP_COSTO'   =>  $this->input->post('costo'),
            'ESP_ESTADO'  =>  $this->input->post('estado')
        );
		if($this->especialidad->modificar($id,$data)==true){
			echo true;
		}else{
			echo false;
		}
    }

    public function eliminar()
    {
        $id = $this->input->post('id');
		echo $this->especialidad->eliminar($id);
    }
}
