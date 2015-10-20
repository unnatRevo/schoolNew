<?php
session_start();
//include "../include/config.php";
//include "include/secure.php";

include '../../Model/dbHostel.php' ;
include '../../Model/dbStudent.php' ;

	if ( !isset($_SESSION['username']) ) {
		header('location: /schoolNew/View/user/login.php');
	}
	if ( isset( $_SESSION['username'] ) ){
		header('location: /schoolNew/View/students/studentsList.php');
	}

if($_SERVER['REQUEST_METHOD']=='POST')
{
		//print_r($_POST);
		
		//echo $sql_up=" update college_list set clg_name='".mysql_real_escape_string($_POST['clg_name'])."' , clg_address='".mysql_real_escape_string($_POST['clg_add'])."' where clg_id='".$_POST['clg_id']."'";
		//die();
		 $sql_up=" update college_list set clg_name='".mysql_real_escape_string($_POST['clg_name'])."' , clg_address='".mysql_real_escape_string($_POST['clg_add'])."', clg_email_id='".mysql_real_escape_string($_POST['clg_email'])."' where clg_id='".$_POST['clg_id']."'";
		$re_up=mysql_query($sql_up) or die(mysql_error());
		/*<!--?>
			<script type="text/javascript">
    	    	window.location='index.php?msg=Records successfully updated';
        	</script>
		<?-->*/
	
		
}
	
?>
<?php 
			$sql_query="select * from regestration_detail where uname='".$_SESSION['uname']."'";
			$res=mysql_query($sql_query) or die(mysql_error());
			$row=mysql_fetch_assoc($res);
			
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Modify College Detail</title>

</head>
<link href="../sample.css" type="text/css" rel="stylesheet"/>
<link href="../sample.css" type="text/css" rel="stylesheet"/>
<script src="js/jquery-1.9.1.js"> </script>
<script type="text/javascript">

function fetch_r(nHostelId)
{
	if(nHostelId==0)
	{
		document.getElementById("clg_name").value='';
     	document.getElementById("clg_add").value='';
		document.getElementById("clg_email").value='';
	}else
	{
	var datastr='clg_id='+clg_id;
	$.ajax({
		   type:'POST',
		   url:'select.php',
		   data:datastr,
		   success:function(data)
		   {
			   var dat=data.split('###');
			   document.getElementById("clg_name").value=dat[0];
			   document.getElementById("clg_add").value=dat[1];
			   document.getElementById("clg_email").value=dat[2];			   
		   }
		   });
	}
	return false;
}

</script>

<body class="msgHead">

  <table align="center" width="900" bordercolor= "#000000">
	<tr >
		<td colspan="2">
			<?php include "header.php";?>
		</td>
	</tr>
	
	<tr >
		<td valign="top">
			<table class="msgFormBody" width="200" cellspacing="10">
				<tr class="msgFormTitle">
					<td colspan="2" align="center" >Welcome <?=$row['u_id']; ?></td>
				</tr>
				<tr>
					<td><img src="../images/icons/home.bmp" height="30" width="30"/></td>
					<td><a href="subject_detail_form.php">Subject Detail</a></td>
				</tr>
                <tr>
					<td><img src="../images/icons/home.bmp" height="30" width="30"/></td>
					<td><a href="college_detail_form.php">College Detail</a></td>
				</tr>
               <tr>
					<td><img src="images/icons/11.png" height="30" width="30"/></td>
					<td><a href="exam_allocation_form.php">Exam Allocation</a></td>
				</tr>
				<tr>
					<td><img src="../images/icons/logout2.jpg" height="30" width="30"/></td>
					<td> <a href="../logout.php?ty=0"> Log Out </a></td>
				</tr>
			</table>
	  </td>
		<td>
			<form action="" method="post">
	  <table width="697" align="center" cellspacing="10" class="msgFormBody">
					<tr  class="msgFormTitle">
						<td colspan="3" align="center">Modify College Details</td>
					</tr>
                   
                    <tr>
						<td align="right">College ID:</td>
						<td width="150"></td>
					  <td align="left">
                      	<select name="clg_id" id="clg_id" onChange="fetch_r(this.value);">
                              <option value="0">Select College Id</option>
                              <?php
                              $sql="select clg_id from college_list order by clg_id";
                              $re=mysql_query($sql) or die(mysql_error());
                              while($row=mysql_fetch_array($re))
                              {
                                  ?>
                                  <option value="<?php echo $row['clg_id']; ?>"><?php echo $row['clg_id'];?></option>
                                  <?php
                              }
                              ?>
                      </select>
                      </td>
					</tr>
					<tr>
						<td align="right">College Name:</td>
						<td width="150"></td>
						<td align="left"><input type="text" name="clg_name" id="clg_name"  /></td>
					</tr>
                    
					<tr>
						<td align="right">College Address:</td>
						<td width="150"></td>
						<td align="left"><input type="text" name="clg_add" id="clg_add"  /></td>
					</tr>
					<tr>
						<td align="right">Email ID:</td>
						<td width="150"></td>
						<td align="left"><input type="text" name="clg_email" id="clg_email"  /></td>
					</tr>
		
					<tr>
						<td colspan="3" align="center"><input type="submit"  value = "Update" class="msgFormTitle"/>
						</td>
					</tr>
                    <tr>
        				<!--**************************************************************************************************-->
					  
						<table width="697" class="msgFormBody">
                    
							<tr>
                            
                            <?php
									$sql_fetch="select * from college_list order by clg_id";//fetch data by id in desc order
									$re_fetch=mysql_query($sql_fetch) or die(mysql_error());//fire select query
									if(mysql_num_rows($re_fetch) > 0)//check data 
									{
										$i=0;
										while($row_fetch=mysql_fetch_array($re_fetch))//fetch data from database one by one
										{
										?>
                                      
									  <tr id="tr_<?=$i;?>">
									  <td>	<span id="cnm_<?=$i;?>">
													<?php echo $row_fetch['clg_name']; ?>
											</span>
											<span id="txtcnm_<?=$i;?>" style="display:none">
													<input type="text" value="<?=$row_fetch['clg_name'];?>" id="txt_clg_nm_<?=$i;?>"/>
											</span>
									  </td>
									  <td>	<span id="add_<?=$i;?>">
													<?php echo $row_fetch['clg_address']; ?>
											</span>
											<span id="txtadd_<?=$i;?>" style="display:none">
													<input type="text" value="<?=$row_fetch['clg_address'];?>" id="txt_add_<?=$i;?>"/>
											</span>
									  </td>
									  <td>	<span id="email_<?=$i;?>">
													<?php echo $row_fetch['clg_email_id']; ?>
											</span>
											<span id="txtemail_<?=$i;?>" style="display:none">
													<input type="text" value="<?=$row_fetch['clg_email_id'];?>" id="txt_email_<?=$i;?>"/>
											</span>
									  </td>
									
									  <td>
											<a href="delete.php?clg_id=<?php echo $row_fetch['clg_id']; ?>">Delete</a></td>
									  </tr>
										<?php
										$i++;
										}
									}else
									{
										?>
									   <tr>
									  <td colspan="5">No Records found</td>
									  </tr>
										<?php
									}
									?>
						 
                         </tr>
				  	  	</table>
                    </tr>
              </table>
		  </form>
		</td>
	</tr>
</table>

<!--<script type="text/javascript">
document.getElementById('clg_name').value=document.getElementById('college_id').value;
document.getElementById('clg_add').value=document.getElementById('college_id').value;
document.getElementById('clg_email').value=document.getElementById('college_id').value;
</script>
-->
</body>
</html>
