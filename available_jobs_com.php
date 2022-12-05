<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>Company Page</title>
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
				<li><a href="update1_company.php?cid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="job_registration.php">ADD NEW JOB</li>
				<li><a href="available_jobs_com.php">AVAILABLE JOBS</li>
				<li><a href="pending_jobs.php">PENDING JOB REQUESTS</li>
				<li><a href="approved_jobs.php">APPROVED JOB REQUESTS</li>
				<li><a href="logout_company.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_CompanyAcc.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
			</ul>
		</div>
		<form method="get" action="">
			<input type="search" style="margin-left: 72%;float: left;" name="search" placeholder="Search Here">
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
		<center><br><h1><b>JOBS</b></h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 100px; width: 100%;">
				<tr>
					<th>JOB ID</th>
					<th>POST</th>
					<th>SALARY</th>
					<th>SEE MORE</th>
					<th>DELETE</th>
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
						$sql="SELECT * FROM job where `c_id`='$cid';";
						$query=mysqli_query($con,$sql);
						if($query)
						{
							while ($row=mysqli_fetch_array($query))
							{
							
				?>
				<tr>
					<th><?php echo $row['job_id']; ?></th>
					<th><?php echo $row['post']; ?></th>
					<th><?php echo $row['salary']; ?></th>
					<?php $id=$row['c_id']; ?>
					<td><a href="Update_Job.php?id=<?php echo $row['job_id'];?>"><input type="button" name="update" value="DETAILS"></a></th>
					<th><a href="delete_Job.php?id=<?php echo $row['job_id']; ?>"><input type="button" name="delete" value="DELETE"></a></th>
				</tr>
				<?php
						}
					}
					//else
						//echo die(mysqli_error($con));
					}
				?>
				<tr>
					<th colspan=19>TOTAL=<?php echo mysqli_num_rows($query);mysqli_close($con);?></th>
				</tr>
			</table><br/>
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
				<br/><br><br/><br/>
			</div>	
			
			
		</footer>
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>	
			<?php
				}
				else {
					header("location:logincom.html");
				}
			?>
			</center>
	</body>
</html>