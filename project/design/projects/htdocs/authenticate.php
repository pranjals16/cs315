<?php
$con = mysql_connect("127.0.0.1","root","shitass");
if(!$con)
{
	echo "Connection Has Failed";
}
else
{
	mysql_select_db("DBProject",$con);
	$sql = "SELECT password FROM authentication WHERE user='$_POST[user]'";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result);
	if($row[password]!="")
	{
		if($_POST[password]==$row[password])
		{
			session_start();
			$_SESSION['authorized']=1;
			$_SESSION['user']=$_POST['user'];
			$_SESSION['password']=$_POST['password'];
		}
		else
		{
		}
	}
	mysql_close($con);
}

?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	echo "Welcome $_SESSION[user]<br>";
	echo "<a href=\"userpage.php\">Click Here to Proceed</a><br>";
	echo "<a href=\"logout.php\">Click Here to Logout</a>";
      }
      else
      {
	echo "Not Authorized<br>";
	echo "<a href=\"index.html\">Click Here To Go Back</a>";
      }

?>
</body>
</html>
