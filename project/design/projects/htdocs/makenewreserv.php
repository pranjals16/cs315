<?php
session_start();
?>
<html>
<body>
<?php

      echo "<script language=\"javascript\">
	      function clik(str1,str2,str3,str4)
	      {
		url = \"http://localhost:10000/availableinfo.php?coachtype=\" + str1 + \"&trainnum=\" + str2 + \"&date=\" + str3 + \"&pass=\" + str4;
		window.open(url,\"mywindow\",\"menubar=1,resizable=1,width=350,height=250\"); 
	      }
	    </script>";

      
      if(isset($_SESSION['authorized']))
      {
	$con = mysql_connect("127.0.0.1","root","shitass");
	if(!$con)
	{
		echo "Connection failed";
	}
	else
	{
	  if($_POST[name1]=="" || $_POST[age1]=="")
	  {
	    echo "First Passenger Must be necessarily filled";
	  }
	  else
	  {
		$ctr=3;
		if($_POST[name2]=="" || $_POST[age2]=="")
		{
		  $ctr--;
		}
		if($_POST[name3]=="" || $_POST[age3]=="")
		{
		  $ctr--;
		}
		mysql_select_db("DBProject",$con);
		$sql = "SELECT trainno FROM globaltrains";
		$result=mysql_query($sql,$con);
		echo "<form action=\"confirmreserv.php\" method=\"post\">";
		while($row = mysql_fetch_array($result))
		{
		  $strtquery = "SELECT * FROM ".$row[trainno]."n WHERE station=\"".$_POST[start]."\"";
		  $endquery = "SELECT * FROM ".$row[trainno]."n WHERE station=\"".$_POST[end]."\"";
		  $res1 = mysql_query($strtquery,$con);
		  $res2 = mysql_query($endquery,$con);
		  $rowst1 = mysql_fetch_array($res1);
		  $rowen1 = mysql_fetch_array($res2);
		  if($rowst1[stopnum]!="" && $rowen1[stopnum]!="")
		  {
		    if($rowst1[stopnum] < $rowen1[stopnum])
		    {
		      echo "<input type=\"radio\" name=\"train\" value=\"$row[trainno]\" checked=\"checked\"/>";
		      echo "$row[trainno] $rowst1[station] $rowst1[arrivaltime] $rowen1[station] $rowen1[arrivaltime]";
		      $trnquery = "SELECT DISTINCT coachtype FROM ".$row[trainno]."c";
		      $res3 = mysql_query($trnquery,$con);
		      
		      echo " Coach Type : ";
		      
		      
		      while($crows = mysql_fetch_array($res3))
		      {
			echo "<a onClick=clik('$crows[coachtype]','$row[trainno]','$_POST[date]','$ctr')>$crows[coachtype]</a> ";
		      }
		      
// 		      $res3 = mysql_query($trnquery,$con);
// 		      
// 		      $name = "coachtype".$row[trainno];
// 		      echo " Coach Type : <select name=\"$name\">";
// 		      while($crows = mysql_fetch_array($res3))
// 		      {
// 			echo "<option name=\"coachtype\" value=\"$crows[coachtype]\">$crows[coachtype]</option>";
// 		      }
// 		      echo "</select>";
		      echo "<br>";
		    }
		  }
		}
		
		echo "<input type=\"hidden\" name=\"start\" value=\"$_POST[start]\"/>";
		echo "<input type=\"hidden\" name=\"end\" value=\"$_POST[end]\"/>";
		echo "<input type=\"hidden\" name=\"date\" value=\"$_POST[date]\"/>";
		echo "<input type=\"hidden\" name=\"name1\" value=\"$_POST[name1]\"/>";
		echo "<input type=\"hidden\" name=\"name2\" value=\"$_POST[name2]\"/>";
		echo "<input type=\"hidden\" name=\"name3\" value=\"$_POST[name3]\"/>";
		echo "<input type=\"hidden\" name=\"age1\" value=\"$_POST[age1]\"/>";
		echo "<input type=\"hidden\" name=\"age2\" value=\"$_POST[age2]\"/>";
		echo "<input type=\"hidden\" name=\"age3\" value=\"$_POST[age3]\"/>";
		
		echo "<input type=\"submit\" value=\"Submit\"/>";
		echo "</form>";
		echo "<a href=\"userpage.php\">Click Here To Go To User Home</a>";
		mysql_close($con);
	      }
	}
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
