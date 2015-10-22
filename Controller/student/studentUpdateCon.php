<?php
include '../../Model/dbStudent.php';

		$std = $_POST['btStreamGroup'];
		$finalArray = array();
		
		foreach ( $_POST as $key => $valuesArray )
		{
			if ( $key != 'submit' )
			{
				if ( $key == 'id' )
				{
					$id = $valuesArray ;
				}
				else
				{
					$finalArray[] = $key . " = '" . $valuesArray . "'" ;
				}
			}
		}
		
		$obj = new dbStudent;
		$conn = $obj->dbconnectModel( ) ;
		$obj->editAnyData( 'tblstudent', $finalArray, $id ) ;

		$qry1 = "UPDATE tblstudentstandard SET nStandardId = $std WHERE nGRNO = $id ";

		 mysqli_query($conn,$qry1);
		//echo $std . "" . $id ;
		//print_r($finalArray);
		header('location: /schoolNew/View/students/studentList.php');
?>