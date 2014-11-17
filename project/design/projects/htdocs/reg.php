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
	$sql = "INSERT INTO authentication VALUES ('$_POST[user]','$_POST[password]')";
	if(!mysql_query($sql,$con))
	{
		echo "Query Failed : Username Already Exists or Connection Terminated";
	}
	else
	{
		echo "Registration Successful<br>";
		$table = "CREATE TABLE $_POST[user] (pnrno integer unsigned, FOREIGN KEY (pnrno) REFERENCES globalreservations(pnrno)
                      ON DELETE CASCADE ON UPDATE CASCADE) ENGINE=INNODB;";
		if(!mysql_query($table,$con))
		{
			echo "Table Creation Unsuccessful";
		}
		
		echo "<a href=\"index.html\">Click here To Go Back Home</a>";
	}
	mysql_close($con);
}

?>
</body>
</html>
