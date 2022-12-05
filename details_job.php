<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>JOB DETAILS</title>
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
			<ul style="list-style-type: none; ">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_student.php">UPDATE PROFILE</a></li>
				<li><a href="job_registration.php">ADD JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="logout_student.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
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
		<center><h1>JOB DETAILS</h1>
			<table  border="2" width="800px">
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					$sql="SELECT * FROM job;";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						$row=mysqli_fetch_array($query);
					}
					else
						echo die(mysqli_error($con));
				?>
				<tr>
					<th>COMPANY NAME</th>
					<th style="color:black;"><?php echo $_GET['cn']; ?></th>
				</tr>
				<tr>
					<th>DESIGNATION</th>
					<th style="color:black;"><?php echo $row['post']; ?></th>
				<tr>
					<th>SALARY</th>
					<th style="color:black;"><?php echo $row['salary']; ?></th>
				</tr>
				<tr>
					<th>AGE LIMIT</th>
					<th style="color:black;"><?php echo $row['age']; ?></th>
				</tr>
				<tr>
					<th>FIELD</th>
					<th style="color:black;"><?php echo $row['Field']; ?></th>
				</tr>
				<tr>
					<th>SKILL</th>
					<th style="color:black;"><?php echo $row['skill']; ?></th>
				</tr>	
				<tr>
					<th>SSC</th>
					<th style="color:black;"><?php echo $row['SSC']; ?></th>
				</tr>
				<tr>
					<th>HSC</th>
					<th style="color:black;"><?php echo $row['HSC']; ?></th>
				</tr>	
				<tr>
					<th>DIPLOMA FIELD</th>
					<th style="color:black;"><?php echo $row['Diploma_Field']; ?></th>
				</tr>	
				<tr>
					<th>DIPLOMA RESULT</th>
					<th style="color:black;"><?php echo $row['Diploma_Result']; ?></th>
				</tr>
				<tr>
					<th>GRADUATION FIELD</th>
					<th style="color:black;"><?php echo $row['Graduation_Field']; ?></th>
				</tr>
				<tr>
					<th>GRADUATION RESULT</th>
					<th style="color:black;"><?php echo $row['Graduation_Result']; ?></th>
				</tr>	
				<tr>
					<th>POST-GRADUATION FIELD</th>
					<th style="color:black;"><?php echo $row['Post_Graduation_Field']; ?></th>
				</tr>	
				<tr>
					<th>POST-GRADUATION RESULT</th>
					<th style="color:black;"><?php echo $row['Post_Graduation_Result']; ?></th>
				</tr>
				<tr>
					<th>PHD</th>
					<th style="color:black;"><?php echo $row['PHD']; ?></th>
				</tr>
				<tr>
					<th>EXAM TYPE</th>
					<th style="color:black;"><?php echo $row['exam_type']; ?></th>
				</tr>	
				<tr>
					<th>DATE AND TIME</th>
					<th style="color:black;"><?php echo $row['Date_time']; ?></th>
				</tr>
				<tr>
					<th>VENUE</th>
					<th style="color:black;"><?php echo $row['venue']; ?></th>
				</tr>
			</table><br/>
			<a href="applyforjob.php?id=<?php echo $row['job_id'];?>"><input type="button" name="delete" value="APPLY NOW"> </a>
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
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>	
			<?php
					}
					else
						header("location:login.html");
				?>
			</center>
	</body>
</html>