<?php
session_start();
include '../../Model/dbHostel.php';
$id 	= $_GET['id'];
$obj 	= new dbHostel;
//print_r($row);

//echo "<br>".$for;

?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Hostel Report</title>
	
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

		<!-- start: Header -->
	
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->

			<?php
				include '../../mainMenu.html';
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
					<a href="../dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="hostelList.php">Hostel List</a>
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Student Report</a></li>
			</ul>		
				
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon list"></i><span class="break"></span><b>Hostel Report</b></h2>
						<div class="box-icon">
						
							<a href="hostelList.php" class="btn-minimize"><i class="halflings-icon chevron-left"></i> Back to list</a>
						</div>
					</div>
					<?php
						$result = $obj->getSingleRoomView($id);
						while ($row = mysqli_fetch_assoc($result)){
					?>
					<div class="box-content">
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<tr>
							
							
							<td>
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									<tr>
										<td style="width:100px;">Hostel name</td>
										<td><?php echo $row['tHostelName']; ?></td>
									</tr>
									<tr>
										<td>Hostel for</td>
										<td><?php 
											if ( $row['bHostelFor'] == 1 ) echo "<font color='blue'>Male</font>";
											else echo "<font color='magenta'>Female</font>";
										?></td>
									</tr>
									<tr>
										<td>Location</td>
										<td> <?php echo  $row['tHostelAddress']; ?> </td>
									</tr>
									<tr>
										<td>Hostel Capactiy</td>
										<td><?php echo $row['nHostelCapacity'];} ?></td>
									</tr>
								
							</td>
						
						<tr>
							<td>Total rooms</td>
							<td><?php
								$hostelRoom = $obj->countRoomFormSingelHostel($id);
								$row = mysqli_fetch_assoc($hostelRoom);
								echo implode("", $row);
							 ?></td>
						</tr>
						<tr>
							<td>Present Students</td>
							<td>
								<?php
									$totalStudent = $obj->countTotalStudentForSingleHoste($id);
									$row = mysqli_fetch_assoc($totalStudent);
									echo implode("",$row);
								?>
							</td>
						</tr>
						<tr>
							<td>Attendence</td>
							<td>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td>Group</td>
							<td>
								&nbsp;
							</td>
						</tr>
					</tr>
				</table>
					</table>
					</div>
					<?php
					//s}
					?>
				</div><!--/span-->
					
			
			</div><!--/row-->
		
			</div><!--/.fluid-container-->
				
				
			
	
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; <?php echo date('Y') ?> School</span>
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<?php
			include '../../allJS.html' ;
		?>
		
	<!-- end: JavaScript-->
	
</body>
</html>
