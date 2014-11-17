<?php
session_start();
include_once("header.php");
if(!isset($_SESSION['id']))
{
	echo"<script type='text/javascript'>alert('User not logged in!');</script>";
	die();
}

if(isset($_POST['submit']))
{
	$name = $_SESSION['name'];
	$mail = $_SESSION['mail'];
	$query = $_POST['query'];
}
else
{
	echo "<div align = 'center' class = h3>Cannot access this page directly!</align>";
	die();
}



$body = "Dear Dr. ".$name.", \n\n
You have the following query from ".$_SESSION['id']."@iitk.ac.in from the CSE-IITK Research Database. 
\n
\"".$query."\"
\n
Kindly reply to him at your convenience.
\n
Thanks and regards,
CSE-IITK Research Database team
";

require("class.phpmailer.php");
	require("class.smtp.php");	
	$mail=new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth=true;
	$mail->Username="akar"; //Enter your username!!
	$mail->Password=""; //Enter Your password!!!
	$mail->Host="172.31.1.22";
	$mail->From=$_SESSION['id']."@iitk.ac.in"; 
	$mail->FromName="Admin";
	$mail->Subject="CSE-IITK Research Database Query";  
 	$mail->Body=$body;  
	$mail->WordWrap=80;
	$mail->AddAddress("akar@iitk.ac.in") ;  //Just append the id of the professor here to send the mail to him
	$mail->AddAddress("adityah@iitk.ac.in") ;

if(!@$mail->Send())
{
  		echo "<div align = 'center' class = h1>Error in sending the mail<br>Please mail from the link given in the search result page.</div>";
		
}
else
{
	echo "<div align='center' class=h1>Your query has been sent to Dr. ".$name."<br>
	Please wait for his reply.</div>
	<br><br>";
   
}
unset($_SESSION['mail']);
unset($_SESSION['name']);
echo "</td></tr></table>";
include_once("footer.php");
