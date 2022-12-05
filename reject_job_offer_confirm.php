 <script type="text/javascript">
 if(confirm("Are You Sure You Want Reject this Applicant for this Job?"))
 {
	window.location="reject_job_offer.php?enroll_no=<?php echo $_REQUEST['enroll_no']; ?>&jid=<?php echo $_REQUEST['jid']; ?>";
 }
 else
	  window.location="approved_jobs.php";
 </script>