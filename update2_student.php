<?php	
	$con=mysqli_connect("localhost","root");
	
	$db=mysqli_select_db($con,"pms");
	
	$enroll=$_GET['enroll'];
	$sname=$_GET['sname'];
	$phone=$_GET['phonenumber'];
	$email=$_GET['email'];
	$dob=$_GET['dob'];
	$gender=$_GET['gender'];
	$ssc=$_GET['ssc'];
	$hsc=$_GET['hsc'];
	$diploma_f=$_GET['d_field'];
	$diploma_r=$_GET['d_result'];
	$graduation_f=$_GET['d_field'];
	$graduation_r=$_GET['g_result'];
	$Pgraduation_f=$_GET['pg_field'];
	$Pgraduation_r=$_GET['pg_result'];
	$phd=$_GET['phd'];
	if(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f)&&!empty($Pgraduation_f)&&!empty($Pgraduation_r))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`Diploma_Field`='$diploma_f',`Diploma_Result`=$diploma_r,`Graduation_Field`='$graduation_f',`Graduation_Result`=$graduation_r,`PostGraduation_Field`='$Pgraduation_f',`PostGraduation_Result`=$Pgraduation_r,`PHD`='$phd'  where `email`='$email'";
	elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f)&&!empty($Pgraduation_f))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`Diploma_Field`='$diploma_f',`Diploma_Result`=$diploma_r,`Graduation_Field`='$graduation_f',`Graduation_Result`=$graduation_r,`PostGraduation_Field`='$Pgraduation_f',`PHD`='$phd'  where `email`='$email'";
	elseif(empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`Diploma_Field`='$diploma_f',`Diploma_Result`=$diploma_r,`PHD`='$phd'  where `email`='$email'";
	elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`Diploma_Field`='$diploma_f',`Diploma_Result`=$diploma_r,`Graduation_Field`='$graduation_f',`Graduation_Result`=$graduation_r,`PHD`='$phd'  where `email`='$email'";
	elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`Diploma_Field`='$diploma_f',`Diploma_Result`=$diploma_r,`Graduation_Result`=$graduation_r,`PHD`='$phd'  where `email`='$email'";
	elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`Diploma_Field`='$diploma_f',`Diploma_Result`=$diploma_r,`PHD`='$phd'  where `email`='$email'";
	elseif(!empty($hsc)&&!empty($diploma_f))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`Diploma_Field`='$diploma_f',`PHD`='$phd'  where `email`='$email'";	
	elseif(!empty($hsc))
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`HSC`=$hsc,`PHD`='$phd'  where `email`='$email'";
	else
		$sql="update `student` set `enroll_no`='$enroll',`student_name`='$sname',`phone_no`='$phone',`email`='$email',`DOB`='$dob',`Gender`='$gender',`SSC`=$ssc,`PHD`='$phd'  where `email`='$email'";
	if(mysqli_query($con,$sql))
	{
		echo '<script type="text/javascript">
			alert("Updated Successfully!");
			</script>';
		header("refresh:1;url=loginPage_Student.php");
	}
	else
	{
		echo '<script type="text/javascript">
			alert("SORRY!There was some error while updating the record!Please Try Again!");
			</script>';
		header("refresh:1;url=loginPage_Student.php");
	}

?>