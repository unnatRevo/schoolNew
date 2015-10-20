<?php
/**
* @author : unnat
* @uses	: for database operation
*/
class dbUser
{	
	function dbconnectModel(){
		$server = "localhost";
		$username = "root";
		$password = "";
		$database = "db_school";
		
		$con = new mysqli($server, $username, $password, $database);
		return $con;
	}	
	/**
	* @uses : inserting data into tbluserdetails (Signup table)
	*/
	function insertUserDetails($valueArray){
		$con = $this->dbconnectModel();
		
		$qry = "INSERT INTO "
					. "tbluserdetails"
					. " VALUES "
						. " ( ' " 
							. implode ( "','", $valueArray ) 
						. " ' ) " ;
		//mysqli_query($conn,$qry);
		$con->query($qry);
		$con->close();
	}
	
	/**
	* @uses : inserting data into tbluserlogin (Login table)
	*/
	function insertUserLogin($fields){
		$con = $this->dbconnectModel();
		
		$qry = "INSERT INTO "
					. "tbluserlogin"
					. " VALUES "
						. " ( '" 
							. implode ( "','", $fields ) 
						. " ' ) " ;
		//mysqli_query($conn,$qry);
		$con->query($qry);
		$con->close();
	}
	
	/**
	* @uses	:	get value of username to check weather it is present or not.
	* 			table name : tbluserdetails	
	*/
	function getAllUser(){
		$con = $this->dbconnectModel();
		$qry =	"SELECT * FROM tbluserdetails";
		
		$result = mysqli_query($con,$qry);
		return $result;
	}
	
	function getLoginDetails(){
		$con = $this->dbconnectModel();
		$qry = "SELECT * FROM tbluserlogin";
		
		$result = $con->query($qry);
		return $result;
	}
}

?>