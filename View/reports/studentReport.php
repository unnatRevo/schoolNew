<?php
session_start();
include '../../Model/dbStudent.php';

$id 	= $_GET['id'];

$obj 	= new dbStudent;
$result = $obj->studentViewSingle($id);
$row 	= mysqli_fetch_assoc($result);

//print_r($row);

//echo "<br>".$for;

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
				<a class="#" href="index.html"><span>School</span></a>
								
				
				
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
				<li><a href="#">Student Report</a></li>
			</ul>		
				
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon list"></i><span class="break"></span><b>Student Report</b></h2>
						<div class="box-icon">
						
							<a href="../../View/students/studentList.php" class="btn-minimize"><i class="halflings-icon chevron-left"></i>Back to list</a>
						</div>
					</div>
					
					
					<?php
						$obj = new dbStudent;
						$result = $obj->getAllStudentView();
					?>
					
					<div class="box-content">
					
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<tr>
							<td style="width: 150px;">
								<img src="../user/pokerface.png" height="100" width="150">
							</td>
							
							<td>
								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									<tr>
										<td style="width:100px;">GRNO</td>
										<td><?php echo $row['nGRNO']; ?></td>
									</tr>
									<tr>
										<td>Name</td>
										<td><?php echo $row['tFname']." ".$row['tMname']." ".$row['tLname']; ?></td>
									</tr>
									<tr>
										<td>Gender</td>
										<td>
											
											<?php
										if ( $row['bGender'] == 1){
										?>
											<b><font color="blue">M</font></b>
										<?php
										} else {
											?>
											<b><font color="magenta">F</font></b>
											<?php
										}
									?>	
											
										</td>
									</tr>
									<tr>
										<td>DOB</td>
										<td><?php echo date_format( date_create($row['dBirthDate']), 'd/m/Y' ); ?></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>Admission Date</td>
							<td><?php echo date_format( date_create($row['dAdmissionDate']), 'd/m/Y' ); ?></td>
						</tr>
						<tr>
							<td>Standard</td>
							<td>
								<?php
									$res = $obj->studentStandard($id);
									while ( $row = mysqli_fetch_assoc($res)){
										if ( $row['nStandardId'] == 1 ) echo "10";
										else if ( $row['nStandardId'] == 2 ) echo "11";
										else  echo "12";
									}
								?>
							</td>
						</tr>
						<tr>
							<td>Attendence</td>
							<td>
								<?php
									echo "yet to understand. :P";
								?>
							</td>
						</tr>
						<tr>
							<td>Group</td>
							<td>
								<?php
									$grp = $obj->getSingleStudentView($id);
									
									while ($row = mysqli_fetch_assoc($grp)){
										if ( $row['btStreamGroup'] == 1 ) echo "Maths";
										else echo "Biology";
									}
								?>
							</td>
						</tr>
					</table>
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
			include '../../allJS.html' ;
		?>
		
	<!-- end: JavaScript-->
	
</body>
</html>
