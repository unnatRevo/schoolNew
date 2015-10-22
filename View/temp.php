<?php

include '../Model/dbModel.php';

$obj = new dbModel;
$result = $obj->getDataHostelModel1();

while($row = mysqli_fetch_assoc($result))
{
	echo $row['hostelname']."<br>";
}

?>