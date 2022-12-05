<!DOCTYPE HTML>
<?php
	session_start();
	if(isset($_SESSION['email']))
	{	
		$e=$_SESSION['email'];
		$con=mysqli_connect("localhost","root","","pms");
		$query_access=mysqli_query($con,"SELECT `approval_status` FROM `company` WHERE `email`='$e';");
		$row_access=mysqli_fetch_array($query_access);
		$status=$row_access['approval_status'];
		if($status=='Y')
		{?>
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
			<ul style="list-style-type: none; ">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_company.php?cid=<?php echo $_SESSION['email']; ?>">MANAGE ACCOUNT</a></li>
				<li><a href="job_registration.php">ADD JOBS</li>
				<li><a href="available_jobs_com.php">AVAILABLE JOBS</li>
				<li><a href="pending_jobs.php">PENDING JOB REQUESTS</li>
				<li><a href="approved_jobs.php">APPROVED JOB REQUESTS</li>
				<li><a href="logout_company.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_CompanyAcc.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
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
			<center><h1><b>JOB REGISTRATION</b></h1></center>
			<form method="post" action="insert_Job.php" style="margin-left:20%;width:300px;" >
			<label for="job_id"><b>Job ID:</b><h5>*</h5></label>
			<input class="form-control" style="width: 400px;"  type="text" name="job_id" required><br/> 
			<label for="age"><b>Age Limit:</b><h5>*</h5></label>
			<input class="form-control" style="width: 400px;"  type="number" name="age" required> <br>
			<label for="post"><b>Post:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="text" name="post" required> <br>
			<label for="vacancy"><b>Vacancy:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="number" name="vacancy" required> <br>
			<label for="field"><b>Field:(If any specific)</b><h5>*</h5></label>
			<input  class="form-control" style="width: 400px;" type="text" name="field" required> <br>
			
			<label for="ssc"><b>SSC:(in Percentage)</b><h5>*</h5></label>
			<input  class="form-control" style="width: 400px;" type="number" name="ssc" required> <br>
			<label for="hsc"><b>HSC:(in Percentage)</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="number" name="hsc" required> <br>
			<label for="diploma_r"><b>Diploma Result:(in CPI)</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="number" name="diploma_r" required> <br>
			<label for="diploma_f"><b>Diploma Field:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="text" name="diploma_f" required> <br>
			<label for="graduation_r"><b>Graduation Result:(in CPI)</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="number" name="graduation_r" required> <br>
			<label for="graduation_f"><b>Graduation Field:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="text" name="graduation_f" required> <br>
			<label for="post_graduation_r"><b>Post Graduation Result:(in CPI)</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="number" name="post_graduation_r" required> <br>
			<label for="post_graduation_f"><b>Graduation Field:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="text" name="post_graduation_f" required> <br>
			<label for="phd"><b>PHD:</b><h5>*</h5></label><br/>
			<input style="width:20px;height: 20px;"  type="radio" name="phd" value="y"required><font size="5px">Yes</font>
			<input style="width:20px;height: 20px;"  type="radio" name="phd" value="n" required><font size="5px">No</font><br>
			<label for="salary"><b>Salary:(per annum)</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="number" name="salary" required> <br>
			<label for="skill"><b>Skill:(list of skills required)</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="text" name="skill" required> <br>
			<label for="date_time"><b>Date Time:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="datetime-local" name="date_time"> <br>
			<label for="venue"><b>Venue:</b><h5>*</h5></label>
			<input class="form-control"  style="width: 400px;" type="text" name="venue"> <br>
			<label for="exam_type"><b>Exam Type:</b><h5>*</h5></label>
			<input class="form-control" style="width: 400px;"  type="text" name="exam_type"> <br>
			<hr class="mb-3">
			<input class="btn btn-primary" type="submit" style="width:200px;" id="register" name="create" value="Submit"/>
			</form>		
			<div style="width:100%;"><h3 style="color:rgb(20,50,50);">(<b style="color:red;">NOTE:</b><br/><1> Enter the minimum result required, in following numeric datafields.<br/><2>Enter the required degree-field(If any specific), in following text datafields)</h3></div>
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
			<img  alt="My image" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"style="background: url(logo.jpg) 50% / cover; border-radius: 50%;width:120px;margin-left:0px;float:left;">
			<ul style="list-style-type: none; ">
			
			
		</footer>
		<div class="footer-bottom" align="bottom">
				&copy; www.dreamjobisyours.com | Designed by DreamJob Team<br/>
			</div>	
	<?php
		}
		else
		{
			echo '<script type="text/javascript">
						alert("SORRY!You have not been granted the access to add a new Job yet!We will let you know when you can!Stay in touch!");
				</script>';
			header("refresh:1;url=login_Company2.php");
		}		
	}		
	else
		header("location:logincom.html");
			?>
	
</body>
</html>