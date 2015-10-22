<?php
include '../../Model/dbHostel.php';

$id = $_GET['id'];

$obj = new dbHostel();
$obj->studentEntryDelete($id);

header('location: /school/View/hostels/hostelStudentEntry.php');

?>