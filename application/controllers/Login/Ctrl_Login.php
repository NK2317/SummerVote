<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	//Inicio de la pagina
	public function index()
	{
		$this->load->view('Login/Login');//elegir dependiendo de función
	}

	//Valida la informacion de usuario
	public function valid_user_pass(){
		if(isset($_POST["User"]) && isset($_POST["Pass"])){
			$this->load->model('Login');
			$result = $this->Login->Validar($_POST["User"], $_POST["Pass"]);
			if($result[0]["Tipo_Usuario"] == "Administrador"){
				$data = array('Tipo_Usuario' =>$result[0]["Tipo_Usuario"], 'Id_Usuario' => $result[0]["Id_Usuario"], 'Area' => $result[0]["Id_Area"]);
				$this->session->set_userdata($data);
				echo json_encode($data);
			}
			else if($result[0]["Tipo_Usuario"] == "Solicitante"){
				$data = array('Tipo_Usuario' =>$result[0]["Tipo_Usuario"], 'Id_Usuario' => $result[0]["Id_Usuario"], 'Area' => $result[0]["Id_Area"]);
				$this->session->set_userdata($data);
				echo json_encode($data);
			}
			else{
				echo "0";
			}
		}
	}

	// cierra la sesion
	public function log_out(){
		$this->load->model('Login');
		$this->Login->Log_Out($this->session->userdata('Id_Usuario'));
		$this->session->unset_userdata(array('Tipo_Usuario','Id_Usuario','Area'));
		$this->session->sess_destroy();
	}
	
}
