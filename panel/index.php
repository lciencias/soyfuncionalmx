<?php
include_once("include.php");
include_once("BDconfig.php");
$usuario = $clave = "";
if(isset($_POST['usuario'])){
	$usuario = trim($_POST['usuario']);
}
if(isset($_POST['clave'])){
	$clave = trim($_POST['clave']);
}
include_once ($path_cla."Conexion.class.php");
include_once ($path_cla."Comunes.class.php");
$_SESSION ['msgError']   = "";
if ($usuario != "" && $clave != "") {			
	include_once ($path_cla . "ValidaUsuario.class.php");
	include_once ($path_cla . "Session.class.php");
	$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
	$objVal = new ValidaUsuario ( $db, $_REQUEST, $_SERVER, $_SESSION, $path_web );
	if ($objVal->obtenExito ()) {		
		
		$_SESSION ['userId'] 	 = $objVal->obtenIdUser ();
		$_SESSION ['userNm'] 	 = $objVal->obtenNmUser ();
		$_SESSION ['userEmail']  = $objVal->obtenEmailUser();
		$_SESSION ['pathWeb']  	 = $path_web;
		$_SESSION ['pathSys']    = $path_sis;
		$_SESSION ['pathLib']  	 = $path_lib;
		$_SESSION ['pathFile']	 = $path_files;
		$_SESSION ['pathCla']	 = $path_cla;
		$_SESSION ['pathImg']	 = $path_img;
		$_SESSION ['pathFileWeb']= $path_Wfiles;
		$_SESSION ['regs'] 		 = 100;
		$_SESSION ['page'] 		 = 1;
		$_SESSION ['folio'] 	 = 0;
		$_SESSION ['rol']   	 = 1;
		$_SESSION ['msgError']   = "";
		$_SESSION ['fechaMov']   = date("Y-m-d H:i:s");
		$_SESSION ['cerrarSesionMins']  = 15;
		$_SESSION ['msgWarning'] = "";
		$_SESSION ['msgSuccess'] = "";
		$_SESSION ['ip']    	 = $_SERVER['REMOTE_ADDR'];
		$obj_s 		   = new Session ( $db, $_SESSION, $_SERVER );
		$sesion_valida = $obj_s->Obten_Sesion ();
		$_SESSION ["session"] 	 = $sesion_valida;
		header ( "Location: " . $path_web . "admin.php" );
	} else {
		$_SESSION ['msgError']   =  $objVal->obtenMensaje ();
	}
}
include_once($path_sys ."header.php");
?>
<?php
  if(isset($_COOKIE['admin']))
  { 
    setcookie('admin', $_COOKIE['admin'] + 1, time() + 1095 * 24 * 60 * 60, "/"); 
    $mensaje = '';
  } 
  else 
  { 
    setcookie('admin', 1, time() + 1095 * 24 * 60 * 60, "/"); 
    $mensaje = ''; 
  } 
?>

<!--Preloader-->
<div class="preloader-it">
	<div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper box-layout pa-0">
	<!-- Main Content -->
	<div class="page-wrapper pa-0 ma-0 auth-page">
		<div class="container-fluid">
			<!-- Row -->
			<div class="table-struct full-width full-height">
				<div class="table-cell vertical-align-middle auth-form-wrap">
					<div class="auth-form  ml-auto mr-auto no-float">
						<?php 
						include_once($path_sys."alerts.php");
						?>
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<div class="mb-30" style="text-align:center;">
									<img class="brand-img mr-10" src="<?=$path_img?>logoAdmin.png" alt="Soy Funcional MX"/>									
									<h6 class="text-center nonecase-font txt-grey">Ingrese sus datos de acceso</h6>
								</div>	
								<div class="form-wrap">
										<form class="form-signin" role="form" method="post" action="index.php">
										<div class="form-group">
											<input type="text" class="form-control" tabIndex="1" required id="usuario" name="usuario" placeholder="Teclee su correo electr&oacute;nico" maxlength="50">
										</div>
										<div class="form-group">											
											<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="<?=$path_web?>recuperar_contrasena.php">&iquest;No recuerda su contrase&ntilde;a?</a>
											<div class="clearfix"></div>
												<input type="password" class="form-control" tabIndex="2" required id="clave" name="clave" placeholder="Teclee su Contrase&ntilde;a" maxlength="25">
										</div>
										<div class="form-group">
											<div class="checkbox checkbox-primary pr-10 pull-left">
												<input id="checkbox_2" required type="checkbox" tabIndex="3" >
												<label for="checkbox_2"> Mantenerme conectado</label>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="form-group text-center">
											<button type="submit" class="btn btn-primary" tabIndex="4" >Entrar</button>
										</div>
									</form>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
			<!-- /Row -->	
		</div>
	</div>
	<!-- /Main Content -->
</div>
<!-- /#wrapper -->
<?php
include_once("librerias.php");
?>