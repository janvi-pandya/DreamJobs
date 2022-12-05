<html>
	<head>
	<title>Forgot Password?</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
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
		<form method="post" action="OTP_college.php" style="margin-left:20%;width: 400px;">
			<hr class="mb-3">
				<label for="email"><b>Enter Your E-Mail Address:</b></label><br/><br/>
				<input class="form-control" type="email" name="email" required><br/><br/><br/>
				<hr class="mb-3">
				<input class="btn btn-primary" style="width: 200px;" type="submit" id="register" name="Submit" value="Next">
		</form>
	</body>
</html>
