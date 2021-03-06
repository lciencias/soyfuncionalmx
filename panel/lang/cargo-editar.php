<?php 
include_once ("include.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
if(isset($_GET) && isset($_GET['id']) && (int) $_GET['id'] > 0 ){
	include_once ($_SESSION['pathCla']."Comunes.class.php");
	include_once ($_SESSION['pathCla']."Cargo.class.php");
	$cargo = new Cargo ($db,$_SESSION,$_GET,Comunes::LISTAR,Comunes::LISTAR,Comunes::EDIT);
	$registro = $cargo->obtenRegistros();
}
if(isset($_POST) && isset($_POST['cargo']) && isset($_POST['nombre'])){
	include_once ($_SESSION['pathCla']."Comunes.class.php");
	include_once ($_SESSION['pathCla']."Imagen.class.php");
	include_once ($_SESSION['pathCla']."Documento.class.php");
	include_once ($_SESSION['pathCla']."Cargo.class.php");
	$idImagen = $idDocumento = 0;
	if( isset($_FILES) && isset($_FILES['fileImg']['name'])){
		$imagen   = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
		$idImagen = $imagen->obtenIdImagen();
	}
	if( isset($_FILES) && isset($_FILES['documento']['name'])){
		$documento = new Documento($db,$_SESSION,$_FILES,Comunes::SAVE);
		$idDocumento = $documento->obtenIdDocumento();
	}
	$cargo = new Cargo($db, $_SESSION,$_POST, $idImagen, $idDocumento, Comunes::UPDATE);
	if($cargo->obtenExito()){
		$_SESSION['msgSuccess'] = $cargo->obtenMensaje();
	}else{
		$_SESSION['msgError'] = $cargo->obtenMensaje();
	}
	header("Location: ".$_SESSION['pathWeb']."mesa-lista.php");
}
include_once ($_SESSION['pathSys']. "headerAdmin.php");
?>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper box-layout theme-1-active pimary-color-pink">
		<!-- /Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<?php require_once($_SESSION ['pathSys']."menuSuperior.php"); ?>
		</nav>				
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<?php require_once($_SESSION['pathSys']."menu.php"); ?>
		</div>
		<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Editar Cargo</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?=$_SESSION ['pathWeb']?>admin.php">AMIVTAC</a></li>
							<li><a href="#"><span>Mesa Directiva</span></a></li>
                            <li><a href="<?=$_SESSION ['pathWeb']?>mesa-lista.php"><span>Lista Mesa Directiva</span></a></li>
							<li class="active"><span>Editar Cargo</span></li>
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
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormCargo" autocomplete="off" data-toogle="validator" role="form">
												<input type="hidden" name="idcargo"  id="idcargo"  value="<?=$registro['idcargo']?>" />
												<input type="hidden" name="idimagen" id="idimagen" value="<?=$registro['idimagen']?>" /> 
												<input type="hidden" name="iddocumento" id="iddocumento" value="<?=$registro['idcurriculum']?>" />											
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Editar Cargo</h6>
												<hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Nombre</label>
															<input type="text" id="nombre" name="nombre"  tabindex="1" class="form-control required alfa" placeholder="Nombre" value="<?=$registro['nombre']?>">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Cargo</label>
															<input type="text" id="cargo" name="cargo"  tabindex="2" class="form-control required alfa" placeholder="Cargo" value="<?=$registro['cargo']?>">
														</div>
													</div>
                                                    <div class="form-group mb-30">
													<label class="control-label mb-10 text-left">Curr&iacute;culum Vitae</label>
													<div class="fileinput fileinput-new input-group" data-provides="fileinput">
													<?php 
													if(trim($registro['webDoc']) != ''){
													?>
														<br><a href="<?=$registro['webDoc']?>" target="_blank" class="btn btn-success">Descargar</a>
													<?php 
													}													
													?>
														
														<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
														<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Cargar archivo</span> <span class="fileinput-exists btn-text">Cambiar</span>
														<input type="file" id="documento" name="documento" accept=".doc, .docx, .pdf" class="form-control" tabindex="3">														
														</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text">Eliminar</span></a>														
													</div>
                                                    
                                                    <div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Fotograf&iacute;a</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-lg-12">
														<div class="img-upload-wrap">
															<img class="img-responsive required" src="<?=$registro['webImagen']?>" alt="cargar_img">															
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar nueva imagen</span>
															<input type="file" id="fileImg" name="fileImg" class="form-control upload" tabindex="4" accept="image/gif, image/jpeg , image/png" />
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>
                                                
												</div>
                                                
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="editarCargo" > <i class="fa fa-check"></i> <span>Guardar</span></button>
													<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="mesa-lista.php">Cancelar</button>
													<div class="clearfix"></div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
				include_once($path_sis."footer.php");
				?>			
			</div>	
		</div>
<?php 
include_once($path_sis."libreriasAdmin.php")
?>