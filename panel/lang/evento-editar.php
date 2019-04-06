<?php
include_once ("include.php");
include_once ($_SESSION ['pathSys']."BDconfig.php");
include_once ($_SESSION ['pathSys']."revisaSesion.php");
include_once ($_SESSION ['pathCla']."Conexion.class.php");
include_once ($_SESSION ['pathCla']."Comunes.class.php");
include_once ($_SESSION ['pathCla']."Evento.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$registros = null;
if(isset($_POST) && isset($_POST['titulo']) && isset($_POST['fecha_evento'])){
	include_once ($_SESSION ['pathCla']."Imagen.class.php");
	$idImagen = 0;
	if( isset($_FILES) && isset($_FILES['fileImg']['name'])){
		$imagen   = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
		$idImagen = $imagen->obtenIdImagen();
	}
	$evento = new Evento($db, $_SESSION,$_POST, $idImagen, Comunes::UPDATE);
	if($evento->obtenExito()){
		$_SESSION['msgSuccess'] = $evento->obtenMensaje();
	}else{
		$_SESSION['msgError'] = $evento->obtenMensaje();
	}
	header("Location: ".$_SESSION ['pathWeb']."evento-lista.php");
}else{
	$evento = new Evento($db, $_SESSION,$_GET, $idImagen, Comunes::EDIT);
	$registros = $evento->obtenRegistros();
	//echo"<pre>";print_r($registros);die();
	$categorias = $evento->obtenCategorias();
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
					  <h5 class="txt-dark">Lista Socios de Honor</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
					  	<li><a href="<?=$_SESSION ['pathWeb']?>admin.php">Principal</a></li>
					  	<li><a href="<?=$_SESSION ['pathWeb']?>mesa-lista.php"><span>Mesa Directiva</span></a></li>
						<li><a href="<?=$_SESSION ['pathWeb']?>evento-lista.php"><span>Lista Eventos</span></a></li>
						<li class="active"><span>Crear Evento</span></li>
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
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormEvento" autocomplete="off" data-toogle="validator" role="form">
											<input type="hidden" name="idevento"  id="idevento"  value="<?=$registros['idevento']?>" />
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Crear Evento</h6>
												<hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Título</label>
															<input type="text" id="titulo" name="titulo" tabindex="1" class="form-control required letras" placeholder="Título" value="<?=$registros['titulo']?>">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Fecha Evento</label>
															<input type="text" id="fecha_evento" name="fecha_evento" tabindex="2" class="form-control required datetimepicker" placeholder="Fecha Evento" value="<?=$registros['fecha_evento']?>">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Lugar</label>
															<input type="text" id="lugar" name="lugar" tabindex="3" class="form-control required alfa" placeholder="Lugar" value="<?=$registros['lugar']?>">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">URL</label>
															<input type="text" id="url" name="url" tabindex="4" class="form-control required alfa"  placeholder="URL" value="<?=$registros['url']?>">
														</div>
													</div>
													<div class="col-md-12">
                                                    	<div class="form-group">
															<label class="control-label mb-10 text-left">Descripci&oacute;n corta</label>
															<textarea id="descripcion"name="descripcion" tabindex="5" class="form-control required alfa" rows="5"><?=$registros['descripcion']?></textarea>
												    	</div>
                                                    </div>													
                                                    <div class="col-md-12">
                                                    <div class="form-group">
													<label class="control-label mb-10 text-left">Texto 1</label>
													<textarea id="texto1"name="texto1" tabindex="6" class="form-control required alfa" rows="5"><?=$registros['texto1']?></textarea>
												    </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="form-group">
													<label class="control-label mb-10 text-left">Nota</label>
													<textarea id="nota"name="nota" tabindex="7" class="form-control required alfa" rows="5"><?=$registros['nota']?></textarea>
												    </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="form-group">
													<label class="control-label mb-10 text-left">Texto 2</label>
													<textarea id="texto2"name="texto2" tabindex="8" class="form-control required alfa" rows="5"><?=$registros['texto2']?></textarea>
												    </div>
                                                    </div>
                                                    <div class="col-md-12">
														<div class="form-group">
															<label class="control-label mb-10">Categoría</label>
															<select id="idcategoria" name="idcategoria" tabindex="9" class="form-control selectpicker" style="width:160px;" data-style="form-control btn-default btn-outline">
															<?php 
															if(count($categorias) > 0){
																foreach($categorias as $key => $value){
																	$tmp = "";
																	if((int)$key == (int)$registros['idcategoria']){
																		$tmp = " selected ";
																	}
																	?>
																	<option value="<?=$key?>" <?=$tmp?>><?=$value?></option>
																	<?php 
																}
															}															
															?>																
															</select>
														</div>	
													</div>                                                    
                                                    <div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Imagen</h6>
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
															<img class="img-responsive" src="<?=$_SESSION ['pathLib']?>dist/img/base-eventos.jpg" alt="upload_img">
															<?php 	
															}
															?>
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar imagen</span>
															<input type="file" id="fileImg" name="fileImg" class="form-control upload" tabindex="10" accept="image/gif, image/jpeg , image/png" />
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>
                                                
												</div>
                                                
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="actualizarEvento" name="actualizarEvento"> <i class="fa fa-check"></i> <span>Crear</span></button>
													<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="evento-lista.php">Cancelar</button>
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