<?php
	$con=mysqli_connect("localhost","root","","pms");
	$email=$_REQUEST['email'];
	$sql="UPDATE company SET `approval_status`='Y' WHERE `email`="."'$email'"."";
	$query=mysqli_query($con,$sql);
	if($query)
	{
		echo '<script type="text/javascript">
						alert("You approved the companies\'s profile!");
				</script>';
		header("refresh:1;url=pending_companies.php");
	}
	else
	{
		//echo die(mysqli_error($con));
		echo '<script type="text/javascript">
						alert("SORRY!There was some error while approving the companies profile!Please Try Again!");
				</script>';
		header("refresh:1;url=pending_companies.php");
	}	
?>