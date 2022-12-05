<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>COMPANY PAGE</title>
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
				<li><a href="login_Company2.php">HOME</a></li></li>
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
		<center><h1>STUDENT DETAILS</h1>
			<table  border="2" width="800px">
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					if(isset($_REQUEST['email']))
					{
						$email=$_REQUEST['email'];
						$sql="SELECT * FROM student where `email`='$email';";
					}
					elseif(isset($_REQUEST['enroll_no']))
					{
						$enroll_no=$_REQUEST['enroll_no'];
						$sql="SELECT * FROM student where `enroll_no`='$enroll_no';";
					}
					$query=mysqli_query($con,$sql);
					if($query)
					{
						$row=mysqli_fetch_array($query);
						$query_coll=mysqli_query($con,"select `college_name` from college where `u_id`='$row[u_id]';");
						$row_coll=mysqli_fetch_array($query_coll);
					}
					else
						//echo die(mysqli_error($con));
				?>
				<tr>
					<th>ENROLL NO</th>
					<th style="color:black;"><?php echo $row['enroll_no']; ?></th>
				</tr>
				<tr>
					<th>STUDENT NAME</th>
					<th style="color:black;"><?php echo $row['student_name']; ?></th>
				</tr>
				<tr>
					<th>COLLEGE NAME</th>
					<th style="color:black;"><?php echo $row_coll['college_name']; ?></th>
				</tr>
				<tr>
					<th>DOB</th>
					<th style="color:black;"><?php echo $row['DOB']; ?></th>
				</tr>
				<tr>
					<th>GENDER</th>
					<th style="color:black;"><?php echo $row['Gender']; ?></th>
				</tr>
				<tr>
					<th>EMAIL ID</th>
					<th style="color:black;"><?php echo $row['email']; ?></th>
				</tr>
				<tr>
					<th>PHONE NUMBER</th>
					<th style="color:black;"><?php echo $row['phone_no']; ?></th>
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
					<th style="color:black;"><?php echo $row['PostGraduation_Field']; ?></th>
				</tr>	
				<tr>
					<th>POST-GRADUATION RESULT</th>
					<th style="color:black;"><?php echo $row['PostGraduation_Result']; ?></th>
				</tr>
				<tr>
					<th>PHD</th>
					<th style="color:black;"><?php echo $row['PHD']; ?></th>
				</tr>
			</table><br/>
			
			<?php
					}
					else
						header("location:login.html");
				?>
			</center>
	</body>
</html>