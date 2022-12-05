<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>Update Job</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<script type="text/javascript">
						function togglemenu()
						{
							document.getElementById('sidebar').classList.toggle('active');
						}
					</script>
			</head>
	<body style="font-weight: bold;">
		<div id="sidebar" onclick="togglemenu()">
			<div class="toggle-btn" >
				<div id="d"></div>
				<div id="d"></div>
				<div id="d"></div>
			</div>
			<ul style="list-style-type: none; ">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_student.php">MANAGE ACCOUNT</a></li>
				<li><a href="">AVAILABLE JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="logout_company.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
			</ul>
		</div>
		<form method="get" action="">
			<input type="search" style="margin-left: 72%;float: left;" name="search" placeholder="Search Here">
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
</head>
	<body>
		<center>
	<?php
		$con=mysqli_connect("localhost","root","","pms");
		$job_id=$_GET['id'];
		$query=mysqli_query($con,"SELECT * FROM `job` WHERE `job_id`="."'$job_id'"."");
		
		$row=mysqli_fetch_array($query);
		
			$job_id=$row['job_id'];
			$age=$row['age'];
			$post=$row['post'];
			$vacancy=$row['vacancy'];
			$field=$row['Field'];
			$ssc=$row['SSC'];
			$hsc=$row['HSC'];
			$diploma_r=$row['Diploma_Result'];
			$diploma_f=$row['Diploma_Field'];
			$graduation_r=$row['Graduation_Result'];
			$graduation_f=$row['Graduation_Field'];
			$post_graduation_r=$row['Post_Graduation_Result'];
			$post_graduation_f=$row['Post_Graduation_Field'];
			$phd=$row['PHD'];
			$sal=$row['salary'];
			$skill=$row['skill'];
			$dt=$row['Date_time'];
			$venue=$row['venue'];
			$exam_type=$row['exam_type'];
		
				
	?>
	
	<form method="POST" action="update_j.php">
	<table width="500px">
	<tr>
		<td>Job id</td>
		<td style="color:black;"><?php echo $job_id;?><input type="hidden" name="job1" value="<?php echo $job_id;?>"></td>
	</tr>	
	
	<tr>
		<td>Age</td>
		<td><input class="form-control" type="textbox" name="age1" value="<?php echo $age;?>"></td>
	</tr>
	
	<tr>
		<td>Post</td>
		<td><input class="form-control" type="textbox" name="post1" value="<?php echo $post;?>"></td>
	</tr>
	
	<tr>
		<td>Vacancy</td>
		<td><input class="form-control" type="number" name="vacancy1" value="<?php echo $vacancy;?>"></td>
	</tr>
	
	<tr>
		<td>Field</td>
		<td><input class="form-control" type="textbox" name="field1" value="<?php echo $field;?>"></td>
	</tr>

	<tr>
		<td>SSC</td>
		<td><input class="form-control" type="number" name="ssc1" value="<?php echo $ssc;?>"></td>
	</tr>

	<tr>
		<td>HSC</td>
		<td><input class="form-control" type="number" name="hsc1" value="<?php echo $hsc;?>"></td>
	</tr>	
	
	<tr>
		<td>Diploma_Result</td>
		<td><input class="form-control" type="decimal" name="diploma_r1" value="<?php echo $diploma_r;?>"></td>
	</tr>
	
	<tr>
		<td>Diploma_Field</td>
		<td><input class="form-control" type="textbox" name="diploma_f1" value="<?php echo $diploma_f;?>"></td>
	</tr>
	
	<tr>
		<td>Graduation_Result</td>
		<td><input class="form-control" type="decimal" name="graduation_r1" value="<?php echo $graduation_r;?>"></td>
	</tr>
	
	<tr>
		<td>Graduation_Field</td>
		<td><input class="form-control" type="textbox" name="graduation_f1" value="<?php echo $graduation_f;?>"></td>
	</tr>
	
	<tr>
		<td>Post_Graduation_Result</td>
		<td><input class="form-control" type="decimal" name="post_graduation_r1" value="<?php echo $post_graduation_r;?>"></td>
	</tr>
	
	<tr>
		<td>Post_Graduation_Field</td>
		<td><input class="form-control" type="textbox" name="post_graduation_f1" value="<?php echo $post_graduation_f;?>"></td>
	</tr>
	
	<tr>
		<td>PHD</td>
		<td> <input type="radio" name="phd" style="width: 20px;height: 15px;" value="y"/> Yes	
			<input type="radio" name="phd" style="width: 20px;height: 15px;" value="n" checked /> No		
		</td>
	</tr>
	
	<tr>
		<td>Salary</td>
		<td><input class="form-control" type="number" name="sal1" value="<?php echo $sal;?>"></td>
	</tr>
	
	<tr>
		<td>Skill</td>
		<td><input class="form-control" type="textbox" name="skill1" value="<?php echo $skill;?>"></td>
	</tr>
	
	<tr>
		<td>Date Time</td>
		<td><input class="form-control" type="datetime" name="dt1" value="<?php echo $dt;?>" required></td>
	</tr>
	
	<tr>
		<td>Venue</td>
		<td><input class="form-control" type="textbox" name="venue1" value="<?php echo $venue;?>"></td>
	</tr>
	
	<tr>
		<td>Exam Type</td>
		<td><input class="form-control" type="textbox" name="exam_type1" value="<?php echo $exam_type;?>"></td>
	</tr>
	</table><br/>
	<input type="submit" class="btn btn-primary"  style="width: 200px;" name="submit" value="UPDATE">	
	</form>
</center>
</body>
<?php
				}
				else {
					header("location:logincom.html");
				}
			?>
</html>		