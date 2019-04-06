<?php
include_once("include.php");
include_once("header.php");
?>
<!--Preloader-->
<div class="preloader-it">
	<div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper box-layout pa-0">
	<header class="sp-header">
		<div class="sp-logo-wrap pull-left">
			<a href="<?=$path_web?>">
				<img class="brand-img mr-10" src="<?=$path_lib?>dist/img/logo.png" width="185" height="87" alt="AMIVTAC"/>
			</a>
		</div>
		<div class="clearfix"></div>
	</header>
	<!-- Main Content -->
	<div class="page-wrapper pa-0 ma-0 auth-page">
		<div class="container-fluid">
			<!-- Row -->
			<div class="table-struct full-width full-height">
				<div class="table-cell vertical-align-middle auth-form-wrap">
					<div class="auth-form  ml-auto mr-auto no-float">
						<div class="row">
							<div class="col-sm-12 col-xs-12">
								<div class="mb-30">
									<h3 class="text-center txt-dark mb-10">Administraci&oacute;n Sitio AMIVTAC</h3>
									<h6 class="text-center nonecase-font txt-grey">Ingrese sus datos de acceso</h6>
								</div>	
								<div class="form-wrap">
										<form class="form-signin" role="form" method="post" action="index.php">
										<div class="form-group">
											<label class="control-label mb-10" for="usuario">Usuario</label>
											<input type="text" class="form-control" required id="usuario" placeholder="Usuario">
										</div>
										<div class="form-group">
											<label class="pull-left control-label mb-10" for="password">Contrase&ntilde;a</label>
											<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="<?=$path_web?>recuperar_contrasena.php">&iquest;No recuerda su contrase&ntilde;a?</a>
											<div class="clearfix"></div>
												<input type="password" class="form-control" required id="password" placeholder="Contraseña">
										</div>
										<div class="form-group">
											<div class="checkbox checkbox-primary pr-10 pull-left">
												<input id="checkbox_2" required type="checkbox">
												<label for="checkbox_2"> Mantenerme conectado</label>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="form-group text-center">
											<button type="submit" class="btn btn-info  btn-rounded">Entrar</button>
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
	</div>
	<!-- /Main Content -->
</div>
<!-- /#wrapper -->
<?php
include_once("librerias.php");
?>