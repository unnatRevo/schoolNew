<?php

include '../../Model/dbStudent.php';
include '../../Controller/student/studentEntryCon.php';

$id = $_GET['id'];
$stan = $_GET['standard'];

echo $id;
echo $stan;

$param = $_GET;

echo print_r($myvalue);


$obj = new dbStudent;
$obj->insertIntoStudentStandard('tblstudentstandard');

//header('location: /schoolNew/View/students/studentList.php');

?>