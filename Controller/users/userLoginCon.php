<?php
session_start();
	include '../../Model/dbUser.php';
	
	$obj = new dbUser();
	$result=$obj->getLoginDetails();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	while ($row = mysqli_fetch_assoc($result)){
		if ( $username === $row['tUsername']  && $password === $row['tPassword'] ){
			$_SESSION['username'] = $username;
			header('location: /schoolNew/View/dashboard.php');
		} else {
			header ("location: /schoolNew/View/errors/noUserFound.php");
		}
	}
?>