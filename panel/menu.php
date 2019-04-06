<input type="hidden"  id="baseUrl" name="baseUrl" value="<?=$_SESSION['pathWeb']?>">
<ul class="nav navbar-nav side-nav nicescroll-bar" style="background-color:#002857;">
	<li>
		<img class="brand-img" src="<?=$_SESSION ['pathImg']?>logoMenu.jpg" width="200"/>
		<hr class="light-grey-hr mb-10"/>
	</li>
	<li>
		<a href="<?=$path_web?>admin.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-home mr-20"></i>
				<span class="right-nav-text">Inicio</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>
	<li>
		<a href="<?=$path_web?>usuarios-lista.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-user mr-20"></i>
				<span class="right-nav-text">Usuarios</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>
	<li>
		<a href="<?=$path_web?>banner-lista.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-picture mr-20"></i>
				<span class="right-nav-text">Banners</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>
	<li>
		<a href="<?=$path_web?>categoria-lista.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-th-list mr-20"></i>
				<span class="right-nav-text">Categorias</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>

	<li>
		<a href="<?=$path_web?>producto-lista.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-list-alt mr-20"></i>
				<span class="right-nav-text">Productos</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>
	<li>
		<a href="<?=$path_web?>pedidos-lista.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-usd mr-20"></i>
				<span class="right-nav-text">Pedidos</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>
	<li>
		<a href="<?=$path_web?>testimonial-lista.php">
			<div class="pull-left">
				<i class="glyphicon glyphicon-pencil mr-20"></i>
				<span class="right-nav-text">Testimoniales</span>
			</div>
			<div class="clearfix"></div>
		</a>
	</li>

</ul>