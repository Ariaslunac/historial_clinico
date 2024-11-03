<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario');
		//$this->load->model('personal_model');
	}
	public function index()
	{
		//$this->session->sess_destroy('login');
		//$this->load->view("admin_login");
		if($this->session->userdata('login')==true){
			//$data['listado']=$this->usuario_model->mostrar();
			//$data['min_p']=$alr;
			$this->load->view('index');	
		}else{
			$this->load->view("login");	
		}	
	}
	public function validar(){
		$usuario = $this->input->post('usuario');
		$pass 	 = md5($this->input->post('pass'));	
		if($usuario !="" && $pass!=""){		
			if($tip=$this->usuario->validar($usuario,$pass)){
				echo $tip;
			}else{
				echo "4";
			}
		}else{
			echo "5";	
		}
	}	
	public function salir(){
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	} 
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin', 'refresh');
	} 	
}
