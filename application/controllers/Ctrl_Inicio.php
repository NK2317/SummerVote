<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_Inicio extends CI_Controller {
	//carga la vista del login
	public function SuperAdmin()
	{  
        $this->load->view('Login/Login');
	}
}