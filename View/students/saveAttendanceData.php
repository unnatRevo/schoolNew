<?php

	include '../../Model/dbStudent.php' ;

	$objStudentCls = new dbStudent ;
	$standardName = $_POST[ 'standard' ] ;
	$atdDate = $_POST[ 'date' ] ;
	$forStatus = $_POST[ 'status' ] ;
	$isAll = '' ;
	$status = 1 ;
	$grChecked = '' ;


	

	if ( isset( $_POST[ 'SubjectName' ] ) != null  ) {
		$tStandardName[] = $_POST[ 'SubjectName' ];

		$tsubject = array_values($_POST['SubjectName']);
		//$tStandardName[] = join(',',$tStandardName);
		foreach ($_POST['SubjectName'] as $tSubjectName) {
			# code...
			print_r($tSubjectName) ;

		}
		
	}
	else {
		echo "Subject not available" ;
	}
	echo json_encode($tStandardName);

	

	/*
					NOTE - 1 
					Here it will check that, on previos page Select is Checked or not
					If it is then the value of it as 1 otherwise 0. 
	*/

	if( isset( $_POST[ 'selectAll' ] ) != null && isset($_POST['SubjectName']) )
	{
		$isAll = $_POST[ 'selectAll' ] ;
		echo "BOTH SET";		
	}

	/*
					NOTE - 2
					Here Standard id is fetch from the tblstandard using standard from 
					revious page which is selected by user.		
	*/

	$standardId = $objStudentCls->getStandardId( $standardName ) ;
	$sId = mysqli_fetch_assoc( $standardId ) ;
	extract( $sId ) ;
	echo $nStandardId ;

	/*
					NOTE - 3
					Fetch all students nGRNO from tblstudentstandard using standard id i.e.,
					nStandardId.	
	*/

	$allStudentnGRNO = $objStudentCls->getnGRNOFromStandard( $nStandardId ) ;

	/*
					NOTE - 4
					After that check the date in attendece table if date is exist then update
					all data otherwise insert new data for the day.
	*/

	$checkExistanceOfDate = $objStudentCls->checkDateFromAttendence( $atdDate, $nStandardId ) ;
	echo $checkExistanceOfDate . " + " . $atdDate ;

	/*
					NOTE - 4
					After checking dage now insert / update all nGRNO in tblattendece to
					set is student is present or not in a school on the date ?.
	*/

	//$objStudentCls->setAttendenceForDate( $atdDate, $nStandardId, $allStudentnGRNO, $forStatus , $tSubjectName ) ;


	if( $checkExistanceOfDate > 0 )
	{
		$objStudentCls->updateAttendenceForDate( $atdDate, $nStandardId, $allStudentnGRNO, $forStatus , implode(" | ", $tsubject)) ;
	}

		
	else
	{	 
		$objStudentCls->setAttendenceForDate( $atdDate, $nStandardId, $allStudentnGRNO, $forStatus , implode(" | ", $tsubject)) ;	
	}


	if( $isAll == null )
	{
		echo " POINT-1    " ;

		if( $forStatus == 1 )
		{
			echo " POINT-2   " ;
			$status = 0 ;
		}

		$allStudentnGRNO = $objStudentCls->getnGRNOFromStandard( $nStandardId ) ;

		while( $detail = mysqli_fetch_assoc( $allStudentnGRNO ) )
		{
			extract( $detail ) ;

			/*
			if ( isset($_POST[$nGRNO]) )
			{
				$grChecked = $_POST[ $nGRNO ] ;	
				$status = 1 ;
			}
			else
			{
				$status = 0 ;
			}
			*/

			
			if( ! isset($_POST[$nGRNO]) )
			{
				// $grChecked == null
				//echo " POINT-4    + $nGRNO  " ;
				$objStudentCls->updateExistAttendence( $atdDate, $nStandardId, $nGRNO, $status ) ;
			}
		}
	}
?>