<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('estudio');
    }
    public function index()
    {
        // $data['listado'] = $this->usuario->listar();
		$data['enlaceEst'] = $this->estudio->listar();
        $this->load->view('consulta/nuevo', $data);
    }

    public function agregar_estudios() {
        $datos = array(
            'CON_ID'     =>  $this->input->post('id_consulta'),
            'LAB_ID'     =>  $this->input->post('laboratorio'),
            'EST_FECHA'  =>  $this->input->post('est_fecha'),
            'EST_OBS'    =>  $this->input->post('est_obs'),
            'EST_ESTADO' =>  $this->input->post('estado_est')
        );
        $id = $this->estudio->agregar_est($datos);
        if ($id > 0) {
            $est = array(
                'id'              =>  $id,
                'laboratorio'     =>  $this->input->post('nombre_laboratorio'),
                'estudio_fecha'   =>  $this->input->post('est_fecha'),
                'observacion_est' =>  $this->input->post('est_obs'),
                'estado'          =>  $this->input->post('estado_estudio')
            );
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode(array(
                    'resp' => 'ok', 
                    'tabla' => 'estudios', 
                    'data' => $est)));
        } else {
            $this->output->set_status_header(401);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'error')));
        }
    }


}
