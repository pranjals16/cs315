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
	  $sql = "SELECT * FROM globalreservations NATURAL JOIN ".$_SESSION[user];
	  $res = mysql_query($sql);
	  echo "<form action=\"del.php\" method=\"post\">";
	  while($row = mysql_fetch_array($res))
	  {
	    $chkbx =  "<input type=\"checkbox\" name=\"todel[]\" value=\"".$row[pnrno]."\"/>";
	    echo "$chkbx";
	    echo "PNR- $row[pnrno], TRAIN- $row[trainno], FROM- $row[from], TO- $row[to], ";
	    $date = $row[boardingdate];
	    $tday = getdate(mktime(0,0,0,date("m"),date("d"),date("y")));
	    echo "BOARDING- ";
	    echo(date("d-m-y",mktime(0,0,0,date("m"),date("d")+$date-$tday[yday],date("y"))));
	    echo "<br>";
	    if($row[pass1_name]!="")
	    {
	      echo "$row[pass1_name] STATUS- ";
	      if($row[pass1_status]==0) echo "CONFIRMED COACH $row[pass1_coachnum] BERTH $row[pass1_berthnum]<br>";
	      else echo "WAITING $row[pass1_waitnum]<br>";
	    }
	    
	    if($row[pass2_name]!="")
	    {
	      echo "$row[pass2_name] STATUS- ";
	      if($row[pass2_status]==0) echo "CONFIRMED COACH $row[pass2_coachnum] BERTH $row[pass2_berthnum]<br>";
	      else echo "WAITING $row[pass2_waitnum]<br>";
	    }

	    if($row[pass3_name]!="")
	    {
	      echo "$row[pass3_name] STATUS- ";
	      if($row[pass3_status]==0) echo "CONFIRMED COACH $row[pass3_coachnum] BERTH $row[pass3_berthnum]<br>";
	      else echo "WAITING $row[pass3_waitnum]<br>";
	    }
	    echo "<br>";
	  }
	  echo "<input type=\"submit\" value=\"Delete Selected\"/>";
	  echo "</form>";
	  echo "<br>";
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
