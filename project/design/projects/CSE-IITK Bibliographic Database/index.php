<?php
include_once("header.php");
echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";


  
  echo"<span class = 'h1' align = 'center'>CSE-IITK Research Paper Database</span> ";
  echo "<form action='loginsubmit.php' method='post'>";
  echo "
	<span class='h2' align='center'>Please enter your CC login and password</span>
	<br><br>
	<table>
	<tr><td></td><td>
	<table border='0' width='60%'>".
    "<tr>".
    "<td width='20%' align='center'></td>".
    "<td width='60%'></td>".
    "</tr>".
    "<tr>".
    "<td width='20%' class='ntext'>Username</td>".
    "<td width='60%' class='ntext'><input type='text' name='id'></td>".
    "</tr>".
    "<tr>".
    "<td width='20%' class='ntext'>Password</td>".
    "<td width='60%' class='ntext'><input type='password' name='pass'></td>".
    "</tr>".
    "<tr>".
    "<td class='ntext' colspan='2' align='center'><input type='submit' name='submit' value='Login'></td>".
    "</tr>".
    "</table>".
	"</td></tr></table>".
	"<br><span class = h2>NOTE: Internal link only. Link does not work between 12 AM - 6AM.</span>".
    "</form><br><br>
";

echo"
					</td></tr>
				</table>
";			


?>
  
