<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Profile</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>My Profile </h1>
<a href="member-index.php">Home</a> | <a href="logout.php">Logout</a>
<p>This is another secure page. </p>




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
  
  $email_id=$_SESSION['SESS_LOGIN'];
 // $_SESSION['SESS_LOGIN']

  $errormessage = "";

 //$sql="SELECT * FROM student_mobile  WHERE email_id='$email_id'";
  
 
  $sql="SELECT student.batch, student.department,   fullname_email.full_name,student.email_id,student.roll_no
FROM student,  fullname_email
WHERE student.email_id =  '$email_id' 
and fullname_email.email_id = student.email_id";
 
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  echo $result;
  while($row = mysql_fetch_array($result))
	{
		print_r($row);
	//echo $row['email_id'];
    //echo $row['mob_number'];

	}
  $sql="SELECT student_mobile.mob_number
FROM student_mobile
WHERE student_mobile.email_id = '$email_id'";
  
  
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  echo $result;
  while($row = mysql_fetch_array($result))
	{
		print_r($row);
	//echo $row['email_id'];
    //echo $row['mob_number'];

	}
 
  
  
  mysql_close($link);
?>















</body>
</html>
