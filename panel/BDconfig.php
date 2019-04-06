<?php
if(trim(strtolower($_SERVER['SERVER_NAME'])) == "localhost"){
	$_dbhost   = "localhost";
	$_dbuname  = "root";
	$_dbpass   = "";
	$_dbname   = "soyfuncionalmx";
	$_port     = "3306";
}
if(trim(strtolower($_SERVER['SERVER_NAME'])) == "www.logaritmia.com"){
	$_dbhost   = "localhost";
	$_dbuname  = "logaritm_amivtac";
	$_dbpass   = "Vallesoswa990205pwd!";
	$_dbname   = "logaritm_amivtac";
	$_port     = "3306";
	
}
if(trim(strtolower($_SERVER['SERVER_NAME'])) == "www.amivtac.org"){
	$_dbhost   = "localhost";
	$_dbuname  = "amivtac_sitioweb";
	$_dbpass   = "Am1vt4c#_W3b";
	$_dbname   = "amivtac_sitioweb";
	$_port     = "3306";	
}
?>