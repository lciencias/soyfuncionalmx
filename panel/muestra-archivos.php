<?php 
include_once("includeAjax.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$name = "";
if((int)$_REQUEST['idbiblioteca'] > 0 && (int) $_REQUEST['tipo'] > 0 && trim($_REQUEST['carpeta']) != ''){
	$carpeta = $_REQUEST['carpeta'];
	$sql = "SELECT nombreSo FROM biblioteca WHERE idbiblioteca = '".$_REQUEST['idbiblioteca']."' LIMIT 1; ";
	$res = $db->sql_query($sql);
	if($db->sql_numrows($res)>0){
		list($name) = $db->sql_fetchrow($res);
	}
	$path = $path_sis."file-manager/Biblioteca_PIARC/".$name."/".$carpeta;
	if((int)$_REQUEST['tipo'] == 1){
		$path = $path_sis."file-manager/Biblioteca_Amivtac/".$name."/".$carpeta;
	}
	$directorio = opendir($path); //ruta actual
	$buffer = "<select name='filename' id='filename' class='form-control carpetas'>";
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
		if ($archivo != "." && $archivo != ".." && !is_dir($path.$archivo)){
			$buffer.= "<option val='".$archivo."'>".$archivo."</option>";
		}
	}
	$buffer.= "</select>";
	$array = array('exito' => 1,'msg' => $buffer);
}
die(json_encode($array));
?>