<?php
	session_start();
	
	ini_set('display_error', true) ;
	error_reporting(E_ALL | E_NOTICE) ;
?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>School Management</title>
	
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
	<link rel="shortcut icon" href="../Theme/img/favicon.ico">
	<!-- end: Favicon -->

</head>

<body>
<?php
	if ( !isset($_SESSION['username']) ){
		header('location : /schoolNew/View/user/login.php');
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
	
	<div class="container-fluid-full" id="userLogin">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
					
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="/schoolNew/Controller/users/userLoginCon.php" method="post">
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="Username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="Password"/>
							</div>
							<div class="clearfix"></div>							

							<div class="button-login">
								<button type="submit" class="btn btn-primary">Login</button>
								<a href="userSignUp.php" class="btn btn-link">Create User</a>
							</div>
							<div class="clearfix"></div>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>
					</form>
				</div><!--/span-->
			</div><!--/row-->


		</div><!--/.fluid-container-->
	</div><!--/fluid-row-->
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 School Demo</span>
		</p>

	</footer>
</body>
</html>
