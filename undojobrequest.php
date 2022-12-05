 <script type="text/javascript">
 if(confirm("Are You Sure You Want To Undo Your Job Request?"))
 {
	window.location="undojobrequest2.php?id=<?php echo $_REQUEST['id']; ?>";
 }
 else
	  window.location="applied_jobs.php";
 </script>