<?php
	$con=mysqli_connect("localhost","root","","pms");
	$job_id=$_GET['id'];
	$sql="DELETE FROM job WHERE `job_id`="."'$job_id'"."";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		echo "Job Deleted!";
		header("refresh:2;url=login_Company2.php");
	}
	else
		echo die(mysqli_error($con));
?>