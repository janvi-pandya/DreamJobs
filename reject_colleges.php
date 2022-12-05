<?php
	$con=mysqli_connect("localhost","root","","pms");
	$email=$_REQUEST['email'];
	$sql="UPDATE college SET `approval_status`='N' WHERE `email`="."'$email'"."";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		/*echo '<script type="text/javascript">
						alert("You rejected the college\'s profile!");
				</script>';
		header("refresh:1;url=pending_colleges.php");*/
		require_once('mailDemo/reject_mail.php');
	}
	else
	{
		//echo die(mysqli_error($con));
		echo '<script type="text/javascript">
						alert("SORRY!There was some error while rejecting the college profile!Please Try Again!");
				</script>';
		header("refresh:1;url=pending_colleges.php");
	}	
?>