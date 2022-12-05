<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
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
					$jid=$_REQUEST['id'];
					$sql="SELECT * FROM job where `job_id`='$jid';";
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
			<a href="undojobrequest.php?id=<?php echo $rowjob['job_id']; ?>"><input type="button" name="remove" value="UNDO JOB REQUEST"></a>
			
			<?php
					}
					else
						header("location:login.html");
				?>
			</center>
	</body>
</html>