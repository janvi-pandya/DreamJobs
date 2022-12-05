<?php	
	$con=mysqli_connect("localhost","root");
	
	$db=mysqli_select_db($con,"pms");
	
	$cid=$_GET['cid'];
	//$pass=$_GET['pass'];
	$comname=$_GET['comname'];
	$recname=$_GET['recname'];
	$website=$_GET['website'];
	$phone=$_GET['phone'];
	$loc=$_GET['loc'];
	$land=$_GET['land'];
	$city=$_GET['city'];
	$email=$_GET['email'];
	
	$sql="update company set c_id='".$cid."',company_name='".$comname."',recruiter_name='".$recname."',website='".$website."',phone_no='".$phone."',location='".$loc."',landmark='".$land."',city='".$city."',email='".$email."' where email='".$email."'";
	
	if(mysqli_query($con,$sql))
	{
		echo '<script type="text/javascript">
			alert("Updated Successfully!");
			</script>';
		header("refresh:1;url=login_Company2.php");
	}
	else
		echo mysqli_error($con);

?>