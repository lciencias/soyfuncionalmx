<input type="hidden"  id="baseUrl" name="baseUrl" value="<?=$_SESSION['pathWeb']?>">
<ul class="nav navbar-nav side-nav nicescroll-bar">
	<li class="navigation-header">
		<span>Principal</span>
		<i class="zmdi zmdi-more"></i>
	</li>
	<li>
		<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Tablero</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul>
			<li>
				<a href="<?=$path_web?>admin.php">Anal&iacute;ticas</a>
			</li>
		</ul>
	</li>
	<li>
		<hr class="light-grey-hr mb-10"/>
	</li>
	<li class="navigation-header">
		<span>Banner principal</span>
		<i class="zmdi zmdi-more"></i>
	</li>
	<li>
		<a href="<?=$path_web?>banner-lista.php">
			<div class="pull-left">
				<i class="zmdi zmdi-slideshow mr-20"></i>
				<span class="right-nav-text">Slides</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>
	<li>
		<hr class="light-grey-hr mb-10"/>
	</li>
	<li class="navigation-header">
		<span>P&aacute;ginas</span>
		<i class="zmdi zmdi-more"></i>
	</li>
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#pages_dr">
			<div class="pull-left">
				<i class="zmdi zmdi-label-alt mr-20"></i>
				<span class="right-nav-text">AMIVTAC</span>
			</div>
			<div class="pull-right">
				<i class="zmdi zmdi-caret-down"></i>
			</div>
			<div class="clearfix"></div>
		</a>
		<ul id="pages_dr" class="collapse collapse-level-1 two-col-list">
			<li>
				<a href="javascript:void(0);" data-toggle="collapse" data-target="#contact_dr">Mesa Directiva<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
				<ul id="contact_dr" class="collapse collapse-level-2">
					<li>
						<a href="<?=$path_web?>mesa-lista.php">Mesa Directiva</a>
					</li>
					<li>
					<a href="<?=$path_web?>md-coordinadores-lista.php">Coordinadores</a>
					</li>
					<li>
						<a href="<?=$path_web?>expres-lista.php">Expresidentes</a>
					</li>
					<li>
						<a href="<?=$path_web?>sociosh-lista.php">Socios de Honor</a>
					</li>
					<!-- <li>
						<a href="<?=$path_web?>delegados-lista-php">Delegados</a>
					</li>-->
				</ul>
			</li>
			<li>
				<a href="<?=$path_web?>acuerdos-lista.php">Acuerdos y Convenios</a>
			</li>
			<li>
				<a href="<?=$path_web?>directorio-lista.php">Directorio</a>
			</li>
		</ul>
	</li>
	<!-- Eventos -->
	<li>
		<a href="<?=$path_web?>evento-lista.php"><div class="pull-left"><i class="zmdi zmdi-calendar-check mr-20"></i><span class="right-nav-text">Eventos</span></div><div class="clearfix"></div></a>
	</li>
    <!-- Revista -->
    <li>
		<a href="<?=$path_web?>revista-lista.php"><div class="pull-left"><i class="zmdi zmdi-book-image mr-20"></i><span class="right-nav-text">Revista</span></div><div class="clearfix"></div></a>
	</li>
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#comites_dr"><div class="pull-left"><i class="zmdi zmdi-assignment mr-20"></i><span class="right-nav-text">Comit&eacute;s</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul id="comites_dr" class="collapse collapse-level-1 two-col-list">
			<li>
				<a href="<?=$path_web?>ct-amivtac-lista.php">AMIVTAC</a>
			</li>
			<li>
				<a href="<?=$path_web?>ct-piarc-lista.php">PIARC</a>
			</li>
		</ul>
	</li>
	<!-- Delegaciones -->
    <li>
		<a href="<?=$path_web?>delegaciones-lista.php"><div class="pull-left"><i class="zmdi zmdi-collection-plus mr-20"></i><span class="right-nav-text">Delegaciones</span></div><div class="clearfix"></div></a>
	</li>	
	
	<!-- Biblioteca -->
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#biblio_dr"><div class="pull-left"><i class="zmdi zmdi-library mr-20"></i><span class="right-nav-text">Biblioteca</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul id="biblio_dr" class="collapse collapse-level-1 two-col-list">
			<li>
				<a href="<?=$path_web?>biblio-amivtac-lista.php">AMIVTAC</a>
			</li>
            <li>
				<a href="<?=$path_web?>biblio-piarc-lista.php">PIARC</a>
			</li>
		</ul>
	</li>
    <!-- Estudiantes -->
    <li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#est_dr"><div class="pull-left"><i class="zmdi zmdi-accounts-list mr-20"></i><span class="right-nav-text">Estudiantes</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul id="est_dr" class="collapse collapse-level-1 two-col-list">
			<li>
				<a href="<?=$path_web?>est-becas-lista.php">Becas</a>
			</li>
            <li>
				<a href="<?=$path_web?>est-capitulos-lista.php">Capítulos</a>
			</li>
		</ul>
	</li>
    <!-- Asociados -->
    <li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#asoc_dr"><div class="pull-left"><i class="zmdi zmdi-accounts mr-20"></i><span class="right-nav-text">Asociados</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
		<ul id="asoc_dr" class="collapse collapse-level-1 two-col-list">
			<li>
				<a href="<?=$path_web?>membresia.php">Membresía</a>
			</li>
            <li>
				<a href="<?=$path_web?>sem-cursos.php">Seminarios y Cursos</a>
			</li>
		</ul>
	</li>
	<li>
		<hr class="light-grey-hr mb-10"/>
	</li>
	<li class="navigation-header">
		<span>Tienda</span>
		<i class="zmdi zmdi-more"></i>
	</li>
	<li>
		<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
		<div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text">Tienda en L&iacute;nea</span></div><div class="clearfix"></div>
		</a>
		<ul id="ecom_dr" class="collapse collapse-level-1">
			<li>
				<a href="<?=$path_web?>ttienda.php">Tablero</a>
			</li>
			<li>
				<a href="<?=$path_web?>productos.php">Productos</a>
			</li>
			<li>
				<a href="<?=$path_web?>detalle-productos.php">Detalle de Producto</a>
			</li>
			<li>
				<a href="<?=$path_web?>anadir-producto.php">A&ntilde;adir Producto</a>
			</li>
			<li>
				<a href="<?=$path_web?>ordenes.php">Ordenes</a>
			</li>
			<li>
				<a href="<?=$path_web?>producto-cart.php">Carro</a>
			</li>
			<li>
				<a href="<?=$path_web?>producto-checkout.php">Revisi&oacute;nn de Pedido</a>
			</li>
		</ul>
	</li>
</ul>