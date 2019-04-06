<?php
include_once ("include.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Comunes.class.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
include_once ($_SESSION['pathCla']."Producto.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";

if(isset($_POST) && isset($_POST['producto']) && isset($_POST['caloria']) && isset($_POST['precio'])){
	include_once ($_SESSION['pathCla']."Imagen.class.php");
	$idImagen = 0;
	if( isset($_FILES) && isset($_FILES['fileImg']['name'])){
		$imagen   = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
		$idImagen = $imagen->obtenIdImagen();
	}	
	$producto = new Producto($db, $_SESSION,$_POST, $idImagen,Comunes::LISTAR, Comunes::SAVE);
	if($producto->obtenExito()){
			$_SESSION['msgSuccess'] = $producto->obtenMensaje();
	}else{
		$_SESSION['msgError'] = $producto->obtenMensaje();
	}
	header("Location: ".$_SESSION['pathWeb']."producto-lista.php");
}else {
	$producto   = new Producto($db, $_SESSION,$_POST, Comunes::LISTAR, Comunes::LISTAR, Comunes::LISTAR);
	$categorias = $producto->obtenCategorias(); 
	$total      = $producto->obtenTotalProductos();	
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
						  <h5 class="txt-dark">Productos</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="<?=$_SESSION ['pathWeb']?>admin.php">Inicio</a></li>						  
              <li><a href="<?=$_SESSION ['pathWeb']?>producto-lista.php"><span>Lista Productos</span></a></li>
							<li class="active"><span>Crear Producto</span></li>
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
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormProducto" autocomplete="off" data-toogle="validator" role="form">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Crear Producto</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Categoria</label>
															<select class="form-control" id="idcategoria" name="idcategoria" tabindex="1" data-style="form-control required  btn-default btn-outline">
															<?php 
															if(count($categorias) > 0){
																foreach ($categorias as $key => $value){
															?>
																<option value="<?=$key?>"><?=$value?></option>
															<?php 
																}
															}
															?>
															</select>
														</div>	
													</div>
                        	<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Productos</label>
															<input type="text" id="producto" maxlength="100"  name="producto" tabindex="2" value="<?=$registro['producto']?>" class="form-control required letras" placeholder="Nombre del Producto">
														</div>
													</div>
                          <div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10">Calor&iacute;as</label>
															<input type="text" id="caloria" name="caloria" tabindex="3" class="form-control required alfa" placeholder="calor&iacute;as">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10">Precio</label>
															<input type="text" id="precio" name="precio" tabindex="4" class="form-control required numeros" placeholder="Precio">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10">Orden</label>		
															<select name="orden" id="orden" class="form-control"  tabIndex="5">
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
												
													<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Imagen</h6>
													<hr class="light-grey-hr"/>
													<div class="row">
														<div class="col-lg-12">
															<div class="img-upload-wrap">
																<img class="img-responsive" src="dist/img/base-productos.jpg" alt="upload_img"> 
															</div>
															<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar imagen</span>
																<input type="file" id="fileImg" name="fileImg" class="form-control upload" tabindex="8" accept="image/gif, image/jpeg , image/png" />
															</div>
														</div>
													</div>
												<div class="seprator-block"></div>
                                                
												</div>
                                                
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="nuevoProducto" name="nuevoProducto"> <i class="fa fa-check"></i> <span>Crear</span></button>
													<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="revista-lista.php">Cancelar</button>
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