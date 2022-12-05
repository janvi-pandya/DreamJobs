<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
				<title>MAIN ADMIN PAGE</title>
					<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
					<link rel="stylesheet" type="text/css" href="css/custom.css">
					<link rel="shortcut icon" type="image/x-icon" href="logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
					<script type="text/javascript">
						function togglemenu()
						{
							document.getElementById('sidebar').classList.toggle('active');
						}
					</script>
<style>
	#sidebar li{padding: 20px;}
</style>
</head>
<body>
		<div id="sidebar" onclick="togglemenu()">
			<div class="toggle-btn" >
				<div id="d"></div>
				<div id="d"></div>
				<div id="d"></div>
			</div>
			<ul style="list-style-type: none; font-size:10px;">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_madmin.php?uid=<?php echo $_SESSION['email']; ?>">UPDATE PROFILE</a></li>
				<li><a href="main_admin_registration.html">CREATE NEW MAIN ADMIN</a></li>
				<li><a href="available_jobs_list.php">AVAILABLE JOBS</li>
				<li><a href="approved_colleges.php">APPROVED COLLEGE PROFILES</li>
				<li><a href="pending_colleges.php">PENDING COLLEGE PROFILES</li>
				<li><a href="approved_companies.php">APPROVED COMPANY PROFILES</li>
				<li><a href="pending_companies.php">PENDING COMPANY PROFILES</li>
				<li><a href="logout_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
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
			<?php
					$email=$_SESSION['email'];
					$con=mysqli_connect("localhost","root","","pms");
					$sql="SELECT `name` FROM main_admin where `email`='$email';";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						$row=mysqli_fetch_array($query);
						$name=$row['name'];
						
		?>
			<center><h1><b>WELCOME <?php echo $name; } ?>!</b></h1></center>
			<div style="margin-top:20%">
		<p>Check out the new company profile requests!!!</p>
		<a href="pending_companies.php"><button>APPROVE NOW!</button></a>
		</div><br/>
		<p>Check out the new college profile requests!!!</p>
		<a href="pending_colleges.php"><button>APPROVE NOW!</button></a>
			<footer>
			<div class="footer-section">
				<h4>Quick Address</h4>
				Bhailalbhai & Bhikhabhai Institute of Technology <br/>(BBIT - Polytechnic),<br/> Charutar Vidya Mandal, Vallabh Vidyanagar.
				<br/>
				<a class="fa fa-map-marker" style="font-size:30px;color:red;" href="https://goo.gl/maps/4DQmjgtU4GHB3taH8"></a>
				Address: Nr. Iscon Temple, Opp. Shastri Medan, Vallabh Vidya Nagar, Anand, Gujarat, India. 388120
				<br/>Phone: 02692 - 237240<br/>
				<br/>Email: dreamjobisyours@gmail.com<br/><br/>
			</div>	
			
			<div class="footer-section">
				<h4>Quick Links</h4>
				<ul type="none">
				<li><a href="index.php">Home</a></li>
				<li><a href="login.html">Student</a></li>
				<li><a href="logincom.html">Company</a></li>
				<li><a href="contactus.html">Contact Us</a></li>
				<li><a href="aboutus.html">About Us</a></li>
				</ul>
				<br/><br><br/><br/>
			</div>	
			<div class="footer-section" style="left:60%;width:40%;">
				<h4>Useful Links</h4>
				<ul type="none">
				<li><a href="http://www.bbit.ac.in">BBIT</a></li>
				<li><a href="http://www.gcet.ac.in">GCET</a></li>
				<li><a href="http://www.bvmengineering.ac.in">BVM</a></li>
				<li><a href="http://www.nirmauni.ac.in">NIRMA</a></li>
				<li><a href="http://www.gtu.ac.in">GTU</a></li>
				</ul>
				<br/><br/><br/><br/>
			</div>	
			<img  alt="My image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"style="background: url(logo.jpg) 50% / cover; border-radius: 50%;width:120px;margin-left:0px;float:left;">
			<ul style="list-style-type: none; ">
			
			
		</footer>
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>
				<?php
					}
					else
						header("location:loginma.html");
				?>
			<br/>
	</body>
</html>