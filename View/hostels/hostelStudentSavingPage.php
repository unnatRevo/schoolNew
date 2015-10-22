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

					
		


$updateAllocationQry = " UPDATE "
							. " tblstudentroomallocation s"
						. " SET "
							. " isAllocated = 0 "
						. " WHERE "
							. " nHostelId = " . $_GET[ 'nHostelId' ]
						. " AND "
							. " nRoomId = " . $_GET[ 'nRoomId' ] ;
//$updateInStudent = "UPDATE tblstudent SET bStaysAtHostel = 0 WHERE nGRNO = $_GET['nGRNO']";

	mysqli_query( $conn, $updateAllocationQry ) ;
	
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
		}

		$iterator++ ;
	}
	
	header('location: /schoolNew/View/hostels/hostelStudentEntry.php');
?>