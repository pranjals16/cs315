<?php
session_start();
?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	$con = mysql_connect("127.0.0.1","root","shitass");
	if(!$con)
	{
		echo "Connection failed";
	}
	else
	{
	  mysql_select_db("DBProject",$con);
	  $qry = "SELECT password FROM authentication WHERE user=\"".$_SESSION[user]."\"";
	  $res = mysql_query($qry,$con);
	  $row = mysql_fetch_array($res);
	  if($row[password]==$_POST[oldpsswd])
	  {
	    $qry2 = "UPDATE authentication SET password=\"".$_POST[newpsswd]."\" WHERE user=\"".$_SESSION[user]."\"";
	    mysql_query($qry2,$con);
	    echo "Password Changed Successfully<br>";
	  }
	  else
	  {
	    echo "Incorrect Password Entered<br>";
	  }
	  echo "<a href=\"userpage.php\">Click Here To Go To User Home</a>";
	}
	
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
