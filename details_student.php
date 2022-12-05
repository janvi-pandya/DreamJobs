<!DOCTYPE HTML>
<?php if(isset($_SESSION['email'])){?>
<html>
<head>
<title>COLLEGE PAGE</title>
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
			<ul style="list-style-type: none;">
				<li><a href="login_College_2.php">HOME</a></li></li>
				<li><a href="update1_college.php?uid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="available_jobs_list.php">AVAILABLE JOBS</li>
				<li><a href="approved_students.php">APPROVED STUDENT PROFILES</li>
				<li><a href="pending_students.php">PENDING STUDENT PROFILES</li>
				<li><a href="logout_college.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_CollegeAcc.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
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
					$sql="SELECT * FROM student where `enroll_no`='$_REQUEST[id]';";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						$row=mysqli_fetch_array($query);
					}
					else
						echo die(mysqli_error($con));
				?>
				<tr>
					<th>ENROLL NO</th>
					<th style="color:black;"><?php echo $row['enroll_no']; ?></th>
				</tr>
				<tr>
					<th>STUDENT NAME</th>
					<th style="color:black;"><?php echo $row['student_name']; ?></th>
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
			<a href="students_approval.php?email=<?php echo $row['email']; ?>"><input type="button" name="approval" value="APPROVE"></a>
			<a href="delete_student.php?id=<?php echo $row['enroll_no']; ?>"><input type="button" name="delete" value="REJECT"> </a>
			
			<?php
					}
					else
						header("location:login.html");
				?>
			</center>
	</body>
</html>