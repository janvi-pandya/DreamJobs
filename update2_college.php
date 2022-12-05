<?php	
	$con=mysqli_connect("localhost","root");
	
	$db=mysqli_select_db($con,"pms");
	
	$id=$_GET['id'];
	//$pass=$_GET['pass'];
	$adname=$_GET['aname'];
	$clname=$_GET['cname'];
	$website=$_GET['website'];
	$loc=$_GET['loc'];
	$land=$_GET['land'];
	$city=$_GET['city'];
	$post=$_GET['post'];
	$email=$_GET['email'];
	$phone=$_GET['phone'];
	
	$sql="update college set u_id='".$id."',admin_name='".$adname."',college_name='".$clname."',website='".$website."',location='".$loc."',landmark='".$land."',city='".$city."',post='".$post."',email='".$email."' ,phone_no='".$phone."' where email='".$email."'";
	
	if(mysqli_query($con,$sql))
	{
		echo '<script type="text/javascript">
			alert("Updated Successfully!");
			</script>';
		header("refresh:1;url=login_College_2.php");
	}
	else
		echo mysqli_error($con);

?>