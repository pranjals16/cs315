<html>
<body>
<?php
	if($_POST[adminpassword]=="admin_psswd")
		{
			echo "Authenticated\n";
			$con = mysql_connect("127.0.0.1","root","shitass");
			if(!$con)
			{
			  echo "Connection failed";
			}
			else
			{
				mysql_select_db("information_schema",$con);
				$sql_query = "SELECT DISTINCT TABLE_NAME FROM COLUMNS WHERE TABLE_SCHEMA=\"DBProject\"";
				$result = mysql_query($sql_query);

				$days = (strtotime(date("Y-m-d")) - strtotime("2009-01-01")) / (60 * 60 * 24);
				//$days has number of days for today since the start of the year

				mysql_select_db("DBProject",$con);

				while($row = mysql_fetch_array($result))
				{
					$token = strtok($row[TABLE_NAME],"_");
					$token = strtok("_");
					if($token != "")
					{
					    $token_int = (int)$token;
					    if($token_int < $days)
					    {
					      mysql_query("DROP TABLE $row[TABLE_NAME]");
					    }
					}
				}
				//Now for all train numbers, add tables from $day to $day+6

				$res = mysql_query("SELECT trainno FROM globaltrains");
				while($row = mysql_fetch_array($res))
				{
				      $trainf = $row[trainno]."c";
				      for($i = $days;$i<=$days+2;$i++)
				      {
					$tblname = $row[trainno]."_".$i;
					if(!mysql_query("CREATE TABLE $tblname (coachno integer,available integer,waiting integer,cap_str varchar(100) , PRIMARY KEY(`coachno`) , FOREIGN KEY (coachno) REFERENCES $trainf(coachnum) ON DELETE CASCADE ON UPDATE CASCADE) ENGINE=INNODB;"))
					{
					     echo "ALREADY THERE $tblname<br>";
					}
					else
					{
					      //Now we insert into tblname
					     $newres = mysql_query("SELECT coachnum,coachcap FROM $trainf");
					     while($newrow = mysql_fetch_array($newres))
					     {
						$newstring = str_repeat("e",$newrow[coachcap]);
						mysql_query("INSERT INTO $tblname VALUES ('$newrow[coachnum]','$newrow[coachcap]','0','$newstring')");
					     }
					}
				      }
				}

					print("
						<form action=\"traininpt.php\" method=\"post\">
						Train Number: <input type=\"text\" name=\"trainno\" \><br>
						Train Name: <input type=\"text\" name=\"trainname\" \><br>
						Starting Station: <input type=\"text\" name=\"starting_station\" \><br>
						Ending Station: <input type=\"text\" name=\"ending_station\" \><br>
						Start Time: <input type=\"text\" name=\"start_time\" maxlength=6 \><br>
						End Time: <input type=\"text\" name=\"end_time\" maxlength=6 \><br>
						Number Of Stations: <input type=\"text\" name=\"num_stations\" maxlength=\"2\" \><br>
						Number Of Coaches: <input typ=\"text\" name=\"num_coaches\">
						<input type=\"submit\" \>
						</form>
					");
			}
		}
		else
		{
			echo "Invalid Username or Password";
		}
?>
</body>
</html>
