<?php 
	session_start(); if(isset($_SESSION['email']))
	{
		function fetch_data()
		{
		$con=mysqli_connect("localhost","root","","pms");
		$output='';
		$email=$_SESSION['email'];
		$sql_id="SELECT `c_id` FROM `company` where `email`='$email';";
		$query_id=mysqli_query($con,$sql_id);
					if($query_id)
					{
						$row_id=mysqli_fetch_array($query_id);
							$cid=$row_id['c_id'];
						$sql="SELECT * FROM stu_job where `application_status`='Y' && `job_status`='P' && `job_id` in (select `job_id` from `job` where `c_id`='$cid' );";
						$query=mysqli_query($con,$sql);
						if($query)
						{
							while ($row=mysqli_fetch_array($query))
							{
								$rollno=$row['enroll_no'];
								$query_Std=mysqli_query($con,"select * from `Student` where `enroll_no`='$rollno';");
								if($query_Std)
								{
									$jid=$row['job_id'];
									$row_Std=mysqli_fetch_array($query_Std);
									$query_Com=mysqli_query($con,"select * from `Company` where `c_id`=(select `c_id` from `job` where `job_id`='$jid');");
									if($query_Com)
									{
										$row_Com=mysqli_fetch_array($query_Com);
										$cn=$row_Com['company_name'];
										$output.='
											<tr>
												<td>'.$jid.'</td>
												<td>'.$row_Std["student_name"].'</td>
												<td>'.$row_Std["phone_no"].'</td>
												<td>'.$row_Std["email"].'</td>
												<td></td>
											</tr>';
									}

								}
							}
						}
					}
			return $output;		
		}
			
			
		require_once("library/tcpdf.php");
		$obj_pdf=new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
		$obj_pdf->SetCreator(PDF_CREATOR);
		$obj_pdf->SetTitle("STUDENT LIST");
		$obj_pdf->SetHeaderData('75','75','APPLICANTS LIST','The approved applicants list');
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT,'20',PDF_MARGIN_RIGHT);
		$obj_pdf->setPrintHeader(true);
		$obj_pdf->setPrintFooter(true);
		$obj_pdf->SetAutoPageBreak(TRUE,10);
		$obj_pdf->SetFont('helvetica','',10);
		$obj_pdf->AddPage();
		$content='<b>Company Name: '.$cn.'</b><div style="margin-left:60px;"><b>Date:</b></div><br/>';
		$content.='
			<table border="1" cellspacing="0" cellpadding="5">
				<tr>
					<th width="16%">JOB ID</th>
					<th width="26%">STUDENT NAME</th>
					<th width="20%">PHONE NUMBER</th>
					<th width="30%">EMAIL ID</th>
					<th width="15%">SIGNATURE</th>
				</tr>
			';
		$content.=fetch_data();
		$content.="</table>";
		$content.="<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><h3>Signature of the Authority:-</h3><br/>__________________________";
		$obj_pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, '', true);
		//$obj_pdf->writeHTML($content);
		ob_end_clean();
		$obj_pdf->Output("applicants_list.pdf","I");
		}
		else
		{
			header("location:logincom.html");
		}
?>