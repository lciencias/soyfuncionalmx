<?php
if(!$_SESSION['userId']){
	header("Location: ".$path_web);
}else{
	$_SESSION ['fechaMov'] = date("Y-m-d H:i:s");
}

?>