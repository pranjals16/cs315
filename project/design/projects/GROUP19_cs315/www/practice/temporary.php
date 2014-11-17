<html>

<head>

<!mailto protocol in html>

<?php	
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
	
	$login=mysql_real_escape_string($_POST['login']);

	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}

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
	







$sendto = $em."@iitk.ac.in";
$message = "This is in response to your request for your login details at IITK Telephone directory. \n \n</br><p></p>Login ID: ".$em." \n \n </br><p></p>Password: ".$em1." \n\n </br><p></p>Thank You \n \n </br><p></p>Site Admin";


$abc = "absc";
$ab = $em;
$abcd = $message;
$a = "iitk directory";
$fr = "deepakkg@iitk.ac.in";
$frn = "IITK Telephone Directory Site Admin";
sendmail($a,$abcd,$ab,$fr,$frn);


?>


<p align="center">Check your IITK email for your password.</p>





<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body background="yellow_paper.gif"> 
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











