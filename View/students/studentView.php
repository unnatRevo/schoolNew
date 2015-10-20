<?php
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
	<title>Student List</title>
	
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
				<li><a href="#">Student View</a></li>
			</ul>		
				
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon list"></i><span class="break"></span><b>Students</b></h2>
						<div class="box-icon">
						
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					
					
					<?php
						$obj = new dbStudent;
						$result = $obj->getAllStudentView();
					?>
					
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="text-align:center">GRNO</th>
								  <th style="text-align:center">F Name</th>
								  <th style="text-align:center">M Name</th>
								  <th style="text-align:center">L Name</th>
								  <th style="text-align:center">Gender</th>
								  <th style="text-align:center">Birth Date</th>
								  <th style="text-align:center">Admission Date</th>
								  <th style="text-align:center">Stays At Hostel</th>
								  <th style="text-align:center">IsActive</th>
								  <th style="text-align:center">Stream Group</th>
								  
							  </tr>
						  </thead>
								<tr>
									<td style="text-align:center"><?php echo $row['nGRNO']; ?></td>
									<td style="text-align:center"><?php echo $row['tFname']; ?></td>
									<td style="text-align:center"><?php echo $row['tMname']; ?></td>
									<td style="text-align:center"><?php echo $row['tLname']; ?></td>

									<td class="center" style="text-align:center">
									<?php
										if ( $row['bGender'] == 1 )
										{
									?>
											<font color="blue">M</font>
									<?php
										}
										else
										{
									?>
											<font color="magenta">F</font>
									<?php
										}
									?>
								</td>
									<!-- <td style="text-align:center"><?php echo $row['bGender']; ?></td> -->
									<td style="text-align:center"><?php echo $row['dBirthDate']; ?></td>
									<td style="text-align:center"><?php echo $row['dAdmissionDate']; ?></td>
									
									<!--<td style="text-align:center" ><?php echo $for ?></td>-->
									<td class="center" style="text-align:center">
									<?php
										 if ( $row['bStaysAtHostel']  == 1 ) 
										 {
									 ?>
										 <font color="green"><i class="fa fa-check"></i></font>
									<?php 
										}
										else
										{  ?>
										 <font color="red"><i class="fa fa-times"></i></font>
									<?php 
										}
										?>
									<!-- <td style="text-align:center"><?php echo $row['bStaysAtHostel']; ?></td> -->
									</td>
									<td class="center" style="text-align:center">
									<?php
										 if ( $row['bIsActive']  == 1 ) 
										 {
									 ?>
										 <font color="green"><i class="fa fa-check"></i></font>
									<?php 
										}
										else
										{  ?>
										 <font color="red"><i class="fa fa-times"></i></font>
									<?php 
										}
										?>
										</td>
									<!-- <td style="text-align:center"><?php echo $row['bIsActive']; ?></td> -->
									<td style="text-align:center"><?php echo $row['btStreamGroup']; ?></td>
								</tr>
						  <tbody>
						
							
						  </tbody>
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
