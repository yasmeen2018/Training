<?php
/*
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"studentsorintation");
// Check connection
if (mysqli_connect_errno()) 
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}; 

$result = mysqli_query($con,"SELECT * FROM `students_info`");

if (mysqli_num_rows($result) !=null) {
    while ($db_field = mysqli_fetch_assoc($result)) {
		
		$Display_name = $db_field['Display_name'];
		$BBPassword = $db_field['BBPassword'];
		$SiSPassword  = $db_field['SiSPassword'];
		$email = $db_field['Email'];
		
		$to      = $email;
		$subject = 'Blackboard and SIS Passwords';
		$message = "<html><body style='font-family:Calibri;font-size:15px;'>
		Dear ".$Display_name."</br>
		<p>Kindly note that your Blackboard Password is: </p>".$BBPassword."</br>
		<p>and SIS (Student Information System) is: </p>".$SiSPassword."</br>
		<p style='color:#770000;'>Thank you & Have a nice day</br>
		Dar Al-Hekma University</p>
		</body></html>";
		$headers  = "From: sharbi@dah.edu.sa\r\n"; 
    	$headers .= "Content-type: text/html\r\n";
		//$headers .= 'Cc:sharbi@dah.edu.sa' . "\r\n";
		//$headers .= 'Cc:kmadani@dah.edu.sa,rmalik@dah.edu.sa' . "\r\n";
		$emailResult = mail($to, $subject, $message, $headers);
	}
			
}

mysqli_close($con);
*/
?>