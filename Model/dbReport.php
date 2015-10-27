<?php
	include 'dbHostel.php';
	include 'dbStudent.php';
	include 'dbStandard.php';

class dbReport {
	
	function master(){
		$stuObj = new dbStudent;
		print_r($stuObj->getAllStudentData());
	}	
}
?>