<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>COMPANY PAGE</title>
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
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_company.php?cid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="job_registration.php">ADD JOBS</li>
				<li><a href="available_jobs_com.php">AVAILABLE JOBS</li>
				<li><a href="pending_jobs.php">PENDING JOB REQUESTS</li>
				<li><a href="approved_jobs.php">APPROVED JOB REQUESTS</li>
				<li><a href="logout_company.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_CompanyAcc.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
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
<center><br><h1><b>PENDING JOB REQUESTS OF STUDENTS</b></h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<tr>
					<th>JOB ID</th>
					<th>STUDENT NAME</th>
					<th>JOB DETAILS</th>
					<th>STUDENT DETAILS</th>
					<th>APPROVE</th>
					<th>REJECT</th>
				</tr>
				<?php
					
					$con=mysqli_connect("localhost","root","","pms");
					$email=$_SESSION['email'];
					$sql_id="SELECT `c_id` FROM `company` where `email`='$email';";
					$query_id=mysqli_query($con,$sql_id);
					if($query_id)
					{
						$row_id=mysqli_fetch_array($query_id);
						$cid=$row_id['c_id'];
						$sql="SELECT * FROM stu_job where `application_status`='P' && `job_id` in (select `job_id` from `job` where `c_id` = '$cid');";
					//$sql="SELECT * FROM stu_job where `application_status`='P';";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						while ($row=mysqli_fetch_array($query))
						{
							$jid=$row['job_id'];
							$rollno=$row['enroll_no'];
							$query_Std=mysqli_query($con,"select * from `Student` where `enroll_no`='$rollno';");
							if($query_Std)
							{
								
								$row_Std=mysqli_fetch_array($query_Std);
				?>
				<tr>
					<th><?php echo $row['job_id']; ?></th>
					<th><?php echo $row_Std['student_name']; ?></th>
					<th><a href="details_job_com.php?jid=<?php echo $jid; ?>"><input style="width:100px;" type="button" name="details" value="DETAILS"></a></th>
					<th><a href="details_student_com_app.php?email=<?php echo $row_Std['email']; ?>&jid=<?php echo $jid; ?>"><input style="width:100px;" type="button" name="details" value="DETAILS"></a></th>
					<th><a href="students_job_approval.php?enroll_no=<?php echo $row_Std['enroll_no'] ; ?>&jid=<?php echo $jid; ?>"><input style="width:100px;" type="button" name="approval" value="APPROVE"></a></th>
					<th><a href="reject_student_jobs_app.php?enroll_no=<?php echo $row_Std['enroll_no']; ?>&jid=<?php echo $jid; ?>"><input style="width:100px;" type="button" name="delete" value="REJECT"></a></th>
				</tr>
					<?php }else echo die(mysqli_error($con));}}else echo die(mysqli_error($con));?>
				<tr>
					<th colspan=11>TOTAL=<?php echo mysqli_num_rows($query);mysqli_close($con);?></th>
				</tr>
			</table><br/><br/>
						
				<?php
						}
					}
					else
						header("location:logincom.html");
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
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>	
	</body>
</html>