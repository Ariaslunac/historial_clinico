<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('archivo');
    }
    public function index()
    {
        // $data['listado'] = $this->usuario->listar();
		$data['enlaceEst'] = $this->estudio->listar();
        $this->load->view('consulta/nuevo', $data);
    }
    public function upload_imagen() {
        $carpeta_fotos = "./assets/img/archivos/";
        if (!empty($_FILES)) {
            // extenion del archivo
            $extension = pathinfo($_FILES['nombre_archivo']['name'], PATHINFO_EXTENSION);

            // nuevo nombre
            $foto = date('YmdHis') . '.' . $extension;

            if(rename($_FILES['nombre_archivo']['tmp_name'], $carpeta_fotos . $foto)){
                $this->output->set_status_header(200);
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode(array('foto' => $foto)));
            }else{
                $this->output->set_status_header(401);
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode(array('foto' => "error")));
            }
        }
    }


    public function agregar_archivos() {
        $datos = array(
            'CON_ID'      =>  $this->input->post('id_con'),
            'ARC_FECHA'   =>  $this->input->post('arch_fecha'),
            'ARC_ARCHIVO' =>  $this->input->post('archi')
        );
        $id = $this->archivo->agregar_archivos($datos);
        if ($id > 0) {
            $arch = array(
                'id'              =>  $id,
                'archivo_fecha'   =>  $this->input->post('arch_fecha'),
                'archivo'         =>  $this->input->post('archi')
            );
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode(array(
                    'resp' => 'ok', 
                    'tabla' => 'archivos', 
                    'data' => $arch)));
        } else {
            $this->output->set_status_header(401);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'error')));
        }
    }


}
