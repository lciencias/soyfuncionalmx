<?php
include_once("includeAjax.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$array = array();
if(isset($_POST) && (trim($_POST['id']) != "")){
	include_once ($_SESSION['pathCla']."Comunes.class.php");
	include_once ($_SESSION['pathCla']."Evento.class.php");
	$evento = new Evento($db,$_SESSION,$_POST,Comunes::LISTAR,Comunes::MOSTRAR);
	$array = array('exito' => $evento->obtenExito(),'msg' => $evento->obtenMensaje(), 'url' => "evento-lista.php");
}
die(json_encode($array));
?>