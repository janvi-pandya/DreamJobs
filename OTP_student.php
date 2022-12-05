<?php
	if(isset($_POST['Submit']))
	{
		require_once('mailDemo/OTP_mail.php');
		//echo $otp;
	}

?>
<html>
	<head>
		<title>Verification</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		<meta charset="UTF-8">
		<script language="javascript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/p5@0.10.2/lib/p5.min.js"></script>
		<script language="javascript" type="text/javascript" src="timer/sketch.js"></script>
		<script type="text/javascript">
			function togglemenu()
			{
				document.getElementById('sidebar').classList.toggle('active');
			}
		</script>
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
		<center><h1><b>FORGOT PASSWORD?</b></h1></center>
		<form method="post" action="change_pswd_student.php"  style="margin-left:20%;width: 400px;">
				<hr class="mb-3">
				<u>The OTP is sent to the E-Mail ID</u> :<b> <?php echo $_POST['email'];?></b>
				<br/><br/>
				<a href="forgot_pswd.html">Entered wrong E-Mail ID?</a><br/><br/>
				<hr class="mb-3"><br/><br/>
				<input type="hidden" name="email" value=<?php echo $_POST['email']; ?>>
				<label for="email"><b>Enter The OTP:</b></label><br/>
				<input class="form-control" type="number" style="width:300px;float:left;" name="otp1" required>
				<p id="timer" style="float:right;color:red;"></p>
				<br/>
				<input type="hidden" name="otp2" value=<?php echo $otp; ?>>
				<hr class="mb-3">
				<input class="btn btn-primary" style="width: 200px;" type="submit" id="register" name="Submit" value="Next">
				<hr class="mb-3">
				
		</form>
		<a href="mailDemo/OTP_mail.php?email=<?php echo $_POST['email'];?>"><input class="btn btn-primary" style="background-color: lightblue;color: black;margin-left:20%;width: 200px;" type="button" name="Resend" value="Resend OTP"></a>
</body>
</html>