<?php
	if(strcasecmp($_GET['search'],'Infosys')==0)
		header("location:https://www.infosys.com/");
	elseif (strcasecmp($_GET['search'],'TCS')==0) 
		header("location:https://www.tcs.com/");
	elseif (strcasecmp($_GET['search'],'Dell EMC')==0)
		header("location:https://www.dellemc.com/en-us/index.htm");
	elseif (strcasecmp($_GET['search'],'Wipro')==0)
		header("location:https://www.wipro.com/en-IN/");
	else
		echo "Sorry!No matches found for \"".$_GET['search']."\"<br/>Please try another search combination!...";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Company Page</title>
</head>
<body>

</body>
</html>