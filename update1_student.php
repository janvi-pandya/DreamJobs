<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>STUDENT PAGE</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<meta charset="utf-8" />
		<link href="pid/pidie-0.0.8.css" rel="stylesheet"/>
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
				<li><a href="update1_student.php">UPDATE PROFILE</a></li>
				<li><a href="">AVAILABLE JOBS</li>
				<li><a href="">VISIT COMPANY</li>
				<li><a href="logout_Student.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
			</ul>
		</div>
		<form method="get" action="">
			<input type="search" style="margin-left: 72%;float: left;" name="search" placeholder="Search Here">
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
	<center><h1><b>STUDENT DATA</b></h1>
<?php
	$con=mysqli_connect("localhost","root");
	
	$db=mysqli_select_db($con,"pms");
	if(isset($_SESSION['email']))
	$email=$_SESSION['email'];
	$sql="select * from student where email="."'$email'"."";
	
	$result=(mysqli_query($con,$sql));
	
	while($row=mysqli_fetch_array($result))
	{
		$enroll=$row['enroll_no'];
		$sname=$row['student_name'];
		$phone=$row['phone_no'];
		$email=$row['email'];
		$dob=$row['DOB'];
		$gender=$row['Gender'];
		$ssc=$row['SSC'];
		$hsc=$row['HSC'];
		$d_field=$row['Diploma_Field'];
		$d_result=$row['Diploma_Result'];
		$g_field=$row['Graduation_Field'];
		$g_result=$row['Graduation_Result'];
		$pg_field=$row['PostGraduation_Field'];
		$pg_result=$row['PostGraduation_Result'];
		$phd=$row['PHD'];
	}
?>
<form method="GET" action="update2_student.php" style="width: 400px;">
	<table width="500px;">
	<tr>
		<td><br/> Enrollnment Number <h5>*</h5></td>
		<td style="color: black;"><?php echo $enroll; ?> <input type="hidden" name="enroll" value="<?php echo $enroll; ?>" required /> </td>
	</tr>
	<tr>
		<td> Student Name <h5>*</h5></td>
		<td> <input class="form-control" type="text" name="sname" value="<?php echo $sname; ?>" required /> </td>
	</tr>
	<tr>
		<td><br/> Phone Number <h5>*</h5></td>
			<td>
				<input class="form-control" type="text" name="phonenumber" value="<?php echo $phone; ?>" required />
				</td>
				<script src="pid/pidie-0.0.8.js"></script>
				<script>
					new Pidie();
				</script>
	</tr>
	<tr>
		<td> Email <h5>*</h5></td>
		<td style="color: black;"><?php echo $email; ?><input type="hidden" value="<?php echo $email; ?>" name="email"  required /></td>
	</tr><br/>
	<tr>
		<td> DOB <h5>*</h5></td>
		<td> <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required /> </td>
	</tr>
	<tr>
		<td> Gender <h5>*</h5></td>
		<td> <input type="radio" name="gender" style="width: 20px;height: 15px;" value="m"/> Male	
			<input type="radio" name="gender" style="width: 20px;height: 15px;" value="f" checked  required /> Female		
		</td>
	</tr>
	<tr>
		<td> SSC <h5>*</h5></td>
		<td> <input type="number" class="form-control" name="ssc" value="<?php echo $ssc; ?>" required /> </td>
	</tr>
	<tr>
		<td> HSC </td>
		<td> <input type="number" class="form-control" name="hsc" value="<?php echo $hsc; ?>"/> </td>
	</tr>
	<tr>
		<td> Diploma Field </td>
		<td> <input type="text" class="form-control" name="d_field" value="<?php echo $d_field; ?>"/> </td>
	</tr>
	<tr>
		<td> Diploma Result </td>
		<td> <input type="number" class="form-control" name="d_result" value="<?php echo $d_result; ?>"/> </td>
	</tr>
	<tr>
		<td> Graduation_Field </td>
		<td> <input type="text" class="form-control" name="g_field" value="<?php echo $g_field; ?>"/> </td>
	</tr>
	<tr>
		<td> Graduation_Result </td>
		<td> <input type="number" class="form-control" name="g_result" value="<?php echo $g_result; ?>"/> </td>
	</tr>
	<tr>
		<td> PostGraduation_Field </td>
		<td> <input type="text" class="form-control" name="pg_field" value="<?php echo $pg_field; ?>"/> </td>
	</tr>
	<tr>
		<td> PostGraduation_Result </td>
		<td> <input type="number" class="form-control" name="pg_result" value="<?php echo $pg_result; ?>"/> </td>
	</tr>
	<tr>
		<td><br/> PHD </td>
		<td><br/> <input type="radio" name="phd" style="width: 20px;height: 15px;" value="y"/> Yes	
			<input type="radio" name="phd" style="width: 20px;height: 15px;" value="n" checked /> No		
		</td>
	</tr>
</table><br/>
	<input class="btn btn-primary" style="width:200px;" type="submit" id="LOGIN" name="login" value="UPDATE">
</form>
</center>
</body>
<?php
				}
				else {
					header("location:login.html");
				}
			?>
</html>