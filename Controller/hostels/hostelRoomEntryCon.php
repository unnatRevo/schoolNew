<?php		
include '../../Model/dbHostel.php';

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
		
		$obj = new dbHostel;
		$obj->insertData('tblhostelrooms',$mykey,$myvalue);

		print_r($mykey);
		print_r($myvalue);
		header('location: /schoolNew/View/hostels/hostelList.php');
?>