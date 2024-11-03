<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosticos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('diagnostico');
    }

    public function agregar_diagnostico() {
        //var_dump($this->input->post()); exit;
        foreach ($this->input->post('id_pat') as $pat) {
           $datos = array(
                'CON_ID'     =>  $this->input->post('id_con'),
                'PAT_ID'     =>  $pat
            ); 
           $id = $this->diagnostico->agregar_dig($datos);
        }
        //$id = $this->diagnostico->agregar_dig($datos);
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
