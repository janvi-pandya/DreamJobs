<?php
	$con=mysqli_connect("localhost","root","","pms");
	if($con)
	{
		if(isset($_POST['create']))
		{
		//if(isset($_POST['main_admin_id']))
			$main_admin_id = $_POST['main_admin_id'];	
		//if(isset($_POST['name']))
			$name = $_POST['name'];
		//if(isset($_POST['email']))
			$email = $_POST['email'];
		//if(isset($_POST['password']))
			$password = $_POST['password'];
			$password = md5($password);
		//if(isset($_POST['confirmpassword']))
			$confirmpassword = $_POST['confirmpassword'];
			$confirmpassword = md5($confirmpassword);
		if($password!=$confirmpassword)
		{
			echo '<script type="text/javascript">
						alert("Passwords do not match!");
				</script>';
			header("refresh:1;url=main_admin_registration.html");
			die();
		}
		$sql=mysqli_query($con,"select `m_id` from `main_admin` where `m_id`='$main_admin_id'||`email`='$email';");
		if($row_st=mysqli_fetch_array($sql))
		{
			echo '<script type="text/javascript">
			alert("You Have Registered Already!LOGIN NOW!");
			</script>';
			header("refresh:1;url=loginma.html");
			exit(0);
		}
		//if(isset($_POST['phonenumber']))
			$phonenumber = $_POST['phonenumber'];
		}
		$sql="INSERT INTO `main_admin`(`m_id`, `password`, `name`,`email`,`phone_no`) VALUES ('$main_admin_id','$password','$name','$email','$phonenumber');";
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
			alert("SORRY!There was some error while Registration!Please Try Again!");
			</script>';
			header("refresh:1;url=main_admin_registration.html");
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