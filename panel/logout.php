<?php
include_once("include.php");
include_once($path_cla."Conexion.class.php");
include_once($path_cla."Comunes.class.php");
include_once($path_cla."Logout.class.php");
$db 	   = new Conexion($_dbhost, $_dbuname, $_dbpass, $_dbname, $_port);
$objLogout = new Logout($db,$_SESSION,$_SERVER,$path_web);
session_destroy();
header("Location:  ".$path_web);
?>