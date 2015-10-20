<?php

//include "../include/config.php";

include '../../Model/dbHostel.php' ;
//include '../../Model/dbStudent.php' ;

//$sql="select * from tblHostel where nHostelId='".$_POST['hostelList']."'";

//echo "Welcome" ;

//echo $_POST['hl'];
//echo $_POST['standard'] ;


 $sql = "select nGRNO,tFname,tMname,tLname"
		." from tblstudent, tblstudentstandard ss "
		." where nGRNO = ss.nGRNO AND "
		." bGender = ( select bHostelFor from tblhostel where nHostelId = " . $_GET['hostelList'] . " ) "
		." AND ss.nSemesterId = " . $GET['standard'] ;

echo $sql ;

//echo mysql_query($sql) or die(mysql_error());

?>