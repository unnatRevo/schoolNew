<?php
	$redirect = "Location : /schoolNew/View/user/login.php";
	if ( !isset($_SESSION['username']) ){
		header($redirect);
	}
?>