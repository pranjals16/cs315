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
	$sql = "INSERT INTO globaltrains VALUES ('$_POST[trainno]','$_POST[trainname]','$_POST[starting_station]','$_POST[ending_station]','$_POST[start_time]','$_POST[end_time]')";
	if(!mysql_query($sql,$con))
	{
		echo "Query Failed";
	}
	else
	{
		$table = "CREATE TABLE $_POST[trainno]n (station varchar(4),arrivaltime time,stopnum integer , PRIMARY KEY (`station`, `arrivaltime`) , FOREIGN KEY (station) REFERENCES stationinfo(station_acronym) ON DELETE CASCADE ON UPDATE CASCADE) ENGINE=INNODB;";
		if(!mysql_query($table,$con))
		{
			echo "Table Creation Unsuccessful";
		}
		else
		{
			$table = "CREATE TABLE $_POST[trainno]c (coachnum integer,coachtype varchar(3), coachcap integer , PRIMARY KEY (`coachnum`)) ENGINE=INNODB;";
			if(!mysql_query($table,$con))
			{
				echo "COACH TABLE CREATION FAILED";
			}
			else
			{
			  $table_insert="INSERT INTO $_POST[trainno]n VALUES ('$_POST[starting_station]','$_POST[start_time]','1')";
			  mysql_query($table_insert,$con);
			  $pos = $_POST[num_stations]+2 ;
			  $table_insert="INSERT INTO $_POST[trainno]n VALUES ('$_POST[ending_station]','$_POST[end_time]','$pos')";
			  mysql_query($table_insert,$con);

			  print("<form action=\"stationinpt.php\" method=\"post\">");
			  print("<input type=\"hidden\" name=\"train_num\" value=\"$_POST[trainno]\" \>");
			  print("<input type=\"hidden\" name=\"num_stations\" value=\"$_POST[num_stations]\" \>");
			  print("<input type=\"hidden\" name=\"num_coaches\" value=\"$_POST[num_coaches]\" \>");
			  print("ENTER STATIONS<br>");
			  for ($i=1; $i<=$_POST[num_stations]; $i++)
			  {
			    print("Station Name $i <input type=\"text\" name=\"st_name_$i\" maxlength=\"4\" \><br>");
			    print("Station Time $i <input type=\"text\" name=\"st_time_$i\" maxlength=\"6\" \><br>");
			  }
			  print("ENTER COACHES<br>");
			  for ($i=1; $i<=$_POST[num_coaches]; $i++)
			  {
			    print("Coach Number $i <input type=\"text\" name=\"coach_num_$i\" \><br>");
			    print("Coach Type $i <input type=\"text\" name=\"coach_type_$i\" maxlength=\"3\" \><br>");
			    print("Coach Capacity $i <input type=\"text\" name=\"coach_cap_$i\" \><br>");
			  }
			  print("<input type=\"submit\" \>");
			  print("</form>");
			}
		}
	}
	mysql_close($con);
}

?>
</body>
</html>
