<?php 
include_once ("include.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
include_once ($_SESSION['pathCla']."Slider.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
if(isset($_POST) && isset($_POST['nombre']) && isset($_FILES) && isset($_FILES['fileImg'])){
	include_once ($_SESSION['pathCla']."Comunes.class.php");
	include_once ($_SESSION['pathCla']."Imagen.class.php");
	
	$idImagenMovil = 0;
	$imagen = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
	if((int) $imagen->obtenIdImagen() > 0){
		if(trim($_FILES['fileImgMovil']['name']) != ''){
			$_FILES['fileImg']=$_FILES['fileImgMovil'];
			$imagen2 = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
			$idImagenMovil = $imagen2->obtenIdImagen();
		}
		$slide = new Slider ($db,$_SESSION,$_POST,$imagen->obtenIdImagen(),Comunes::SAVE,$idImagenMovil);
		if($slide->obtenExito()){
			$_SESSION['msgSuccess'] = $slide->obtenMensaje();
		}else{
			$_SESSION['msgError'] = $slide->obtenMensaje();
		}
	}else{
		$_SESSION['msgError'] = $imagen->obtenMensaje();
	}
	header("Location: ".$_SESSION['pathWeb']."banner-lista.php");
}else{
	$slide = new Slider ($db,$_SESSION,$_POST,Comunes::LISTAR,Comunes::LISTAR,$idImagenMovil);
	$total = $slide->obtenTotal();
}
include_once ($_SESSION['pathSys']. "headerAdmin.php");
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
						  <h5 class="txt-dark">A&ntilde;adir Banner</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?=$_SESSION ['pathWeb']?>admin.php">Banner Principal</a></li>
							<li><a href="<?=$_SESSION ['pathWeb']?>banner-lista.php"><span>Banner Lista</span></a></li>
							<li class="active"><span>A&ntilde;adir Banner</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<?php include_once($_SESSION ['pathSys'].'alerts.php'); ?>
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormSlider" autocomplete="off" data-toogle="validator" role="form"> 
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Banner</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Nombre de Banner</label>
															<input type="text" id="nombre" name="nombre" maxlength="100" tabIndex="1" class="form-control required letras" placeholder="Nombre">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Texto Principal 1 (tama&ntilde;o peque&ntilde;o)</label>
															<input type="text" id="texto_corto" name="texto_corto" maxlength="150" tabIndex="2" class="form-control alfa" placeholder="Texto">
														</div>
													</div>
													<!--/span-->
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Texto Principal 2 (tama&ntilde;o grande)</label>
															<input type="text" id="texto_grande" name="texto_grande" maxlength="150" tabIndex="3" class="form-control alfa" placeholder="Texto">
														</div>
													</div>
													<!--/span-->
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Texto Bot&oacute;n</label>
															<input type="text" id="texto_boton" name="texto_boton" maxlength="60" tabIndex="4" class="form-control alfa" placeholder="Nombre bot&oacute;n">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">															
                                                            <label class="control-label mb-10">URL Bot&oacute;n</label>
															<input type="text" id="url" id="url" name="url" maxlength="255" tabIndex="5" class="form-control required" placeholder="URL">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Orden</label>		
															<select name="orden" id="orden" class="form-control">
															<?php 
															for( $j=1; $j <= $total; $j++){
															?>
																<option value="<?=$j?>"><?=$j?></option>
															<?php 
															}
															?>
															</select>													
														</div>
													</div>
													<!--/span-->
												</div>
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Cargar imagen</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-lg-12">
														<div class="img-upload-wrap">
															<img class="img-responsive required" src="<?=$path_lib?>dist/img/banner/base-banner.jpg" alt="cargar_img"> 
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar imagen normal</span>															
															<input type="file" id="fileImg" name="fileImg" class="form-control upload" tabindex="4" accept="image/gif, image/jpeg , image/png" />
														</div>
													</div>
												</div>
                                                <div class="seprator-block"></div>
                                                <div class="row">
                                                    <div class="col-lg-12">
														<div class="img-upload-wrap">
															<img class="img-responsive required" src="<?=$path_lib?>dist/img/banner/base-banner-movil.jpg" alt="cargar_img"> 
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar imagen m&oacute;vil</span>
															<input type="file" id="fileImgMovil" name="fileImgMovil" class="form-control upload" tabindex="4" accept="image/gif, image/jpeg , image/png" />
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="crearSlider" name="crearSlider"> <i class="fa fa-check"></i> <span>Crear</span></button>
													<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="banner-lista.php">Cancelar</button>
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
			include_once($path_sis."footer.php");
			?>
			</div>
		</div>
<?php 
include_once($path_sis."libreriasAdmin.php")
?>		