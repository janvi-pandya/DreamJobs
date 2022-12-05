<?php
	$con=mysqli_connect("localhost","root","","pms");
	if($con)
	{
		if(isset($_POST['create']))
		{
		//if(isset($_POST['name']))
			$name = $_POST['name'];
		//if(isset($_POST['enroll']))
			$enroll = $_POST['enroll'];
		//if(isset($_POST['email']))
			$email = $_POST['email'];
		//if(isset($_POST['password']))
			$password = $_POST['password'];
			$password = md5($password);
		//if(isset($_POST['confirmpassword']))
			$confirmpassword = $_POST['confirmpassword'];
			$confirmpassword = md5($confirmpassword);
		//if(isset($_POST['clg_name']))
			$clg_name=$_POST['clg_name'];
		$c=mysqli_query($con,"select `u_id` from `college` where `college_name`='$clg_name';");
		$sql=mysqli_query($con,"select `u_id` from `student` where `enroll_no`='$enroll'||`email`='$email';");
		if($row_st=mysqli_fetch_array($sql))
		{
			echo '<script type="text/javascript">
			alert("You Have Registered Already!LOGIN NOW!");
			</script>';
			header("refresh:1;url=login.html");
			exit(0);
		}
		$row=mysqli_fetch_array($c);
		$u_id=$row['u_id'];
		if($password!=$confirmpassword)
		{
			echo '<script type="text/javascript">
						alert("Passwords do not match!");
				</script>';
			header("refresh:1;url=student_registration.php");
			die();
		}
		//if(isset($_POST['phonenumber']))
			$phonenumber = $_POST['phonenumber'];
		//if(isset($_POST['dob']))
			$dob = $_POST['dob'];
		//if(isset($_POST['gender']))
			$gender = $_POST['gender'];
		//if(isset($_POST['ssc']))
			$ssc = $_POST['ssc'];
		if(isset($_POST['hsc']))
			$hsc = $_POST['hsc'];
		if(isset($_POST['diploma_r']))
			$diploma_r = $_POST['diploma_r'];
		if(isset($_POST['diploma_f']))
			$diploma_f = $_POST['diploma_f'];
		if(isset($_POST['graduation_r']))
			$graduation_r = $_POST['graduation_r'];
		if(isset($_POST['graduation_f']))
			$graduation_f = $_POST['graduation_f'];
		if(isset($_POST['Pgraduation_r']))
			$Pgraduation_r = $_POST['Pgraduation_r'];
		if(isset($_POST['Pgraduation_f'])&&!empty($_POST['phd']))
			$Pgraduation_f = $_POST['Pgraduation_f'];
		if(isset($_POST['phd'])&&!empty($_POST['phd']))
			$phd = $_POST['phd'];

		}
		if(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f)&&!empty($Pgraduation_f)&&!empty($Pgraduation_r)&&!empty($phd))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`, `Graduation_Result`, `Graduation_Field`, `PostGraduation_Result`, `PostGraduation_Field`, `PHD`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,$diploma_r,'$diploma_f',$graduation_r,'$graduation_f',$Pgraduation_r,'$Pgraduation_f','$phd','$clg_name','$u_id');";
		elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f)&&!empty($Pgraduation_f)&&!empty($Pgraduation_r))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`, `Graduation_Result`, `Graduation_Field`, `PostGraduation_Result`, `PostGraduation_Field`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,$diploma_r,'$diploma_f',$graduation_r,'$graduation_f',$Pgraduation_r,'$Pgraduation_f','$clg_name','$u_id');";
		elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f)&&!empty($Pgraduation_f))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`, `Graduation_Result`, `Graduation_Field`, `PostGraduation_Result`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,$diploma_r,'$diploma_f',$graduation_r,'$graduation_f',$Pgraduation_r,'$clg_name','$u_id');";
		elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r)&&!empty($graduation_f))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`, `Graduation_Result`, `Graduation_Field`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,$diploma_r,'$diploma_f',$graduation_r,'$graduation_f','$clg_name','$u_id');";
		elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r)&&!empty($graduation_r))

			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`, `Graduation_Result`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,$diploma_r,'$diploma_f',$graduation_r,'$clg_name','$u_id');";		
		elseif(!empty($hsc)&&!empty($diploma_f)&&!empty($diploma_r))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Result`, `Diploma_Field`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,$diploma_r,'$diploma_f','$clg_name','$u_id');";
		elseif(!empty($hsc)&&!empty($diploma_f))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`, `Diploma_Field`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,'$diploma_f','$clg_name','$u_id');";
		elseif(!empty($hsc))
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`, `HSC`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,$hsc,'$clg_name','$u_id');";
		else
			$sql="INSERT INTO `student`(`enroll_no`, `password`, `student_name`, `phone_no`, `email`, `DOB`, `Gender`, `SSC`,`college_name`,`u_id`) VALUES ('$enroll','$password','$name','$phonenumber','$email','$dob','$gender',$ssc,'$clg_name','$u_id');";
		$query=mysqli_query($con,$sql);
		if($query)
		{
			/*echo '<script type="text/javascript">
							alert("You Have Registered Successfully!");
						</script>';
			header("refresh:1;url=index.php");*/
			require_once('mailDemo/Registration_mail.php');
		}
		else
		{
			echo mysqli_error($con);
			echo '<script type="text/javascript">
			alert("SORRY!There was some error while Registration!Verify the values you have entered!Please Try Again!");
			</script>';
			//header("refresh:1;url=student_registration.php");
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
?>