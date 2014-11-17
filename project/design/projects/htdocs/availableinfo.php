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
	  
	  echo "------------------".$_GET[coachtype]."--------------------<br>";;

	  $sqlqry = "SELECT coachnum FROM ".$_GET[trainnum]."c WHERE coachtype = \"".$_GET[coachtype]."\"";

	  $totalavb = 0;

	  $res = mysql_query($sqlqry,$con);
	  echo "<form action=\"allocseats.php\" method=\"post\">";
	  while($row = mysql_fetch_array($res))
	  {
	    echo "Coach Num : $row[coachnum] <br>";
	    $qry2 = "SELECT available,cap_str,waiting FROM ".$_GET[trainnum]."_".$_GET[date]." WHERE coachno=".$row[coachnum];
	    $res2 = mysql_query($qry2,$con);
	    $row1 = mysql_fetch_array($res2);
	    echo "Available : $row1[available]<br>";
	    $totalavb = $totalavb + $row1[available];
	    echo "Waiting : $row1[waiting]<br>";
	    echo "Please Choose Seat(s)<br>";
	    for($i=0;$i<strlen($row1[cap_str]);$i++)
	    {
	      $char = substr($row1[cap_str],$i,1);
	      if($char=="e")
	      {
		  echo "<input type=\"checkbox\" name=seatno[] value=\"$row[coachnum]_$i\" /> $i";
	      }
	    }
	    echo "<br>";
	  }
	  echo "<br>";
	  if($totalavb > $_GET[pass]) {$passcnfrm = $_GET[pass];}
	  else
	  {
	      $passcnfrm = $totalavb;
	  }
	  $pass_waiting = $_GET[pass] - $passcnfrm;
	  echo "<input type=\"hidden\" name=\"coachtype\" value=\"$_GET[coachtype]\">";
	  echo "<input type=\"hidden\" name=\"pass_confirm\" value=\"$passcnfrm\">";
	  echo "<input type=\"hidden\" name=\"pass_waiting\" value=\"$pass_waiting\">";
	  echo "<input type=\"hidden\" name=\"trainnum\" value=\"$_GET[trainnum]\">";
	  echo "<input type=\"submit\" value=\"Submit\">";
	  echo "</form>";
	    
	  mysql_close($con);
	}
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
