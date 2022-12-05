<?php
	if(strcasecmp($_GET['search'],'BBIT')==0)
		header("location:http://www.bbit.ac.in/");
	elseif (strcasecmp($_GET['search'],'BVM')==0) 
		header("location:http://www.bvmengineering.ac.in/");
	elseif (strcasecmp($_GET['search'],'GCET')==0)
		header("location:http://www.gcet.ac.in/");
	elseif (strcasecmp($_GET['search'],'NIRMA')==0)
		header("location:https://nirmauni.ac.in/");
	elseif (strcasecmp($_GET['search'],'PDPU')==0)
		header("location:https://www.pdpu.ac.in/");
	elseif (strcasecmp($_GET['search'],'PARUL')==0)
		header("location:https://www.paruluniversity.ac.in/");
	elseif (strcasecmp($_GET['search'],'MSU')==0)
		header("location:https://www.msubaroda.ac.in/");
	elseif (strcasecmp($_GET['search'],'ADIT')==0)
		header("location:http://www.adit.ac.in/");
	elseif (strcasecmp($_GET['search'],'LD')==0)
		header("location:http://ldce.ac.in/");
	elseif (strcasecmp($_GET['search'],'DDU')==0)
		header("location:https://www.ddu.ac.in/");
	else
		echo "Sorry!No matches found for \"".$_GET['search']."\"<br/>Please try another search combination!...";
?>
<!DOCTYPE html>
<html>
<head>
	<title>College Page</title>
</head>
<body>

</body>
</html>