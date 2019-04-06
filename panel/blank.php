<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper box-layout theme-1-active pimary-color-pink">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="dist/img/logo.png" alt="AMIVTAC"/>
							<span class="brand-text">Site Panel - AMIVTAC</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown full-width-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
						<ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li class="product-nicescroll-bar row">
								<ul class="pa-20">
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">SPanel</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="admin.php">Analíticas</a>
											</li>
										</ul>
									</li>
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);">
											<div class="pull-left">
												<i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Tienda en línea</span>
											</div>
											<div class="clearfix"></div>
										</a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="ttienda.php">Tablero</a>
											</li>
											<li>
												<a href="productos.php">Productos</a>
											</li>
											<li>
												<a href="detalle-productos.php">Detalle de Producto</a>
											</li>
											<li>
												<a href="anadir-producto.php">Añadir Producto</a>
											</li>
											<li>
												<a href="ordenes.php">Ordenes</a>
											</li>
											<li>
												<a href="producto-cart.php">Carro</a>
											</li>
											<li>
												<a href="producto-checkout.php">Revisión de Pedido</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>	
						</ul>
					</li>
					
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="perfil.php"><i class="zmdi zmdi-account"></i><span>Perfil</span></a>
							</li>
							<li>
								<a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Principal</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                <li>
					<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Tablero</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul>
						<li>
							<a href="admin.php">Analíticas</a>
						</li>
					</ul>
				</li>
                
                <li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Banner principal</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                <li>
					<a href="blank.php"><div class="pull-left"><i class="zmdi zmdi-slideshow mr-20"></i><span class="right-nav-text">Slides</span></div><div class="clearfix"></div></a>
				</li>


				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Páginas</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                <li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr"><div class="pull-left"><i class="zmdi zmdi-label-alt mr-20"></i><span class="right-nav-text">AMIVTAC</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="#">Mesa Directiva</a>
						</li>
                        <li>
							<a href="#">Acuerdos y Convenios</a>
						</li>
                        <li>
							<a href="#">Directorios</a>
						</li>
                        <li>
							<a href="#">Asociaciones Gremiales</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#comites_dr"><div class="pull-left"><i class="zmdi zmdi-assignment mr-20"></i><span class="right-nav-text">Comités</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
					<ul id="comites_dr" class="collapse collapse-level-1 two-col-list">
						<li>
							<a href="#">AMIVTAC</a>
						</li>
                        <li>
							<a href="#">PIARC</a>
						</li>
					</ul>
				</li>
				
                
				<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span>Tienda</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Tienda en Línea</span></div><div class="clearfix"></div></a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<li>
												<a href="ttienda.php">Tablero</a>
											</li>
											<li>
												<a href="productos.php">Productos</a>
											</li>
											<li>
												<a href="detalle-productos.php">Detalle de Producto</a>
											</li>
											<li>
												<a href="anadir-producto.php">Añadir Producto</a>
											</li>
											<li>
												<a href="ordenes.php">Ordenes</a>
											</li>
											<li>
												<a href="producto-cart.php">Carro</a>
											</li>
											<li>
												<a href="producto-checkout.php">Revisión de Pedido</a>
											</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->


		<!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Contenido</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="admin.php">Analíticas</a></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
			
				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<p>2018 &copy; AMIVTAC</p>
						</div>
					</div>
				</footer>
				<!-- /Footer -->
			</div>
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
	
</body>

</html>
