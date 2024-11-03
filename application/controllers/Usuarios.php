<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario');
    }
    public function index()
    {
        $data['listado'] = $this->usuario->listar();
		$data['listadop'] = $this->usuario->listar_personal();
        $this->load->view('usuarios', $data);
    }
    public function nuevo()
    {
        $datos = array(
            'PER_ID'   =>  $this->input->post('personal'),
            'USU_CODIGO'  =>  $this->input->post('usuario'),
            'USU_CLAVE'       =>  md5($this->input->post('pasword')),
            'USU_TIPO'  =>  $this->input->post('tipo')
        );
        $id = $this->usuario->nuevo($datos);
        if ( $id > 0 ) {
            echo true;
        } else {
            echo false;
        }
    }
	public function datos($id){
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');	
			$datos = $this->usuario->datos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
	 		show_404();
	 	}
	}
    public function modificar()
    {
        $id = $this->input->post('id');
		if($this->input->post('paswordc')!=$this->input->post('pasword')){
			$clave = md5($this->input->post('pasword'));
		} else {
			$clave = $this->input->post('pasword');	
		}
		$data = array(
            'PER_ID'      =>  $this->input->post('personal'),
            'USU_CODIGO'  =>  $this->input->post('usuario'),
            'USU_CLAVE'   =>  $clave,
            'USU_TIPO'    =>  $this->input->post('tipo')
        );
		if($this->usuario->modificar($id,$data)==true){
			echo true;
		}else{
			echo false;
		}
    }

    public function eliminar()
    {
        $id = $this->input->post('id');
		echo $this->usuario->eliminar($id);
    }
}
