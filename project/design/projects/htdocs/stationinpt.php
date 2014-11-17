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
	$name_temp = "st_name_";
	$time_temp = "st_time_";
	for($i=1;$i<=$_POST[num_stations];$i++)
	{
	  $temp1 = $name_temp.$i;
	  $temp2 = $time_temp.$i;
	  $pos = $i+1 ;
	  $sql = "INSERT INTO $_POST[train_num]n VALUES ('$_POST[$temp1]','$_POST[$temp2]','$pos')";
	  if(!mysql_query($sql,$con))
	  {
		  echo "Could Not Enter Station $i : $_POST[$temp1]";
	  }
	}

	$num_temp = "coach_num_";
	$type_temp = "coach_type_";
	$cap_temp = "coach_cap_";
	for($i=1;$i<=$_POST[num_coaches];$i++)
	{
	  $temp1 = $num_temp.$i;
	  $temp2 = $type_temp.$i;
	  $temp3 = $cap_temp.$i;
	  $sql = "INSERT INTO $_POST[train_num]c VALUES ('$_POST[$temp1]','$_POST[$temp2]','$_POST[$temp3]')";
	  if(!mysql_query($sql,$con))
	  {
		  echo "Could Not Enter Coach $i : $_POST[$temp1]";
	  }
	}
	
	mysql_close($con);
}

?>
</body>
</html>
