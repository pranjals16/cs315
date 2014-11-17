
      <html>
 
      <head>      
  
      <TITLE></TITLE>
 
 
 
      <style type="text/css">
 
      <!--
 
      td {
  
      font-family: Tahoma, Arial, Helvetica, sans-serif;

      font-size: 11px;

      }

      .content {
 
      padding-top: 20px;
  
      padding-right: 20px;
 
      padding-bottom: 40px;
  
      padding-left: 20px;

      background-image: url(images/e019_22.png);

      background-position: left;

      background-repeat: repeat-y;

      }

      .menutop {

      background-image: url(images/e019_10.png);

      background-repeat: no-repeat;

      background-position: right;

      height: 31px;

      padding-right: 15px;

      padding-left: 15px;

      vertical-align: middle;

      font-weight: bold;

      color: #FFFFFF;
 
      }
 
      a:link, a:visited {
 
      color: #FF0000;
 
      text-decoration: underline;
 
      }
 
      a:hover {
 
      color: #000099;

      text-decoration: none;
 
      }

      .menutop a:link, .menutop a:visited {

      color: #FFFFFF;

      text-decoration: none;

      }

      .menutop a:hover {
 
      color: #FFFFFF;
 
      text-decoration: underline;

      }

      .footer, .footer a:link, .footer a:visited {

      color: #FFFFFF;

      }

      .newsbar {
 
      color: #000000;

      font-weight: bold;
 
      padding-left: 15px;
 
      }
 
      .logo {
  
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
 
      font-weight: bold;

      color: #FFFFFF;

      }

      .leftcontent {

      padding-top: 10px;

      padding-right: 10px;

      padding-bottom: 25px;

      padding-left: 10px;

      }

      .style1 {font-size: 16px}

      body {

      background-image: url(images/bg_e019.gif);

      }

      -->

      .style1 {color: #FFFFFF}
.style1 {
	color: #FFFFFF;
	font-size: large;
}
      .style2 {color: #CCCCCC}
      </style>
 
      </head>

      <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="780" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
 
      <tr>

      <td align="center"><table width="760" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 
      <tr>
  
      <td height="146" background="images/e019_03.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

      <td width="22"><img src="images/e019_02.png" width="22" height="146" alt=""></td>

      <td width="200"><table width="367" border="0" cellpadding="5" cellspacing="0">
 
      <tr>

      <td width="357" align="center" nowrap class="logo"><span class="style1">Library Management System </span></td>
       </tr>
 
      </table></td>
  
      
      <td>&nbsp;</td>

      <td width="22"><img src="images/e019_05.png" width="22" height="146" alt=""></td>

      </tr>

      </table></td>

      </tr>

      <tr>

      <td height="31" background="images/e019_12.png"><table border="0" cellpadding="0" cellspacing="0" background="images/e019_08.png">

      <tr>

     
    <td width="171" class="menutop style2">Error</td>
      
      </tr>

      </table></td>

      </tr>

      <tr>

      <td background="images/e019_16.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

      <td width="81" height="11"><img src="images/e019_15.png" width="81" height="11" alt=""></td>

      <td height="11"><img src="images/e019_16.png" width="7" height="11" alt=""></td>

      <td width="53" height="11"><img src="images/e019_18.png" width="53" height="11" alt=""></td>

      </tr>

      </table></td>

      </tr>

      <tr>

      <td height="100%" valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">

      <tr>

      <td width="178" valign="top"><table width="178" border="0" cellspacing="0" cellpadding="0">

      <tr>

      <td height="35" class="newsbar">&nbsp;</td>
      </tr>

      <tr>

      <td height="5"><img src="images/e019_25.png" width="178" height="5" alt=""></td>

      </tr>

      <tr>

      <td class="leftcontent">&nbsp;</td>

      </tr>

      <tr>

      <td>&nbsp;</td>

      </tr>

      </table></td>

      <td valign="top" class="content"><p>&nbsp;</p>
        <p>&nbsp; </p>
		<?php
session_start();

include("mysql_connect.php");



//select database now
$db_selected = mysql_select_db('noads_3268151_lib', $link);
if (!$db_selected) {
    die ('Can\'t use lib: ' . mysql_error());
}
//echo 'database selected';

$username = mysql_real_escape_string($_REQUEST[username]);
$passwd = mysql_real_escape_string($_REQUEST[password]);
$passwd = md5 ($passwd);


$query = "INSERT INTO login (username ,password) VALUES ('$username' , '$passwd')";
mysql_query($query) or die('Error, insert query failed');

//$query = "FLUSH PRIVILEGES";
//mysql_query($query) or die('Error, insert query failed');

echo 'The User has been added';




?>
		<p>Return to <a href="admin_login.php">admin home </a></p>
        <p>&nbsp;</p>
		 
        </td>

      </tr>

      </table></td>

      </tr>

      <tr>

      <td background="images/e019_28.png"><table width="100%" height="69" border="0" cellpadding="0" cellspacing="0">

      <tr>

      <td width="53"><img src="images/e019_27.png" width="53" height="69" alt=""></td>

      <td valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="15">

      <tr>

      <td align="center" class="footer">Copyright : Siddhartha Kandoi </td>

      </tr>
      </table></td>

      <td width="53"><img src="images/e019_30.png" width="53" height="69" alt=""></td>

      </tr>

      </table></td>

      </tr>

      <tr>

      <td>&nbsp;</td>

      </tr>

      </table></td>

      </tr>

      </table>

      </body>

      </html>









