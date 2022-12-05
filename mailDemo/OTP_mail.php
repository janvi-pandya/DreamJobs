<?php


require "PHPMailerAutoload.php";
		
		
	//	print_r($_SESSION);
			
		//echo $p['user_id'];
				//if($p['user_id'] != $_SESSION['user_id'])
				//{
				$email=$_REQUEST['email'];
				$subject='OTP';
				$otp=rand(111111,999999);
				$body="<b>Your DreamJob Account OTP Is <h3 style='color:blue;'>$otp</h3></b><p>Please submit this OTP(One-Time-Password) within 2 minutes! <br/>The OTP will be expired after 2 minutes.</p>
				<br/><br/>Thanks for joining us!<br/><b>-Team DreamJob</b>";							
				$mail = new PHPMailer();
				//$mail->SMTPDebug = 3;
				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup server
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dreamjobisyours@gmail.com';                            // SMTP username
				$mail->Password = 'cneh mxk zoc vzv cui';                           // SMTP password
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
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   
				  // header("location:gallary.php");
				}
				else
				{
				//header("location:gallary.php");
				//	echo 'Message has been sent!<br>';
					echo '<script type="text/javascript">
							alert("Message has been sent!");
						</script>';
					//header("refresh:1;url=../OTP_Student.php");
				}
?>