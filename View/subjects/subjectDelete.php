<?php
include '../../Model/dbSubject.php';

$id = $_GET['id'];

$obj = new dbSubject;
$obj->subjectDelete($id);

header('location: /schoolNew/View/subjects/subjectList.php');

?>