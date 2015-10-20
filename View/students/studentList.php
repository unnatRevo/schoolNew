<?php
session_start();
include '../../Model/dbStudent.php';
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
	<link id="bootstrap-style" href="../../Theme/css/custom.css" rel="stylesheet">
	<link href="../../Theme/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="../../Theme/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="../../Theme/css/style-responsive.css" rel="stylesheet">
	<link id="font-awesome" href="../../Theme/css/font-awesome.css" rel="stylesheet">
	<link id="font-awesomemin" href="../../Theme/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
	
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
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
					<!--start: Logout option-->
						<li>
							<a class="btn" href="../../Controller/users/userLogoutCon.php">
								<i class="halflings-icon white off"></i>
							</a>
						</li>
					<!--end: Logout option-->
					
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Dennis Ji
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
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

			<!-- end: Main Menu -->
			
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Student List</a></li>
			</ul>		
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
							<i class="halflings-icon list"></i>
							<span class="break"></span>
							<b>Students</b>
						</h2>
						<div class="box-icon">
						<a href="studentEntry.php"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize">
								<i class="halflings-icon chevron-up"></i>
							</a>
						</div>
					</div>
					
					
					<?php
						$obj = new dbStudent;
						$result = $obj->getAllStudentData();
					?>
					
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th style="text-align:center">Serial</th>
								  <th style="text-align:right">GRNO</th>
								  <th style="text-align:left">F Name</th>
								  <th style="text-align:left">M Name</th>
								  <th style="text-align:left">L Name</th>
								  <th style="text-align:center">Gender</th>
								  <th style="text-align:center">Birth Date</th>
								  <th style="text-align:center">Hostel Stay</th>
								  <th style="text-align:center">Operations</th>
								  <th style="text-align:center"></th>
								  <th style="text-align:center"></th>
							  </tr>
						  </thead>
							
						  <tbody>
						 <?php
							$i = 1;
							while($row = mysqli_fetch_assoc($result))
							{
						?>
							<tr>
								<td style="text-align:right">
									<?php echo $row [ 'nGRNO' ] ;?>
								</td>
								<td>
									<?php echo $i;?>
								</td>
								<td class="center">
									<?php echo $row['tFname']; ?>
								</td>
								<td class="center">
									<?php echo $row['tMname']; ?>
								</td>
								<td class="center">
									<?php echo $row['tLname']; ?>
								</td>
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
								<td class="center" style="text-align:center">
									<?php 
										if ( $row['dBirthDate'] == 0 )
										{
											echo "NA" ;
										}
										else 
										{
											echo date_format (  date_create ($row['dBirthDate']), 'd/m/Y' ) ; 	
										}
									?>
								</td>

								<td class="center" style="text-align:center">
									<?php
										if ( $row['bStaysAtHostel'] == 1 )
										{
									?>
											<font color="green"><i class="fa fa-check"></i></font>
									<?php
										}
										else
										{
									?>
											<font color="red"><i class="fa fa-times"></i></font>
									<?php
										}
									?>
								</td>
								
								<td class="center" style="text-align:center">
									<a href="/schoolNew/View/students/studentView.php">
										<font color="green"><i class="fa fa-list-alt"></i></font>
									</a>
								</td>
								<td class="center" style="text-align:center">
									<a href="/schoolNew/View/students/studentEdit.php">
										<font color="blue"><i class="fa fa-pencil-square-o"></i></font>
									</a>
								</td>
								<td class="center" style="text-align:center">
									<a href="/schoolNew/View/students/studentDelete.php" onClick="return confirm('Are you sure to delete this data ?');">
										<font color="red"><i class="fa fa-trash-o"></i></font> 
									</a>
								</td>
							</tr>
						<?php
							$i++;
							}
						?>
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
