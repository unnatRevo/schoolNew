<?php
	session_start();
	$my_sessionStatus_value = session_status();
	
	if ( $my_sessionStatus_value ) {
		$session_destroyed_value = session_destroy();
		if ( $session_destroyed_value ){
			header('location: /schoolNew/View/user/login.php');
		}
	} else {
		header ('location : /schoolNew/View/errors/technical_error.php');
	}
?>