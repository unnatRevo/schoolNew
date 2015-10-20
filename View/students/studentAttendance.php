<?php
session_start();

	ini_set('display_error', true) ;
	error_reporting(E_ALL | E_NOTICE) ;

	include '../../Model/dbHostel.php' ;
	include '../../Model/dbStudent.php' ;

	$objStudent = new dbStudent ;

?>

<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Attendance</title>
	
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

<script src="jquery-1.9.1.js"> </script>
<script type="text/javascript">

function checkAll( checkAllForm )
{
	var flag = false ;
	var inputs = document.getElementById( checkAllForm ) ;
		
	if( inputs.elements[ 'selectAll' ].checked == false )
	{
		// alert ( "In fn : false" ) ;
		flag = false ;
	}
	else
	{
		// alert ( "In fn : true" ) ;
		flag = true ;
	}

	for ( var i = 0; i < inputs.elements.length ; i++ )
	{
		// alert ( "HELLO" ) ;
		if ( inputs.elements[i].type == "checkbox" )
		{
				inputs.elements[i].checked = flag ;
		}
	}
}

				  	

function togglenGRNOCheckbox( checkAllForm )
{
	alert( "OK" ) ;

	var flag = false ;
	var inputs = document.getElementById( checkAllForm ) ;
		
	if( inputs.elements[ 'selectAll' ].checked == false )
	{
//		alert( "UNCHECKED" ) ;
	}
	else
	{
//		alert( 'Checked' ) ;
	}
}

function ifAnyChange( checkAllForm )
{

//	alert( "If Any " ) ;
	var inputs = document.getElementById( checkAllForm ) ;

	if( inputs.elements[ 'selectAll' ].checked == true )
	{
		inputs.elements[ 'selectAll' ].checked = false ;
	}
}

</script>


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
				<li><a href="#">Student Attendance</a></li>
			</ul>		
			
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
							<i class="halflings-icon list"></i>
							<span class="break"></span>
							<b>Attendance</b>
						</h2>
						<div class="box-icon">
						<a href="hostelEntry.php"><i class="halflings-icon plus"></i></a>
							<a href="#" class="btn-minimize">
								<i class="halflings-icon chevron-up"></i>
							</a>
						</div>
					</div>
									
					<?php
						
						$hObj = new dbHostel;
						$sObj = new dbStudent;
						$result = $hObj->getHostelNames();
					?>	
					<form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
					
					<div class="box-content">
					
					<!--	<input type="button" onClick="fetch_r( 'H1', 11 )" value="TEST"></input> -->
					
					
					<table>
						<tr>
							<td>
					<b>STANDARD :</b>&nbsp;&nbsp;
					<label class="radio" >
						<input type="radio" name="standard"  value="11" >11
					</label>
					</td>
					<td>
					<label class="radio">
						<input type="radio" name="standard" value="12" >12
					</label>
				</td>
					<td width=10/>
					<td>
					<b>DATE :</b>  <input type="date" name="currentdate" value="<?php echo date('Y-m-d'); ?>" />
				</td>

				<td>
					&nbsp;&nbsp;&nbsp;	<input type="submit" name="getDetails" value="Go !" margin="100px" />
				</td>
				</tr>
			</table>
					</form>

						
					<?php
					
						if ( $_SERVER[ 'REQUEST_METHOD' ] == "POST" && isset( $_POST[ 'standard' ] ) != null )
						{

					?>

							<br />

							<div >
							<table>

							<tr>
								<td width=100 >
									<b> Date : </b>
								</td>
								<td> <?php echo $_POST[ 'currentdate' ] ; ?> </td>
							</tr>
						</div>

							<form action="saveAttendanceData.php" method="POST" id="checkAllForm">
							<tr>
							<td width=100 >
								
								<b> SUBJECTS : </b> 
								
									<?php 
									   $SubjectList = $sObj->retriveSubjectList($_POST[ 'standard' ]);
									  // echo $_POST['standard'];
									   while( $List = mysqli_fetch_assoc($SubjectList) )
									   	{ 
									   		extract($List);
									   	?>
									   	<td>
									   	<input type="checkbox" name="SubjectName[]" value="<?php echo $tSubjectName ?>" /><?php echo $tSubjectName ?>
									   	</td>
									   	<?php

									   		}
										?>
								
							<!-- </td >
							<td>
								<input type="checkbox" name="Physics" value="" /> Physics &nbsp;&nbsp;
							</td>
							<td>
								<input type="checkbox" name="Biology" value="" /> BIOLOGY &nbsp;&nbsp;
							</td>
							<td>
								<input type="checkbox" name="Maths" value="" /> MATHS &nbsp;&nbsp;
							</td> -->
							</tr> 
						</table>
							</div>


						

							<div>

							<table>

								<td>
									<b>STATUS :</b>&nbsp;&nbsp;
									<label class="radio" >
										<input type="radio" name="status" checked="true" value="1" onchange=' togglenGRNOCheckbox( "checkAllForm" ) ; ' />Present
									</label>
								</td>

								<td/>

								<td>
									<label class="radio">
										<input type="radio" name="status" value="0"  onchange=' togglenGRNOCheckbox( "checkAllForm" ) ; ' />Absent
									</label>
								</td>
						    </table>
							</div>



							<input type='hidden' name='date' value=' <?php echo $_POST[ 'currentdate' ] ; ?> ' />
							<input type='hidden' name='standard' value=' <?php echo $_POST[ 'standard' ] ; ?> ' />
							<!-- <input type='hidden' name='SubjectName' value=' <?php echo $_POST[ 'SubjectName' ] ; ?> ' /> -->

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<!-- <div id="checkStudent"> -->
							  <thead>
							  <tr>
								  <th style="width:25px;">
								  	<input type="checkbox" name="selectAll" value="all" onchange=" checkAll('checkAllForm');" /> SELECT
								  </th>
								  

								  <th style="width:10px;">GRNO</th>
								  <th style="width:90px;">STUDENT NAME</th>
								  
							  </tr>
						  </thead>
							
						  <tbody>
						  	
						  	<?php  					

						  		//fetch records....

					  		$students = $objStudent->fetchStudentAsPerStandard( $_POST[ 'standard' ] ) ;

							$isDatePresent = $objStudent->checkDate( $_POST[ 'currentdate' ] ) ;
							$allPresentStud = '' ;
							$counterForOldDate = 0 ;

					  		while( $stud = mysqli_fetch_assoc( $students ) )
					  		{


							if( $isDatePresent > 0 )
							{
								$allPresentStud = $objStudent->getAllPredentStudentOn( $_POST[ 'currentdate' ] ) ;
								$counterForOldDate = mysqli_num_rows( $allPresentStud ) ;
							}

						  	 ?>

						  	 <!-- select checkbox -->
							<tr>

									<?php

									$found = false ;

									if( $counterForOldDate > 0 )
									{
										while( $oldPresent = mysqli_fetch_assoc( $allPresentStud ) )
										{
											if( $stud[ 'nGRNO' ] == $oldPresent[ 'nGRNO' ] )
											{
												$found = true ;
												break ;
											}
										}

									}
									?>
										
								<td width=85 >
									

									<center>
										
										<?php

											if( $found )
											{
										?>
												<input type="checkbox" checked  name="<?php echo $stud[ 'nGRNO' ] ; ?>" value=" <?php echo $stud[ 'nGRNO' ] ; ?>" onchange=' ifAnyChange( "checkAllForm" ) ; ' />
										<?php
											}
											else
											{
										?>			<input type="checkbox"  name="<?php echo $stud[ 'nGRNO' ] ; ?>" value=" <?php echo $stud[ 'nGRNO' ] ; ?>" onchange=' ifAnyChange( "checkAllForm" ) ; ' />
										<?php
											}
										?>
									</center>
								</td>

								<!-- nGRNO -->
								<td style="text-align:right">
								<?php
						  			echo $stud[ 'nGRNO' ] ;
						  		?>
						  		
								</td>

								<!-- Student Full Name -->
								<td>
								<?php

						  			echo $stud[ 'tFname' ] . "  " . $stud[ 'tMname' ] . "  " . $stud[ 'tLname' ] ;
						  		?>
								</td>
															

							</tr>		
								
							<?php 
								 } 
							?>
							<tr>
							<td />
							<td />
							<td>
								<input type="submit" value="SAVE" />
								<input type="reset" value="RESET"/>
							</td>

						</tr>
					  <?php

						}

					  ?>    
					 <!--  </div>  -->      
					  	
						  </tbody>
					  </table> 

						</form>
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
