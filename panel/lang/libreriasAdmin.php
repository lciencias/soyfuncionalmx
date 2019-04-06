<?php 
	switch($fileName){
		default:{
?>
			<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
		    <script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		    <script src="<?=$path_lib?>dist/js/bootbox.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
			<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
			<!-- <script src="<?=$path_lib?>vendors/bower_components/jquery.sparkline/dist/jquery.sparkline.min.js"></script> -->
			<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
			<!-- <script src="<?=$path_lib?>vendors/bower_components/echarts-liquidfill.min.js"></script> -->
			<script src="<?=$path_lib?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
			<!-- <script src="<?=$path_lib?>dist/js/init.js"></script> 
			<script src="<?=$path_lib?>dist/js/dashboard-data.js"></script>-->
			<script src="<?=$path_lib?>dist/js/pensatori.js"></script>
			
<?php		
			break;
		}
		case "admin.php":{
			?>
					<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
				    <script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
				    <script src="<?=$path_lib?>dist/js/bootbox.min.js"></script>
					<script src="<?=$path_lib?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
					<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
					<script src="<?=$path_lib?>vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
					<script src="<?=$path_lib?>vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
					<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
					<!-- <script src="<?=$path_lib?>vendors/bower_components/jquery.sparkline/dist/jquery.sparkline.min.js"></script> -->
					<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
					<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
					<script src="<?=$path_lib?>vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
					<!-- <script src="<?=$path_lib?>vendors/bower_components/echarts-liquidfill.min.js"></script> -->
					<script src="<?=$path_lib?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
					<script src="<?=$path_lib?>dist/js/init.js"></script>
					<script src="<?=$path_lib?>dist/js/dashboard-data.js"></script>
					<script src="<?=$path_lib?>dist/js/pensatori.js"></script>
					
		<?php		
					break;
				}		
		case "banner-nuevo.php":
		case "banner-editar.php":
		case "presidente-editar.php":
		case "cargo-nuevo.php":
		case "cargo-editar.php":
		case "md-coord-nuevo.php":
		case "md-coord-lista.php":
		case "sociosh-nuevo.php":
		case "sociosh-editar.php":
		case "acuerdos-nuevo.php":
		case "revista-nuevo.php":
		case "revista-editar.php":				
		case "evento-nuevo.php":
		case "evento-editar.php":
		case "acuerdos-editar.php":
		case "expres-editar.php":
			{
?>
			<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>			
			<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
			<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
		    <script src="<?=$path_lib?>dist/js/moment.js"></script>
		    <script src="<?=$path_lib?>dist/js/moment-with-locales.min.js"></script>
		    <script src="<?=$path_lib?>dist/js/bootstrap-datetimepicker.min.js"></script>
			
			<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
			<script src="<?=$path_lib?>dist/js/bootstrapValidator.min.js"></script>
			<script src="<?=$path_lib?>dist/js/sweetalert-data.js"></script>			
			<script src="<?=$path_lib?>dist/js/init.js"></script>
			<script src="<?=$path_lib?>dist/js/pensatori.js"></script>
			<script src="<?=$path_lib?>dist/js/validaciones.js"></script>				
<?php 			
			break;
		}
		
		
		case "banner-lista.php": 
		case "mesa-lista.php":
		case "md-coordinadores-lista.php":
		case "expres-lista.php":
		case "sociosh-lista.php":
		case "acuerdos-lista.php":
		case "presidente-editar_expresidente.php":
		case "evento-lista.php":
		case "revista-lista.php":
		case "expres-lista.php":{
?>
			<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
		    <script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
			<script src="<?=$path_lib?>dist/js/responsive-datatable-data.js"></script>
			<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
			<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
			<script src="<?=$path_lib?>dist/js/bootstrapValidator.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
			<script src="<?=$path_lib?>dist/js/sweetalert-data.js"></script>
			<script src="<?=$path_lib?>dist/js/init.js"></script>
			<script src="<?=$path_lib?>dist/js/pensatori.js"></script>
<?php
			break;
		}
		case "mesa-dir.php": {
			?>
			<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
			<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
			<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
			<script src="<?=$path_lib?>dist/js/init.js"></script>
<?php
			break;
		}	
		case "ct-amivtac-lista.php":
		case "ct-piarc-lista.php":{
?>
	    	<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
		    <script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
			<script src="<?=$path_lib?>dist/js/responsive-datatable-data.js"></script>
			<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
			<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>		
			<script src="<?=$path_lib?>dist/js/sweetalert-data.js"></script>
			<script src="<?=$path_lib?>dist/js/init.js"></script>
	
<?php
			break;
		}
		case "ct-amivtac-nuevo.php":
		case "ct-amivtac-editar.php":
		case "ct-piarc-nuevo.php":
		case "ct-piarc-editar.php":{
			?>			
		   	<script src="<?=$path_lib?>vendors/bower_components/jquery/dist/jquery.min.js"></script>
		    <script src="<?=$path_lib?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
			<script src="<?=$path_lib?>dist/js/responsive-datatable-data.js"></script>
		    <script src="<?=$path_lib?>dist/js/moment-with-locales.min.js"></script>
		    <script src="<?=$path_lib?>dist/js/bootstrap-datetimepicker.min.js"></script>			
			<script src="<?=$path_lib?>dist/js/jquery.slimscroll.js"></script>
			<script src="<?=$path_lib?>dist/js/dropdown-bootstrap-extended.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/switchery/dist/switchery.min.js"></script>
			<script src="<?=$path_lib?>vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>	
			<script src="<?=$path_lib?>dist/js/bootstrapValidator.min.js"></script>
			<script src="<?=$path_lib?>dist/js/sweetalert-data.js"></script>			
			<script src="<?=$path_lib?>dist/js/pensatori.js"></script>
			<script src="<?=$path_lib?>dist/js/validaciones.js"></script>
			<script src="<?=$path_lib?>dist/js/init.js"></script>					
		<?php
			break;
		}	
	}
?>
</body>
</html>