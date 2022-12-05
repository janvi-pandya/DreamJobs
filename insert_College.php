<?php
	$con=mysqli_connect("localhost","root");
	$db=mysqli_select_db($con,"pms");
	if($con)
	{
		if(isset($_POST['create']))
		{
		//if(isset($_POST['coll_id']))
			$coll_id = $_POST['coll_id'];
		//if(isset($_POST['name']))
			$cname = $_POST['name'];
		//if(isset($_POST['admin_name']))
			$aname = $_POST['admin_name'];
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
			header("refresh:1;url=college_registration.html");
			die();
		}
		//if(isset($_POST['phonenumber']))
			$phonenumber = $_POST['phonenumber'];
		//if(isset($_POST['post']))
			$post = $_POST['post'];
		if(isset($_POST['website']))
			$website = $_POST['website'];
		else
			$website = null;
		//if(isset($_POST['location']))
			$location = $_POST['location'];
		//if(isset($_POST['landmark']))
			$landmark = $_POST['landmark'];
		//if(isset($_POST['city']))
			$city = $_POST['city'];
		
		}
		$sql=mysqli_query($con,"select `m_id` from `college` where `u_id`='$coll_id'||`email`='$email';");
		if($row_st=mysqli_fetch_array($sql))
		{
			echo '<script type="text/javascript">
			alert("You Have Registered Already!LOGIN NOW!");
			</script>';
			header("refresh:1;url=login_college.html");
			exit(0);
		}
		$sql="INSERT INTO `college` (`u_id`, `password`, `admin_name`, `college_name`, `website`, `phone_no`, `location`, `landmark`, `city`, `post`, `email`, `m_id`) VALUES ('$coll_id','$password','$aname','$cname','$website','$phonenumber','$location','$landmark','$city','$post','$email','M01');";
		$query=mysqli_query($con,$sql);
		if($query)
		{
			/*echo '<script type="text/javascript">
			alert("You Have Registered Successfully!");
			</script>';
			header("refresh:1;url=login_college.html");*/
			require_once('mailDemo/Registration_mail.php');
		}
		else
		{
			echo mysqli_error($con);
			echo '<script type="text/javascript">
			alert("SORRY!There was some error while Registration!Please Try Again!");
			</script>';
			header("refresh:1;url=college_registration.html");
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