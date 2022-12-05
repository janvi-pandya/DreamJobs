<?php
	 session_start();
	 $email=$_SESSION['email'];
	 $con=mysqli_connect("localhost","root","","pms");
	if($con)
	{
		$c=mysqli_query($con,"delete from College where `email`='$email';");
		if($c)
		{
			echo '<script type="text/javascript">
						alert("Your account has been deleted permenantly!");
					</script>';
			header('refresh:1;url=index.php');
			
		}
		else
		{
			echo '<script type="text/javascript">
						alert("SORRY!There was some error! Please try Aain Later!");
					</script>';
			header('refresh:1;url=index.php');
		}
	}
	session_destroy();
?>