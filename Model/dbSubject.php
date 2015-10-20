<?php

class dbSubject
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
	function getAllSubjects()
	{
		$conn = $this->dbconnectModel();
		$qry = "SELECT "
					. " nSubjectId, "
					. " tSubjectName, "
					. " nForStandard, "
					. " nStandardId, "
					. " tStandardName "
				. "FROM "
					. " tblSubject, "
					. " tblStandard "
				. " WHERE "
					. " tblStandard.nStandardId = tblSubject.nForStandard "
				. " ORDER BY "
					. " tStandardName ASC, "
					. " tSubjectName ASC " ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}

	function insertSubject ( $tSubjectName, $nForStandard )
	{
		$conn = $this->dbconnectModel();
		
		$qry = "INSERT INTO "
					. " tblSubject "
					. " ( "
						. " tSubjectName, "
						. " nForStandard "
					." ) "
					. " VALUES "
						. " ( " 
							. " '$tSubjectName' , "
							. $nForStandard
						. " ) " ;
		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
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
					. " tblSubject "
				. " WHERE "
					. " nSubjectId = '$id' " ;
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}
	function editAnyData($tablename,$values,$id)
	{
		$conn = $this->dbconnectModel();
		
		$qry = "UPDATE "
					. $tablename 
				. " SET "
					.implode(" , ",$values)
				. " WHERE "
					. " nSubjectId = '$id'" ;
		
		//echo "$qry" ;

		mysqli_query($conn,$qry);
		
		mysqli_close($conn);
		
	}
}

?>