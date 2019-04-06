<?php
include_once ("Comunes.class.php");
class Usuario extends Comunes{

	private $db;
	public $session;
	private $data;
	private $idImagen;
	private $opc;
	private $mensaje;
	private $exito;
	private $registros;
	private $tabla;
	private $buffer;
	
	function __construct($db,$session,$data,$idImagen,$opc){
		parent::__construct($session);
		$this->db 		   = $db;
		$this->session     = $session;
		$this->data        = $data;
		$this->idImagen    = $idImagen;
		$this->opc         = $opc;
		$this->mensaje     = "";
		$this->buffer      = "";
		$this->tabla       = "users";
		$this->exito       = Comunes::LISTAR;
		$this->registros     = array();
		switch($this->opc){
			case Comunes::LISTAR:
				$this->listarUsuario();
				break;
			case Comunes::SAVE:
				$this->guardaUsuario();
				break;
			case Comunes::EDIT:
				$this->editaUsuario();
				break;
			case Comunes::UPDATE:
				$this->actualizaUsuario();
				break;
			case Comunes::DELETE:
				$this->eliminaUsuario();
				break;	
		}
	}
	
	private function listarUsuario(){
		$this->registros = array();
		try{
			$sql = "SELECT a.id,a.name,a.email,a.passwordS,
					DATE_FORMAT(a.created_at,'%d-%m-%Y %H:%i') as created_at,
					DATE_FORMAT(a.updated_at,'%d-%m-%Y %H:%i') AS updated_at 
					FROM ".$this->tabla." as a 
					WHERE a.activo = ".Comunes::SAVE." ORDER BY a.name;";
			$res = $this->db->sql_query ($sql);			
			if ($this->db->sql_numrows ($res) > 0){
				while($row = $this->db->sql_fetchass($res)){
					$this->registros[] = $row;
				}
			}
		}catch (\Exception $e){
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}		
	}
	
	
	private function guardaUsuario(){
		$fecha = date("Y-m-d H:i:s");
		try{
			$this->mensaje = "Los datos del usuario no se cargaron correctamente";
			if(count($this->data) > 0){			
				foreach($this->data as $key => $value){
					$this->data[$key] = $this->eliminaCaracteresInvalidos($value);
				}
				$ins = "INSERT INTO ".$this->tabla."(name,email,password,passwordS,created_at, activo, updated_at)
						VALUES ('".$this->data['name']."','".$this->data['email']."',
						PASSWORD('".$this->data['passwordS']."'),'".$this->data['passwordS']."',
						'".$fecha."',1,'".$fecha."');";				
				$this->db->sql_query($ins);
				$this->mensaje = Comunes::MSGSUCESS;
				$this->exito   = Comunes::SAVE;
			}
		}
		catch(\Exception $e){
			$this->mensaje = Comunes::MSGERROR;
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}	
	}
	
	private function editaUsuario(){
		$this->exito = -1;
		$id = (int)$this->data['id'];
		try{
			if($id > 0){
				$this->exito = 1;
				$sql = "SELECT a.id,a.name,a.email,a.passwordS,
						DATE_FORMAT(a.created_at,'%d-%m-%y %H:%i:%s') as created_at,
						DATE_FORMAT(a.updated_at,'%d-%m-%y %H:%i:%s') AS updated_at
						FROM ".$this->tabla." a 
						WHERE a.id = '".$id."' LIMIT 1;";
				$res = $this->db->sql_query ($sql);
				if ($this->db->sql_numrows ($res) > 0){
					$this->registros = $this->db->sql_fetchass($res);
				}			
			}
		}
		catch(\Exception $e){
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}		
	}
	
	
	private function actualizaUsuario(){
		$fecha = date("Y-m-d H:i:s");
		try{
			$this->mensaje = "Los datos del Usuario no se alamcenaron correctamente";
			if(count($this->data) > 0){
				foreach($this->data as $key => $value){
					$this->data[$key] = $this->eliminaCaracteresInvalidos($value);
				}
				$ins = "UPDATE ".$this->tabla." set ";
				$ins .= "name='".$this->data['name']."',
						email='".$this->data['email']."',
						passwordS='".$this->data['passwordS']."',
						password=PASSWORD('".$this->data['passwordS']."'),
						updated_at ='".$fecha."',
						activo ='". Comunes::SAVE."'
						WHERE id = '".$this->data['id']."' limit 1;";
				$this->db->sql_query($ins);
				$this->mensaje = Comunes::MSGSUCESS;
				$this->exito   = 1;
			}
		}
		catch(\Exception $e){
			$this->mensaje = Comunes::MSGERROR;
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}		
	}
	
	
	private function eliminaUsuario(){
		$this->exito   = Comunes::LISTAR;
		$this->mensaje = Comunes::ERROR; 
		if((int) $this->idImagen > 0){
			try{
				$upd = "UPDATE ".$this->tabla." SET activo = '". Comunes::EDIT."' WHERE id= '".$this->idImagen."' LIMIT 1;";
				$this->db->sql_query($upd);
				$this->exito = Comunes::SAVE;
				$this->mensaje = Comunes::MSGSUCESS;
			}catch(\Exception $e){
				$this->mensaje = $e->getMessage();
				$this->writeLog($e->getMessage(), Comunes::ERROR);
			}
		}
	}
	
	function obtenExito(){
		return $this->exito;
	}

	function obtenMensaje(){
		return $this->mensaje;
	}

	function obtenBuffer(){
		return $this->buffer;
	}
	
	function obtenRegistros(){
		return $this->registros;
	}
	
}
?>