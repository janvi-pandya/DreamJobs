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
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_company.php?cid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="job_registration.php">ADD JOBS</li>
				<li><a href="available_jobs_com.php">AVAILABLE JOBS</li>
				<li><a href="pending_jobs.php">PENDING JOB REQUESTS</li>
				<li><a href="approved_jobs.php">APPROVED JOB REQUESTS</li>
				<li><a href="offered_students.php">OFFERED APPLICANTS</li>
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
<center><br><h1><b>APPROVED JOB APPLICANT PROFILES</b></h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<tr>
					<th>JOB ID</th>
					<th>STUDENT NAME</th>
					<th>JOB DETAILS</th>
					<th>STUDENT DETAILS</th>
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
						$sql="SELECT * FROM stu_job where `application_status`='Y' && `job_status`='Y' && `job_id` in (select `job_id` from `job` where `c_id`='$cid' );";
						$query=mysqli_query($con,$sql);
						if($query)
						{
							while ($row=mysqli_fetch_array($query))
							{
								$rollno=$row['enroll_no'];
								$query_Std=mysqli_query($con,"select * from `Student` where `enroll_no`='$rollno';");
								if($query_Std)
								{
									$jid=$row['job_id'];
									$row_Std=mysqli_fetch_array($query_Std);
									$query_Com=mysqli_query($con,"select * from `Company` where `c_id`=(select `c_id` from `job` where `job_id`='$jid');");
									if($query_Com)
									{
										$row_Com=mysqli_fetch_array($query_Com);
				?>
				<tr>
					<th><?php echo $row['job_id']; ?></th>
					<th><?php echo $row_Std['student_name']; ?></th>
					<th><a href="details_job_com.php?cn=<?php echo $row_Com['c_id']; ?>&jid=<?php echo $row['job_id']; ?>"><input style="width:100px;" type="button" name="details" value="DETAILS"></a></th>
					<th><a href="details_offered_applicants.php?c_id=<?php echo $row_Std['email']; ?>&enroll_no=<?php echo $row_Std['enroll_no']; ?>"><input style="width:100px;" type="button" name="details" value="DETAILS"></a></th>
				</tr>
						<?php }else echo die(mysqli_error($con));}}}else echo die(mysqli_error($con)); ?>
				<tr>
					<th colspan=11>TOTAL=<?php echo mysqli_num_rows($query);mysqli_close($con);?></th>
				</tr>
			</table><br/>
						
				<?php
						}
					}
					else
						header("location:logincom.html");
				?>
			</center>
	</body>
</html>