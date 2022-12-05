 <?php
	$con=mysqli_connect("localhost","root","","pms");
	$enroll_no=$_REQUEST['enroll_no'];
	$jid=$_REQUEST['jid'];
	$sql="UPDATE stu_job SET `job_status`='N' WHERE `enroll_no`='$enroll_no' && `job_id`='$jid';";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		echo '<script type="text/javascript">
						alert("You rejected the student\'s profile!");
				</script>';
		header("refresh:1;url=approved_jobs.php");
	}
	else
	{
		//echo die(mysqli_error($con));
		echo '<script type="text/javascript">
						alert("SORRY!There was some error!Please Try Again!");
				</script>';
		header("refresh:1;url=approved_jobs.php");
	}	
?>