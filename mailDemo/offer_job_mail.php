<?php
require "PHPMailerAutoload.php";
	//	print_r($_SESSION);
			
		//echo $p['user_id'];
				//if($p['user_id'] != $_SESSION['user_id'])
				//{
				$enroll_no=$_REQUEST['enroll_no'];
				$jid=$_REQUEST['jid'];
				$con=mysqli_connect("localhost","root","","pms");
				$sql="select * from student where `enroll_no`='$enroll_no';";
				$query=mysqli_query($con,$sql);
				if($query)
				{
					$sql_job="select * from stu_job where `enroll_no`='$enroll_no' && `job_id`='$jid';";
				$query_job=mysqli_query($con,$sql_job);
				$row_job=mysqli_fetch_array($query_job);
				$jid=$row_job['job_id'];
				$sql_details="select * from job where `job_id`='$jid';";
				$query_details=mysqli_query($con,$sql_details);
				$row_job=mysqli_fetch_array($query_details);
				$post=$row_job['post'];
				$venue=$row_job['venue'];
				$dt=$row_job['Date_time'];
				$salary=$row_job['salary'];
				$et=$row_job['exam_type'];
				$cid=$row_job['c_id'];
				$query_com=mysqli_query($con,"select * from company where `c_id`='$cid';");
				$row_com=mysqli_fetch_array($query_com);
				$company_name=$row_com['company_name'];
				$company_email=$row_com['email'];
				if($query_job)
				{
					$row=mysqli_fetch_array($query);
					$name=$row['student_name'];
					$email=$row['email'];
				$subject="CONGRATULATIONS APPLICANT, $name !!!";
				$body="<center><h1>YOU GOT YOUR DREAM JOB!!!!!</h1><b>Your Job Application has been successfully Approved!</b></center>
						<p><b>Dear $name</b>,<br/> We feel honoured to let you know that you have received the Job Offer from <b>Company $company_name for $post</b> !<br/>Well,the Company Recruiter has offered you this Job for salary of <b>RS. $salary(PER ANNUME)</b>.<br/></p><br/><center><p>The decision is up to you now! You can contact to the company $company_name using their official email $company_email</center><br/><br/>Thank you for  joining us!<br/><b>-Team DreamJob</b>";							
				$mail = new PHPMailer();
				//$mail->SMTPDebug = 3;
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dreamjobisyours@gmail.com';                            // SMTP username
				$mail->Password = 'dreamjob123';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
				$mail->Port = 587; 
				
				$mail->From = 'dreamjobisyours@gmail.com'; 
				$mail->FromName = 'dream job';
				//$mail->addAddress('josh@example.net', 'Josh Adams');  // Add a recipient
				$mail->addAddress($email);               // Name is optional
				//$mail->addReplyTo('info@example.com', 'Information');
				//$mail->addCC('cc@example.com');
				//$mail->addBCC('bcc@example.com');
				
				//$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
				//$mail->addAttachment('../charisma-master/img/gallery/2.jpg');         // Add attachments
				//$mail->addAttachment('', '');    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				
				$mail->Subject = $subject;
				$mail->Body    = $body;
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
				if(!$mail->send()) {
				   //echo 'Message could not be sent.';
				   //echo 'Mailer Error: ' . $mail->ErrorInfo;
				   //echo die(mysqli_error($con));
				   echo '<script type="text/javascript">
						alert("You approved the Applicant\'s Job Request!");
				</script>';
				   header("refresh:1;url=approved_jobs.php");
				}
				else
				{
				//header("location:gallary.php");
					//echo 'Message has been sent<br>';
					echo '<script type="text/javascript">
						alert("You offered the Job to the Applicant!");
				</script>';
				   header("refresh:1;url=approved_jobs.php");
				}
				}
				//else
					//echo die(mysqli_query($con));
				}
?>