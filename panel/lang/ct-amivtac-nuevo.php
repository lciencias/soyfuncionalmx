<?php
include_once ("include.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Comunes.class.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
include_once ($_SESSION['pathCla']."Redes.class.php");
include_once ($_SESSION['pathCla']."Imagen.class.php");
include_once ($_SESSION['pathCla']."Comite.class.php");
$db    = new Conexion( $_dbhost, $_dbuname, $_dbpass, $_dbname, $persistency = true );
$objRed = new Redes($db,$_POST,$_SESSION,Comunes::LISTAR);
$redes = $objRed->obtenRedes();
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
if(isset($_POST) && isset($_POST['nombre']) && isset($_POST['presidente']) &&isset($_FILES) && isset($_FILES['fileImg'])){	
	$imagen = new Imagen ($db,$_SESSION,$_FILES,Comunes::SAVE);
	if((int) $imagen->obtenIdImagen() > 0){
		$comite = new Comite($db,$_SESSION,$_POST,$imagen->obtenIdImagen(),Comunes::SAVE);
		if($comite->obtenExito()){
			$_SESSION['msgSuccess'] = $comite->obtenMensaje();
		}else{
			$_SESSION['msgError'] = $comite->obtenMensaje();
		}
	}else{
		$_SESSION['msgError'] = $imagen->obtenMensaje();
	}
	header("Location: ".$_SESSION['pathWeb']."ct-amivtac-lista.php");
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
		<div class="fixed-sidebar-left">
			<?php require_once("menu.php"); ?>
		</div>
		<!-- /Left Sidebar Menu -->			
		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Crear Comit&eacute; T&eacute;cnico AMIVTAC</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?=$path_web?>admin.php">AMIVTAC</a></li>
							<li><a href="#"><span>Comit&eacute;s</span></a></li>
        	                <li><a href="<?=$path_web?>ct-amivtac-lista.php"><span>Lista Comit&eacute;s T&eacute;cnicos AMIVTAC</span></a></li>
							<li class="active"><span>Crear Comit&eacute; T&eacute;cnico AMIVTAC</span></li>
					  	</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="form-wrap">
										<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post" name="formaSlider" id="validateFormComite" autocomplete="off" data-toogle="validator" role="form">
											<input type="hidden" name="idcomite" id="idcomite" value="0">
											<input type="hidden" name="idtema" id="idtema" value="1">
											<input type="hidden" name="tipo" id="tipo" value="1">
											<input type="hidden" name="redes" id="redes" value="">
											<input type="hidden" name="cargos" id="cargos" value="">
											<input type="hidden" name="noredes" id="noredes"  value="<?=count($redes)?>">
											<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Crear Comit&eacute; T&eacute;cnico AMIVTAC</h6>
											<hr class="light-grey-hr"/>
        									<div class="row">
                                            	<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10">Nombre del Comit&eacute;</label>
														<input type="text" id="nombre" name="nombre" tabindex="1" class="form-control required alfa" placeholder="Nombre">
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10">Presidente</label>
														<input type="text" id="presidente" name="presidente" tabindex="2" class="form-control required letras" placeholder="Presidente">
                                                	</div>
												</div>
                                                <div class="col-md-12">
                                                	<div class="form-group">
														<label class="control-label mb-10 text-left">Direcci&oacute;n</label>
													    <textarea class="form-control alfa" id="direccion" name="direccion" tabindex="3" rows="5"></textarea>
												    </div>
                                                </div>
                                                <div class="col-md-12">
                                                	<div class="form-group">
														<label class="control-label mb-10 text-left">Objetivo</label>
													    <textarea class="form-control alfa" id="objetivo" name="objetivo" tabindex="4" rows="5"></textarea>
												    </div>
                                                </div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10">Tel&eacute;fono</label>
														<input type="text" id="telefono" name="telefono" tabindex="5" class="form-control numeros" placeholder="Tel&eacute;fono">
													</div>
												</div>
                                                <div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10">Correo</label>
														<input type="text" id="correo" name="correo" tabindex="6" class="form-control correo" placeholder="Correo">
													</div>
												</div>
                                                <div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10">URL Sitio Web</label>
														<input type="text" id="url" name="url" tabindex="7" class="form-control url"  placeholder="(con http)">
													</div>
												</div>
                                                <div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10">Redes Sociales</label>
                                                    	<div class="button-list mt-25">
                                                    	<?php 
                                                    		if(count($redes) > 0){
                                                    			foreach($redes as $red){
														?>                                                    					
																<button type="button" id="<?=$red['id']?>-<?=$red['nm']?>"  class="<?=$red['cl']?>" alt="<?=$red['nm']?>">
																	<i class="<?=$red['le']?>"></i>
																</button>                                                    				
                                                    	<?php	
                                                    			}                                                    				
                                                    		}
                                                    	?>
													  	</div>
                                                      	<div class="seprator-block"></div>
                                                      	<div class="seprator-block"></div>
                                                     </div>
												</div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Imagen</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-lg-12">
														<div class="img-upload-wrap">
															<img class="img-responsive" src="<?=$path_lib?>dist/img/base-comites.jpg" alt="upload_img">
														</div>
														<div class="fileupload btn btn-info btn-anim"><i class="fa fa-upload"></i><span class="btn-text">Cargar imagen</span>
															<input type="file" id="fileImg" name="fileImg" class="form-control upload" tabindex="9" accept="image/gif, image/jpeg , image/png" />
														</div>
													</div>
												</div>
												<div class="seprator-block"></div>                                                
											</div>
                                            <div class="panel panel-default card-view">
												<div class="panel-heading">
													<div class="pull-left">
														<h6 class="panel-title txt-dark">Mesa Comit&eacute;</h6>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="panel-wrapper collapse in">
													<div class="panel-body">
														<div class="table-wrap">
															<table id="footable_2" class="table" data-paging="true" data-filtering="true" data-sorting="true">
																<thead>
																<tr>
																	<th data-name="id" data-breakpoints="xs" data-type="number">ID</th>
																	<th data-name="Nombre" >Nombre</th>
																	<th data-name="Cargo" data-breakpoints="xs">Cargo</th>
																	<th width="15%"><button type="button" class="btn btn-primary footable-show" id="nuevoReg" name="nuevoReg">A&ntilde;adir </button></th>																	
																</tr>
																</thead>
																<tbody id="bodyid">
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>	
                                            <div class="form-actions">
												<button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left" id="crearComite" name="crearComite"> <i class="fa fa-check"></i> <span>Crear</span></button>
												<button type="button" class="btn btn-warning pull-left cancelaRegistro" id="ct-amivtac-lista.php">Cancelar</button>
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
       <!-- /Main Content -->
</div>
<div id="responsive-modal" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h5 class="modal-title">Red social: <span id="nm"></span></h5>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Insertar URL :</label>
						<input type="text"   class="form-control required alfa" id="recipient-name" name="recipient-name">
						<input type="hidden" class="form-control" id="recipient-id"   id="recipient-id">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="cierraRed" name="cierraRed" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" id="guardaRed" name="guardaRed" class="btn btn-danger">Guardar</button>
			</div>
		</div>
	</div>
</div>

<!--Editor-->
<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
	<div class="modal-dialog" role="document">
		<form class="modal-content form-horizontal" id="editor">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h5 class="modal-title" id="editor-title">A&ntilde;adir Cargo</h5>
			</div>
			<div class="modal-body">
				<input type="number" id="id" name="id" class="hidden"/>
				<div class="form-group required">
					<label for="firstName" class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-9">
						<input type="hidden" name="idComiteCargo" id="idComiteCargo" value="0">
						<input type="text" class="form-control required letras" id="nombreComite" name="nombreComite" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label for="jobTitle" class="col-sm-3 control-label">Cargo</label>
					<div class="col-sm-9">
						<input type="text" class="form-control required letras" id="cargoComite" name="cargoComite" placeholder="Cargo">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="guardaMesa" name="guardaMesa" class="btn btn-primary">Guardar</button>
				<button type="button" id="cierraMesa" name="cierraMesa" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
	</div>
</div>
<!--/Editor-->

<?php 
include_once($path_sis."libreriasAdmin.php");
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
?>
