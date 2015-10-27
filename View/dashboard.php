

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>School Project</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Unnat | Aakash | Salins | Ishita">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	
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
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
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
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>

<?php
	if (!isset($_SESSION['username'])){
		header('location : /schoolNew/View/user/login.php');
	}
?>		
			<?php
				include '../mainMenu.html';
			?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="dashboard.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">	
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				 
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				    <div class="item active">
				      <img src="s1.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img src="s2.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				    <div class="item">
				      <img src="s3.jpg" alt="...">
				      <div class="carousel-caption">
				      </div>
				    </div>
				  </div>
				 
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
				</div> <!-- Carousel -->

				<div class="box span3">
				<div class="box-content">

					<div class="box-header">
					<h2><i class="halflings-icon picture"></i>
					<span class="break"></span>Hostel</h2></div>
					<a href="/schoolNew/View/hostels/hostelList.php" class="quick-button metro green">
					<i class="icon-home"></i>
					<p></p>
					</a>
					</div>
				</div>
				<div class="box span3">
					<div class="box-content">
					<div class="box-header">
					<h2><i class="halflings-icon picture"></i>
					<span class="break"></span>Students</h2></div>
					<a href="/schoolNew/View/students/studentList.php" class="quick-button metro black">
					<i class="icon-user"></i>
					<p></p>			
					</a>
					
					</div>
				</div>
				<div class="box span3">
					<div class="box-content">
					<div class="box-header">
					<h2><i class="halflings-icon picture"></i>
					<span class="break"></span>Subjects</h2></div>
					<a href="/schoolNew/View/subjects/subjectList.php" class="quick-button metro blue">
					<i class="icon-book"></i>
					<p></p>
					
				</a>
				</div>
				</div>
				<div class="clearfix"></div>
								
			</div><!--/row-->
			
       

			</div><!--/.fluid-container-->
			
			
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 School </a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->
		<?php
			include '../allJS.html' ;
		?>
	<!-- end: JavaScript-->
	
</body>
</html>
