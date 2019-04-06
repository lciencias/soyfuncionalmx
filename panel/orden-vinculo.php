<?php
include_once("includeAjax.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
$db = new Conexion($_dbhost, $_dbuname, $_dbpass, $_dbname, $_port);
$array = array();
$exito = 0;
$msg = "Error: por favor consulte al administrador";
if(isset($_POST) && ((int)$_POST['id'] > 0) && ((int) $_POST['valor'] > 0) ){
	$upd = "UPDATE vinculo SET orden = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' limit 1;";
	if($db->sql_query($upd)){
		$exito = 1;
		$msg = "Ok: Se ha ordenado el vinculo.";		
	}		
}
$array = array('exito' => $exito,'msg' => $msg);
die(json_encode($array));
?>