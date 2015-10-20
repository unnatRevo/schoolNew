<?php
include '../../Model/dbHostel.php';

		
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
		
		$obj = new dbHostel;
		$obj->editAnyData ( 'tblhostel', $finalArray, $id ) ;
		
		header('location: /schoolNew/View/hostels/hostelList.php');
?>