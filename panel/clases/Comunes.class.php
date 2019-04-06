<?php
class Comunes {

    public $cadena_error;
    public $pathWeb;
    public $session;
    public $meses;
    public $mesesC;
    public $dias;
    public $anos;
    public $estados;
    const ERROR   = "Error";
    const DEBUG   = "Debug";
    const INFO    = "Info";
    const LISTAR  = 0;
    const SAVE    = 1;
    const EDIT    = 2;
    const UPDATE  = 3;
    const DELETE  = 4;
    const LISTAR2 = 5;
    const UPDATE2 = 6;
    const WEB     = 7;
    const AJAX    = 8;
    const WEB2    = 9;    
    const MOSTRAR = 10;
    const ORDENAR = 11;    
    const MSGERROR  = "Error inesperado favor de notificar al administrador.";
    const MSGSUCESS = "Operacion realizada correctamente.";
    
    
    function __construct($session) {
    	$this->session = $session;
    	$this->meses   = array(1 => 'Ene',2 => 'Feb',3 => 'Mar',4 => 'Abr',5 => 'May',6 => 'Jun',7 => 'Jul',8 => 'Ago',9 => 'Sep',10 => 'Oct',11 => 'Nov',12 => 'Dic');    	
    	$this->dias    = array('Monday' => 'Lunes','Tuesday' => 'Martes','Wednesday' => 'Mi�rcoles','Thursday' => 'Jueves','Friday' => 'Viernes','Saturday' => 'S�bado','Sunday' => 'Domingo');
    	$this->estados = array(1 => 'Aguascalientes',2 => 'Baja California',3 => 'Baja California Sur',
    						   4 => 'Campeche',5 => 'Coahuila',6 => 'Colima',7 => 'Chiapas',8 => 'Chihuahua',9 => 'Ciudad de M�xico',
    						   10 => 'Durango',11 => 'Guanajuato',12 => 'Guerrero',13 => 'Hidalgo',14 => 'Jalisco',15 => 'M�xico',
    						   16 => 'Michoac�n',17 => 'Morelos',18 => 'Nayarit',19 => 'Nuevo Le�n',20 => 'Oaxaca',21 => 'Puebla',
    						   22 => 'Quer�taro',23 => 'Quintana Roo',24 => 'San Luis Potos�',25 => 'Sinaloa',26 => 'Sonora',
    						   27 => 'Tabasco',28 => 'Tamaulipas',29 => 'Tlaxcala',30 => 'Veracruz',31 => 'Yucat�n',32 => 'Zacatecas');
    	
    	$this->anios();
        $this->cadena_error = "<script>location.href='../logout.php'</script>";
    }

    function eliminaCaracteresInvalidosBusqueda($valor) {
        $valor = str_replace("'", "", $valor);
        $valor = str_replace('"', '', $valor);
		$valor = trim($valor);
    	$valor = strip_tags($valor);
        $valor = addslashes($valor);
        $valor = utf8_decode($valor);
        return $valor;
    }
    
    
    function eliminaCaracteresInvalidos($valor) {
        $valor = str_replace("'", "", $valor);
        $valor = str_replace('"', '', $valor);
        //$valor = str_replace(' ', '', $valor);
        return $valor;
    }

    function limpiaCadenas($valor) {
        $valor = trim($valor);
    	$valor = strip_tags($valor);
        $valor = addslashes($valor);
        $valor = utf8_decode($valor);
        return $valor;
    }

	function anios(){
		$this->anos = array();
		$fin    = 2023;
		$inicio = 2009;
		for($i = $fin; $i>= $inicio; $i--){
			$this->anos[] = $i;
		}
		return $this->anos;
	}

    function Formato_Fecha($fecha) {
        return trim(substr($fecha, 8, 2) . "-" . substr($fecha, 5, 2) . "-" . substr($fecha, 0, 4));
    }

    function Formato_Fecha_Biz($fecha) {
    	return trim(substr($fecha, 6, 4) . "-" . substr($fecha, 3, 2) . "-" . substr($fecha, 0, 2));
    }
    
    function muestraAyuda($texto) {
        //return "&nbsp;&nbsp;<a href='#' class='ayudas' rel='popover' data-content='" . $texto . "' data-original-title='Ayuda SiSec'>&nbsp;?&nbsp;</a>";
        // return "&nbsp;&nbsp;<button type=\"button\" style=\"padding-top:0px;width:15px;height:17px;font-size:8px;\" class=\"btn-mio ayudas\" id=\"example\" data-toggle=\"popover\" title=\"Ayuda Sisec\" data-content=\"".$texto."\" >?</button>";
    }

    function LimpiaValores($datos) {
        if (count($datos) > 0) {
            foreach ($datos as $clave => $valor) {
                $datos [$clave] = utf8_decode(addslashes(trim($valor)));
            }
        }
        return $datos;
    }

    function procesando($opcion) {
        $posiciones = $width = $height = $top = 0;
        switch ($opcion) {
            case 1 :
                $posiciones = 100;
                $width = 135;
                $height = 115;
                $top = 180;
                break;
            case 2 :
                $posiciones = 860;
                $width = 135;
                $height = 115;
                $top = 180;
                break;
            case 3:
                $posiciones = 760;
                $width = 135;
                $height = 115;
                $top = 480;
                break;
            case 4:
                $posiciones = 760;
                $width = 135;
                $height = 115;
                $top = 340;
                break;
            case 5 :
                $posiciones = 860;
                $width = 135;
                $height = 115;
                $top = 340;
                break;
        }
        return "<div id='div_procesando' style='position: absolute;width:" . $width . "px;height:" . $height . "px;z-index: 1;left:" . $posiciones . "px;top:" . $top . "px;overflow: visible;'>
            	<img src='" . $this->path . "imagenes/load.gif' border='0'  id='procesando' ><br>
            	<span id='t_procesando' class='procesando'>Procesando.....</span>
          	</div>";
    }

    function GeneraOrden($consec, $ord, $_id, $catalogoId) {
        $consec = 25;
        $idDiv = "o-" . $catalogoId . "-" . $_id;
        $tmp = "";
        $combo = "<select name='" . $idDiv . "' id='" . $idDiv . "' requerid class='bootstrap-select ordenes' style='width:50px;'>";
        for ($i = 1; $i <= $consec; $i ++) {
            $tmp = "";
            if ($i == $ord) {
                $tmp = " selected ";
            }
            $combo .= "<option value='" . $i . "' " . $tmp . ">" . $i . "</option>";
        }
        $combo .= "</select>";
        return $combo;
    }


    function Genera_Archivo($bufferExcel,$path_sis) {
	$this->eliminaTemporales($path_sis);
        $num = rand(1, 100000);
        $archivo = "tmp/file" . $num . ".xls";
        $buffer_salida = '<br><a href="' . $archivo . '" target="_blank" class="btn btn-primary exportar"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Exportar a Excel</a>';
        $f1 = fopen($archivo, "w+");
        fwrite($f1, $bufferExcel);
        fclose($f1);
        return $buffer_salida;
    }

    function insertaBitacora($data, $session, $idProyecto, $idActividad, $idMeta, $idAvance, $estatus) {
        $ins = "INSERT INTO log_proyectos (user_id,proyecto_id,actividad_id,meta_id,avance_id,estatus,ip)
 			  VALUES ('" . $session['userId'] . "','" . $idProyecto . "','" . $idActividad . "','" . $idMeta . "','" . $idAvance . "','" . $estatus . "','" . $session['ip'] . "');";
        $res = $this->db->sql_query($ins) or die($this->cadena_error);
    }
    function detect(){
    	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
    	$os=array("WIN","MAC","LINUX");
    	$info['browser'] = "OTHER";
    	$info['os'] = "OTHER";
    	# buscamos el navegador con su sistema operativo
    	foreach($browser as $parent){
    		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
    		$f = $s + strlen($parent);
    		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
    		$version = preg_replace('/[^0-9,.]/','',$version);
    		if ($s){
    			$info['browser'] = $parent;
    			$info['version'] = $version;
    		}
    	}
    	# obtenemos el sistema operativo
    	foreach($os as $val){
    		if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
    			$info['os'] = $val;
    	}
    	# devolvemos el array de valores
    	return $info;
    }
  
    public function limpiaArchivo($nombre){
//    	$nombre = utf8_encode($nombre);
    	$nombre = str_replace(' ','_',$nombre);
    	$nombre = str_replace('�','A',$nombre);
    	$nombre = str_replace('�','E',$nombre);
    	$nombre = str_replace('�','I',$nombre);
    	$nombre = str_replace('�','O',$nombre);
    	$nombre = str_replace('�','U',$nombre);
    	$nombre = str_replace('�','N',$nombre);
    	$nombre = str_replace('�','a',$nombre);
    	$nombre = str_replace('�','e',$nombre);
    	$nombre = str_replace('�','i',$nombre);
    	$nombre = str_replace('�','o',$nombre);
    	$nombre = str_replace('�','p',$nombre);
    	$nombre = str_replace('�','�',$nombre);
    	return $nombre;
    	
    }
    public function writeLog($cadena,$tipo)
    {
    	$arch = fopen($this->session['pathSys']."log/log_".date("Ymd").".log", "a+");    
    	fwrite($arch, "[".date("Y-m-d H:i:s.u")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_X_FORWARDED_FOR']." - $tipo ] ".$cadena."\n");
    	fclose($arch);
    }
  
    
    public function debug($data){
    	echo"<pre>";
    	print_r($data);
    	echo"</pre>";
    	die();
    }
}
?>