<?php
session_start();
//include "../include/config.php";

include '../../Model/dbHostel.php' ;
include '../../Model/dbStudent.php' ;

	if ( !isset($_SESSION['username']) ) {
		header('location: /schoolNew/View/user/login.php');
	}
function listStudentName( $hostelList, $standard )
{
//$sql="select * from tblHostel where nHostelId='".$_POST['hostelList']."'";

$sql = "select nGRNO,tFname,tMname,tLname from tblstudent, tblstudentstandard ss where nGRNO = ss.nGRNO AND bGender = ( select bHostelFor from tblhostel where nHostelId = $hostelList ) AND ss.nSemesterId = $standard" ;

return mysql_query($sql) or die(mysql_error());

}
?>