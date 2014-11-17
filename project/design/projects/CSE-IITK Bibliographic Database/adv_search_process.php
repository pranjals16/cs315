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
	$article_all = $_POST['article_all'];
	$article_union = $_POST['article_union'];
	$article_notin = $_POST['article_notin'];
	$author = $_POST['author'];
	$publication = $_POST['publication'];
	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];
	$research = $_POST['research'];
	$keywords = $_POST['keywords'];
}

else
{
	echo "<div align = 'center' class = h3>Cannot access this page directly!</align>";
	die();
}
$article_u = array();
$article_a = array();
$article_n = array();
$keyword_arr = array();
$tok = strtok($article_all, " \t;:,");
$i = 0;
while ($tok !== false) 
{
    $article_a[$i] = $tok;$i++;
    $tok = strtok(" \t;:,");
}

$tok = strtok($article_union, " \t;:,");
$i = 0;
while ($tok !== false) 
{
    $article_u[$i] = $tok;$i++;
    $tok = strtok(" \t;:,");
}

$tok = strtok($article_notin, " \t;:,");
$i = 0;
while ($tok !== false) 
{
    $article_n[$i] = $tok;$i++;
    $tok = strtok(" \t;:,");
}

$tok = strtok($keywords, " \t;:,");
$i = 0;
while ($tok !== false) 
{
    $keyword_arr[$i] = $tok;$i++;
    $tok = strtok(" \t;:,");
}

if($date2 == 0)
{
	$sql = mysql_query("SELECT MAX(YEAR) from Conference",$db);
	$date2 = mysql_result($sql,0);
}



echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";

  
  //echo"<span class = 'h1' align = 'center'>CSE-IITK Research Paper Database</span> ";
  echo "<form action='search_process_temp.php' method='post'>";
  echo 
	"Search for: <input type='text' name='search' size = 60>".
    "<class='ntext' colspan='2' align='center'><input type='submit' name='submit' value='Search'>".
    "<input type = 'reset'><br><br>".
    "</form><br><br>
";

$basic_query = "SELECT DISTINCT PTitle, AuthName, Year, RName, CName, DOI, AuthMail, Venue, PId, PRank FROM Paper natural join Auth natural join Author natural join PublishedIn natural join Conference natural join BelongsTo natural join ResearchArea natural join Keyword WHERE ";

$const_query = "";


for ($i = 0;$i<count($article_a);$i++)
{
	//echo $search_arr[$i]."<br>";
	$const_query = $const_query."PTitle LIKE '%".$article_a[$i]."%' AND ";
}

for ($i = 0;$i<count($article_n);$i++)
{
	//echo $search_arr[$i]."<br>";
	$const_query = $const_query."PTitle NOT LIKE '%".$article_n[$i]."%' AND ";
}

for ($i = 0;$i<count($article_u)-1;$i++)
{
	if ($i==0) $const_query = $const_query." ( ";
	$const_query = $const_query."PTitle LIKE '%".$article_u[$i]."%' OR ";
}
if(count($article_u)>0)
{
	if(count($article_u)==1)
	$const_query = $const_query."(PTitle LIKE '%".$article_u[count($article_u)-1]."%') AND ";
	else
	$const_query = $const_query."PTitle LIKE '%".$article_u[count($article_u)-1]."%') AND ";
}


for ($i = 0;$i<count($keyword_arr)-1;$i++)
{
	if ($i==0) $const_query = $const_query." ( ";
	$const_query = $const_query."Word LIKE '%".$keyword_arr[$i]."%' OR ";
}
if(count($keyword_arr))
{	
	if(count($keyword_arr)==1)
	$const_query = $const_query."(Word LIKE '%".$keyword_arr[count($keyword_arr)-1]."%') AND ";
	else
	$const_query = $const_query."Word LIKE '%".$keyword_arr[count($keyword_arr)-1]."%') AND ";
}
if($author != "")
{
	$const_query = $const_query."AuthName LIKE '%".$author."%' AND ";
}

if($publication != "")
{
	$const_query = $const_query."CName LIKE '%".$publication."%' AND ";
}

$const_query = $const_query."Year BETWEEN ".$date1." AND ".$date2." ";
$end_query  = " GROUP BY PTitle, AuthName ORDER BY PRank desc,PTitle,AuthName ";
$_SESSION['query_torefine'] = $basic_query.$const_query;
//echo $basic_query.$const_query.$end_query."<br>";
echo "<span class = h1>Results</span><br><br>";
$result = mysql_query($basic_query.$const_query.$end_query);

// Refine by Author
echo "<table align = 'center'><tr><td width = 400>";
echo " <form name='input' action='search_refine.php' method='post'>";
$result_auth = mysql_query($basic_query.$const_query." GROUP BY AuthName");
echo "Refine by author:&nbsp&nbsp<select name = 'authors'>
<option value = 'default'>Select an Author</option>";
	
	while($row = mysql_fetch_assoc($result_auth))
	{
		echo"<option value = '".$row['AuthName']."' >".$row['AuthName']."</option>";
	}
	echo"</select></td>";

// Refine by Reseach Area	
$result_area = mysql_query($basic_query.$const_query." GROUP BY RName");
echo "<td width = 400>Refine by Area:&nbsp&nbsp<select name = 'areas'>
<option value = 'default'>Select a Research Area</option>";
	
	while($row = mysql_fetch_assoc($result_area))
	{
		echo"<option value = '".$row['RName']."' >".$row['RName']."</option>";
	}
	echo"</select></td>";	


	
echo"<td><input type='submit' name='submit' value='Submit'></td></tr></table></form><br>";
echo"<div align = 'left'>";
if(@mysql_num_rows($result)>0)
{
	echo"<ul align = 'left'>";
	$row = mysql_fetch_row($result);
	$i=0;
	while($i<mysql_num_rows($result))
	{
		  $row1 = mysql_fetch_row($result);$i++;
		  echo"<li>";
		  //if(is_null($row[5]) == FALSE)
		  //{
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
			 
		  //}
		  echo"</li>";
		  $row = $row1;
	}
	echo"</ul>";
}
echo"
						
					</td></tr>
				</table>
				
";			
include_once("footer.php");


?>
  


