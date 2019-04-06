<?php
include_once ("include.php");
include_once ($_SESSION['pathSys']."BDconfig.php");
include_once ($_SESSION['pathSys']."revisaSesion.php");
include_once ($_SESSION['pathCla']."Conexion.class.php");
include_once ($_SESSION['pathCla']."Usuario.class.php");

$db      = new Conexion( $_dbhost, $_dbuname, $_dbpass, $_dbname, $persistency = 3306);
$usuario = new Usuario( $db,$_SESSION,$_POST,Comunes::LISTAR,Comunes::LISTAR );
$registros = $usuario->obtenRegistros();
include_once ($_SESSION['pathSys'] . "headerAdmin.php");
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
					  <h5 class="txt-dark">Lista Usuarios</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
					  	<li><a href="<?=$_SESSION['pathWeb']?>admin.php">Inicio</a></li>
						<li><a href="<?=$_SESSION['pathWeb']?>usuarios-lista.php"><span>Usuarios</span></a></li>
						<li class="active"><span>Lista Usuarios</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
                <?php include_once ('alerts.php'); ?>
                <!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Datos de la Tabla</h6>
								</div>
								<div class="pull-right">
									<a class="button" href="<?=$_SESSION ['pathWeb']?>usuarios-nuevo.php">+ A&ntilde;adir Usuario</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
											<table id="myTable1" class="table table-hover display" >
												<thead>
													<tr>
														<th>Nombre</th>
														<th>Correo Electr&oacute;nico</th>														
                            <th>&Uacute;ltimo acceso</th>
                            <th>Password</th>                                                        
                            <th>Editar</th>
                            <th>Eliminar</th>                                                        
													</tr>
												</thead>
												<?php												 
												if(count($registros) > 0){
												?>												
												<tfoot>
													<tr>
														<th>Nombre</th>
														<th>Correo Electr&oacute;nico</th>														
                            <th>&Uacute;ltimo acceso</th>
                            <th>Password</th>                                                        
                            <th>Editar</th>
                            <th>Eliminar</th>                                                        
													</tr>
												</tfoot>
												<?php 
												}
												?>												
												<tbody>
												<?php 
												$contador = 1;
												if(count($registros) > 0){
													foreach($registros as $reg){
														if( (int)$_SESSION ['userId'] != (int)$reg['id'] ){
															echo '<tr class="renglon'.$reg['id'].'">
																	<td>'.$reg['name'].'</td>
																	<td>'.$reg['email'].'</td>
																	<td>'.$reg['updated_at'].'</td>
																	<td>'.$reg['passwordS'].'</td>
																	<td>
																		<a href="'.$_SESSION['pathWeb'].'usuarios-editar.php?id='.$reg['id'].'&'.$db->url().'" id="m-'.$reg['id'].'" class="editar">
																			<img src="'.$path_lib.'dist/img/icons/editar.png">
																		</a>
																	</td>
																	<td>
																		<a href="#" id="e-'.$reg['id'].'-2" class="eliminar">
																			<img src="'.$path_lib.'dist/img/sweetalert/eliminar.png"																	
																			alt="alert" class="img-responsive model_img" id="sa-warning'.$reg['id'].'">
	    																</a>
																	</td>
																</tr>';
															$contador++;
														}
													}
												}
												?>																								
												</tbody>
											</table>
										</div>
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
    </div>
<?php 
include_once($_SESSION ['pathSys']."libreriasAdmin.php");
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
?>