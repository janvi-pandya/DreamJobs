<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		$con=mysqli_connect("localhost","root","","pms");
		$c_id=$_REQUEST['id'];
		$sql="DELETE FROM company WHERE `c_id`="."'$c_id'"."";
		$query=mysqli_query($con,$sql);
		if($query)
			{
				/*echo '<script type="text/javascript">
				alert("Deleted Successfully!");
				</script>';
				header("refresh:1;url=login_MainAdmin.php");*/
				require_once('mailDemo/reject_mail.php');
			}
		else
		{
			//echo die(mysqli_error($con));
			echo '<script type="text/javascript">
							alert("SORRY!There was some error while rejecting the college profile!Please Try Again!");
					</script>';
			header("refresh:1;url=pending_companies.php");
		}	
	}
	else
		header("location:loginma.html");
?>