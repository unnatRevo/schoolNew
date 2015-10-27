<?php 

include '../../Model/dbHostel.php' ;
include '../../Model/dbStudent.php' ;

//include 'roomallocation.php';

$obj = new dbStudent ;

echo $_GET[ 'nHostelId' ] ;
echo $_GET[ 'nRoomId' ];// . "<script> alert( ".$_GET['nRoomId']." ) ; </script>";
echo $_GET[ 'total' ] ;
// echo "<script> alert( '".$bb."' ) ; </script>";
	
$conn = $obj->dbconnectModel( ) ;

/*$results = $newObj->getAllFromStudentRoomAllocation();	
$row = mysqli_fetch_assoc($results);*/
		


$updateAllocationQry = " UPDATE "
							. " tblstudentroomallocation "
						. " SET "
							. " isAllocated = 0 "
						. " WHERE "
							. " nHostelId = " . $_GET[ 'nHostelId' ]
						. " AND "
							. " nRoomId = " . $_GET[ 'nRoomId' ] ;

						mysqli_query( $conn, $updateAllocationQry ) ;

$updateInStudent = "UPDATE "
						. " tblstudent " 
					. " SET "
						. " bStaysAtHostel = 0 "
					. " WHERE "
						. " nGRNO IN ( "
						. " SELECT "
							. " nGRNO "
						. " FROM "
							. " tblstudentroomallocation "
						." WHERE "
							." isAllocated = 0 )";
			
				mysqli_query( $conn, $updateInStudent ) ;
	
	$iterator = 1;
	while ( $iterator<=$_GET[ 'total' ] )
	{
		
		if ( $obj->checkStudentExistence("tblstudentroomallocation", $_GET[ $_GET[ 'nRoomId' ].$iterator ] ) > 0  )
		{

			?>
				<script>
					alert( "in if=".$iterator ) ;

				</script>
			<?php
			$updateAllocationQry = " UPDATE "
										. " tblstudentroomallocation  "
									. " SET "
										. " isAllocated = 1 "
									. " WHERE "
										. "nGRNO = " . $_GET[ $_GET[ 'nRoomId' ].$iterator ] ;
										
			mysqli_query( $conn, $updateAllocationQry ) ;

			$updateInStudent = "UPDATE "
									. " tblstudent "
								." SET "
									. "bStaysAtHostel = 1 "
								." Where "
									. " nGRNO = " . $_GET[ $_GET[ 'nRoomId' ].$iterator ];
			
			mysqli_query($conn , $updateInStudent);
		}
		else
		{

			echo  $_GET['nHostelId'] ;
			echo  $_GET['nRoomId'] ;
			echo  $_GET[ $_GET[ 'nRoomId' ].$iterator ] ;


			$insertQry = "INSERT INTO "
							. " tblstudentroomallocation " 
							. " ( nHostelId, nRoomId, nGRNO, isAllocated) "
						. " VALUES ( " 
							. $_GET['nHostelId'] . ", "
							. $_GET['nRoomId']  . ", "
							. $_GET[ $_GET[ 'nRoomId' ].$iterator ] . ", "
							. " 1 "
							. " ) ";
				?>

				<script>
					alert( "in else=".$iterator ) ;
				</script>
			<br />
				<?php
			mysqli_query( $conn, $insertQry ) ;

			$insertInStudent = "INSERT INTO "
								. " tblstudent "
									. " ( bStaysAtHostel ) "
								. " VALUES ( "
									. "  1 ) "
								. " WHERE "
									. " nGRNO = " .$_GET[ $_GET[ 'nRoomId' ].$iterator ];
			mysqli_query($conn , $insertInStudent);
		}

		$iterator++ ;
	}
	
	header('location: /schoolNew/View/hostels/hostelStudentEntry.php');
?>