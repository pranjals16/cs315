<html>
<head>
<!mailto protocol in html>
<?php

	
	//Connect to mysql server
	$link = mysql_connect("localhost", "deepak", "iw2fmyw1");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	//echo "connedted to db!";
	
	//Select database
	$db = mysql_select_db("my_db", $link);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	
	/*function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	*/
	//Sanitize the POST values
	//$login = clean($_POST['login']);
	
	$login=mysql_real_escape_string($_POST['login']);

	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}

	
	//If there are input validations, redirect back to the login form
	/*
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login-form.php");
		exit();
	}
	*/
	
	//Create query
	$query="SELECT members1.email_id,members1.passwd FROM members1 WHERE email_id='$login'";
	$st=mysql_query($query);
	$recs=mysql_num_rows($st);
	$row=mysql_fetch_object($st);
	$em=$row->email_id;// email is stored to a variable
	$em1=$row->passwd;
	//$em=$row->email;// email is stored to a variable
	
	if ($recs == 0) { // No records returned, so no email address in our table
		// let us show the error message
		header("Location:contact-admin.php");
	}
	
	
	
	//<a href="mailto:rahulgo@iitk.ac.in">rahulgo@iitk.ac.in</a>
	
	// formating the mail posting
	// headers here
	//$headers4="deepakkg@iitk.ac.in"; // Change this address within quotes to your address
	$headers4="FROM: deepakkg@iitk.ac.in";
	//$headers.="Reply-to: $headers4\n";
	//$headers .= "From: $headers4\n";
	//$headers .= "Errors-to: $headers4\n";
	//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;
	// for html mail un-comment the above line

	// mail funciton will return true if it is successful
	/*
	$em = $em."@iitk.ac.in";
	//echo $em;
	if(mail("$em","Your Request for login details","This is in response to your request 
		for login detailst at site_name \n \nLogin ID: $row->email_id \n Password: $row->passwd \n\n Thank You \n \n siteadmin","$headers4")){
		echo "<center><font face='Verdana' size='2' ><b>THANK YOU</b> <br>Your password is posted to your email address . 
		Please check your mail after some time. </center>";
	}

	else{// there is a system problem in sending mail
		echo " <center><font face='Verdana' size='2' color=red >There is some system problem in sending login details to your address. 
		Please 	contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";
	}

	
	*/
	
function sendmail ($subject,$body,$to,$from,$fromname){
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                   // send via SMTP
$mail->Host     = "smtp.cc.iitk.ac.in"; // SMTP servers
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "deepakkg";  // SMTP username
$mail->Password = "il200mdmniitk"; // SMTP password

$mail->From     = $from;
$mail->FromName = $fromname;

$mail->AddAddress($to); 

$mail->WordWrap = 50;                              // set word wrap

$mail->IsHTML(true);                               // send as HTML

$mail->Subject  =  $subject;
$mail->Body     =  $body;


if(!$mail->Send())
{
   echo "Message was not sent <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Mail has been sent";
}





$abc = "absc";
$ab = "deepakkg@iitk.ac.in";
$abcd = "hello";
$a = "hello";
$fr = "deepakkg@iitk.ac.in";
$frn = "deepak";
sendmail($a,$abcd,$ab,$fr,$frn);


















	
/*

$Name = "Da Duder"; //senders name
$email = "deepakkg@iitk.ac.in"; //senders e-mail adress
$recipient = "deepakkg@iitk.ac.in"; //recipient
$mail_body = "The text for the mail..."; //mail body
$subject = "Subject for reviever"; //subject
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields

mail($recipient, $subject, $mail_body, $header); //mail command :)

	*/
	
	
	/*
	$headers = ‘MIME-Version: 1.0' . “\r\n”;
    $headers .= ‘Content-type: text/html; charset=iso-8859-1' . “\r\n”;
    $headers .= ‘From: deepakkg@iitk.ac.in’ . “\r\n”;
    mail(”deepakkg@iitk.ac.in”,”test subject”,”test body”,$headers);
	
	
	*/
	
?>	
	

<p align="center">Check your IITK email for your password.</p>





<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p>&nbsp;</p>
<form id="loginForm" name="loginForm" method="post" target="content" class="style1" action="login-exec.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Login</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
    <tr>
      <td><b>Password</b></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Login" /></td>
    </tr>
  </table>
</form>





</body>
</html>


