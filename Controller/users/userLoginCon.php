<?php
session_start();
	include '../../Model/dbUser.php';
	
	$obj = new dbUser();
	$result=$obj->getLoginDetails();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$_SESSION['username'] = $username;
	while ($row = mysqli_fetch_assoc($result)){
		if ( $username == $row['tUsername']  && $password == $row['tPassword'] ){
			header('location: /schoolNew/View/students/studentList.php');
		} else {
			header ("location: /schoolNew/View/errors/noUserFound.php");
		}
	}
?>