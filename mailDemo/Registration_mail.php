<?php


require "PHPMailerAutoload.php";
		
		
	//	print_r($_SESSION);
			
		//echo $p['user_id'];
				//if($p['user_id'] != $_SESSION['user_id'])
				//{
				$email=$_POST['email'];
				$subject='Welcome New User!!!';
				$body="<center><b>Your Registration Request has been submitted successfully!</b></center>
						<p>We will notify you as soon as the Organization Admin approves your registration request.</p>";							
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
				
				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
				//$mail->addAttachment('../charisma-master/img/gallery/2.jpg');         // Add attachments
				//$mail->addAttachment('', '');    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML
				
				$mail->Subject = $subject;
				$mail->Body    = $body;
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
				if(!$mail->send()) {
				   //echo 'Message could not be sent.';
				   //echo 'Mailer Error: ' . $mail->ErrorInfo;
				   echo '<script type="text/javascript">
							alert("You Have Registered Successfully!");
						</script>';
				    header("refresh:1;url=index.php");
				}
				else
				{
					//echo 'Message has been sent<br>';
					echo '<script type="text/javascript">
							alert("You Have Registered Successfully!");
						</script>';
				   header("refresh:1;url=index.php");
				}
?>