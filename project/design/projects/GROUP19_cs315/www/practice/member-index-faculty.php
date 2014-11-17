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
 <a href="logout-faculty.php">Logout</a>
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
 
 		
     if (($_SESSION['SESS_MEMBER_ID'])!=50){
	     echo "Not allowed here";
	        exit();
			}
 

  $errormessage = "";

 //$sql="SELECT * FROM student_mobile  WHERE email_id='$email_id'";
  
 $sql="SELECT staff.office_address , staff.department, faculty_fullname_email.full_name, staff.email_id, staff.title,
  staff_phone_number.number_type,staff_phone_number.phone_number
FROM staff,  faculty_fullname_email LEFT JOIN staff_phone_number ON staff_phone_number.email_id = faculty_fullname_email.email_id
WHERE faculty_fullname_email.email_id = '$email_id' 
and faculty_fullname_email.email_id = staff.email_id";
 
   $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
 $i=0;
 $primKey="";
  while($row = mysql_fetch_array($result))
	{
	if ($primKey!=$row[3]){
			echo "<br>-----------------------------------------------------------------------<br>";
		 ++$i;
			echo "Name : ".$row[2];
			
			echo "<br>Title : ".$row[4];
		
			echo "<br>Department : ".$row[1];
			
			echo "<br>Email-ID : ".$row[3];
			
			echo "<br>Office-Address : ".$row[0];
			}
			if ( !is_null($row[5])){
				echo "<br>".$row[5]." phone no : ".$row[6];
			}
			
			$primKey=$row[3];
		
		//print_r("<br>");
	//echo $row['email_id'];
    //echo $row['mob_number'];
		
	}
	if ($i==0){
		echo "No result matching this query";
	}
 /* $sql="SELECT staff_phone_number.phone_number,      
		staff_phone_number.number_type
		
FROM faculty_fullname_email, 
	staff_phone_number
	
WHERE faculty_fullname_email.full_name like '%$name%'  
		and faculty_fullname_email.email_id = staff_phone_number.email_id";
  
  
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  echo $result;
  while($row = mysql_fetch_array($result))
	{
		print_r($row);
	//echo $row['email_id'];
    //echo $row['mob_number'];

	}
 */
  
 //////////////////////////////////////////////////// 
  mysql_close($link);
?>









<!-- <p>My current details: </p> -->



<p>
<form id="loginForm" name="loginForm" method="post" action="insert-faculty-office.php">
  <table width="300" border="0" align="left" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Insert New Office Phone Number</b></td>
      <td width="188"><input name="insert_office_no" type="text" class="textfield" id="insert_mob_no" /></td>
	  <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>&nbsp;
	<tr>
      
    </tr>
	</table>
</form>


<form id="loginForm" name="loginForm" method="post" action="insert-faculty-house.php">
  <table width="300" border="0" align="right" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Insert New House Phone Number</b></td>
      <td width="188"><input name="insert_house_no" type="text" class="textfield" id="delete_mob_no" /></td>
	   <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>&nbsp;
	<tr>
     
    </tr>
	</table>
</form>



&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p>
</br>
<form id="loginForm" name="loginForm" method="post" action="delete-phone-number.php">
  <table width="300" border="0" align="left" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Delete Old Phone Number(house or office)</b></td>
      <td width="188"><input name="delete_phone_no" type="text" class="textfield" id="delete_mob_no" /></td>
	   <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>&nbsp;
	<tr>
     
    </tr>
	</table>
</form>

</p>

<form id="loginForm" name="loginForm" method="post" action="update-faculty-address.php">
  <table width="300" border="0" align="right" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Update Office Address</b></td>
      <td width="188"><input name="update_office_address" type="text" class="textfield" id="delete_mob_no" /></td>
	   <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>&nbsp;
	<tr>
     
    </tr>
	</table>
</form>





</body>
</html>
