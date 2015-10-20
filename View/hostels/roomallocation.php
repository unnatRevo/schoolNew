
<?php
session_start();
ini_set('display_error', true) ;
error_reporting(E_ALL | E_NOTICE) ;

include '../../Model/dbHostel.php' ;
include '../../Model/dbStudent.php' ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Allocate Room</title>
	
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

<body>
<?php
	if ( !isset($_SESSION['username']) ) {
		header('location: /schoolNew/View/user/login.php');
	}
?>
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
						<li><a href="hostelList.php"><i class="icon-th-list"></i><span class="hidden-tablet"> Hostel List</span></a></li>
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
				<li><a href="#">Room Allocation</a></li>
			</ul>		
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon plus"></i><span class="break"></span>Add Hostel</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="hostelStudentSavingPage.php" method="GET">
							<fieldset>

							<!-- OBJECT FOR STUDENT & HOSTELS -->

							<?php

								$hstObj = new dbHostel;
								$stdObj = new dbStudent;

								$hostelDetail = $hstObj->getHostelNameFromId( $_GET[ 'nHostelId' ] );
								$hostelRow = mysqli_fetch_assoc($hostelDetail);
								extract( $hostelRow ) ;

								$roomDetails = $hstObj->getRoomNameFromId( $_GET[ 'nRoomId' ] );
								$roomRow = mysqli_fetch_assoc($roomDetails);
								extract( $roomRow ) ;

								$allStudentData = $stdObj->getAllStudentData( ) ;
								//$allStudent = mysqli_fetch_assoc($allStudentData);
								//extract($allStudent);

							?>

			<input type = "hidden" name = "nHostelId"	value = "<?php echo $_GET[ 'nHostelId' ] ;	?>"	/>
			<input type = "hidden" name = "nRoomId"		value = "<?php echo $_GET[ 'nRoomId' ] ;	?>"	/>
			<input type = "hidden" name = "total"		value = "<?php echo $_GET[ 'total' ] ;		?>"	/>
							
			
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Hostel Name</label>
								<label class="control-label" for="focusedInput"><?php echo $tHostelName ; ?></label>
								</div>
			
							   <div class="control-group">
								<label class="control-label">Room No.</label>
								<label class="control-label" for="focusedInput"><?php echo $tRoomNo ; ?></label>
								</div>

								<div class="control-group hidden-phone">
									<label class="control-label">Capacity</label>
									<label class="control-label"><?php echo $_GET[ 'total' ] ; ?></label>

								</div>

								<div class="control-group hidden-phone">
									<label class="control-label">Allocated</label>
									<label class="control-label"><?php echo $_GET[ 'allocated' ] ; ?></label>
								</div>

								<div>
									<label  class="control-label">Assign Student : </label>
								</div>

								<div>
									<?php 

										//$allStudentNames = 
										
										$iterator = 1 ;
										while( $iterator <= $_GET['total'] )
										{
										
									?>		
											<select name="<?php echo $nRoomId.$iterator; ?>" >
											<option value="#"> --ALLOCATE-- </option>

												<?php	
													$allStudentData = $stdObj->getAllStudentData( ) ;
													while( $row = mysqli_fetch_assoc( $allStudentData ) )
													{
														extract( $row ) ;
												
														
														if( $row['nGRNO'] == $_GET[ $nRoomId.$iterator ] )
														{
												?> 			<option selected="true" value="<?php echo $nGRNO; ?>"> <?php echo $tFname . " " . $tLname ; ?> </option>
												<?php 	}
														else
														{
												?>
														<option value="<?php echo $nGRNO; ?>"> <?php echo $tFname . " " . $tLname ; ?> </option>
											<?php												
														}
														
													}
											?> 
											</select><br />	<label  class="control-label"> &nbsp; </label>

									<?php
											$iterator ++ ;
										}
									?>
									<label >* To Remove Student Select Allocate</label>
								</div>
								

							  <div class="form-actions">
								<input type="submit" class="btn btn-primary" value="SAVE" ></input>
								<a href="hostelStudentEntry.php"><button type="button" class="btn">Cancel</button></a>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			
		
			</div><!--/.fluid-container-->
				
				
			
	
	
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
			include '../../allJS.html';
		?>
		
	<!-- end: JavaScript-->
	
</body>
</html>