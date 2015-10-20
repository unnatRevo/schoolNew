<?php

class dbCountry
{
	function dbconnectModel()
	{
		$servername 	= "localhost";
		$username 		= "root";
		$password		= "";
		$dbname 		= "db_school";
		
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		
		return $conn;
	}
	
	function getAllCountryData()
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT "
					. " nCountryId, "
					. " tCountryName "
				. "FROM "
					. " tblCountries" ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
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
	function deleteData($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "DELETE FROM "
					. " tblCountries "
				. " WHERE "
					. " nCountryId = '$id' " ;
	
		mysqli_query($conn,$qry);
		
		echo "Data Deleted";
	}
	function getCountryData($id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "SELECT "
					. " * "
				. " FROM "
					. " tblCountries "
				. " WHERE "
					. " nCountryId = '$id' " ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}
	function editData($tablename,$values,$id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "UPDATE "
					. $tablename 
				. " SET "
					. implode (" , ", $values ) 
				. " WHERE "
					. " nCountryId = '$id' " ;
		
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
	}
}

?>