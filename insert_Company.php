<?php
	$con=mysqli_connect("localhost","root","","pms");
	if($con)
	{
		if(isset($_POST['create']))
		{
		//if(isset($_POST['c_id']))
			$c_id = $_POST['c_id'];	
		//if(isset($_POST['name']))
			$name = $_POST['name'];
		//if(isset($_POST['recruiter_name']))
			$recruiter_name = $_POST['recruiter_name'];
		//if(isset($_POST['email']))
			$email = $_POST['email'];
		//if(isset($_POST['password']))
			$password = $_POST['password'];
			$password = md5($password);
		//if(isset($_POST['confirmpassword']))
			$confirmpassword = $_POST['confirmpassword'];
		//if(isset($_POST['website']))
			$website = $_POST['website'];
		//if(isset($_POST['location']))
			$location = $_POST['location'];
		//if(isset($_POST['landmark']))
			$landmark = $_POST['landmark'];
		//if(isset($_POST['city']))
			$city = $_POST['city'];
		//if(isset($_POST['phone_no']))
			$phone_no= $_POST['phone_no'];

		}
		$sql=mysqli_query($con,"select `m_id` from `company` where `c_id`='$c_id'||`email`='$email';");
		if($row_st=mysqli_fetch_array($sql))
		{
			echo '<script type="text/javascript">
			alert("You Have Registered Already!LOGIN NOW!");
			</script>';
			header("refresh:1;url=logincom.html");
			exit(0);
		}
		$sql="INSERT INTO `company`(`c_id`, `password`, `company_name`,`email`, `website`,`recruiter_name`,`location`,`landmark`,`phone_no`,`city`,`m_id`) VALUES ('$c_id','$password','$name','$email','$website','$recruiter_name','$location','$landmark','$phone_no','$city','M01');";
		$query=mysqli_query($con,$sql);
		if($query)
			//echo "Inserted";
			require_once('mailDemo/Registration_mail.php');
		else
			echo mysqli_error($con);
			echo '<script type="text/javascript">
			alert("SORRY!There was some error while Registration!Please Try Again!");
			</script>';
			header("refresh:1;url=company_registration.html");
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