<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>COLLEGE PAGE</title>
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
			<ul style="list-style-type: none;">
				<li><a href="login_College_2.php">HOME</a></li></li>
				<li><a href="update1_college.php?uid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="">AVAILABLE JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="approved_students.php">APPROVED STUDENT PROFILES</li>
				<li><a href="pending_students.php">PENDING STUDENT PROFILES</li>
				<li><a href="logout_college.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
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
<center><br><h1><b>APPROVED STUDENT PROFILES</b></h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<tr>
					<th>ENROLL NO</th>
					<th>STUDENT NAME</th>
					<th>SEE MORE</th>
					<th>DELETE</th>
				</tr>
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					$email=$_SESSION['email'];
					$sql="SELECT * FROM student where `approval_status`='Y' && `u_id` in (select `u_id` from college where `email`='$email');";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						while ($row=mysqli_fetch_array($query))
						{
				?>
				<tr>
					<th><?php echo $row['enroll_no']; ?></th>
					<th><?php echo $row['student_name']; ?></th>
					<th><a href="details_student.php?id=<?php echo $row['enroll_no']; ?>"><input type="button" name="details" value="DETAILS"></a></th>
					<th><a href="delete_student.php?id=<?php echo $row['enroll_no']; ?>"><input type="button" name="delete" value="DELETE"></a></th>
				</tr>
				<?php } ?>
				<tr>
					<th colspan=11>TOTAL=<?php echo mysqli_num_rows($query);mysqli_close($con);?></th>
				</tr>
			</table>
				<a href="student_report.php"><button style="margin-left:80% " value="PRINT">Generate REPORT</button></a>	
				<?php
						}
					}
					else
						header("location:login_college.html");
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
		</footer>
	</body>
</html>