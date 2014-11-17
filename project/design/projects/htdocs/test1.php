<html>
<body>
<?php
$con = mysql_connect("127.0.0.1","root","shitass");
if(!$con)
{
	echo "Connection failed";
}
else
{
	mysql_select_db("DBProject",$con);
	$sql = "INSERT INTO authentication VALUES ('$_POST[name]','$_POST[pswd]')";
	if(!mysql_query($sql,$con))
	{
		echo "Query Failed";
	}
	else
	{
		echo "Query Successful";
	}
	mysql_close($con);
}

?>
</body>
</html>
