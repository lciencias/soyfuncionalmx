<?php
include_once ("include.php");
include_once ($_SESSION ['pathSys']."BDconfig.php");
include_once ($_SESSION ['pathSys']."revisaSesion.php");
include_once ($_SESSION ['pathCla']."Conexion.class.php");
include_once ($_SESSION ['pathCla']."Comunes.class.php");
include_once ($_SESSION ['pathCla']."Categoria.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$registros = null;
if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['orden'])){
	$categoria = new Categoria($db, $_SESSION,$_POST, $idImagen, Comunes::UPDATE);
	if($categoria->obtenExito()){
		$_SESSION['msgSuccess'] = $categoria->obtenMensaje();
	}else{
		$_SESSION['msgError'] = $categoria->obtenMensaje();
	}
	header("Location: ".$_SESSION ['pathWeb']."categoria-lista.php");
}else{
	$categoria = new Categoria($db, $_SESSION,$_GET, $idImagen, Comunes::EDIT);
	$total     = $categoria->obtenTotalCategorias();
	$registros = $categoria->obtenRegistros();
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
					 <h5 class="txt-dark">Categorias</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
					  	<li><a href="<?=$_SESSION['pathWeb']?>admin.php">Inicio</a></li>
						<li><a href="<?=$_SESSION['pathWeb']?>categoria-lista.php"><span>Categorias</span></a></li>
						<li class="active"><span>Crear Categoria</span></li>
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
											<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormCategoria" autocomplete="off" data-toogle="validator" role="form">
											<input type="hidden" name="id"  id="id"  value="<?=$registros['id']?>" />
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Crear Categoria</h6>
												<hr class="light-grey-hr"/>
                                                <div class="row">
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Nombre de la Categorias</label>
															<input type="text" id="nombre" name="nombre" tabindex="1" class="form-control required letras" placeholder="Nombre de la Categorias" maxlength="80" value="<?=$registros['nombre']?>">
														</div>
													</div>
                                                    <div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Orden</label>		
															<select name="orden" id="orden" class="form-control">
															<?php 
															for( $j=1; $j <= $total; $j++){
																$tmp = "";
																if( (int) $j == (int)$registros['orden']){
																	$tmp = " selected ";
																}
															?>
																<option value="<?=$j?>" <?=$tmp?>><?=$j?></option>
															<?php 
															}
															?>
															</select>													
														</div>
													</div>
													<div class="seprator-block"></div>                                            
												</div>                                       
												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" id="actualizarCategoria" name="actualizarCategoria"> <i class="fa fa-check"></i> <span>Actualizar</span></button>
													<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="categoria-lista.php">Cancelar</button>
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
		include_once($_SESSION ['pathSys']."footer.php");
		?>
		</div>
		<!-- /Main Content -->
    </div>
<?php 
include_once($_SESSION ['pathSys']."libreriasAdmin.php");
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
?>