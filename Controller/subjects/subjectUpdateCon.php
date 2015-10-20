<?php
include '../../Model/dbSubject.php';

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
		
		$obj = new dbSubject;
		$obj->editAnyData ( 'tblSubject', $finalArray, $id ) ;
		
		header('location: /schoolNew/View/subjects/subjectList.php');
?>