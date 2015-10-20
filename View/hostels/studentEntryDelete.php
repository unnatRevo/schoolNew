<?php
session_start();
include '../../Model/dbHostel.php';
	if ( !isset($_SESSION['username']) ) {
		header('location: /schoolNew/View/user/login.php');
	}
$id = $_GET['id'];

$obj = new dbHostel();
$obj->studentEntryDelete($id);

header('location: /schoolNew/View/hostels/hostelStudentEntry.php');

?>