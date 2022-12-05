<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>Apply For Job</title>
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
				<li><a href="loginPage_Student.php">HOME</a></li></li>
				<li><a href="update1_student.php">UPDATE PROFILE</a></li>
				<li><a href="available_jobs.php">AVAILABLE JOBS</li>
				<li><a href="applied_jobs.php">APPLIED JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="logout_Student.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_StudentAcc.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
			</ul>
		</div>
		<form method="get" action="Home_search.php">
			<input type="search"  style="margin-left: 72%;float: left;" name="search" placeholder="Search Here" list="Top_Searches">
			
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			<datalist id="Top_Searches">
				<option value="Jobs"></option>
				<option value="Colleges"></option>
				<option  value="Companies"></option>
			</datalist>
		</form>	
		<center><br><h1><b>JOBS YOU HAVE APPLIED FOR</b></h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<tr>
					<th>COMPANY NAME</th>
					<th>JOB DESIGNATION</th>
					<th>SALARY PER ANNUM</th>
					<th>SEE MORE</th>
					<th>UNDO JOB APPLICATION</th>
				</tr>
				<?php
					$email=$_SESSION['email'];
					$con=mysqli_connect("localhost","root","","pms");
					$sql_st="SELECT `enroll_no` FROM student where `approval_status`='Y' && `email`='$email';";
					$query_st=mysqli_query($con,$sql_st);
					if($query_st)
					{
						$row_st=mysqli_fetch_array($query_st);
						$enroll_no=$row_st['enroll_no'];
						
								$sqljob="SELECT * FROM job where `job_id` in (select `job_id` from stu_job where `enroll_no`='$enroll_no')";
								$queryjob=mysqli_query($con,$sqljob);
								while ($rowjob=mysqli_fetch_array($queryjob))
								{
									$cid=$rowjob['c_id'];
									$sql="SELECT * FROM company where `c_id`='$cid';";
									$query=mysqli_query($con,$sql);
									if($query)
									{
										$row=mysqli_fetch_array($query);
				?>
				<tr>
					<th><?php echo $row['company_name']; ?></th>
					<th><?php echo $rowjob['post']; ?></th>
					<th><?php echo $rowjob['salary']; ?></th>
					<th><a href="details_job_applied.php?id=<?php echo $rowjob['job_id'];?>&cn=<?php echo $row['company_name']; ?>"><input type="button" name="details" value="DETAILS"></a></th>
					<th><a href="undojobrequest.php?id=<?php echo $rowjob['job_id']; ?>"><input type="button" name="remove" value="UNDO REQUEST"></a></th>
				</tr>
								<?php }/*else echo die(mysqli_error($con));*/} ?>
				<tr>
					<th colspan=11>TOTAL=<?php echo mysqli_num_rows($queryjob);mysqli_close($con);?></th>
				</tr>
			</table><br/>
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
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>	
			<?php
					}
				}
				else {
					header("location:login.html");
				}
			?>
			
	</body>
</html>