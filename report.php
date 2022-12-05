 <?php
	include('library/tcpdf.php');
	$pdf=new TCPDF('p','mm','A4');
	$pdf->AddPage();
	$html="
	<table>
		<tr>
			<th>Enrollment Number</th>
			<th>Student Name</th>
		</tr>";
	session_start();
	$con=mysqli_connect("localhost","root","","pms");
					$email=$_SESSION['email'];
					$sql="SELECT * FROM student where `approval_status`='Y' && `u_id` in (select `u_id` from college where `email`='$email');";
					$query=mysqli_query($con,$sql);
					if($query)
					{
						while ($row=mysqli_fetch_array($query))
						{
	$html=$html+"	
		<tr>
			<td>";
	$html=$html+echo $row['enroll_no']+"</td>
			<th>"+echo $row['student_name'];+"</th>
		</tr>
		</table>
		<style>
		table{border-collapse:callapse;}
		th,td{border:1px solid #888;}
		</style>
	";
		}
	}
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	
	$pdf->SetTitle('Student List');
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$pdf->IncludeJS("print();");
	ob_end_clean();
	$pdf->Output('report.pdf','I');
 ?>