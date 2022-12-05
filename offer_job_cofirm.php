 <script type="text/javascript">
 if(confirm("Are You Sure You Want Offer this Applicant the Job?"))
 {
	window.location="offer_job.php?enroll_no=<?php echo $_REQUEST['enroll_no']; ?>&jid=<?php echo $_REQUEST['jid']; ?>";
 }
 else
	  window.location="approved_jobs.php";
 </script>