<?php
session_start();
include '../../Model/dbSubject.php';
if ( isset( $_SESSION['username'] ) ){
		header('location: /schoolNew/View/students/studentsList.php');
	}
?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Subject List</title>
	
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

			<!-- end: Main Menu -->
			
			
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Subject List</a></li>
			</ul>		
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
							<i class="halflings-icon list"></i>
							<span class="break"></span>
							<b>Subject List</b>
						</h2>
						<div class="box-icon">
						<a href="subjectEntry.php"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize">
								<i class="halflings-icon chevron-up"></i>
							</a>
						</div>
					</div>
					
					
					<?php
						$obj = new dbSubject;
						$result = $obj->getAllSubjects();
					?>
					
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Serial</th>
								  <th>Subject Name</th>
								  <th>Standard</th>
								  <th style="text-align:center">View</th>
								  <th style="text-align:center">Edit</th>
								  <th style="text-align:center">Delete</th>
							  </tr>
						  </thead>
							
						  <tbody>
						 <?php
							$i = 1;
							while($row = mysqli_fetch_assoc($result))
							{
						?>
							<tr>
								<td>
									<?php echo $i;?>
									<?php //echo $row [ 'nSubjectId' ] ;?>
								</td>
								<td class="center">
									<?php echo $row['tSubjectName']; ?>
								</td>
								<td class="center" style="text-align:right">
									<?php echo $row['tStandardName']; ?>
								</td>
								
								
								<td class="center" style="text-align:center">
									<a href="subjectView.php?id=<?php echo $row['nSubjectId']; ?>">
										<font color="green"><i class="fa fa-list-alt"></i></font>
									</a>
								</td>
								<td class="center" style="text-align:center">
									<a href="subjectEdit.php?id=<?php echo $row['nSubjectId']; ?>">
										<font color="blue"><i class="fa fa-pencil-square-o"></i></font>
									</a>
								</td>
								<td class="center" style="text-align:center">
									<a href="subjectDelete.php?id=<?php echo $row['nSubjectId']; ?>" onClick="return confirm('Are you sure to delete this data ?');">
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
