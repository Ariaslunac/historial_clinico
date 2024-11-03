<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('consulta');
		$this->load->model('registro');
        $this->load->model('estudio');
        $this->load->model('laboratorio');
        $this->load->model('pacientex');
        $this->load->model('diagnostico');
        $this->load->model('designacion');
        $this->load->model('archivo');
		$this->load->model('cita');
		$this->load->model('especialidad');
		$this->load->model('paciente');
    }
    public function index()
    {
        $data['citas'] = $this->cita->listar_citas();
		$data['especialidades'] = $this->especialidad->listar();
		$data['pacientes'] = $this->paciente->listar();
		$data['enlacePaciente'] = $this->pacientex->listar();
		$data['listar'] = $this->registro->listar();
        $this->load->view('registros', $data);
    }

    public function nueva($id_con, $id_pac, $id_des)
    {
        $data['enlaceArchivo'] = $this->archivo->listar($id_con);
        $data['enlaceEstudio'] = $this->estudio->listar($id_con);
        $data['enlaceLab'] = $this->laboratorio->listar_laboratorios();
        $data['enlacePat'] = $this->diagnostico->listar_patologias();
        $data['enlaceDiagnostico'] = $this->diagnostico->listar_patologias();
        $data['des'] = $this->designacion->datos_designacion($id_des);
        $data['pac'] = $this->pacientex->datos($id_pac);
        $data['con'] = $this->consulta->get_consulta($id_con);
        $this->load->view('consulta/nueva', $data);
    }

    public function nueva_consulta() {
        $data = array(
            'PAC_ID'          => $this->input->post('paciente'),
            // 'DES_ID'          => "1",
            'DES_ID'          => $this->input->post('turno_horario'),
            'CON_FECHA'       => $this->input->post('con_fecha'),
            'CON_HORA'        => $this->input->post('con_hora')
        );
        $consulta_id = $this->consulta->guardar_consulta($data);
        if ( $consulta_id > 0 ) {
            echo true;
        } else {
            echo false;
        }
    }
	
	public function datos($id)
	{
		if($this->input->is_ajax_request()){
			$id  = $this->input->post('id');
			$datos = $this->registro->datos($id);
			echo json_encode($datos);
		}else{ //else this ajax request
			show_404();
		}
	}
	
	public function modificar()
	{
		$id = $this->input->post('id');
		$datos = array(
			'PAC_ID'          => $this->input->post('paciente'),
            // 'DES_ID'          => "1",
            'DES_ID'          => $this->input->post('turno_horario'),
            'CON_FECHA'       => $this->input->post('con_fecha'),
            'CON_HORA'        => $this->input->post('con_hora')
		);

//		$id = $this->cita->agregar($datos);
		if ( $this->registro->actualizar($id, $datos) ) {
			echo true;
		} else {
			echo false;
		}
	}

    public function modificar_consultas()
    {
        $id_con = $this->input->post('id_con');
        $datos_con = array(
            'CON_SINTOMAS'    => $this->input->post('con_sintoma'),
            'CON_DIAGNOSTICO' => $this->input->post('con_diagnostico'),
            'CON_TRATAMIENTO' => $this->input->post('con_tratamiento'),
            'CON_OBS'         => $this->input->post('con_observacion'),
            'CON_CITAN_FECHA' => $this->input->post('fecha_cita'),
            'CON_CITAN_HORA'  => $this->input->post('hora_cita')
        );
        if ( $this->consulta->actualizar($id_con, $datos_con) ) {
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'ok')));
        } else {
            $this->output->set_status_header(401);
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode(array('resp' => 'error')));
        }
    }

    public function eliminar()
    {
        $id = $this->input->post('id');
        echo $this->registro->eliminar($id);
    }
}
