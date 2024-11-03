<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Designaciones extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('designacion');
		$this->load->model('especialidad');
		$this->load->model('persona');
		$this->load->model('consultorio');
		$this->load->model('horario');

	}
	public function index()
	{
		redirect(base_url().'designaciones/listar');
	}

	public function listar()
	{
		$data['designaciones'] = $this->designacion->listar_designaciones();
		$data['especialidades'] = $this->especialidad->listar();
		$data['personal'] = $this->persona->listar_personal();
		$data['consultorios'] = $this->consultorio->listar();
		$data['horarios'] = $this->horario->listar();
		$this->load->view('designaciones/designaciones', $data);
	}

	public function nuevo()
	{
		$datos = array(
			'ESP_ID'		=>	$this->input->post('especialidad'),
			'PER_ID'		=>	$this->input->post('personal'),
			'COS_ID'		=>	$this->input->post('consultorio'),
			'HOR_ID'		=>	$this->input->post('horario'),
			'DES_OBS'		=>	$this->input->post('observaciones')
		);

		$id = $this->designacion->agregar($datos);
		if ( $id > 0 ) {
			echo true;
		} else {
			echo false;
		}
	}

	public function modificar()
	{
		$id = $this->input->post('id');
		$datos = array(
			'ESP_ID'		=>	$this->input->post('especialidad'),
			'PER_ID'		=>	$this->input->post('personal'),
			'COS_ID'		=>	$this->input->post('consultorio'),
			'HOR_ID'		=>	$this->input->post('horario'),
			'DES_OBS'		=>	$this->input->post('observaciones')
		);

//		$id = $this->cita->agregar($datos);
		if ( $this->designacion->actualizar($id, $datos) ) {
			echo true;
		} else {
			echo false;
		}
	}

	public function datos($id)
	{
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');
			$datos = $this->designacion->datos_designacion($id);
			echo json_encode($datos);
		}else{ //else this ajax request
			show_404();
		}
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		echo $this->designacion->borrar($id);
	}
}
