<?php

	// add details for user while siging up.

include '../../Model/dbUser.php';

$usrname = $_POST['username'];
$password = $_POST['password'];
$cpwd = $_POST['cpassword'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$checkValue = $_POST['checkpoint'];
$userType = $_POST['usertype'];
	
	try{
		$obj = new dbUser();
		
		if ($userType === "Admin") {
			global $type;
			$type = 1;
		} else {
			$type = 0;
		}
		
		$userDetails = array( 
						"uname"=>$usrname, 
						"pwd"=>$password,
						"firstname"=>$fname,
						"lastname"=>$lname,
						"utype"=>$type );
		$userLogin = array($usrname , $password, $type);
		
		$result = $obj->getAllUser();
		
		$flag=0;
		while ($row = mysqli_fetch_assoc($result)){
			if ( !($usrname === $row['tUsername'])){
				$flag++;
				break;
			}
		}
		echo "Flag :".$flag;
		extract($userDetails);
		echo "<br>$uname-$pwd-$firstname-$lastname-$utype";
		//implode(",",$userLogin);
		
			
		if ( $flag > 0){
			echo "<script> alert ('Username is not available'); </script>";
		} else {
			if ($password === $cpwd){
				$obj->insertUserLogin($userLogin);
				$obj->insertUserDetails($userDetails);
				header('location: /schoolNew/View/user/login.php');
			}
		}
	} catch (Exception $e) {
		echo "Error :".$e->getMessage()."\n";
	}
?>