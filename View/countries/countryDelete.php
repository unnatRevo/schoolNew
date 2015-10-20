<?php
include '../../Model/dbHostel.php';

$id = $_GET['id'];

$obj = new dbHostel();
$obj->hostelDelete($id);

header('location: /school/View/hostels/hostelList.php');

?>