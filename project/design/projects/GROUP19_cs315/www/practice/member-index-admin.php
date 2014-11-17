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
<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
	
	
	
	$email_id=$_SESSION['SESS_EMAIL_ID'];
	 // $_SESSION['SESS_LOGIN']
	
	


		//	$_SESSION['SESS_EMAIL_ID'] = $member['email_id'];
			
	if (($_SESSION['SESS_MEMBER_ID'])!=10){
	     echo "Not allowed here";
	        exit();
			}
			
	
?>
<h1>Welcome Admin</h1>
 <a href="logout-admin.php">Logout</a>
<p>This is a password protected area only accessible to members. </p>
 <td width="112"><b>Add Student : </b></td>
<form id="loginForm" name="loginForm" method="post" action="register1-exec.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
	<tr>
      <td width="112"><b>Email ID</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
	<tr>
      <td width="112"><b>Password</b></td>
      <td width="188"><input name="passwd" type="text" class="textfield" id="passwd" /></td>
    </tr>
	<tr>
      <td width="112"><b>Name</b></td>
      <td width="188"><input name="name" type="text" class="textfield" id="name" /></td>
    </tr>
	<tr>
      <td width="112"><b>Roll No</b></td>
      <td width="188"><input name="roll_no" type="text" class="textfield" id="roll_no" /></td>
    </tr>
	<tr>
      <td width="112"><b>Dep &nbsp;(e.g cse)</b></td>
      <td width="188"><input name="department" type="text" class="textfield" id="department" /></td>
    </tr>
    <tr>
	<tr>
      <td width="112"><b>Batch &nbsp;(e.g Y6)</b></td>
      <td width="188"><input name="batch" type="text" class="textfield" id="batch" /></td>
    </tr>
      <td>
	  <tr>
      <td width="112"><b>Mobile Number</b></td>
      <td width="188"><input name="mob_no" type="text" class="textfield" id="mob_no" /></td>
    </tr>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
	</table>
</form>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>
 <td width="112"><b>Add Faculty : </b></td>
<form id="loginForm" name="loginForm" method="post" action="register2-exec.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
   
	<tr>
      <td width="112"><b>Email ID</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
	<tr>
	<tr>
      <td width="112"><b>Password</b></td>
      <td width="188"><input name="passwd" type="text" class="textfield" id="passwd" /></td>
    </tr>
      <td width="112"><b>Name</b></td>
      <td width="188"><input name="name" type="text" class="textfield" id="name" /></td>
    </tr>
	<tr>
      <td width="112"><b>Title</b></td>
      <td width="188"><input name="title" type="text" class="textfield" id="title" /></td>
    </tr>
	<tr>
      <td width="112"><b>Dep</b></td>
      <td width="188"><input name="department" type="text" class="textfield" id="department" /></td>
    </tr>
	<tr>
      <td width="112"><b>Office Phone No</b></td>
      <td width="188"><input name="office_no" type="text" class="textfield" id="office_no" /></td>
    </tr>
    <tr>
	<tr>
      <td width="112"><b>House Phone No</b></td>
      <td width="188"><input name="house_no" type="text" class="textfield" id="house_no" /></td>
    </tr>
      <td>
	  <tr>
      <td width="112"><b>Office Address</b></td>
      <td width="188"><input name="office_address" type="text" class="textfield" id="office_address" /></td>
    </tr>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </table>
</form>

<p>
<td width="112"><b>Delete Student: </b></td>
<form id="loginForm" name="loginForm" method="post" action="register3-exec.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
   
	<tr>
      <td width="112"><b>Email ID</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
	<tr>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</p>


<p>

<td width="112"><b>Delete Faculty : </b></td>
<form id="loginForm" name="loginForm" method="post" action="register4-exec.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
   
	<tr>
      <td width="112"><b>Email ID</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
	<tr>
      <td><input type="submit" name="Submit" value="Submit" /></td>
    </tr>
  </table>
</form>

</p>














</body>
</html>
