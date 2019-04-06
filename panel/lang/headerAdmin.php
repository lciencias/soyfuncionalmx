<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>AMIVTAC - SPanel</title>
		<meta name="author" content="amivtac.org"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">

<?php 
	switch($fileName){
		default:{
?>		
		<!-- vector map CSS -->
			<link href="<?=$path_lib?>vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
			
		    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
			<link href="<?=$path_lib?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
			<link href="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">			
			<link href="<?=$path_lib?>dist/css/style.css" rel="stylesheet" type="text/css">
			<link href="<?=$path_lib?>dist/css/bootstrapValidator.css" rel="stylesheet" type="text/css">
<?php 
			break;
		}
		case "ct-amivtac-lista.php":
		case "ct-piarc-lista.php":{
?>
    		<link href="<?=$path_lib?>icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    		<link href="<?=$path_lib?>icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    		<link href="<?=$path_lib?>icon/favicon.png" rel="shortcut icon">
			<link href="<?=$path_lib?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
			<link href="<?=$path_lib?>dist/css/style.css" rel="stylesheet" type="text/css">
<?php 		
			break;
		}
		case "ct-amivtac-nuevo.php":
		case "ct-amivtac-editar.php":
		case "ct-piarc-nuevo.php":
		case "expres-editar.php":
		case "ct-piarc-editar.php":{
			?>
			<!-- Favicon and touch icons  -->
    		<link href="<?=$path_lib?>icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    		<link href="<?=$path_lib?>icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    		<link href="<?=$path_lib?>icon/favicon.png" rel="shortcut icon">
			<link href="<?=$path_lib?>vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>vendors/bower_components/FooTable/compiled/footable.bootstrap.min.css" rel="stylesheet" type="text/css"/>
			<link href="<?=$path_lib?>dist/css/style.css" rel="stylesheet" type="text/css">
		<?php 		
			break;
		}
				
		case "banner-lista.php": {
?>	
	    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
		<link href="<?=$path_lib?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?=$path_lib?>vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
		<link href="<?=$path_lib?>dist/css/style.css" rel="stylesheet" type="text/css">
<?php
			break;
		}
	}
?>
</head>