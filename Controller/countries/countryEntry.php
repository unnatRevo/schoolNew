<?php		
include '../../Model/dbCountry.php';

		$mykey = array();
		$myvalue = array();
		
		
		foreach($_POST as $key => $value)
		{
			if($key!='submit')
			{
					$mykey[] = $key;
					$myvalue[] = $value;
			}
		}
		
		$obj = new dbCountry;
		$obj->insertData('tblCountries',$mykey,$myvalue);
		
		header('location: /schoolNew/View/countries/countryList.php');
?>