<?php
	session_start();
	if(isset($_SESSION['email']))
	{	
		$e=$_SESSION['email'];
		$con=mysqli_connect("localhost","root","","pms");
		$q=mysqli_query($con,"SELECT `enroll_no` FROM `student` WHERE `email`='$e';");
		$r=mysqli_fetch_array($q);
		$s=$r['enroll_no'];
		$query_access=mysqli_query($con,"SELECT `approval_status` FROM `student` WHERE `email`='$e';");
		$row_access=mysqli_fetch_array($query_access);
		$status=$row_access['approval_status'];
		if($status=='Y')
		{
		$i=$_GET['id'];
		//$sql="INSERT INTO `stu_job`(`job_id`,`enroll_no`,`job_status`,`application_status`) VALUES ('$i','$s','P','P');";
		$query=mysqli_query($con,"INSERT INTO `stu_job`(`job_id`,`enroll_no`,`job_status`,`application_status`) VALUES ('$i','$s','P','P');");
		$c=0;
		if($query)
		{
			echo '<script type="text/javascript">
						alert("YOU HAVE APPLIED FOR JOB SUCCESSFULLY!");
				</script>';
				$c=1;
			header("refresh:0.1;url=available_jobs.php");
		}
		else if($c==1)
		{
			echo '<script type="text/javascript">
						alert("YOU HAVE ALREADY APPLIED FOR JOB!");
				</script>';
				$c=1;
			header("refresh:1;url=available_jobs.php");
		}
		else
		{
			echo '<script type="text/javascript">
						alert("SORRY!There was some error!Please try again later!");
				</script>';
			header("refresh:1;url=available_jobs.php");
		}	
		}
		else
		{
			echo '<script type="text/javascript">
						alert("SORRY!You have not been granted the access to apply for Job yet!We will let you know when you can!Stay in touch!");
				</script>';
			header("refresh:1;url=available_jobs.php");
		}		
	}		
	else
		header("location:login.html");
?>