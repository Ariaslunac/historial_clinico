<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratorios extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('laboratorio');
		$this->load->model('especialidad');

	}
	public function index()
	{
		redirect(base_url().'laboratorios/listar');
	}

	public function listar()
	{
		$data['laboratorios'] = $this->laboratorio->listar_laboratorios();
		$data['especialidades'] = $this->especialidad->listar();
		$this->load->view('laboratorios/laboratorios', $data);
	}

	public function nuevo()
	{
//		var_dump($this->input->post());
		$datos = array(
			'ESP_ID'		=>	$this->input->Post('especialidad'),
			'LAB_NOMBRE'	=>	$this->input->post('nombre'),
			'LAB_DESC'		=>	$this->input->post('descripcion')
		);

		$id = $this->laboratorio->agregar($datos);
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
			'LAB_NOMBRE'	=>	$this->input->post('nombre'),
			'LAB_DESC'		=>	$this->input->post('descripcion')
		);

//		$id = $this->cita->agregar($datos);
		if ( $this->laboratorio->actualizar($id, $datos) ) {
			echo true;
		} else {
			echo false;
		}
	}

	public function datos($id)
	{
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');
			$datos = $this->laboratorio->datos_laboratorio($id);
			echo json_encode($datos);
		}else{ //else this ajax request
			show_404();
		}
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		echo $this->laboratorio->borrar($id);
	}
}
