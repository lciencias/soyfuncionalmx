<?php
include_once ("include.php");
include_once ($_SESSION ['pathSys']."BDconfig.php");
include_once ($_SESSION ['pathSys']."revisaSesion.php");
include_once ($_SESSION ['pathCla']."Conexion.class.php");
include_once ($_SESSION ['pathCla']."Comunes.class.php");
include_once ($_SESSION ['pathCla']."Usuario.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$registros = null;
if(isset($_POST) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['passwordS']) ){
	$usuario = new Usuario($db, $_SESSION,$_POST, $idImagen, Comunes::SAVE);
	if($usuario->obtenExito()){
		$_SESSION['msgSuccess'] = $usuario->obtenMensaje();
	}else{
		$_SESSION['msgError']   = $usuario->obtenMensaje();
	}
	header("Location: ".$_SESSION ['pathWeb']."usuarios-lista.php");
}else{
	$usuario = new Usuario($db, $_SESSION,$_POST, $idImagen,  Comunes::LISTAR);	
}
include_once ($_SESSION ['pathSys']. "headerAdmin.php");
?>	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper box-layout theme-1-active pimary-color-pink">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php require_once($_SESSION ['pathSys']."menuSuperior.php"); ?>
		</nav>		
		<!-- /Top Menu Items -->
		<div class="fixed-sidebar-left">
			<?php require_once($_SESSION ['pathSys']."menu.php"); ?>
		</div>
		<!-- /Left Sidebar Menu -->
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Usuarios</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
					  	<li><a href="<?=$_SESSION['pathWeb']?>admin.php">Inicio</a></li>
						<li><a href="<?=$_SESSION['pathWeb']?>usuarios-lista.php"><span>Usuarios</span></a></li>
						<li class="active"><span>Crear Usuarios</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
                <!-- Row -->
				<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormUsuario" autocomplete="off" data-toogle="validator" role="form">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Crear Usuario</h6>
												<hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Nombre Completo</label>
															<input type="text" id="name" name="name" tabindex="1" class="form-control required letras" placeholder="Nombre Completo" maxlength="80">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Correo Electr&oacute;nico</label>
															<input type="text" id="email" name="email" tabindex="2" class="form-control required email" placeholder="Correo Electr&oacute;nico" maxlength="100">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Contrase&ntilde;a</label>
															<input type="password" id="passwordS" name="passwordS" tabindex="3" class="form-control required alfa" placeholder="Contrase&ntilde;a" maxlength="20">
														</div>
													</div>
                                                    <div class="seprator-block"></div>                                                
												</div>                                       
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="nuevoUsuario" name="nuevoUsuario"> <i class="fa fa-check"></i> <span>Crear</span></button>
													<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="usuarios-lista.php">Cancelar</button>
													<div class="clearfix"></div>
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
		<?php 
		include_once($_SESSION ['pathSys']."footer.php");
		?>
		</div>
		<!-- /Main Content -->
    </div>
<?php 
include_once($_SESSION ['pathSys']."libreriasAdmin.php");
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
?>