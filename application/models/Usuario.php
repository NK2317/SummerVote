<?php
	/**
	*Modelo para procedimientos con la BD del modulo de usuario
	*/
	class Usuario extends CI_Model{
		function __construct(){
			parent:: __construct();
			$this->load->library("session");
		}
		//Metodo para insertar un nuevo usuario
		public function insertUsuario($curp, $nombre, $primer_apellido, $segundo_apellido, $tipo_usuario,$id_area,$jefe_inmediato,$correo,$password,$persona_id,$usuario_id){
			$sp = "EXEC InsertNewUsuario '".$curp."','".$nombre."','".
				$primer_apellido."','".
				$segundo_apellido."',".
				$tipo_usuario.",".
				$id_area.",".
				$jefe_inmediato.",'".
				$correo."','".
				$password."'";
			$query = $this->db->query($sp);
			$result = $query->result_array();
			if($result){
				return $result;
			}
		}

		public function showUsuarios(){
			$area = $this->session->userdata("Area");
			$sp = "EXEC SelectActiveUsuarios ".$area;
			$query = $this->db->query($sp);
			$result = $query->result_array();
			if($result){
				return $result;
			}
			else{
				return "0";
			}
		}

		public function showUsuariosWithId($id_usuario){
			$datos  = $this->db->query("EXEC SelectUsuarioConId ".$id_usuario);
			$result = $datos->result_array();
			if($result){
				return $result;
			}else{
				return "0";
			}
		}

		public function disable_Usuario($id_usuario){
			$sp = "EXEC DisableUsuario ".$id_usuario;
			$query = $this->db->query($sp);
			$result = $query->result_array();
			if($result){
				echo $result;
			}
			else{
				echo "0";
			}
		}

		public function showCat($cat){
			switch ($cat) {
				case 'Areas':
					$sp = "EXEC SelectActiveAreas";
					$query = $this->db->query($sp);
					$result = $query->result_array();
					if($result){
						return $result;
					}
					else{
						return "0";
					}
					break;
				case 'Jefes':
					$sp = "EXEC SelectActiveJefe";
					$query = $this->db->query($sp);
					$result = $query->result_array();
					if($result){
						return $result;
					}
					else{
						return "0";
					}
					break;
				case 'Tipo':
					$sp = "EXEC SelectActiveTiposUsuario";
					$query = $this->db->query($sp);
					$result = $query->result_array();
					if($result){
						return $result;
					}
					else{
						return "0";
					}
					break;
				default:
					echo "catalogo no reconocido";
					break;
			}
		}
		//Metodo para insertar un nuevo usuario
		public function updateUsuario($curp, $nombre, $primer_apellido, $segundo_apellido, $tipo_usuario,$id_area,$jefe_inmediato,$correo,$password,$persona_id,$usuario_id){
			if (($id_area == 0)&&($jefe_inmediato == 0)) {
				$id_area = 3;
				$jefe_inmediato = 3;
			}
			$sp = "EXEC UpdateUsuario '".$curp."','".
				$nombre."','".
				$primer_apellido."','".
				$segundo_apellido."',".
				$tipo_usuario.",".
				$id_area.",".
				$jefe_inmediato.",'".
				$correo."','".
				$password."',".
				"NULL,".
				$usuario_id;
			$query = $this->db->query($sp);
			$result = $query->result_array();
			if($result){
				return "1";
			}
			else{
				return "0";
			}
		}
	}