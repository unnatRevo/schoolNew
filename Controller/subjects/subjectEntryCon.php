<?php		
include '../../Model/dbSubject.php';		

		$mykey = array();
		$myvalue = array();
		
		
		/*
		foreach($_POST as $key => $value)
		{
			if($key!='submit')
			{
					$mykey[] = $key;
					$myvalue[] = $value;
			}
		}
		*/

		$tSubjectName = $_POST [ 'tSubjectName' ] ;
		$nForStandard = $_POST [ 'nForStandard' ] ;

		//echo "$tSubjectName<BR/>" ;
		//echo "$nForStandard<BR/>" ;

		$obj = new dbSubject;
		//$obj->insertAnyData('tblSubject',$mykey,$myvalue);
		$obj->insertSubject ( $tSubjectName, $nForStandard ) ;
		
		header('location: /schoolNew/View/subjects/subjectList.php');
?>