<?php
	session_start(); if(isset($_SESSION['email'])){
	$con=mysqli_connect("localhost","root","","pms");
	$email=$_SESSION['email'];
	$jid=$_REQUEST['id'];
	$sql="DELETE from stu_job where `job_id`='$jid' && `enroll_no`=(select `enroll_no` from student WHERE `email`='$email')";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		echo '<script type="text/javascript">
						alert("You have withdrawn your Job Application!");
				</script>';
		header("refresh:1;url=applied_jobs.php");
	}
	else
	{
		//echo die(mysqli_error($con));
		echo '<script type="text/javascript">
						alert("SORRY!There was some error!Please Try Again!");
				</script>';
		header("refresh:1;url=applied_jobs.php");
	}	
	}
	else
		header("loaction:login.html");
?>