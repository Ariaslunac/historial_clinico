<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('horario');
    }
    public function index()
    {
        $data['listado'] = $this->horario->listar();
        $this->load->view('horarios', $data);
    }
    public function nuevo()
    {
        $datos = array(
            'HOR_TURNO'  =>  $this->input->post('turno'),
            'HOR_DESDE'     =>  $this->input->post('desde'),
            'HOR_HASTA'    =>  $this->input->post('hasta'),
            'HOR_LUNES'  =>  $this->input->post('lunes'),
			'HOR_MARTES'  =>  $this->input->post('martes'),
			'HOR_MIERCOLES'  =>  $this->input->post('miercoles'),
			'HOR_JUEVES'  =>  $this->input->post('jueves'),
			'HOR_VIERNES'  =>  $this->input->post('viernes'),
			'HOR_SABADO'  =>  $this->input->post('sabado'),
			'HOR_DOMINGO'  =>  $this->input->post('domingo')
        );
        $id = $this->horario->nuevo($datos);
        if ( $id > 0 ) {
            echo true;
        } else {
            echo false;
        }
    }
	public function datos($id){
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');	
			$datos = $this->horario->datos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
	 		show_404();
	 	}
	}
    public function modificar()
    {
        $id = $this->input->post('id');
		$data = array(
            'HOR_TURNO'  =>  $this->input->post('turno'),
            'HOR_DESDE'     =>  $this->input->post('desde'),
            'HOR_HASTA'    =>  $this->input->post('hasta'),
            'HOR_LUNES'  =>  $this->input->post('lunes'),
			'HOR_MARTES'  =>  $this->input->post('martes'),
			'HOR_MIERCOLES'  =>  $this->input->post('miercoles'),
			'HOR_JUEVES'  =>  $this->input->post('jueves'),
			'HOR_VIERNES'  =>  $this->input->post('viernes'),
			'HOR_SABADO'  =>  $this->input->post('sabado'),
			'HOR_DOMINGO'  =>  $this->input->post('domingo')
        );
		if($this->horario->modificar($id,$data)==true){
			echo true;
		}else{
			echo false;
		}
    }

    public function eliminar()
    {
        $id = $this->input->post('id');
		echo $this->horario->eliminar($id);
    }
}
