<!DOCTYPE html>
<html>
			<head>
				<title>COMPANY PAGE</title>
					<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
					
					<style type="text/css">
						body
						{
							background-image:url(img3.jpg) ;
							background-size:100%;
							height: 100%;
							width: 100%;
							font-size: 15;
							color: white;
							margin: 0;
							padding: 0;
							float: left;
						}

						#sidebar
						{
							position: fixed;
							width: 20%;
							height: 100%;
							left: -20%;
							background-color: black;
							opacity: 0.5;
						}
						#sidebar li
						{
							color: white;
							size: 30px;
							padding: 30px;
							border-bottom: 1px solid gray;
							text-align: center;
						}
						.toggle-btn
						{
							position: absolute;
							left: 105%;
							top: 15px;
						}

						#sidebar.active
						{
							left: 0;
						}
						#d
						{	
							width: 35px;
							height: 5px;
							background-color: black;
							margin: 6px 0;
							border-radius: 20px;
						}
						a
						{
							text-decoration: none;
							font-weight: bold;

						}
						#cmp
						{
							margin-left: 20%;
							font-size: 2vw;
						}
						a:link
						{
							color: gold;
						}
						a:visited
						{
							color: gold;
						}
						a:hover
						{
							color: red;
						}
						a:active
						{
							color: gold;
						}
						input
						{
							width: 300px;
							border-radius: 20px;
							border: 2px solid gray;
							color: black;
							height: 30px;
						}
						p
						{
							font-family: Gabriola; 
							margin-top: 0;
							margin-left: 10%;
							margin-bottom: 0;
							padding-top: 0vw;
							font-size: 2vw;
						}
						h2
						{
							padding: 0;
							color: gold;
							font-family: Trebuchet MS;
							font-size: 8vw;
							font-weight: bold;
							margin-left: 10%;
							margin-top: 20%;
							margin-bottom: 0;
						}
						button
						{
							border: 2px solid gray;
							background-color: black;
							color: white;
							border-radius: 40px;
							width: 150px;
							height: 50px;
							margin-left: 20%;
							margin-top: 3%;
							font-weight: bold;
							color: gold
						}
					</style>
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
		<center><h1><b>TOP IT Companies List!</b></h1></center>
		<form method="get" action="Company_search.php">
			<input type="search"  style="margin-left: 72%;float: left;" name="search" placeholder="Search Here" list="Top_Searches">
			<datalist id="Top_Searches">
				<option value="Infosys"></option>
				<option value="TCS"></option>
				<option value="DELL EMC"></option>
				<option  value="Wipro"></option>
			</datalist>
			<input type="submit" style="width: 50px;background-color: black;color: white;float: right; " name="submit" value="GO">
			</form>
			<a href="https://www.tcs.com/" id="cmp">TATA Consultancy Services(TCS)</a><br>
			<a href="https://www.infosys.com/" id="cmp">Infosys</a><br>
			<a href="https://www.dellemc.com/en-us/index.htm" id="cmp">DELL EMC</a><br>
			<a href="https://www.wipro.com/en-IN/" id="cmp">Wipro</a><br>
</html>