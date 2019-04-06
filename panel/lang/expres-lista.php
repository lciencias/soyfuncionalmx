<?php
include_once ("include.php");
include_once ($_SESSION ['pathSys']."BDconfig.php");
include_once ($_SESSION ['pathSys']."revisaSesion.php");
include_once ($_SESSION ['pathCla']."Conexion.class.php");
include_once ($_SESSION ['pathCla']."Comunes.class.php");
include_once ($_SESSION ['pathCla']."Presidente.class.php");
$db = new Conexion ( $_dbhost, $_dbuname, $_dbpass, $_dbname, $_port );
$_SESSION['msgSuccess'] = $_SESSION['msgError'] = "";
$presidente = new Presidente($db, $_SESSION,$_POST, $idImagen, $idDocumento, Comunes::LISTAR2);
$registros = $presidente->obtenRegistros();

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
					  <h5 class="txt-dark">Lista Expresidentes</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?=$_SESSION ['pathWeb']?>admin.php">Principal</a></li>
						<li><a href="<?=$_SESSION ['pathWeb']?>mesa-lista.php""><span>Mesa Directiva</span></a></li>
						<li class="active"><span>Lista Expresidentes</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
                
                <!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Datos de la Tabla</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
											<table id="myTable1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                                                        <th>Nombre</th>
														<th>Periodo</th>
														<th>Fecha</th>
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
                                                        <th>Periodo</th>
														<th>Fecha</th>
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
														echo '<tr class="renglon'.$reg['idpresidente'].'">
																<td>'.$reg['presidente'].'</td>
																<td>'.$reg['periodo'].'</td>
																<td>'.$reg['fecha'].'</td>
																<td>
																	<a href="'.$path_web.'expres-editar.php?id='.$reg['idpresidente'].'&'.$db->url().'" id="m-'.$reg['idcoordinador'].'" class="editar">
																		<img src="'.$path_lib.'dist/img/icons/editar.png">
																	</a>
																</td>
																<td>
																	<a href="#" id="e-'.$reg['idpresidente'].'-4" class="eliminar">
																		<img src="'.$path_lib.'dist/img/sweetalert/eliminar.png"																	
																		alt="alert" class="img-responsive model_img" id="sa-warning">
    																</a>
																</td>
															</tr>';
														$contador++;
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