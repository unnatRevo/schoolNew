<?php

class dbStandard
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
	function addDataModel()
	{
		
	}
	function getAllStandards()
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT "
					. " nStandardId, "
					. " tStandardName "
				. "FROM "
					. " tblStandard "
				;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}

	function insertAnyData($tablename,$field,$valuesArray)
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
	function subjectDelete($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "DELETE FROM "
					. " tblhostel "
				. " WHERE "
					. " nHostelId = '$id' " ;
	
		mysqli_query($conn,$qry);
		
		echo "Data Deleted";
	}
	function getSubject($id)
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