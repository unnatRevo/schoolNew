<?php
include '../../Model/dbCountry.php';

		
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
		
		$obj = new dbCountry;
		$obj->editData ( 'tblCountries', $finalArray, $id ) ;
		
		header('location: /schoolNew/View/countries/countryList.php');
?>