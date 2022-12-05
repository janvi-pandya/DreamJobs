<?php
	if($_POST['otp1']!=$_POST['otp2'])
	{
		echo '<script type="text/javascript">
							alert("You Have Entered Wrong OTP!");
						</script>';
		header("refresh:1;url=forgot_pswd_college.php");
	}
?>
<html>
	<head>
		<title>Change Password</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
					<script type="text/javascript">
						function togglemenu()
						{
							document.getElementById('sidebar').classList.toggle('active');
						}
					</script>
	</head>
	</head>
	<body>
		<div id="sidebar" onclick="togglemenu()">
			<div class="toggle-btn" >
				<div id="d"></div>
				<div id="d"></div>
				<div id="d"></div>
			</div>
			<ul style="list-style-type: none; ">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="loginma.html">MAIN ADMIN</a></li>
				<li><a href="login.html">STUDENT</a></li>
				<li><a href="login_college.html">COLLEGE</a></li>
				<li><a href="logincom.html">COMPANY</a></li>
				<li><a href="">CONTACT US</a></li>
				<li><a href="">ABOUT US</a></li>
			</ul>
		</div>
		<form method="get" action="Home_search.php">
			<input type="search"  style="margin-left: 72%;float: left;" name="search" placeholder="Search Here" list="Top_Searches">
			<datalist id="Top_Searches">
				<option value="Jobs"></option>
				<option value="Colleges"></option>
				<option  value="Companies"></option>
			</datalist>
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
		<center><h1><b>ENTER NEW PASSWORD</b></h1></center>
		<form method="post" action="change_pswd2_college.php" style="margin-left: 20%;width: 400px">
				
			<label for="password"><b>Password:</b></label>
			<input  class="form-control" type="password" name="password" required> <br>
			<input type="hidden" name="email" value=<?php echo $_POST['email']; ?>>
			<label for="confirmpassword"><b>Confirm Password:</b></label>
			<input  class="form-control" type="password" name="confirmpassword" required> <br>
			<input class="btn btn-primary" style="width: 200px;" type="submit" id="register" name="Submit" value="Submit">
		</form>
				<a href="login_college.html" style="margin-left: 20%;">LOGIN</a></center>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
			<script type="text/javascript">
			$(function(){
				$('#register').click(function(){
					Swal.fire({
					'title':'Your Password has been changed successfully!',
					'text':'Welcome',
					'type':'success',
				})
				});
			});
	</script>-->
	</body>
</html>