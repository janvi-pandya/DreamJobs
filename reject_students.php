<!DOCTYPE HTML>
<html>
<head>
<title>COLLEGE PAGE</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="shortcut icon" type="image/x-icon" href="logo.jpg">
</head>
<?php
	session_start(); 
	if(isset($_SESSION['email']))
	{
		$con=mysqli_connect("localhost","root","","pms");
		$email=$_REQUEST['email'];
		$query_access=mysqli_query($con,"SELECT `approval_status` FROM `college` WHERE `email`='$email';");
		$row_access=mysqli_fetch_array($query_access);
		$status=$row_access['approval_status'];
		if($status=='Y')
		{
			$con=mysqli_connect("localhost","root","","pms");
			$email=$_REQUEST['email'];
			$sql="UPDATE student SET `approval_status`='N' WHERE `email`="."'$email'"."";
			$query=mysqli_query($con,$sql);
			if($query)
			{
				/*echo '<script type="text/javascript">
								alert("You rejected the student\'s profile!");
						</script>';
				header("refresh:1;url=pending_students.php");*/
				require_once('mailDemo/reject_mail.php');
			}
			else
			{
				//echo die(mysqli_error($con));
				echo '<script type="text/javascript">
								alert("SORRY!There was some error while rejecting the students profile!Please Try Again!");
						</script>';
				header("refresh:1;url=pending_students.php");
			}	
		}
		else
		{
			echo '<script type="text/javascript">
						alert("SORRY!You have not been granted the access to reject any Student yet!We will let you know when you can!Stay in touch!");
				</script>';
			header("refresh:1;url=pending_students.php");
		}		
	}		
	else
		header("location:login_college.html");
?>