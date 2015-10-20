<?php

include '../../Model/dbHostel.php';

$id = $_GET['id'];

$obj = new dbHostel;
$result = $obj->hostelViewSingle($id);
$row = mysqli_fetch_assoc($result);

//print_r($row);


?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Hostel Entry</title>
	
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
						<li><a href="hostelEntry.php"><i class="icon-plus"></i><span class="hidden-tablet"> Edit Hostel</span></a></li>	
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
				<li><a href="#">Edit Hostel</a></li>
			</ul>		
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon plus"></i><span class="break"></span>Edit Hostel</h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
		
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="../Controller/hostelUpdateCon.php" method="POST">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Hostel Name</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="tHostelName" type="text" value="<?php echo $row['tHostelName']; ?>">
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label">Hostel For</label>
								<div class="controls">
								  <label class="radio">
								  <?php
								  if($row['bHostelFor']==1)
								  { ?>
									<input type="radio" name="bHostelFor" value="1" checked="">
									Boys
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="bHostelFor" value="0">
									Girls
								  </label>
								  <?php
								  }
								  else
								  { ?>
									<input type="radio" name="bHostelFor" value="1" >
									Boys
								  </label>
								  <div style="clear:both"></div>
								  <label class="radio">
									<input type="radio" name="bHostelFor" value="0" checked="">
									Girls
								  </label>
								  <?php
								  }
								  ?>
								</div>
								</div>
								<div class="control-group hidden-phone">
									<label class="control-label">Address</label>
									<div class="controls">
										<textarea name="tHostelAddress" rows="2"><?php echo $row['tHostelAddress']; ?> </textarea>
									</div>
								</div>
								<div class="control-group hidden-phone">
									<label class="control-label">Capacity</label>
									<div class="controls">
										<input type="number" name="nHostelCapacity" min="1" value="<?php echo $row['nHostelCapacity']; ?>"/>
									</div>
								</div>
								<input type="hidden" name="id" value="<?php echo $row['nHostelId']; ?>" >
							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="hostelList.php"><button type="button" class="btn">Cancel</button></a>
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
			include '../../allJS.html' ;
		?>
		
	<!-- end: JavaScript-->
	
</body>
</html>