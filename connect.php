<?php
session_start();
      
      
$croute  = $_POST['croute'];
$aroute  = $_POST['aroute']; 
$_SESSION["c1route"] =$croute;
$_SESSION["a1route"] =$aroute;
if (!empty($_POST['action1']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transcendence";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
echo "Connected to the Database";
echo "</br><hr>";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 require ("PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
 
// Set up SMTP
$mail->IsSMTP();                // Sets up a SMTP connection
$mail->SMTPDebug  = 2;          // This will print debugging info
$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
$mail->SMTPSecure = "tls";      // Connect using a tls connection
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Encoding = '7bit';       // SMS uses 7-bit encoding
 
// Authentication
$mail->Username   = "transcendence1314@gmail.com"; // Login
$mail->Password   = "kankadu1314"; // Password
 
// Compose
$mail->Subject = "Bus Route Cancelled";     // Subject 
switch($croute)
{
case 1:
{
$sql1 = "SELECT EMAIL FROM route1";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$m=$row["EMAIL"];
	    $mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
	    echo "</br>";
	}
}
break;
}
case 2:
{
$sql1 = "SELECT EMAIL FROM route2";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 3:
{
$sql1 = "SELECT EMAIL FROM route3";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 4:
{
$sql1 = "SELECT EMAIL FROM route4";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 5:
{
$sql1 = "SELECT EMAIL FROM route5";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 6:
{
$sql1 = "SELECT EMAIL FROM route6";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 7:
{
$sql1 = "SELECT EMAIL FROM route7";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 8:
{
$sql1 = "SELECT EMAIL FROM route8";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 9:
{
$sql1 = "SELECT EMAIL FROM route9";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
case 10:
{
$sql1 = "SELECT EMAIL FROM route10";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
		$m=$row["EMAIL"];
		$mail->Body = "Your bus route is cancelled today...Sorry for the inconvenience :( Your alternate route is route ".$aroute; 
		$mail->AddAddress( "$m" ); // Where to send it
        if( $mail->send() )// Send!
            {
            echo "sent mail successfully" ;	
            }
        else 
            {
            echo "mail not sent";	
            }
		echo "</br>";
	}
}
break;	
}
default:
{
echo "route doesn't exist";
}
}
echo "</br><hr>";
echo "<h2><center> Mail Sent Successfully!!!</center></h2>";
echo"<hr>";
}
else if  (!empty($_POST['action2']))
{

	include_once "sms2.php";
}
else
{
echo "Invalid Input";
}
?>
 


