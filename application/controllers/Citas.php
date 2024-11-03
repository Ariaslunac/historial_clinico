<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('cita');
		$this->load->model('persona');
		$this->load->model('especialidad');
		$this->load->model('paciente');
	}
	public function index()
	{
		redirect(base_url().'citas/listar');
	}

	public function listar()
	{
		$data['citas'] = $this->cita->listar_citas();
		$data['especialidades'] = $this->especialidad->listar();
		$data['pacientes'] = $this->paciente->listar();

		$this->load->view('citas/index', $data);
	}

	public function nuevo()
	{
//		var_dump($this->input->post());
		$datos = array(
			'DES_ID'		=>	$this->input->post('turno_horario'),
			'PAC_ID'		=>	$this->input->post('paciente'),
			'CIT_FECHA'		=>	$this->input->post('fecha'),
			'CIT_HORA'		=>	$this->input->post('hora'),
			'CIT_TIPO'		=>	$this->input->post('tipo'),
			'CIT_ESTADO'	=>	0
		);

		$id = $this->cita->agregar($datos);
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
				'DES_ID'		=>	$this->input->post('turno_horario'),
				'PAC_ID'		=>	$this->input->post('paciente'),
				'CIT_FECHA'		=>	$this->input->post('fecha'),
				'CIT_HORA'		=>	$this->input->post('hora'),
				'CIT_TIPO'		=>	$this->input->post('tipo'),
				'CIT_ESTADO'	=>	0
		);

//		$id = $this->cita->agregar($datos);
		if ( $this->cita->actualizar($id, $datos) ) {
			echo true;
		} else {
			echo false;
		}
	}

	public function datos($id)
	{
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');
			$datos = $this->cita->datos_cita($id);
			echo json_encode($datos);
		}else{ //else this ajax request
			show_404();
		}
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		echo $this->cita->borrar($id);
	}

	public function listar_turnos($especialidad)
	{
		$turnos = $this->cita->turnos($especialidad);
		if (count($turnos) > 0) {
			//con turnos y horarios
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('resp' => count($turnos), 'datos' => $turnos)));
		} else {
			// sin turon y horarios
			$this->output->set_status_header(401);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('resp' => 0, 'datos' => 'error')));
		}
	}


}
