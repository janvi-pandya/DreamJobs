<?php
	session_start();
	if(isset($_SESSION['email']))
	{
	$con=mysqli_connect("localhost","root","","pms");
	if($con)
	{
		if(isset($_POST['create']))
		{
		//if(isset($_POST['job_id']))
			$job_id = $_POST['job_id'];
		//if(isset($_POST['age']))
			$age = $_POST['age'];
		//if(isset($_POST['post']))
			$post = $_POST['post'];
		//if(isset($_POST['vacancy']))
			$vacancy = $_POST['vacancy'];
		//if(isset($_POST['field']))
			$field = $_POST['field'];
		//if(isset($_POST['ssc']))
			$ssc = $_POST['ssc'];
		//if(isset($_POST['hsc']))
			$hsc = $_POST['hsc'];
		//if(isset($_POST['salary']))
			$salary = $_POST['salary'];
		//if(isset($_POST['skill']))
			$skill = $_POST['skill'];
		//if(isset($_POST['date_time']))
			$date_time = $_POST['date_time'];
		//if(isset($_POST['venue']))
			$venue = $_POST['venue'];
		//if(isset($_POST['exam_type']))
			$exam_type = $_POST['exam_type'];
		if(isset($_POST['diploma_r']))
			$diploma_r = $_POST['diploma_r'];
		if(isset($_POST['diploma_f']))
			$diploma_f = $_POST['diploma_f'];
		if(isset($_POST['graduation_r']))
			$graduation_r = $_POST['graduation_r'];
		if(isset($_POST['graduation_f']))
			$graduation_f = $_POST['graduation_f'];
		if(isset($_POST['post_graduation_r'])&&!empty($_POST['phd']))
			$post_graduation_r = $_POST['post_graduation_r'];
		if(isset($_POST['post_graduation_f']))
			$post_graduation_f = $_POST['post_graduation_f'];
		if(isset($_POST['phd'])&&!empty($_POST['phd']))
			$phd = $_POST['phd'];
		}
		
		$email=$_SESSION['email'];
		$sql_id="select `c_id` from company where `email`='$email';";
		$query_id=mysqli_query($con,$sql_id);
		$row_id=mysqli_fetch_array($query_id);
		$id=$row_id['c_id'];
		$sql=mysqli_query($con,"select `job_id` from `job` where `c_id`='$id' && `job_id`='$job_id';");
		if($row=mysqli_fetch_array($sql))
		{
			echo '<script type="text/javascript">
			alert("You Have Already Registered this Job!");
			</script>';
			header("refresh:1;url=available_jobs_com.php");
			exit(0);
		}
		
		$sql="INSERT INTO `job`(`job_id`, `age`, `post`, `vacancy`, `field`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`, `Graduation_Result`, `Graduation_Field`, `Post_Graduation_Result`, `Post_Graduation_Field`, `PHD`, `salary`, `skill`, `Date_Time`, `venue`, `exam_type`, `c_id`) VALUES ('$job_id','$age','$post','$vacancy','$field','$ssc','$hsc','$diploma_r','$diploma_f',$graduation_r,'$graduation_f',$post_graduation_r,'$post_graduation_f','$phd','$salary','$skill','$date_time','$venue','$exam_type','$id');";

		$query=mysqli_query($con,$sql);
		if($query)
		{
			echo '<script type="text/javascript">
			alert("You Have Successfully Registered the Job!");
			</script>';
			header("refresh:1;url=login_Company2.php");
		}
		else
		{
			echo '<script type="text/javascript">
			alert("SORRY!There was some error!Try Again Later!");
			</script>';
			header("refresh:1;url=job_registration.php");
		}
	}
			
	else
	{
		echo 'Not Connected To The Server';
	}
	/*		

			if(!empty($firstname)||!empty($lastname)||!empty($email)||!empty($age)||!empty('$phonenumber')||!empty($password)||!empty($confirmpassword))
			{
					$SELECT="SELECT email From `vagrant` Where email = ? limit 1";
					$sql = "INSERT INTO `vagrant` (firstname,lastname,email,age,phonenumber,password) VALUES ('$firstname','$lastname','$email','$age',''$phonenumber'',md5('$password'))";
					$stmt=$con->prepare($SELECT);
					$stmt->bind_param("s",$email);
					$stmt->execute();
					$stmt->bind_result($email);
					$stmt->store_result();
					$rnum=$stmt->num_rows;
					//echo $rnum;
					if($rnum==0)
					{
							if($password==$confirmpassword)
							{
								if(!mysqli_query($con,$sql))
									echo 'Not Inserted';
								else
									echo "New Record Inserted Successfully!";
							}
							else
								echo "Passwords do not match!";
					}
					else
					{
						echo "Someone has already registered using this email";
					}
					$stmt->close();
					$con->close();
			}
			else
			{
				echo "Fill Up All The Fields!";
			}
			header("refresh:2;url=index.html");*/
	}
	else
		header("refresh:1;url=logincom.html");
?>