<?php
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
	<meta name="viewport" content	="width=device-width, initial-scale=1">
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
	
	<script>
		function checkPwd(){
			var pwd = document.getElementById("password").value;
			var cpwd = document.getElementById("cpwd").value;
			
			if (pwd !== "" && cpwd !== ""){
				if ( pwd === cpwd ){
					console.log("pwd:"+pwd+"\nCpwd:"+cpwd);
					document.getElementById("uncheck").style.visibility = "hidden";
					document.getElementById("check").style.visibility = "visible";
					return true;
			} else {
					console.log("pwd:"+pwd+"\nCpwd:"+cpwd);
					document.getElementById("check").style.visibility = "hidden";
					document.getElementById("uncheck").style.visibility = "visible";
					return false;
				}	
			} else {
				document.getElementById("passwordCheck").style.visibility = "visible";
			}
		}	
		
		function getValue(){
			var pwd = document.getElementById("password").value;
			var cpwd = document.getElementById("cpwd").value;
			
			if ( pwd === cpwd ){
				console.log("pwd:"+pwd+"\nCpwd:"+cpwd);
				document.getElementById("checkValue").innerHTML = "1";
				return 1;
			} else {
				console.log("pwd:"+pwd+"\nCpwd:"+cpwd);
				document.getElementById("checkValue").innerHTML = "0";
				return 0;
			}
		}
	</script>
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
	
	<div class="container-fluid-full" id="userLogin">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
				
				<!--
					part : jQuery.javscript - for checking availability of username by typing in textbox by onBlur event
				-->
				<script>
					function checkAvailability() {
						$("#loaderIcon").show();
						jQuery.ajax({
						url: "../../Controller/users/userSignUpCon.php",
						data:'username='+$("#username").val(),
						type: "POST",
						success:function(data){
						$("#user-availability-status").html(data);
						$("#loaderIcon").hide();
						},
						error:function (){}
						});
						}
				</script>
	
					<h2>Create new user</h2>
	
					<form class="form-horizontal" action="../../Controller/users/userSignUpCon.php" method="post">
						<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" required="true" autofocus="true" type="text" placeholder="Username"/>
							<!--  <input name="username" type="text" id="username" class="input-large span10" placeholder="Username" onBlur="checkAvailability()"><span id="user-availability-status"></span>-->    

						</div>
						<div class="clearfix"></div>
						
						<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="Password"/>
						</div>
						<div class="clearfix"></div>
						
						<div class="input-prepend" title="Confirm Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="cpassword" id="cpwd" type="password" placeholder="Confirm Password" onblur="checkPwd();"/><label id="check" class="halflings-icon ok" style=" color:#e3e1e3; visibility: hidden;"></lable><label id="uncheck" class="halflings-icon remove" style=" color:#e3e1e3; visibility: hidden;"></lable>
						</div>
						<div class="clearfix"></div>
						
						<div class="input-prepend" title="First name">
								<span class="add-on"><i class="halflings-icon font"></i></span>
								<input class="input-large span10" required="true" name="fname" id="fname" type="text" placeholder="First Name"/>
						</div>
						<div class="clearfix"></div>
						
						<div class="input-prepend" title="Last name">
								<span class="add-on"><i class="halflings-icon font"></i></span>
								<input class="input-large span10" name="lname" required="true" id="lname" type="text" placeholder="Last Name"/>
						</div>
						<div class="clearfix"></div>
						
						<div class="input-prepend" title="User type">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<select name="usertype" id="usertype">
									<option value="Admin" selected="Admin">Admin</option>
									<option value="Standerd">Standerd</option>
								</select>
						</div>
						<div class="clearfix"></div>
						
						<div class="input-prepend">
								<a href="../../View/user/login.php"  class="btn btn-link">Already have access?</a>
								<button class="btn btn-primary" type="submit" data-noty-options='{"text":"This is an error notification","layout":"bottomLeft","type":"error"}'+>Signup</button>
						</div>
						<div class="clearfix"></div>
						
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
