<?php
header('Content-Type: text/html; charset=ISO-8859-1');
error_reporting(-1);
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_PARSE);
set_time_limit (0);
ini_set('post_max_size', '1024M');
ini_set('upload_max_filesize', '1024M');
session_start();
session_cache_limiter("nocache");
date_default_timezone_set("America/Mexico_City");
$title   ="Administraci&oacute;n Amivtac";
$exito = 0;
if(trim(strtolower($_SERVER['SERVER_NAME'])) == "localhost"){
	$path_web = "http://localhost/amivtac/spanelWeb/";
	//$path_sis = "c:/xampp/htdocs/soyfuncionalmx/panel/";
	//$path_sys = "c:/xampp/htdocs/soyfuncionalmx/panel/";
	$path_sis = "/opt/lampp/htdocs/soyfuncionalmx/panel/";
	$path_sys = "/opt/lampp/htdocs/soyfuncionalmx/panel/";

	$exito    = 1;
}

if(trim(strtolower($_SERVER['SERVER_NAME'])) == "www.logaritmia.com"){
	$path_web = "http://www.logaritmia.com/spanelWeb/";
	$path_sis = "/home/logaritm/public_html/spanelWeb/";
	$path_sys = "/home/logaritm/public_html/spanelWeb/";
	$exito    = 1;
}
if($exito == 1){
	$path_sys   = $path_sis;
	$path_cla   = $path_sis."clases/";
	$path_int   = $path_sis."interfaces/";
	$path_lib   = $path_web."lib/";
	$path_css   = $path_web."css/";
	$path_js    = $path_web."js/";
	$path_img   = $path_web."imagenes/";
	$path_Wfiles= $path_web."downFiles/";
	$path_files = $path_sis."downFiles/";
	$filesameA  = explode('/',$_SERVER['SCRIPT_FILENAME']);
	$fileName   = $filesameA[count($filesameA) - 1 ];
	include_once("BDconfig.php");
	$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
}
else{
	die("<br><br><p align='center'>P&aacute;gina en mantenimiento</p></br><br>");
}
?>