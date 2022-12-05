<?php	
	$con=mysqli_connect("localhost","root");
	
	$db=mysqli_select_db($con,"pms");
	
	$id=$_GET['id'];
	$adname=$_GET['aname'];
	$email=$_GET['email'];
	$phone=$_GET['phone'];
	
	$sql="update main_admin set m_id='".$id."',name='".$adname."',email='".$email."' ,phone_no='".$phone."' where email='".$email."'";
	
	if(mysqli_query($con,$sql))
	{
		echo '<script type="text/javascript">
			alert("Your Profile has been Updated Successfully!");
			</script>';
		header("refresh:1;url=login_MainAdmin.php");
	}
	else
	{
		echo '<script type="text/javascript">
			alert("SORRY!There was an error while updating details!Please Try Again!");
			</script>';
		header("refresh:1;url=login_MainAdmin.php");
	}

?>