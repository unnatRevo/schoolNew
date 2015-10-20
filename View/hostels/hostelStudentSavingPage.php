<?php 
session_start();
include '../../Model/dbHostel.php' ;
include '../../Model/dbStudent.php' ;

//include 'roomallocation.php';

$obj = new dbStudent ;

echo $_GET[ 'nHostelId' ] ;
echo $_GET[ 'nRoomId' ] ;
echo $_GET[ 'total' ] ;

$conn = $obj->dbconnectModel( ) ;


$updateAllocationQry = " UPDATE "
							. " tblstudentroomallocation "
						. " SET "
							. " isAllocated = 0 "
						. " WHERE "
							. " nHostelId = " . $_GET[ 'nHostelId' ]
						. " AND "
							. " nRoomId = " . $_GET[ 'nRoomId' ] ;
							
	mysqli_query( $conn, $updateAllocationQry ) ;
	
	$iterator = 1;
	while ( $iterator<=$_GET[ 'total' ] )
	{
		
		if ( $obj->checkStudentExistence("tblstudentroomallocation", $_GET[ $_GET[ 'nRoomId' ].$iterator ] ) > 0  )
		{
			?>
				<script>
					alert( "1" ) ;
				</script>
			<?php
			$updateAllocationQry = " UPDATE "
										. " tblstudentroomallocation "
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
					alert( "2" ) ;
				</script>
			<br />
				<?php
			mysqli_query( $conn, $insertQry ) ;
		}

		$iterator++ ;
	}
	
	header('location: ../../View/hostels/hostelStudentEntry.php');
?>