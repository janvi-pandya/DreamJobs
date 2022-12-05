 <?php
	$con=mysqli_connect("localhost","root","","pms");
	$enroll_no=$_REQUEST['enroll_no'];
	$jid=$_REQUEST['jid'];
	$sql="UPDATE stu_job SET `application_status`='Y' WHERE `enroll_no`='$enroll_no' && `job_id`='$jid';";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		/*echo '<script type="text/javascript">
						alert("You approved the student\'s profile!");
				</script>';
		header("refresh:1;url=pending_students.php");*/
		require_once('mailDemo/approval_job_mail.php');
	}
	else
	{
		//echo die(mysqli_error($con));
		echo '<script type="text/javascript">
						alert("SORRY!There was some error while approving the students profile!Please Try Again!");
				</script>';
		header("refresh:1;url=pending_jobs.php");
	}	
?>