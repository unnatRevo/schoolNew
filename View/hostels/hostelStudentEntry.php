<?php
session_start();
ini_set('display_error', true) ;
error_reporting(E_ALL | E_NOTICE) ;

include '../../Model/dbHostel.php' ;
include '../../Model/dbStudent.php' ;
//include 'select.php' ;

	if ( !isset($_SESSION['username']) ) {
		header('location: /schoolNew/View/user/login.php');
	}
?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Hostel List</title>
	
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="../../Theme/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../Theme/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../../Theme/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../../Theme/css/style-responsive.css" rel="stylesheet">
	<link id="font-awesome" href="../../Theme/css/font-awesome.css" rel="stylesheet">
	<link id="font-awesomemin" href="../../Theme/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="../../Theme/img/favicon.ico">
	<!-- end: Favicon -->
	
</head>

<script src="jquery-1.9.1.js"> </script>
<!--
<script type="text/javascript">

function fetch_r( hostelList, standard )
{
	//hostelList = '1';
	//standard="11";
	//alert( "1" ) ;
	if( hostelList == 0  )
	{
			   document.getElementById("box-content").value="Select Hostel";
			   //alert( "2" ) ;
	}else
	{
	
	//alert( "3 : " + ": "+ hostelList ) ;
	$hostel = hostelList;
	
	var datastr='hostelList='+hostelList + '&standard=' + standard;
	
	//alert ( "5 : " + datastr ) ;
	
	$.ajax({
		   type:'GET',
		   url:'select.php',
		   data:datastr,
		   success:function(data)
		   {
//			   document.getElementById("clg_name").value=dat[0];
	//		   document.getElementById("clg_add").value=dat[1];
		//	   document.getElementById("clg_email").value=dat[2];			   
				
				//document.write( "Done" ) ;
				
				//alert( "4 : " + data ) ;
		   },
		   failure:function()
		   {
				alert ( "FAILED" ) ;
		   }
		   });
	}
	return false;
}

</script>  
--> 


<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>School</span></a>
								
				
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->

			<?php
				include '../mainMenu.html';
			?>

			<!--
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a href="#">
								<i class="icon-th-list"></i>
								<span class="hidden-tablet"> Hostel List</span>
							</a>
						</li>
						<li><a href="hostelEntry.php"><i class="icon-plus"></i><span class="hidden-tablet"> Add Hostel</span></a></li>	
						</ul>
				</div>
			</div>
			-->
			
			<!-- end: Main Menu -->
			
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Hostel List</a></li>
			</ul>		
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
							<i class="halflings-icon list"></i>
							<span class="break"></span>
							<b>Hostels</b>
						</h2>
						<div class="box-icon">
						<a href="hostelEntry.php"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize">
								<i class="halflings-icon chevron-up"></i>
							</a>
						</div>
					</div>
					
				
					<?php
						
						$hObj = new dbHostel;
						$sObj = new dbStudent;
						$result = $hObj->getHostelNames();
					?>
					
					<form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
					
					<div class="box-content">
					
					<!--	<input type="button" onClick="fetch_r( 'H1', 11 )" value="TEST"></input> -->
					
						<select name="hostelList" >
						<option value="0" selected="true">--Select Hostel--</option>
					
						<?php
							$hostelName = '';
							if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

								$hostelName = isset($_POST['hostelList']) ? $_POST['hostelList'] : '' ;
						}
							while ( $list = mysqli_fetch_assoc($result) )
							{ 
						?>
								<option  value="<?php echo  $list [ 'nHostelId' ] ; ?>" name="<?php echo  $list [ 'nHostelId' ] ; ?>">
									<?php 
										if ( $list['bHostelFor'] == 1 )
										{
										?>
											<font color="blue"> <?php echo  "M-" . $list [ 'tHostelName' ] ; ?> </font>	
										<?php
										}
										else
										{
										?>
											<font color="pink"> <?php echo  "F-" . $list [ 'tHostelName' ] ; ?> </font>
										<?php
										
										}
										?>
								</option>
						<?php
							} 

						?>
					</select>
					
					<!--
					STANDARD :
					<label class="radio" >
						<input type="radio" name="standard" value="11" >11
					</label>
					<label class="radio">
						<input type="radio" name="standard" value="12" >12
					</label> -->
					&nbsp;&nbsp;&nbsp;	<input type="submit" name="getDetails" value="Go !" margin="100px" onClick="fetch_r(hostelList.value,standard.value);" />
					
					<center>
					<div >
							<u><b>HOSTEL NAME : <?php  echo $hostelName?></b></u>
					</div>
					</center>
					<?php
					$hObj = new dbHostel;
						// if ( $_SERVER['REQUEST_METHOD'] == "POST" ){

						// 	$hostelName = $_POST['hostelList'];
							

						// 	// echo $hostelName;
						// 	// echo "<script> alert ('hello'); </script>";
						// 	// $row = mysqli_fetch_assoc();
						// }
					?>
					
					<!--
						<input type="radio" name="standard" value="12">12</input>
					-->
					
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="width:90px;">Room No</th>
								  <th style="width:90px;">Capacity</th>
								  <th style="width:90px;">GRNO</th>
								  <th style="width:350px;">Name</th>
								  <th style="text-align:center">Operations</th>
							  </tr>
						  </thead>
							
						  <tbody>

								
						<?php
						
							$obj = new dbStudent;
							$allRoom = $hObj->getRoomDetails($hostelName);
							//$studentNames = $Obj->displayHostelStudentEntry($hostelName);
							$studentNames = $obj->getAllStudentData();
						
							while($roomDetails = mysqli_fetch_assoc( $allRoom ) )
							{	
								extract( $roomDetails ) ;
							?>
							<tr>
								<!-- ROOM NUMBERS-->
								<td width=85 style="text-align:center">
									<!-- Hostel <?php echo $hostelName?> -->
									Room <?php echo $tRoomNo; ?>
									
								</td>
								
								<!-- CAPACITY -->
								<td style="text-align:center">
									
									<?php
										$roomInfo = $hObj->getAllocatedRooms($hostelName,$nRoomId);
										$roomInfoResult = mysqli_num_rows($roomInfo);
									?>

									 <?php echo $roomInfoResult; ?> / <?php echo $nMaxCapacity; ?>									
									
								</td>

								<!-- GRNO-->
								<td style="text-align:center">
									<?php
									
									//$obj = new dbStudent;
									
									$studentAllocationData = $obj->fetchDataForAllocation($hostelName,$nRoomId);
									
									while ( $dataAnswer = mysqli_fetch_assoc( $studentAllocationData ) )
									{
										extract($dataAnswer);
									?>
										<label> <?php  echo $dataAnswer['nGRNO']; ?><br> </label>
									<?php 
									} 
									?>

								</td>

								<!-- STUDENT NAMES-->
								<td>
									<?php


									$studentAllocationData = $obj->fetchDataForAllocation($hostelName,$nRoomId);

									$URLStr =	'nHostelId=' 
													. $hostelName
												.'&nRoomId=' 
													. $nRoomId
												. '&total='
													. $nMaxCapacity;
									
									$count = 1;
									while ( $dataAnswer = mysqli_fetch_assoc($studentAllocationData) )
									{
//										//extract($dataAnswer);
									?>
										<label> <?php  echo $dataAnswer['tFname'] . " " . $dataAnswer['tLname']; ?><br> </label>
									<?php 
										$URLStr = $URLStr . "&" . $nRoomId . $count++ . "=" . $dataAnswer["nGRNO"] ;
									}
									
									$URLStr = $URLStr . "&allocated=" . $roomInfoResult ;
									
									//echo "URL STR : " . $URLStr ;
									
									?>

								</td style="text-align:center">

								<!-- OPERATIONS-->
								<td> 
									<a href='roomallocation.php?<?PHP echo $URLStr ; ?>' >
										<input type="button" name="sendDetails" value="Add !" margin="100px" />
									</a>
								</td>


									
								<!--	
								<td class="center" style="text-align:center">
<a href="studentEntrySave.php?id=<?php echo $roomDetails['tRoomNo']; ?>&total=<?php echo $nMaxCapacity; for( $optionCount=1; $optionCount<=$nMaxCapacity; $optionCount++ ) { echo '&'.$tRoomNo.$optionCount.'='.$nGRNO; }?>&hostelid=<?php echo $result['nHostelId']; ?>&std=standered">
										<font color="blue"><i class="fa fa-pencil-square-o"></i></font>
									</a>
								</td>
									-->
								<td class="center" style="text-align:center">
									<a href="studentEntryDelete.php?id=<?php echo $roomDetails['tRoomNo']; ?>">
										<font color="red"><i class="fa fa-trash-o"></i></font>
									</a>
								</td>
							</tr>	
							
							<?php	}	?>

						</form>

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
		
			</div><!--/.fluid-container-->
				
			
			<!-- ---------------- -->	
			
			

			<!-- ---------------- -->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 School Demo</span>
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<?php
			include '../../allJS.html' ;
		?>

	<!-- end: JavaScript-->
	
</body>
</html>
