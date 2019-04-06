<?php
include_once ("include.php");
include_once ($_SESSION ['pathSys']."BDconfig.php");
include_once ($_SESSION ['pathSys']."revisaSesion.php");
include_once ($_SESSION ['pathCla']."Conexion.class.php");
include_once ($_SESSION ['pathCla']."Comunes.class.php");
include_once ($_SESSION ['pathCla']."Presidente.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$registros = null;
if(isset($_POST) && isset($_POST['presidente'])){
	include_once ($_SESSION ['pathCla']."Imagen.class.php");
	include_once ($_SESSION ['pathCla']."Documento.class.php");	
	$idImagen = $idDocumento = 0;
	if( isset($_FILES) && isset($_FILES['fileImg']['name'])){
		$imagen   = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
		$idImagen = $imagen->obtenIdImagen();
	}
	if( isset($_FILES) && isset($_FILES['documento']['name'])){
		$documento = new Documento($db,$_SESSION,$_FILES,Comunes::SAVE);
		$idDocumento = $documento->obtenIdDocumento();
	}
	$presidente = new Presidente($db, $_SESSION,$_POST, $idImagen, $idDocumento, Comunes::UPDATE2);
	if($presidente->obtenExito()){
			$_SESSION['msgSuccess'] = $presidente->obtenMensaje();
	}else{
		$_SESSION['msgError'] = $presidente->obtenMensaje();
	}
	header("Location: ".$_SESSION ['pathWeb']."expres-lista.php");
}else{
	$presidente = new Presidente($db, $_SESSION,$_GET, $_GET['id'], $_GET['id'], Comunes::EDIT);
	$registros = $presidente->obtenRegistros();
	//echo"<pre>";print_r($registros );die();
}
include_once ($_SESSION ['pathSys']. "headerAdmin.php");
?>
	<!-- Preloader -->
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
		
		<!-- Left Sidebar Menu -->
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
						  <h5 class="txt-dark">Editar Expresidente</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?=$_SESSION ['pathWeb']?>admin.php">AMIVTAC</a></li>
							<li><a href="#"><span>Mesa Directiva</span></a></li>
                            <li><a href="<?=$_SESSION ['pathWeb']?>expres-lista.php"><span>Lista Mesa Directiva</span></a></li>
							<li class="active"><span>Presidente</span></li>						  
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
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormPresidente" autocomplete="off" data-toogle="validator" role="form">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Editar Expresidente</h6>
												<input type="hidden" id="idpresidente" name="idpresidente" value="<?=$registros['idpresidente']?>">
												<hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Nombre</label>
															<input type="text" id="presidente" name="presidente" class="form-control required letras" tabindex="1" placeholder="Nombre" value="<?=$registros['presidente']?>">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Periodo de presidencia</label>
															<input type="text" id="periodo" name="periodo" class="form-control required alfa" tabindex="2" placeholder="Periodo de presidencia" value="<?=$registros['periodo']?>">
														</div>
													</div>
                                                    <div class="form-group mb-30">
														<label class="control-label mb-10 text-left">Rese&ntilde;a Hist&oacute;rica</label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Cargar archivo</span> <span class="fileinput-exists btn-text">Cambiar</span>
																<input type="file" id="documento" name="documento" accept=".doc, .docx, .pdf" class="form-control" tabindex="3">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text">Eliminar</span></a> 
														</div>
													<?php 
														if((int) $registros['idresena'] > 0){
													?>
														<a href="<?=$registros['webDoc']?>" target="_blank" class="btn btn-success">Descargar</a>
													<?php 
													}													
													?>													
                                                    	<div class="seprator-block"></div>
														<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Fotografía</h6>
														<hr class="light-grey-hr"/>
														
												<div class="row">
													<div class="col-lg-12">
														<div class="img-upload-wrap">
															<?php if((int)$registros['idimagen'] > 0){
															?>
															<img class="img-responsive" src="<?=$registros['webImagen']?>" alt="upload_img">
															<?php 
															}else{
															?>
															<img class="img-responsive" src="<?=$_SESSION ['pathLib']?>dist/img/mesa-b.jpg" alt="upload_img">
															<?php 	
															}
															?>															 
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar nueva imagen</span>
															<input type="file" id="fileImg" name="fileImg" class="form-control upload" tabindex="4" accept="image/gif, image/jpeg , image/png" />
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>                                                
												</div>                                                
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="guardaExPresidente" name="guardaExPresidente"> <i class="fa fa-check"></i> <span>Guardar</span></button>
													<button type="button" class="btn btn-warning pull-leftcancelaRegistro" id="expres-lista.php">Cancelar</button>
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
				
				<!-- Footer -->
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