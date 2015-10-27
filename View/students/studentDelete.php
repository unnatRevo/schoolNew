<?php
include '../../Model/dbStudent.php';

$id = $_GET['id'];

$obj = new dbStudent();
$conn = $obj->dbconnectModel( ) ;
$obj->deleteStudent($id);

$qryStandard = "DELETE FROM tblstudentstandard WHERE nGRNO = $id";

mysqli_query($conn,$qryStandard);

header('location: /schoolNew/View/students/studentList.php');

?>