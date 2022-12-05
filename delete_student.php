<?php
	$con=mysqli_connect("localhost","root","","pms");
	$enroll_no=$_GET['id'];
	$sql="DELETE FROM student WHERE `enroll_no`="."'$enroll_no'"."";
	$query=mysqli_query($con,$sql);
			if($query)
		{
			echo '<script type="text/javascript">
			alert("Deleted Successfully!");
			</script>';
			header("refresh:1;url=login_college_2.php");
		}
		else
		{
			echo mysqli_error($con);
			echo '<script type="text/javascript">
			alert("SORRY!There was some error while deleting!Please Try Again!");
			</script>';
			header("refresh:1;url=login_college_2.php");
		}
?>