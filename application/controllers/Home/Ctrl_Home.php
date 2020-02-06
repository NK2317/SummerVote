<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	//Ensamblador de la vista principal de bienvenida
	public function index()
	{
		
			$this->load->view('Templates/Header');
			$this->load->view('SuperAdmin/Menu');
			$this->load->view('HomeFolder/Home');
			$this->load->view('Modales/Modal_Exit');
			$this->load->view('Templates/Footer');
	}

}
