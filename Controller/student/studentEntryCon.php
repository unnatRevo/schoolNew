<?php		
include '../../Model/dbStudent.php';		
		/*
		$FirstName = $_POST['firstname'];
		$MiddleName = $_POST['middlename'];
		$LastName = $_POST['lastname'];
		$Gender = $_POST['hostelfor'];
		$DOB = $_POST['dateofbirth'];
		$HostelStay = $_POST['hostelstay'];
		$IsActive = $_POST['isactive'];*/

		/*
		$myvalue = array(
			'FirstName' => $FirstName,
			'MiddleName' => $MiddleName,
			'LastName' => $LastName,
			'Gender' => $Gender,
			'DOB' => $DOB,
			'HostelStay' => $HostelStay,
			'IsActive' => $IsActive,
			'Standard' => $Standard
			 );*/

	$mykey = array();
		$myvalue = array();
		
		
		foreach($_POST as $key => $value)
		{
			if($key!='submit')
			{
					$mykey[] = $key;
					$myvalue[] = $value;
			}
		}
		
		//echo print_r($myvalue);
		
		$Standard = $_POST['btStreamGroup'];
		
		$obj = new dbStudent;
		$conn = $obj->dbconnectModel( ) ;

		$obj->insertData('tblstudent',$mykey,$myvalue);
		
		$qry = "SELECT nGRNO FROM tblstudent ORDER BY nGRNO DESC LIMIT 1";

		$results = mysqli_query($conn,$qry);

		$res = mysqli_fetch_assoc($results);

		extract($res);

		$bb = print_r($myvalue[8]);
		echo "bb:".$bb."<br>";
		//print_r($myvalue);
		echo $Standard;
		
		$qry1 = "INSERT INTO tblstudentstandard VALUES ('', $nGRNO , $Standard ) ";

		 mysqli_query($conn,$qry1);

		//$obj->insertIntoStudentStandard('tblstudentstandard',$nGRNO,$Standard);
	

		header('location: /schoolNew/View/students/studentList.php');
?>