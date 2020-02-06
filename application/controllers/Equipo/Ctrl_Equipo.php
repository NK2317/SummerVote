<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctrl_Equipo extends CI_Controller
{

	// Creación del Constructor
	public function __construct()
	{
		parent::__construct();
	}
	public function index(){
		$this->load->view('Templates/Header'); //va por default
		$this->load->view('SuperAdmin/Menu'); //elegir dependiendo el tipo de usuario
		$this->load->view('SuperAdmin/Equipo/Adm_Equipo'); //elegir dependiendo de función
		$this->load->view('Modales/Modal_Activar');
		$this->load->view('Modales/Modal_MotivoBaja');
		$this->load->view('Modales/Modal_Exit');
		$this->load->view('Templates/Footer'); //van por default
	}
	public function Registrar(){
		$this->load->view('Templates/Header'); //va por default
		$this->load->view('SuperAdmin/Menu'); //elegir dependiendo el tipo de usuario
		$this->load->view('SuperAdmin/Equipo/Reg_Equipo');
		$this->load->view('Modales/Modales_Mod_Reg'); //elegir dependiendo de función
		$this->load->view('Modales/Modal_Exit');
		$this->load->view('Templates/Footer'); //van por default
	}
	public function Modificar(){
		$this->load->view('Templates/Header'); //va por default
		$this->load->view('SuperAdmin/Menu'); //elegir dependiendo el tipo de usuario
		$this->load->view('SuperAdmin/Equipo/Mod_Equipo');
		$this->load->view('Modales/Modales_Mod_Reg'); //elegir dependiendo de función
		$this->load->view('Modales/Modal_Salir_SinGuardar');
		$this->load->view('Templates/Footer'); //van por default
	}
	public function Ver(){
		$this->load->view('Templates/Header'); //va por default
		$this->load->view('SuperAdmin/Menu'); //elegir dependiendo el tipo de usuario
		$this->load->view('SuperAdmin/Equipo/Det_Equipo');
		$this->load->view('Modales/Modal_Activar');
		$this->load->view('Modales/Modal_MotivoBaja'); //elegir dependiendo de función
		$this->load->view('Modales/Modal_Exit');
		$this->load->view('Templates/Footer'); //van por default
	}

}