<?php
session_start();
?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	//Train Num Check
	if(isset($_SESSION[trainnum]))
	{
	  if($_SESSION[trainnum]!=$_POST[train])
	  {
	    echo "Please Choose Seats in the Right Train";
	  }
	  else
	  {
	    $con = mysql_connect("127.0.0.1","root","shitass");
	    if(!$con)
	    {
		echo "Connection failed";
	    }
	    else
	    {
		mysql_select_db("DBProject",$con);
		$pnr = "SELECT num FROM pnrnno";
		$res = mysql_query($pnr);
		$row = mysql_fetch_array($res);
		$curr = $row[num];
		$curr++;
		$updatepnr = "UPDATE pnrnno SET num = ".$curr;
		mysql_query($updatepnr);
		if($_SESSION[pass_confirm]==3)
		{
		    $cnum1 = strtok($_SESSION[seat_0],"_");
		    $bnum1 = strtok("_");
		    
		    $qry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET available = available-1 WHERE coachno=".$cnum1;
		    $capstr = "SELECT cap_str FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$cnum1;
		    mysql_query($qry);
		    $res1 = mysql_query($capstr,$con);
		    $row1 = mysql_fetch_array($res1);
		    $str1 = $row1[cap_str];
		    $part1 = substr($str1,0,$bnum1);
		    $part2 = substr($str1,$bnum1+1);
		    $newstr = $part1."o".$part2;
		    $modcap = "UPDATE ".$_POST[train]."_".$_POST[date]." SET cap_str=\"".$newstr."\" WHERE coachno=".$cnum1;
		    mysql_query($modcap);

		    $cnum2 = strtok($_SESSION[seat_1],"_");
		    $bnum2 = strtok("_");

		    $qry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET available = available-1 WHERE coachno=".$cnum2;
		    $capstr = "SELECT cap_str FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$cnum2;
		    mysql_query($qry);
		    $res1 = mysql_query($capstr,$con);
		    $row1 = mysql_fetch_array($res1);
		    $str1 = $row1[cap_str];
		    $part1 = substr($str1,0,$bnum2);
		    $part2 = substr($str1,$bnum2+1);
		    $newstr = $part1."o".$part2;
		    $modcap = "UPDATE ".$_POST[train]."_".$_POST[date]." SET cap_str=\"".$newstr."\" WHERE coachno=".$cnum2;
		    mysql_query($modcap);

		    $cnum3 = strtok($_SESSION[seat_2],"_");
		    $bnum3 = strtok("_");

		    $qry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET available = available-1 WHERE coachno=".$cnum3;
		    $capstr = "SELECT cap_str FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$cnum3;
		    mysql_query($qry);
		    $res1 = mysql_query($capstr,$con);
		    $row1 = mysql_fetch_array($res1);
		    $str1 = $row1[cap_str];
		    $part1 = substr($str1,0,$bnum3);
		    $part2 = substr($str1,$bnum3+1);
		    $newstr = $part1."o".$part2;
 		    $modcap = "UPDATE ".$_POST[train]."_".$_POST[date]." SET cap_str = \"".$newstr."\" WHERE coachno=".$cnum3;
 		    mysql_query($modcap);

		}
		else if($_SESSION[pass_confirm]==1)
		{
		    $cnum1 = strtok($_SESSION[seat_0],"_");
		    $bnum1 = strtok("_");
		    
		    $qry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET available = available-1 WHERE coachno=".$cnum1;
		    $capstr = "SELECT cap_str FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$cnum1;
		    mysql_query($qry);
		    $res1 = mysql_query($capstr,$con);
		    $row1 = mysql_fetch_array($res1);
		    $str1 = $row1[cap_str];
		    $part1 = substr($str1,0,$bnum1);
		    $part2 = substr($str1,$bnum1+1);
		    $newstr = $part1."o".$part2;
		    $modcap = "UPDATE ".$_POST[train]."_".$_POST[date]." SET cap_str=\"".$newstr."\" WHERE coachno=".$cnum1;
		    mysql_query($modcap);

		}
		else if($_SESSION[pass_confirm]==2)
		{
		    $cnum1 = strtok($_SESSION[seat_0],"_");
		    $bnum1 = strtok("_");
		    
		    $qry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET available = available-1 WHERE coachno=".$cnum1;
		    $capstr = "SELECT cap_str FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$cnum1;
		    mysql_query($qry);
		    $res1 = mysql_query($capstr,$con);
		    $row1 = mysql_fetch_array($res1);
		    $str1 = $row1[cap_str];
		    $part1 = substr($str1,0,$bnum1);
		    $part2 = substr($str1,$bnum1+1);
		    $newstr = $part1."o".$part2;
		    $modcap = "UPDATE ".$_POST[train]."_".$_POST[date]." SET cap_str=\"".$newstr."\" WHERE coachno=".$cnum1;
		    mysql_query($modcap);

		    $cnum2 = strtok($_SESSION[seat_1],"_");
		    $bnum2 = strtok("_");

		    $qry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET available = available-1 WHERE coachno=".$cnum2;
		    $capstr = "SELECT cap_str FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$cnum2;
		    mysql_query($qry);
		    $res1 = mysql_query($capstr,$con);
		    $row1 = mysql_fetch_array($res1);
		    $str1 = $row1[cap_str];
		    $part1 = substr($str1,0,$bnum2);
		    $part2 = substr($str1,$bnum2+1);
		    $newstr = $part1."o".$part2;
		    $modcap = "UPDATE ".$_POST[train]."_".$_POST[date]." SET cap_str=\"".$newstr."\" WHERE coachno=".$cnum2;
		    mysql_query($modcap);
		}

		
		if($_SESSION[pass_waiting]==0)
		{
		    $cnum1 = strtok($_SESSION[seat_0],"_");
		    $bnum1 = strtok("_");

		    $cnum2 = strtok($_SESSION[seat_1],"_");
		    $bnum2 = strtok("_");

		    $cnum3 = strtok($_SESSION[seat_2],"_");
		    $bnum3 = strtok("_");

		    $glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','0','".$cnum1."','".$bnum1."','0','".$_POST[name2]."','".$_POST[age2]."','0','".$cnum2."','".$bnum2."','0','".$_POST[name3]."','".$_POST[age3]."','0','".$cnum3."','".$bnum3."','0')";
		    
		    if(!mysql_query($glbquery,$con))
		    {
			echo "Insertion Into Global Reservations Failed";
		    }
		    else
		    {
			$usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			mysql_query($usrqry,$con);
		    }
		}
		else if($_SESSION[pass_waiting]==1)
		{
		    $tmpqry = "SELECT * FROM ".$_POST[train]."c WHERE coachtype=\"".$_SESSION[coachtype]."\"";
		    $tmpres1 = mysql_query($tmpqry,$con);
		    $tmprow1 = mysql_fetch_array($tmpres1);
		    $tmpqry1 = "SELECT * FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$tmprow1[coachnum];
		    $tmpres = mysql_query($tmpqry1,$con);
		    $tmprow = mysql_fetch_array($tmpres);

		    $wait1 = $tmprow[waiting]+1;

		    if($_SESSION[pass_confirm]==1)
		     {

			$cnum1 = strtok($_SESSION[seat_0],"_");
			$bnum1 = strtok("_");

		        $glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','0','".$cnum1."','".$bnum1."','0','".$_POST[name2]."','".$_POST[age2]."','1','".$tmprow1[coachnum]."','','".$wait1."','','','','','','')";
		    
			if(!mysql_query($glbquery,$con))
			{
			    echo "Insertion Into Global Reservations Failed";
			}
			else
			{
			    $waitqry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET waiting = waiting+1 WHERE coachno=".$tmprow1[coachnum];
			    mysql_query($waitqry,$con);
			    $usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			    mysql_query($usrqry,$con);
			}
		     }
		     else if($_SESSION[pass_confirm]==2)
		     {
			$cnum1 = strtok($_SESSION[seat_0],"_");
			$bnum1 = strtok("_");

			$cnum2 = strtok($_SESSION[seat_1],"_");
			$bnum2 = strtok("_");

		        $glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','0','".$cnum1."','".$bnum1."','0','".$_POST[name2]."','".$_POST[age2]."','0','".$cnum2."','".$bnum2."','0','".$_POST[name3]."','".$POST[age3]."','1','".$tmprow1[coachnum]."','','".$wait1."')";
		    
			if(!mysql_query($glbquery,$con))
			{
			    echo "Insertion Into Global Reservations Failed";
			}
			else
			{
			    $waitqry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET waiting = waiting+1 WHERE coachno=".$tmprow1[coachnum];
			    mysql_query($waitqry,$con);
			    $usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			    mysql_query($usrqry,$con);
			}
		     }
		     else
		     {
			$glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','1','".$tmprow1[coachnum]."','','".$wait1."','','','','','','','','','','','','')";
		    
			if(!mysql_query($glbquery,$con))
			{
			    echo "Insertion Into Global Reservations Failed";
			}
			else
			{
			    $waitqry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET waiting = waiting+1 WHERE coachno=".$tmprow1[coachnum];
			    mysql_query($waitqry,$con);
			    $usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			    mysql_query($usrqry,$con);
			}
		     }
		}
		else if($_SESSION[pass_waiting]==2)
		{
		    $tmpqry = "SELECT * FROM ".$_POST[train]."c WHERE coachtype=\"".$_SESSION[coachtype]."\"";
		    $tmpres1 = mysql_query($tmpqry,$con);
		    $tmprow1 = mysql_fetch_array($tmpres1);
		    $tmpqry1 = "SELECT * FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$tmprow1[coachnum];
		    $tmpres = mysql_query($tmpqry1,$con);
		    $tmprow = mysql_fetch_array($tmpres);
		    $wait1 = $tmprow[waiting]+1;
		    $wait2 = $tmprow[waiting]+2;

		     if($_SESSION[pass_confirm]==1)
		     {

			$cnum1 = strtok($_SESSION[seat_0],"_");
			$bnum1 = strtok("_");

		        $glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','0','".$cnum1."','".$bnum1."','0','".$_POST[name2]."','".$_POST[age2]."','1','".$tmprow1[coachnum]."','','".$wait1."','".$_POST[name3]."','".$_POST[age3]."','1','".$tmprow1[coachnum]."','','".$wait2."')";
		    
			if(!mysql_query($glbquery,$con))
			{
			    echo "Insertion Into Global Reservations Failed";
			}
			else
			{
			    $waitqry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET waiting = waiting + 2 WHERE coachno = ".$tmprow1[coachnum];
			    mysql_query($waitqry,$con);
			    $usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			    mysql_query($usrqry,$con);
			}
		     }
		     else
		     {

			$glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','1','".$tmprow1[coachnum]."','','".$wait1."','".$_POST[name2]."','".$_POST[age2]."','1','".$tmprow1[coachnum]."','','".$wait2."','','','','','','')";
		    
			if(!mysql_query($glbquery,$con))
			{
			    echo "Insertion Into Global Reservations Failed";
			}
			else
			{
			    $waitqry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET waiting = waiting+2 WHERE coachno=".$tmprow1[coachnum];
			    mysql_query($waitqry,$con);
			    $usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			    mysql_query($usrqry,$con);
			}
		     }

		}
		else
		{

		    $tmpqry = "SELECT * FROM ".$_POST[train]."c WHERE coachtype=\"".$_SESSION[coachtype]."\"";
		    $tmpres1 = mysql_query($tmpqry,$con);
		    $tmprow1 = mysql_fetch_array($tmpres1);
		    $tmpqry1 = "SELECT * FROM ".$_POST[train]."_".$_POST[date]." WHERE coachno=".$tmprow1[coachnum];
		    $tmpres = mysql_query($tmpqry1,$con);
		    $tmprow = mysql_fetch_array($tmpres);

			$wait1 = $tmprow[waiting]+1;
			$wait2 = $tmprow[waiting]+2;
			$wait3 = $tmprow[waiting]+3;

			$glbquery = "INSERT INTO globalreservations VALUES('".$curr."','".$_SESSION[trainnum]."','".$_POST[date]."','1000','".$_POST[start]."','".$_POST[end]."','".$_POST[name1]."','".$_POST[age1]."','1','".$tmprow1[coachnum]."','','".$wait1."','".$_POST[name2]."','".$_POST[age2]."','1','".$tmprow1[coachnum]."','','".$wait2."','".$_POST[name3]."','".$_POST[age3]."','1','".$tmprow1[coachnum]."','','".$wait3."')";
		    
			if(!mysql_query($glbquery,$con))
			{
			    echo "Insertion Into Global Reservations Failed";
			}
			else
			{
			    $waitqry = "UPDATE ".$_POST[train]."_".$_POST[date]." SET waiting = waiting+3 WHERE coachno=".$tmprow1[coachnum];
			    mysql_query($waitqry,$con);
			    $usrqry = "INSERT INTO ".$_SESSION[user]." VALUES('".$curr."')";
			    mysql_query($usrqry,$con);
			}

		}
		echo "Reservation Done<br>";
		echo "<a href=\"userpage.php\">Click Here To Go To User Home</a>";
	    }
	  }
	}
	else
	{
	  echo "Please Choose Appropriate Seats First";
	}
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
