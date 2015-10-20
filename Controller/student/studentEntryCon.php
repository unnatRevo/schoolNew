<?php		
include '../../Model/dbStudent.php';		
		
		$FirstName = $_POST['firstname'];
		$MiddleName = $_POST['middlename'];
		$LastName = $_POST['lastname'];
		$Gender = $_POST['hostelfor'];
		$DOB = $_POST['dateofbirth'];
		$HostelStay = $_POST['hostelstay'];
		$IsActive = $_POST['isactive'];
		$Standard = $_POST['stream'];

		$myvalue = array(
			'FirstName' => $FirstName,
			'MiddleName' => $MiddleName,
			'LastName' => $LastName,
			'Gender' => $Gender,
			'DOB' => $DOB,
			'HostelStay' => $HostelStay,
			'IsActive' => $IsActive,
			'Standard' => $Standard
			 );
		
		$obj = new dbStudent;
		$obj->insertStudentData('tblstudent',$myvalue);
		
		header('location: /schoolNew/View/students/studentList.php');
?>