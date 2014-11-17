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
	  $sql = "SELECT station_acronym FROM stationinfo";
	  $result=mysql_query($sql,$con);
	  echo "<form action=\"makenewreserv.php\" method=\"post\">";
	  echo "Starting Station : <select name=\"start\">";
	  while($row = mysql_fetch_array($result))
	  {
		echo "<option value=\"$row[station_acronym]\">$row[station_acronym]</option>";
	  }
	  echo "</select>";
	  $result=mysql_query($sql,$con);
	  echo "Ending Station : <select name=\"end\">";
	  while($row = mysql_fetch_array($result))
	  {
		echo "<option value=\"$row[station_acronym]\">$row[station_acronym]</option>";
	  }
	  echo "</select><br>";
	  
	  
	  //Printing an option for date
	  
	  $i=0;
	  echo "Date of Journey <select name=\"date\">";
	  while($i<3)
	  {
	    $tday = getdate(mktime(0,0,0,date("m"),date("d")+$i,date("Y")));
	    $dats = date("Y/m/d",mktime(0,0,0,date("m"),date("d")+$i,date("Y")));
	    echo "<option value=\"$tday[yday]\">$dats</option>";
	    $i = $i+1;
	  }
	  echo "</select>";
	  
	  echo "<br>Enter Passenger Information<br>";
	  echo "Passenger 1 : Name <input type=\"text\" name=\"name1\"/> Age <input type=\"text\" name=\"age1\"><br>";
	  echo "Passenger 2 : Name <input type=\"text\" name=\"name2\"/> Age <input type=\"text\" name=\"age2\"><br>";
	  echo "Passenger 3 : Name <input type=\"text\" name=\"name3\"/> Age <input type=\"text\" name=\"age3\"><br>";
	  
	  echo "<input type=\"submit\" value=\"Submit\" \>";
	  
	  echo "</form>";
	    
	  mysql_close($con);
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
