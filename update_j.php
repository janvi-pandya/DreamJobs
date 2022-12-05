<?php
	$job_id=$_POST['job1'];
	$age=$_POST['age1'];
	$post=$_POST['post1'];
	$vacancy=$_POST['vacancy1'];
	$field=$_POST['field1'];
	$ssc=$_POST['ssc1'];
	$hsc=$_POST['hsc1'];
	$diploma_r=$_POST['diploma_r1'];
	$diploma_f=$_POST['diploma_f1'];
	$graduation_r=$_POST['graduation_r1'];
	$graduation_f=$_POST['graduation_f1'];
	$post_graduation_r=$_POST['post_graduation_r1'];
	$post_graduation_f=$_POST['post_graduation_f1'];
	$phd=$_POST['phd'];
	$sal=$_POST['sal1'];
	$skill=$_POST['skill1'];
	$dt=$_POST['dt1'];
	$venue=$_POST['venue1'];
	$exam_type=$_POST['exam_type1'];
	
	
	$con=mysqli_connect("localhost","root","","pms");
	$sql="UPDATE `job` SET `age`="."$age".",`post`="."'$post'".",`vacancy`="."$vacancy".",`Field`="."'$field'".",`SSC`="."$ssc".",`HSC`="."$hsc".",`Diploma_Result`="."$diploma_r".",`Diploma_Field`="."'$diploma_f'".",`Graduation_Result`="."$graduation_r".",`Graduation_Field`="."'$graduation_f'".",`Post_Graduation_Result`="."$post_graduation_r".",`Post_Graduation_Field`="."'$post_graduation_f'".",`PHD`="."'$phd'".",`salary`="."$sal".",skill="."'$skill'".",Date_time="."'$dt'".",venue="."'$venue'".",exam_type="."'$exam_type'"." WHERE `job_id`="."'$job_id'"."";
	
	$query=mysqli_query($con,$sql);
	
	if($query)
	{
			echo '<script type="text/javascript">
			alert("You Have Successfully Updated the Job!");
			</script>';
			header("refresh:1;url=available_jobs_com.php");
	}
	else
	{
			echo '<script type="text/javascript">
			alert("SORRY!There was some error while updating!Try Again!");
			</script>';
			header("refresh:1;url=available_jobs_com.php");
		}
?>	