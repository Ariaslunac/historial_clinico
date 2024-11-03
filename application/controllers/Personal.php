<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('persona');
		$this->load->model('especialidad');
	}
	public function index()
	{
		redirect(base_url().'personal/listar');
	}

	public function listar()
	{
		$data['personas'] = $this->persona->listar_personal();
		$data['especialidades'] = $this->especialidad->listar();
		$this->load->view('personal/listado_personal', $data);
	}

	public function nuevo()
	{
//		var_dump($this->input->post());
		$datos = array(
			'ESP_ID'		=>	$this->input->post('especialidad'),
			'PER_CODIGO'	=>	$this->input->post('codigo'),
			'PER_NOMBRE'	=>	$this->input->post('nombre'),
			'PER_PATERNO'	=>	$this->input->post('paterno'),
			'PER_MATERNO'	=>	$this->input->post('materno'),
			'PER_CI'		=>	$this->input->post('cedula'),
			'PER_FECHAN'	=>	$this->input->post('fecha_nacimiento'),
			'PER_TELEFONO'	=>	$this->input->post('telefono'),
			'PER_EMAIL'		=>	$this->input->post('correo'),
			'PER_DIRECCION'	=>	$this->input->post('direccion'),
			'PER_TIPO'		=>	$this->input->post('tipo'),
			'PER_DESC'		=>	$this->input->post('descripcion'),
			'PER_FOTO'		=>	$this->input->post('foto')
		);

		$id = $this->persona->agregar($datos);
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
			'PER_CODIGO'	=>	$this->input->post('codigo'),
			'PER_NOMBRE'	=>	$this->input->post('nombre'),
			'PER_PATERNO'	=>	$this->input->post('paterno'),
			'PER_MATERNO'	=>	$this->input->post('materno'),
			'PER_CI'		=>	$this->input->post('cedula'),
			'PER_FECHAN'	=>	$this->input->post('fecha_nacimiento'),
			'PER_TELEFONO'	=>	$this->input->post('telefono'),
			'PER_EMAIL'		=>	$this->input->post('correo'),
			'PER_DIRECCION'	=>	$this->input->post('direccion'),
			'PER_TIPO'		=>	$this->input->post('tipo'),
			'PER_DESC'		=>	$this->input->post('descripcion'),
			'PER_FOTO'		=>	$this->input->post('foto')
		);

//		$id = $this->cita->agregar($datos);
		if ( $this->persona->actualizar($id, $datos) ) {
			echo true;
		} else {
			echo false;
		}
	}

	public function datos($id)
	{
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');
			$datos = $this->persona->datos_persona($id);
			echo json_encode($datos);
		}else{ //else this ajax request
			show_404();
		}
	}

	public function eliminar()
	{
		$id = $this->input->post('id');
		echo $this->persona->borrar($id);
	}

	public function upload_imagen()
	{
		$carpeta_img_personal = "./assets/fotografias/personal/";
		$extension = pathinfo($_FILES['fotografia']['name'], PATHINFO_EXTENSION);
		$nombreArchivo=isset($_FILES['fotografia']['name'])?date('YmdHis').'.'.$extension:null;
		$nombreTemporal=isset($_FILES['fotografia']['tmp_name'])?$_FILES['fotografia']['tmp_name']:null;

		$rutaArchivo = $carpeta_img_personal . $nombreArchivo;
		// guardando icono
		if ( rename($nombreTemporal,$rutaArchivo) ) {
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('foto' => $nombreArchivo)));
		} else {
			$this->output->set_status_header(401);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('foto' => "error")));
		}
	}
}
