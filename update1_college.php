<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>

<html>
<head>
<title>COLLEGE PAGE</title>
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
	<body style="font-weight: bold;">
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
		</div>
		<form method="get" action="">
			<input type="search" style="margin-left: 72%;float: left;" name="search" placeholder="Search Here">
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
<body>
</head>
	<center><h1><b>COLLEGE DATA</b></h1>
<?php
	$id=$_GET['uid'];
	$con=mysqli_connect("localhost","root");
	
	$db=mysqli_select_db($con,"pms");
	
	$sql="select * from college where email='$id'";
	
	$result=(mysqli_query($con,$sql));
	
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['u_id'];
		$pass=$row['password'];
		$adname=$row['admin_name'];
		$clname=$row['college_name'];
		$website=$row['website'];
		$phone=$row['phone_no'];
		$loc=$row['location'];
		$land=$row['landmark'];
		$city=$row['city'];
		$post=$row['post'];
		$email=$row['email'];
	}
?>
<form method="GET" action="update2_college.php">
<table width="500px">
	<tr>
		<td> User ID </td>
		<td style="color: black;"><?php echo $id; ?><input type="hidden" value="<?php echo $id; ?>" name="id"></td>
	</tr>
	<tr>
		<td> Admin Name </td>
		<td> <input type="text" class="form-control" name="aname" value="<?php echo $adname; ?>"/> </td>
	</tr>
	<tr>
		<td> College Name </td>
		<td> <input type="text" class="form-control" name="cname" value="<?php echo $clname; ?>"/> </td>
	</tr>
	<tr>
		<td> Phone </td>
		<td> <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>"/> </td>
	</tr>
	<tr>
		<td> Email </td>
		<td style="color: black;"><?php echo $email; ?><input type="hidden" value="<?php echo $email; ?>" name="email"></td>
	</tr>
	<tr>
		<td> Website </td>
		<td> <input type="text" class="form-control" name="website" value="<?php echo $website; ?>"/> </td>
	</tr>
	
	<tr>
		<td> Location </td>
		<td> <input type="text" class="form-control" name="loc" value="<?php echo $loc; ?>"/> </td>
	</tr>
	<tr>
		<td> Landmark </td>
		<td> <input type="text" class="form-control" name="land" value="<?php echo $land; ?>"/> </td>
	</tr>
	<tr>
		<td> City </td>
		<td> <input type="text" class="form-control" name="city" value="<?php echo $city; ?>"/> </td>
	</tr>
	<tr>
		<td> Post </td>
		<td> <input type="text" class="form-control" name="post" value="<?php echo $post; ?>"/> </td>
	</tr> 
</table><br/>
	<input type="submit" class="btn btn-primary" style="width: 200px;" name="submit" value="UPDATE"/>
</form>
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
			<img  alt="My image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"style="background: url(logo.jpg) 50% / cover; border-radius: 50%;width:120px;margin-left:0px;float:left;">
			<ul style="list-style-type: none; ">
			
			
		</footer>
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>	
</body>
<?php
				}
				else {
					header("location:login_college.html");
				}
			?>
</html>