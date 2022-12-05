<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>MAIN_ADMIN PAGE</title>
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
			
</head>
<body>
		<div id="sidebar" onclick="togglemenu()">
			<div class="toggle-btn" >
				<div id="d"></div>
				<div id="d"></div>
				<div id="d"></div>
			</div>
			<ul style="list-style-type: none; font-size:10px;">
				<li><a href="login_MainAdmin.php">HOME</a></li></li>
				<li><a href="update1_MainAdmin.php?uid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="">AVAILABLE JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="approved_colleges.php">APPROVED STUDENT PROFILES</li>
				<li><a href="pending_college.php">PENDING STUDENT PROFILES</li>
				<li><a href="logout_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
			</ul>
		</div><br/>
		<form method="get" action="Home_search.php">
			<input type="search"  style="margin-left: 72%;float: left;" name="search" placeholder="Search Here" list="Top_Searches">
			<datalist id="Top_Searches">
				<option value="Jobs"></option>
				<option value="Colleges"></option>
				<option  value="Companies"></option>
			</datalist>
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
<center><br><h1><b>APPROVED COLLEGES</b></h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<tr>
					<th>COLLEGE ID</th>
					<th>COLLEGE NAME</th>
					<th>ADMIN NAME</th>
					<th>SEE MORE</th>
					<th>DELETE</th>
				</tr>
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					$sql="SELECT * FROM college where `approval_status`='Y';";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						while ($row=mysqli_fetch_array($query))
						{
				?>
				<tr>
					<th><?php echo $row['u_id']; ?></th>
					<th><?php echo $row['college_name']; ?></th>
					<th><?php echo $row['admin_name']; ?></th>
					<th><a href="details_college.php?id=<?php echo $row['u_id']; ?>"><input type="button" name="details" value="DETAILS"></a></th>
					<th><a href="delete_College.php?id=<?php echo $row['u_id']; ?>"><input type="button" name="delete" value="DELETE"></a></th>
				</tr>
				<?php } ?>
				<tr>
					<th colspan=11>TOTAL=<?php echo mysqli_num_rows($query);mysqli_close($con);?></th>
				</tr>
			</table><br/><br/><br/><br/>
						
				<?php
						}
					}
					else
						header("location:loginma.html");
				?>
			</center>
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
	</body>
</html>