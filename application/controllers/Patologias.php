<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patologias extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('patologia');
		$this->load->model('especialidad');

	}
	public function index()
	{
		redirect(base_url().'patologias/listar');
	}

	public function listar()
	{
		$data['patologias'] = $this->patologia->listar_patologias();
		$data['especialidades'] = $this->especialidad->listar();
		$this->load->view('patologias/patologias', $data);
	}

	public function nuevo()
	{
//		var_dump($this->input->post());
		$datos = array(
			'ESP_ID'		=>	$this->input->post('especialidad'),
			'PAT_NOMBRE'	=>	$this->input->post('nombre'),
			'PAT_DESC'		=>	$this->input->post('descripcion')
		);

		$id = $this->patologia->agregar($datos);
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
			'PAT_NOMBRE'	=>	$this->input->post('nombre'),
			'PAT_DESC'		=>	$this->input->post('descripcion')
		);

//		$id = $this->cita->agregar($datos);
		if ( $this->patologia->actualizar($id, $datos) ) {
			echo true;
		} else {
			echo false;
		}
	}

	public function datos($id)
	{
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');
			$datos = $this->patologia->datos_patologia($id);
			echo json_encode($datos);
		}else{ //else this ajax request
			show_404();
		}
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		echo $this->patologia->borrar($id);
	}
}
