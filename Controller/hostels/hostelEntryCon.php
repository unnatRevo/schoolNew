<?php		
include '../../Model/dbHostel.php';		
		
		$hostelName = $_POST['hostelname'];
		$hostelFor = $_POST['hostelfor'];
		$address = $_POST['hosteladdress'];
		$capacity = $_POST['hostelcapacity'];
		$nMaxCapacity = $_POST['nMaxCapacity'];

		$myvalue = array(
			'hostelname' => $hostelName,
			'hostelfor' => $hostelFor,
			'hosteladdress' => $address,
			'hostelcapacity' => $capacity,
			'nMaxCapacity' => $nMaxCapacity
			 );



		
		$obj = new dbHostel;
		$obj->insertAnyData('tblhostel',$myvalue);
		
		header('location: /schoolNew/View/hostels/hostelList.php');
?>