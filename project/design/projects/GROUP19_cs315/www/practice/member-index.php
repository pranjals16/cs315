<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Member Index</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body background="yellow_paper.gif"> 
<h1>Welcome <?php echo $_SESSION['SESS_EMAIL_ID'];?></h1>
 <a href="logout.php">Logout</a>
<p>This is a password protected area only accessible to members. </p>
<h1>My Profile </h1>
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
  
  $email_id=$_SESSION['SESS_EMAIL_ID'];
 // $_SESSION['SESS_LOGIN']
 
 		
     if (($_SESSION['SESS_MEMBER_ID'])!=100){
	     echo "Not allowed here";
	        exit();
			}
 

  $errormessage = "";

 //$sql="SELECT * FROM student_mobile  WHERE email_id='$email_id'";
  
  $sql="SELECT student.batch, student.department,   fullname_email.full_name,student.email_id,student.roll_no,student_mobile.mob_number
FROM student,  fullname_email LEFT JOIN student_mobile ON student_mobile.email_id = fullname_email.email_id
WHERE student.email_id =  '$email_id' 
and fullname_email.email_id = student.email_id";
 
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
  
  
 	

 $i=0;
 
  $primKey="";
  while($row = mysql_fetch_array($result))
	{
		
		if ($primKey!=$row[3]){
			echo "<br>-----------------------------------------------------------------------<br>";
		//print_r($row);
			 ++$i;
			echo "Name : ".$row[2];
			echo "<br>Batch: ".$row[0];
			echo "<br>Roll No : ".$row[4];
		
			echo "<br>Department : ".$row[1];
			
			echo "<br>Email-ID : ".$row[3];
		}
			if ( !is_null($row[5])){
				echo "<br>Mobile No : ".$row[5];
			}
			$primKey=$row[3];
	}
	if ($i==0){
		echo "No result matching this query";
	}
  
  mysql_close($link);
?>









<!-- <p>My current details: </p> -->



<p>
<form id="loginForm" name="loginForm" method="post" action="insert-student-mobile.php">
  <table width="300" border="0" align="left" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Insert New Mobile Number</b></td>
      <td width="188"><input name="insert_mob_no" type="text" class="textfield" id="insert_mob_no" /></td>
	  <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>&nbsp;
	<tr>
      
    </tr>
	</table>
</form>
</p>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>
</br>
<form id="loginForm" name="loginForm" method="post" action="delete-student-mobile.php">
  <table width="300" border="0" align="left" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Delete Old Mobile Number</b></td>
      <td width="188"><input name="delete_mob_no" type="text" class="textfield" id="delete_mob_no" /></td>
	   <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>&nbsp;
	<tr>
     
    </tr>
	</table>
</form>
</p>





</body>
</html>
