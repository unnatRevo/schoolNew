<?php
	include '/../../Model/dbHostel.php';
	include '/../../Model/dbStudent.php';
	include '/../../Model/dbStandard.php';
class dbReport {
	
	function demo(){
		$stuObj = new dbStudent;
		$studentData = $stuObj->getAllStudentData();
		print_r($studentData);	
	}	
}
?>