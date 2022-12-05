<?php
	if(strcasecmp($_GET['search'],'Jobs')==0)
	{	
		session_start(); 
		if(isset($_SESSION['email']))
			header("location:available_jobs.php");
		else
		{
			echo '<script type="text/javascript">
						alert("Please login first to see the available jobs...");
				</script>';
			header("refresh:1;url=login.html");
		}
	}
	elseif (strcasecmp($_GET['search'],'Companies')==0) 
		header("location:CompanyPage.php");
	elseif (strcasecmp($_GET['search'],'Colleges')==0)
		header("location:CollegePage.php");
	else
		echo "Sorry!No matches found for \"".$_GET['search']."\"<br/>Please try another search combination!...";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

</body>
</html>