<?php
include_once ("Comunes.class.php");
class Slider extends Comunes{

	private $db;
	public $session;
	private $data;
	private $idImagen;
	private $idImagenMovil;
	private $opc;
	private $mensaje;
	private $exito;
	private $registros;
	private $tabla;
	private $buffer;
	private $total;
	
	function __construct($db,$session,$data,$idImagen,$opc,$idImagenMovil){
		parent::__construct($session);
		$this->db = $db;
		$this->session  = $session;
		$this->data     = $data;
		$this->idImagen = $idImagen;
		$this->idImagenMovil = $idImagenMovil;
		$this->opc      = $opc;
		$this->mensaje  = "";
		$this->buffer   = "";
		$this->tabla    = "slide";
		$this->exito    = Comunes::LISTAR;
		$this->registros= array();
		$this->total    = 0;
		switch($this->opc){
			case Comunes::LISTAR:
				$this->listarSlider();
				break;
			case Comunes::SAVE:
				$this->guardaSlider();
				break;
			case Comunes::EDIT:
				$this->editaSlider();
				$this->totalCategoria();
				
				break;
			case Comunes::UPDATE:
				$this->actualizaSlide();
				break;
			case Comunes::DELETE:
				$this->eliminaSlide();
				break;				
			case Comunes::WEB:
				$this->listarSlideWebArray();
				$this->listarSlideWeb();
				break;
			case Comunes::ORDENAR:
				$this->ordenaRegstro();
				break;
		}
	}
	
	private function listarSlideWeb(){
		$contador = 0;	
		$arraySlide = array();
		try{
			$sql = "SELECT a.idslide,a.nombre,DATE_FORMAT(a.fecha, '%d-%m-%y %H:%i:%s') AS fecha,
					a.texto_corto,a.texto_grande,a.texto_boton,a.url,b.web,c.web as webMovil
					FROM ".$this->tabla." as a 
					JOIN imagen as b ON b.idimagen = a.idImagen
					JOIN imagen as c ON c.idimagen = a.idimagenMovil
					WHERE a.status = ".Comunes::SAVE." ORDER BY a.orden ASC;";
		
			$res = $this->db->sql_query ($sql);
			if ($this->db->sql_numrows ($res) > 0){
				$this->buffer = '<div class="carousel-inner" role="listbox">';
				while(list($idslide,$nombre,$fecha,$texto_corto,$texto_grande,$texto_boton,$url,$web,$webMovil) = $this->db->sql_fetchrow($res)){
					$class = "";
					if($contador == 0){
						$class = "active";
					}					
					$this->buffer .='<!-- Slide '.($contador + 1 ).' -->
						<div class="item '.$class.'">';
					if((int) $this->movil() > 1 && trim($webMovil) != ''){
						$this->buffer .='<img src="'.$webMovil.'" alt="" />';
					}
					else{
						$this->buffer .='<img src="'.$web.'" alt="" />';
					}
					$this->buffer .='<div class="carousel-caption">              
	                			<div class="tp-caption sfl title-slide center" data-x="40" data-y="210" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">
									'.trim($texto_corto).'
								</div>
	                			<div class="tp-caption sfr desc-slide center" data-x="40" data-y="140" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">
									'.trim($texto_grande).'
								</div>
	                			<div class="tp-caption sfr desc-slide center" data-x="40" data-y="180" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut"></div>';
								if(trim($url) != ''){
									$this->buffer .='<div class="tp-caption sfr flat-button-slider" data-x="40" data-y="320" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="'.$url.'" target="new">'.trim($texto_boton).'</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>';
								}
	            		$this->buffer .='</div>
	          			</div>';
					$arraySlide[$contador] = $class;
					$contador++;
				}
				$this->buffer .='<ol class="carousel-indicators">';
				foreach($arraySlide as $id => $clase){
					$this->buffer .='<li data-target="#myCarousel" data-slide-to="'.$id.'" class="'.$clase.'"></li>';
				}
				$this->buffer .='</ol>';
				$this->buffer .='</div>';
			}
		}catch (\Exception $e){
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}	
	}
	
	
	private function listarSlideWebArray(){
		$this->registros = array();
		try{
			$sql = "SELECT a.idslide,a.nombre,DATE_FORMAT(a.fecha, '%d-%m-%y %H:%i:%s') AS fecha, a.orden,
					a.texto_corto,a.texto_grande,a.texto_boton,a.url,a.idImagen,b.web,c.web as webMovil
					FROM ".$this->tabla." as a 
					JOIN imagen as b ON b.idimagen = a.idImagen 
					JOIN imagen as c ON c.idimagen = a.idimagenMovil
					WHERE a.status = ".Comunes::SAVE." ORDER BY a.orden ASC;";			
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
	
	private function totalCategoria(){
		try{
			$sql = "SELECT a.idslide
					FROM ".$this->tabla." as a 
					WHERE a.status= ".Comunes::SAVE.";";
			$res = $this->db->sql_query ($sql);
			$this->total = $this->db->sql_numrows ($res);			
		}catch (\Exception $e){
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}				
	}
	
	private function listarSlider(){
		$this->registros = array();
		try{
			$sql = "SELECT idslide,nombre,DATE_FORMAT(fecha, '%d-%m-%y %H:%i:%s') AS fecha, orden 
					FROM ".$this->tabla." WHERE status = 1 ORDER BY idslide desc;";
			$res = $this->db->sql_query ($sql);	
			if ($this->db->sql_numrows ($res) > 0){
				$this->total = $this->db->sql_numrows ($res);
				while($row = $this->db->sql_fetchass($res)){
					$this->registros[] = $row;
				}				
			}
			$this->total++;
		}catch (\Exception $e){
			$this->writeLog($e->getMessage(), Comunes::ERROR);
		}
		
	}
	private function guardaSlider(){
		$fecha = date("Y-m-d H:i:s");
		try{
			$this->mensaje = "La imagen no se cargo correctamente";
			if((int)$this->idImagen > 0){			
				foreach($this->data as $key => $value){
					$this->data[$key] = $this->eliminaCaracteresInvalidos($value);
				}
				$ins = "INSERT INTO ".$this->tabla."(nombre, fecha, status, orden, texto_corto, texto_grande, texto_boton, url, idImagen,idimagenMovil)
						VALUES ('".$this->data['nombre']."','".$fecha."','".Comunes::SAVE."','".$this->data['orden']."','".$this->data['texto_corto']."','".$this->data['texto_grande']."','".$this->data['texto_boton']."','".$this->data['url']."','".$this->idImagen."','".$this->idImagenMovil."');";
				
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
	
	private function editaSlider(){
		$this->exito = -1;
		$id = (int)$this->data['id'];
		try{
			if($id > 0){
				$this->exito = 1;
				$sql = "SELECT a.idslide,a.nombre,DATE_FORMAT(a.fecha,'%d-%m-%y %H:%i:%s') AS fecha,a.texto_corto,a.texto_grande,
						a.texto_boton,a.url,a.idimagen,b.archivo,b.ruta,b.web,c.web as webMovil,a.orden 
						FROM ".$this->tabla." a 
								LEFT JOIN imagen b on b.idimagen = a.idimagen 
								LEFT JOIN imagen c on c.idimagen = a.idimagenMovil
								WHERE a.idslide = '".$id."' LIMIT 1;";
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
	
	private function actualizaSlide(){
		$fecha = date("Y-m-d H:i:s");
		$anadir = "";
		try{
			$this->mensaje = "La imagen no se cargo correctamente";
			if((int)$this->idImagen > 0){
				foreach($this->data as $key => $value){
					$this->data[$key] = $this->eliminaCaracteresInvalidos($value);
				}
				$ins = "UPDATE ".$this->tabla." set 
							nombre = '".$this->data['nombre']."',
							fecha  = '".$fecha."', 
							status = '".Comunes::SAVE."',
							orden  = '".$this->data['orden']."', 
							texto_corto  = '".$this->data['texto_corto']."',
							texto_grande = '".$this->data['texto_grande']."', 
							texto_boton  ='".$this->data['texto_boton']."',
							url          ='".$this->data['url']."',
							idimagenMovil = '".($this->idImagenMovil + 0)."',
							idImagen     ='".$this->idImagen."' WHERE idslide = '".$this->data['idslide']."' limit 1;";
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
	
	private function eliminaSlide(){
		$this->exito   = Comunes::LISTAR;
		$this->mensaje = Comunes::ERROR; 
		if((int) $this->idImagen > 0){
			try{
				$upd = "UPDATE ".$this->tabla." SET status = '". Comunes::EDIT."' WHERE idslide = '".$this->idImagen."' LIMIT 1;";
				$this->db->sql_query($upd);
				$this->exito = Comunes::SAVE;
				$this->mensaje = Comunes::MSGSUCESS;
			}catch(\Exception $e){
				$this->mensaje = $e->getMessage();
				$this->writeLog($e->getMessage(), Comunes::ERROR);
			}
		}
	}

	private function ordenaRegstro(){
		$id = (int) $this->data['id'];
		$valor = (int) $this->data['valor'];
		if($id > 0 && $valor > 0){
			try{
				$upd = "UPDATE ".$this->tabla." SET orden = '".$valor."' WHERE idslide= '".$id."' LIMIT 1;";
				$this->db->sql_query($upd);
				$this->exito = Comunes::SAVE;
				$this->mensaje = Comunes::MSGSUCESS;
			}catch(\Exception $e){
				$this->mensaje = $e->getMessage();
				$this->writeLog($e->getMessage(), Comunes::ERROR);
			}
		}	
	}
	
	private function movil(){
		$tablet_browser = 0;
		$mobile_browser = 0;
		$body_class = 'desktop';		
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$tablet_browser++;
			$body_class = "tablet";
		}		
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
			$body_class = "mobile";
		}		
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
			$body_class = "mobile";
		}
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
				'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
				'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
				'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
				'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
				'newt','noki','palm','pana','pant','phil','play','port','prox',
				'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
				'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
				'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
				'wapr','webc','winw','winw','xda ','xda-');
		
		if (in_array($mobile_ua,$mobile_agents)) {
			$mobile_browser++;
		}
		
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
			$mobile_browser++;
			//Check for tablets on opera mini alternative headers
			$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
				$tablet_browser++;
			}
		}
		$esMovil = 0;
		if ($tablet_browser > 0) {
			$esMovil = 2;
		}
		else if ($mobile_browser > 0) {
			$esMovil = 3;
		}
		else {
			$esMovil = 1;		
		}
		return $esMovil;
	}
	
	
	function obtenExito(){
		return $this->exito;
	}

	function obtenMensaje(){
		return $this->mensaje;
	}
	
	function obtenRegistros(){
		return $this->registros;
	}
	
	function obtenBuffer(){
		return $this->buffer;
	}
	function obtenTotal(){
		return $this->total;
	}
}
?>