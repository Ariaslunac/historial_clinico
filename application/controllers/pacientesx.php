<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pacientesx extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pacientex');
    }

    public function agregarPac()
    {
        $datos = array(
            'PAC_CODIGO'    =>  $this->input->post('cod'),
            'PAC_NOMBRE'    =>  $this->input->post('nombre'),
            'PAC_PATERNO'   =>  $this->input->post('paterno'),
            'PAC_MATERNO'   =>  $this->input->post('materno'),
            'PAC_CI'        =>  $this->input->post('ci'),
            'PAC_FECHAN'    =>  $this->input->post('fecha_nac'),
            'PAC_SEXO'      =>  $this->input->post('sexo'),
            'PAC_ECIVIL'    =>  $this->input->post('estado_civil'),
            'PAC_OCUPACION' =>  $this->input->post('ocupacion'),
            'PAC_TELEFONO'  =>  $this->input->post('tel'),
            'PAC_DIRECCION' =>  $this->input->post('dir'),
            'PAC_ESTADO'    =>  1
        );
        $id = $this->pacientex->nuevo($datos);
        if ( $id > 0 ) {
            $pac = array(
                'id'   =>  $id,
                'nom'  =>  $this->input->post('nombre')
            );
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array(
                'resp' => 'ok',
                'tabla' => 'paciente',
                'data' => $pac)));
        } else {
            $this->output->set_status_header(401);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'error')));
        }
    }
}    