<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body background="yellow_paper.gif"> 
<p>&nbsp;</p>
<form id="loginForm" name="loginForm" method="post" action="login-exec-faculty.php" target="content" class="style1" >
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






          <tr> 
            <td height="19">&nbsp;</td>
            <td>&nbsp;</td>
          
          </tr>

         		   <script language="JavaScript">
  function validateForm10(theForm){
    if(theForm.login.value ==""){
      alert("Enter the IITK Email_id");
      theForm.login.focus();
      return false;
    }

    return true;
  }
  </script>
 

 
             
<p>
<p align="center">If you donot know your password then enter your IITK email_id below and enter.</p>
<form id="loginForm" name="loginForm" method="post" action="password-unknown.php"  onsubmit="return validateForm10(this) ;">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Login</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Send Me" /></td>
    </tr>
  </table>
</form>
</p>

</body>
</html>
