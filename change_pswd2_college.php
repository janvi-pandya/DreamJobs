<?php 
	if(isset($_POST['Submit']))
	{
		if($_POST['password']==$_POST['confirmpassword'])
		{
				$con=mysqli_connect("localhost","root");
				$db=mysqli_select_db($con,"pms");
				$pass=md5($_POST['password']);
				$email=$_POST['email'];
				$sql="UPDATE `college` SET `password`="."'$pass'"." WHERE `email`="."'$email'"."";
				$query=mysqli_query($con,$sql);
				if($query)
				{
					echo '<script type="text/javascript">
						alert("Passwords Is Changed Successfully!");
					</script>';
					header('refresh:1;url=login_college.html');
				}
				else
					echo die(mysqli_error($con));
		}
		else
		{
					echo '<script type="text/javascript">
						alert("Passwords Do Not Match!");
					</script>';
					header('refresh:1;url=login_college.html');
		}
	}

?>