<?php

class dbHostel
{	

	function dbconnectModel()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "db_school";
		
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		
		return $conn;
	}
	

	function getDataHostelModel1()
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT "
					. " nHostelId, "
					. " tHostelName, "
					. " tHostelAddress, "
					. " bHostelFor, "
					. " nMaxCapacity "
				. "FROM "
					. " tblhostel" ;

		$result = mysqli_query($conn,$qry);
		
		return $result;
	}
	
	// author : AAKASH
	function getHostelNames()
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT "
					. " nHostelId ,"
					. " tHostelName ,"
					. " bHostelFor "
				. " FROM "
					. " tblhostel " ;
		
		return mysqli_query($conn,$qry);
	}
		
	function getHostelNameFromId($nHostelId)	
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT *"
					. " FROM "
					. " tblhostel " 
					." WHERE "
					." nHostelId = " . $nHostelId ;
		
		return mysqli_query($conn,$qry);
	
	}
	function getRoomNameFromId($nRoomId)	
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT *"
					. " FROM "
					. " tblhostelrooms " 
					." WHERE "
					." nRoomId = " . $nRoomId ;
		
		return mysqli_query($conn,$qry);
	
	}
	
	// author : AAKASH
	function getAllocatedRooms($nHostelId,$nRoomId)
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT * FROM tblstudentroomallocation WHERE nHostelId=$nHostelId AND nRoomId=$nRoomId AND isAllocated !=0 ";

		$result = mysqli_query($conn,$qry);

		return $result;
	}

	// author: AAKASH
	function displayHostelStudentEntry($nHostelId)
	{
	
		$conn = $this->dbconnectModel();
		$qry = "SELECT"
					."room.tRoomNo,"
					."stud.tFname"
				."FROM"
					."tblhostelrooms room ,"
					."tblstudent stud"
				."WHERE"
					."nHostelId ='$nHostelId'";

		return mysqli_query($conn,$qry);
	}

	// author : Unnat
	function getRoomDetails($nHostelId)
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT tRoomNo, nRoomId, nMaxCapacity FROM tblhostelrooms WHERE nHostelId= '$nHostelId' " ;
		return mysqli_query($conn, $qry);
	}
	function getSingleRoomView($id){
		$conn = $this->dbconnectModel();
		$qry = "SELECT * FROM tblhostel WHERE nHostelId = $id";
		return mysqli_query($conn, $qry);
	}
	function countRoomFormSingelHostel($id){
		$conn = $this->dbconnectModel();
		$qry = "SELECT count(nHostelId) FROM tblhostelrooms WHERE nHostelId=$id";
		return mysqli_query($conn , $qry);
	}
	function countTotalStudentForSingleHoste($id){
		$conn = $this->dbconnectModel();
		$qry = "SELECT COUNT(nGRNO) FROM tblstudentroomallocation WHERE nHostelId= $id";
		return mysqli_query($conn, $qry);
	}

	// author : Unnat

	/*function getMixData($hostelList){
		$conn = $this->dbconnectModel();
		$qry = "SELECT"
					."tblhostel.tHostelName,"
					."tblstudent.tFname,"
					."tblhostelrooms.tRoomNo,"
					."tblstudent.tLname"
				."FROM"
					."tblhostel"
				."INNER JOIN"
					."tblstudent"
				."INNER JOIN"
					."tblhostelrooms"
				."ON"
					."tblhostel.bHostelFor = tblstudent.bGender"
				."ON"
					."tblhostelrooms.nHostelId = tblhostel.nHostelId"
				."WHERE"
					."tblstudent.bGender = 1"
				."AND"
					."( SELECT "
						."tblhostel.nHostelId"
					."FROM"
						."tblhostel"
					."WHERE"
						."tblhostel.tHostelName = $hostelList )";
		return mysqli_query($conn, $qry);
	}*/
	
	function ruffWork ($hostelList)
	{
		$hostelName = substr($hostelList, -2);
		$conn = $this->dbconnectModel();
		$qry = "SELECT "
					."tblhostelrooms.tRoomNo"
				."FROM tblhostelrooms"
				."WHERE tblhostelrooms.nHostelId = ("
				."SELECT"
					."tblhostel.nHostelId"
				."FROM tblhostel"
				."WHERE tHostelName = $hostelName ) ";

		return mysqli_query($conn, $qry);
	}

	// author : AAKASH
	function studentEntryDelete($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "DELETE FROM "
					. " tblStudentEntries "
				. " WHERE "
					. " nGRNO = '$id' " ;
	
		mysqli_query($conn,$qry);
		
		echo "Data Deleted";
	}
	
	
	function insertAnyData($tablename,$valuesArray)
	{
		$conn = $this->dbconnectModel();
	
		extract($valuesArray);
		echo "<br>$hostelname";
		echo "<br>$hostelfor";
		echo "<br>$hosteladdress";
		echo "<br>$hostelcapacity";
		echo "<br>$nMaxCapacity";

		//print_r($valuesArray);	
	/*	$qry = "INSERT INTO "
					. $tablename 
					. " VALUES "
						. " ( ' " 
							. implode ( "','", $valuesArray ) 
						. " ' ) " ;*/
		
		 $qry = " INSERT INTO $tablename VALUES ( '' , '$hostelname' , $hostelfor , '$hosteladdress' , $hostelcapacity , $nMaxCapacity  ) ";
		

		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
		echo "Data Inserted successfully";
		
	}


	function insertData($tablename,$field,$valuesArray)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "INSERT INTO "
					. $tablename 
					. " ( "
						. implode ( ",", $field )
					." ) "
					. " VALUES "
						. " ( ' " 
							. implode ( "','", $valuesArray ) 
						. " ' ) " ;

		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
		echo "Data Inserted successfully";
		
	}

	function hostelDelete($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "DELETE FROM "
					. " tblhostel "
				. " WHERE "
					. " nHostelId = " . $id;
	
		mysqli_query($conn,$qry);
		
		echo "Data Deleted";
	}
	function hostelViewSingle($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "SELECT "
					. " * "
				. " FROM "
					. " tblhostel "
				. " WHERE "
					. " nHostelId = '$id' " ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}
	function editAnyData($tablename,$values,$id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "UPDATE $tablename SET ".implode(" , ",$values)." WHERE nHostelId = '$id'";
		
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
	}
}

?>