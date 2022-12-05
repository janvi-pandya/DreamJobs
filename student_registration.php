<html>
	<head>
		<title>Student Registration</title>
		<meta charset="utf-8" />
		<link href="pid/pidie-0.0.8.css" rel="stylesheet"/>
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
				<li><a href="loginma.html">MAIN ADMIN</a></li>
				<li><a href="login.html">STUDENT</a></li>
				<li><a href="login_college.html">COLLEGE</a></li>
				<li><a href="logincom.html">COMPANY</a></li>
				<li><a href="">CONTACT US</a></li>
				<li><a href="">ABOUT US</a></li>
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

		<center><h1><b>STUDENT REGISTRATION</b></h1></center>
				
			<form method="post" action="insert_Student.php" class="frm"  style="margin-left:20%;width:400px;" >
				<label for="name"><b>Name:</b><h5>*</h5></label>
				<input class="form-control" type="text" name="name" required> <br/>
				<label for="enroll"><b>Enrollment Number:</b><h5>*</h5></label>
				<input class="form-control" type="text" name="enroll" required> <br>
				<label for="email"><b>E-Mail Address:</b><h5>*</h5></label>
				<input class="form-control" type="email" name="email" required> <br>
				<label for="password"><b>Password:</b><h5>*</h5></label>
				<input  class="form-control" type="password" name="password" required> <br>
				<label for="confirmpassword"><b>Confirm Password:</b><h5>*</h5></label>
				<input  class="form-control" type="password" name="confirmpassword" required> <br>
				<label for="name"><b>Select College Name:</b><h5>*</h5></label>
				<select name="clg_name" style="width:200px;"required>
					<option value="">Select Your College</option>
				<?php
					$con=mysqli_connect("localhost","root","","pms");
					if($con)
					{
						$query=mysqli_query($con,"SELECT DISTINCT `college_name` FROM `college`;");
						if($query)
						{
							while($row=mysqli_fetch_array($query))
							{
								$x=$row['college_name'];
				?>
					<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
					<?php
							}
						}
						else
							echo "Error";
					}
					else	echo "Error";
					?>
				</select>
				<br/> 

				<label for="phonenumber"><b>Phone Number:</b><h5>*</h5></label>
				<div class="pd-telephone-input" style="width:390px;">
				<input class="form-control" type="tel" name="phonenumber" required>
				</div>
				<script src="pid/pidie-0.0.8.js"></script>
				<script>
					new Pidie();
				</script>
				<label for="dob"><b>Date of birth:</b><h5>*</h5></label>
				<input class="form-control"  type="date" name="dob" required> <br>
				<label for="gender"><b>Gender:</b><h5>*</h5></label><br/>
				<input style="width:20px;height: 20px;"  type="radio" name="gender" value="m"required><font size="5px">Male</font>
				<input style="width:20px;height: 20px;"  type="radio" name="gender" value="f" required><font size="5px">Female</font><br>
				<label for="ssc"><b>SSC Result:</b><h5>*</h5></label>
				<input class="form-control" type="number" name="ssc" required> <br>
				<label for="hsc"><b>HSC Result:</b></label>
				<input class="form-control" type="number" name="hsc"> <br>
				<label for="diploma_r"><b>Diploma Result:</b></label>
				<input class="form-control" type="number" name="diploma_r"> <br>
				<label for="diploma_f"><b>Diploma Field:</b></label>
				<input class="form-control" type="text" name="diploma_f"> <br>
				<label for="graduation_r"><b>Graduation Result:</b></label>
				<input class="form-control" type="number" name="graduation_r"> <br>
				<label for="graduation_f"><b>Graduation field:</b></label>
				<input class="form-control" type="text" name="graduation_f"> <br>
				<label for="Pgraduation_r"><b>Post Graduation Result:</b></label>
				<input class="form-control" type="number" name="Pgraduation_r"> <br>
				<label for="Pgraduation_f"><b>Post Graduation field:</b></label>
				<input class="form-control" type="text" name="Pgraduation_f"> <br>
				<label for="phd"><b>PHD:</b></label>
				<input style="width:20px;height: 20px;" type="radio" name="phd" value="y"><font size="5px">Yes</font>
				<input style="width:20px;height: 20px;" type="radio" name="phd" value="n"><font size="5px">No</font><br>
				<hr class="mb-3">
				<input class="btn btn-primary" style="width:200px;" type="submit" id="register" name="create" value="Submit">
				</form>
				
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
			<script type="text/javascript">
			$(function(){
				$('#register').click(function(){
					Swal.fire({
					'title':'Registration successfull',
					'text':'welcome',
					'type':'success',
				})
				});
			});
		</script>-->
	</body>
</html>