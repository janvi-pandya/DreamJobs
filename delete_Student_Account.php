<?php session_start(); if(isset($_SESSION['email']))	
	{
	echo '<script type="text/javascript">
 if(confirm("Are you sure you want to delete your account?"))
 {';
		$con=mysqli_connect("localhost","root","","pms");
		$email=$_SESSION['email'];
		$sql="DELETE FROM student WHERE `email`="."'$email'"."";
		$query=mysqli_query($con,$sql);
		if($query)
		{
			echo '<script type="text/javascript">
			alert("Your Account has been deleted Successfully!");
			</script>';
			session_destroy();
			header("refresh:1;url=index.php");
		}
		else
		{
			echo mysqli_error($con);
			echo '<script type="text/javascript">
			alert("SORRY!There was some error while deleting!Please Try Again!");
			</script>';
			session_destroy();
			header("refresh:1;url=index.php");
		}
	}		
	else
	{
		header("refresh:1;url=index.php");
	}	
echo '<script type="text/javascript">}</script>';
?>