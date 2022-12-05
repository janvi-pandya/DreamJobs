<!DOCTYPE HTML>
<?php session_start(); if(isset($_SESSION['email'])){?>
<html>
<head>
<title>MAIN ADMIN PAGE</title>
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
			<ul style="list-style-type: none; font-size:10px;">
				<li><a href="index.php">HOME</a></li></li>
				<li><a href="update1_madmin.php?uid=<?php echo $_SESSION['email']; ?>">UPDATE PROFILE</a></li>
				<li><a href="main_admin_registration.html">CREATE NEW MAIN ADMIN</a></li>
				<li><a href="available_jobs_list.php">AVAILABLE JOBS</li>
				<li><a href="approved_colleges.php">APPROVED COLLEGES PROFILES</li>
				<li><a href="pending_colleges.php">PENDING COLLEGES PROFILES</li>
				<li><a href="approved_companies.php">APPROVED COMPANIES PROFILES</li>
				<li><a href="pending_companies.php">PENDING COMPANIES PROFILES</li>
				<li><a href="logout_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">LOGOUT</a></li>
				<li><a href="delete_MainAdmin.php?email=<?php echo $_SESSION['email'];?>">DELETE ACCOUNT</a></li>
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
		<center><h1>APPROVED COMPANIES</h1>
			<table border="2" cellspacing="0" style="text-align: center;align-content: center;height: 50px; width: 100%;">
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					$c_id=$_REQUEST['c_id'];
					$sql="SELECT * FROM company where `c_id`='$c_id';";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						$row=mysqli_fetch_array($query);
					}
					else
						echo die(mysqli_error($con));
				?>
				<tr>
					<th>COMPANY ID</th>
					<th style="color:black"><?php echo $row['c_id']; ?></th>
				</tr>
				<tr>
					<th>COMPANY NAME</th>
					<th style="color:black"><?php echo $row['company_name']; ?></th>
				<tr>
					<th>RECRUITER NAME</th>
					<th style="color:black"><?php echo $row['recruiter_name']; ?></th>
				</tr>
				<tr>
					<th>PHONE NO</th>
					<th style="color:black"><?php echo $row['phone_no']; ?></th>
				</tr>
				<tr>
					<th>LOCATION</th>
					<th style="color:black"><?php echo $row['location']; ?></th>
				</tr>
				<tr>
					<th>LANDMARK</th>
					<th style="color:black"><?php echo $row['landmark']; ?></th>
				</tr>	
				<tr>
					<th>CITY</th>
					<th style="color:black"><?php echo $row['city']; ?></th>
				</tr>
				<tr>
					<th>EMAIL</th>
					<th style="color:black"><?php echo $row['email']; ?></th>
				</tr>	
			</table><br/>
			<a href="companies_approval.php?email=<?php echo $row['email']; ?>"><input type="button" name="approval" value="APPROVE REQUEST"></a>
			<a href="delete_Company.php?id=<?php echo $row['c_id']; ?>"><input type="button" name="delete" value="REJECT REQUEST"> </a>
			
			<?php
					}
					else
						echo die(mysqli_error($con));
				?>
			</center>
	</body>
</html>