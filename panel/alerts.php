<?php
if(trim($_SESSION['msgError']) != ''){
	echo "<div class='alert alert-danger alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span></button>".$_SESSION['msgError']."
		</div>";
}
if(trim($_SESSION['msgWarning']) != ''){
	echo "<div class='alert alert-warning alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span></button>".$_SESSION['msgWarning']."
		</div>";
}
if(trim($_SESSION['msgSuccess']) != ''){
	echo "<div class='alert alert-success alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span></button>".$_SESSION['msgSuccess']."
		</div>";
}
?>