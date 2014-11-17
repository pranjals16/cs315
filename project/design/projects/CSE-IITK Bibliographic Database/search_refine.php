<?php
session_start();
include_once("header.php");
include_once("dbconnect.php");

if(!isset($_SESSION['id']))
{
	echo"<script type='text/javascript'>alert('User not logged in!');</script>";
	die();
}

$db = db_connect();
@mysql_select_db("DBLP",$db) or die("Unable to select database");

if(isset($_POST['submit']))
{
	$query = $_SESSION['query_torefine'];
	//echo $query;
	$authors = $_POST['authors'];
	$areas = $_POST['areas'];
}

else
{
	echo "<div align = 'center' class = h3>Cannot access this page directly!</align>";
	die();
}



echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";

  
  //echo"<span class = 'h1' align = 'center'>CSE-IITK Research Paper Database</span> ";
  echo "<form action='search_process_temp.php' method='post'>";
  echo 
	"Search for: <input type='text' name='search' size = 60>".
    "<class='ntext' colspan='2' align='center'><input type='submit' name='submit' value='Search'>".
    "<input type = 'reset'><br><br>".
    "</form><br>
";

$end_query = "";
if ($areas != "default")
{
	$end_query = $end_query." AND RName = '".$areas."' ";
}

if ($authors != "default")
{
	$end_query = $end_query." AND AuthName = '".$authors."' ";
}
$end_query_2 = " GROUP BY PTitle, AuthName ORDER BY PRank desc,PTitle,AuthName ";
$end_query_3 = $end_query.$end_query_2;

//echo $basic_query.$const_query;
echo "<span class = h1>Refined Results<i></i></span><br><br>";

//echo $query.$end_query;
$result = mysql_query($query.$end_query_3);

// Refine by Author
echo "<table align = 'center'><tr><td width = 400>";
echo " <form name='input' action='search_refine.php' method='post' >";
$result_auth = mysql_query($query.$end_query." GROUP BY AuthName");
echo "Refine by author:&nbsp&nbsp<select name = 'authors'>";
echo"<option value = 'default'>Select an Author</option>";	
	while($row = mysql_fetch_assoc($result_auth))
	{
		echo"<option value = '".$row['AuthName']."' >".$row['AuthName']."</option>";
	}
	echo"</select></td>";

// Refine by Reseach Area	
$result_area = mysql_query($query.$end_query." GROUP BY RName");
echo "<td width = 400>Refine by Area:&nbsp&nbsp<select name = 'areas'>";
echo"<option value = 'default'>Select a Research Area</option>";		
	while($row = mysql_fetch_assoc($result_area))
	{
		echo"<option value = '".$row['RName']."' >".$row['RName']."</option>";
	}
	echo"</select></td>";	

	
echo"<td><input type='submit' name='submit' value='Submit'></td></tr></table></form><br>";
$_SESSION['query_torefine'] = $query.$end_query;

echo"<div align = 'left'>";
//Result display
if(@mysql_num_rows($result)>0)
{
	echo"<ul align = 'left'>";
	$row = mysql_fetch_row($result);
	$i=0;
	while($i<mysql_num_rows($result))
	{
		  $row1 = mysql_fetch_row($result);$i++;
		  echo"<li>";
		  
			  echo "<span class = h1><a href = 'http://dx.doi.org/".$row[5]."'>$row[0]</a></span><br>";
			  echo "Author: ";
			  while ($row[0] == $row1[0])
			  {
				  echo"<a href = 'mailto:".$row[6]."@cse.iitk.ac.in'>Dr.&nbsp".$row[1]."</a>,&nbsp";
				  $row = $row1;
				  $row1 = mysql_fetch_row($result);$i++;
			  }
			  echo"<a href = 'mailto:".$row[6]."@cse.iitk.ac.in'>Dr.&nbsp".$row[1]."</a><br>";
			  echo "Area: ".$row[3]."<br>";
			  echo "<b>".$row[4].",&nbsp".$row[7]."</b>";
			  if(is_null($row[2]))
				  echo"<br>";
			  else
			  {
				  echo"&nbsp - &nbsp[".$row[2]."]<br>";
			  }
			  //$citedby = mysql_fetch_array(mysql_query("SELECT ToPId, count( FromPId ) AS CitedBy FROM  Cites WHERE  ToPId = '$row[8]' GROUP BY ToPId",$db));
			  $cite = $row[9];
			  echo"<a href='citedby.php?pid=".$row[8]."'>Cited by: ".$cite."</a>";
			  echo "&nbsp&nbsp";
			  $urlmail = urlencode($row[6]);
			  echo"<a href='query.php?mail=".$urlmail."&amp;name=".$row[1]."'>Mail your query</a>";
			  echo"<br><br><br>";
		  
		  echo"</li>";
		  $row = $row1;
	}
	echo"</ul>";
}
echo"
						
					</div></td></tr>
				</table>
				
";			
include_once("footer.php");


?>
  



