<?php  
class Login extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}
		
	public function Validar($user,$pass){
		$sp = "EXEC sp_Login '".$user."', '".$pass."'";
		$query = $this->db->query($sp);
		$result = $query->result_array();
		if($result){
			return $result;
		}
		else{
			return "0";
		}
	}
	public function  Log_Out($id){
		$this->db->query("EXEC sp_logout ".$id);
	}
	
}