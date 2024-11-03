<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('signo');
    }

    public function agregar_signos() {
        $datos = array(
            'CON_ID'       =>  $this->input->post('id_con'),
            'SIG_PULSO'    =>  $this->input->post('pulso'),
            'SIG_PESO'     =>  $this->input->post('peso'),
            'SIG_TALLA'    =>  $this->input->post('talla'),
            'SIG_PRE_SAN'  =>  $this->input->post('ps'),
            'SIG_FRE_CAR'  =>  $this->input->post('fc')
        );
        $id = $this->signo->agregar_signos($datos);
        if ( $id > 0 ) {
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'ok')));
        } else {
            $this->output->set_status_header(401);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'error')));
        }
    }


}
