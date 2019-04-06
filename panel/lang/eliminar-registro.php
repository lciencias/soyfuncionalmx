<?php
include_once("includeAjax.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
//include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$array = array();
if(isset($_POST) && ((int)$_POST['id'] > 0) && ((int) $_POST['idModulo'] > 0) ){
	include_once ($_SESSION['pathCla']."Comunes.class.php");
	include_once ($_SESSION['pathCla']."Slider.class.php");
	include_once ($_SESSION['pathCla']."Cargo.class.php");
	include_once ($_SESSION['pathCla']."Coordinador.class.php");
	include_once ($_SESSION['pathCla']."Presidente.class.php");
	include_once ($_SESSION['pathCla']."Socio.class.php");
	include_once ($_SESSION['pathCla']."Acuerdo.class.php");
	include_once ($_SESSION['pathCla']."Evento.class.php");
	include_once ($_SESSION['pathCla']."Revista.class.php");
	include_once ($_SESSION['pathCla']."Comite.class.php");
		
	switch((int)$_POST['idModulo']){
		case 1:
			$slide = new Slider ($db,$_SESSION,$_POST,$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $slide->obtenExito(),'msg' => $slide->obtenMensaje(), 'url' => "banner-lista.php");
			break;
		case 2:
			$cargo = new Cargo ($db,$_SESSION,$_POST,$_POST['id'],$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $cargo->obtenExito(),'msg' => $cargo->obtenMensaje(), 'url' => "mesa-lista.php");
			break;
		case 3:
			$coordinador = new Coordinador ($db,$_SESSION,$_POST,$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $coordinador->obtenExito(),'msg' => $coordinador->obtenMensaje(), 'url' => "md-coordinadores-lista.php");
			break;
		case 4:
			$presidente = new Presidente($db,$_SESSION,$_POST,$_POST['id'],$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $presidente->obtenExito(),'msg' => $presidente->obtenMensaje(), 'url' => "expres-lista.php");
			break;
		case 5:
			$socio = new Socio($db,$_SESSION,$_POST,$_POST['id'],$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $socio->obtenExito(),'msg' => $socio->obtenMensaje(), 'url' => "sociosh-lista.php");
			break;
		case 6:
			$acuerdo = new Acuerdo($db,$_SESSION,$_POST,$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $acuerdo->obtenExito(),'msg' => $acuerdo->obtenMensaje(), 'url' => "acuerdos-lista.php");
			break;
		case 7:
			$evento = new Evento($db,$_SESSION,$_POST,$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $evento->obtenExito(),'msg' => $evento->obtenMensaje(), 'url' => "evento-lista.php");
			break;
		case 8:
			$revista = new Revista($db,$_SESSION,$_POST,$_POST['id'],$_POST['id'],Comunes::DELETE);
			$array = array('exito' => $revista->obtenExito(),'msg' => $revista->obtenMensaje(), 'url' => "revista-lista.php");
			break;
		case 9:
			$comite = new Comite($db,$_SESSION,$_POST,$_POST['id'], Comunes::DELETE);
			$array = array('exito' => $comite->obtenExito(),'msg' => $comite->obtenMensaje(), 'url' => "ct-amivtac-lista.php");
			break;
				
	}
}
die(json_encode($array));
?>