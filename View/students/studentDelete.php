<?php
include '../../Model/dbStudent.php';

$id = $_GET['id'];

$obj = new dbStudent();
$obj->deleteStudent($id);

header('location: /schoolNew/View/students/studentList.php');

?>