<script language = "Javascript">
	function validateForm()
	{
		var authors=document.input.authors
		var areas = document.input.areas
		if(authors.value == "default" && areas.value == "default")
		{
			alert("Empty query!");authors.focus();
			return false
		}
	}
	

	
	</script>

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
	$search = $_POST['search'];
}

else
{
	echo "<div align = 'center' class = h3>Cannot access this page directly!</align>";
	die();
}
$search_arr = array();
$tok = strtok($search, " \t;:,");
$i = 0;
while ($tok !== false) 
{
    $search_arr[$i] = $tok;$i++;
    $tok = strtok(" \t;:,");
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

$basic_query = "SELECT DISTINCT PTitle, AuthName, Year, RName, CName, DOI, AuthMail, Venue , PId, PRank FROM Paper natural join Auth natural join Author natural join PublishedIn natural join Conference natural join BelongsTo natural join ResearchArea natural join Keyword WHERE ";

$const_query = "(";
$auth_query = "";
$rname_query = "";

for ($i = 0;$i<count($search_arr)-1;$i++)
{
	//echo $search_arr[$i]."<br>";
	$const_query = $const_query."PTitle LIKE '%".$search_arr[$i]."%' OR CName LIKE '%".$search_arr[$i]."%' OR Word LIKE '%".$search_arr[$i]."%' OR ";
	
	$auth_query = $auth_query." OR AuthName LIKE '%".$search_arr[$i]."%' ";
	$rname_query = $rname_query." OR RName LIKE '%".$search_arr[$i]."%' ";
}

if (count($search_arr)>0)
{
	$const_query = $const_query."PTitle LIKE '%".$search_arr[count($search_arr)-1]."%' OR CName LIKE '%".$search_arr[count($search_arr)-1]."%' OR Word LIKE '%".$search_arr[count($search_arr)-1]."%' ";
	$auth_query = $auth_query." OR AuthName LIKE '%".$search_arr[count($search_arr)-1]."%' ";
	$rname_query = $rname_query." OR RName LIKE '%".$search_arr[count($search_arr)-1]."%' ";
}

$end_query = "GROUP BY PTitle, AuthName ORDER BY PRank desc,PTitle,AuthName";


/*
$query = "SELECT DISTINCT PTitle, AuthName, Year, RName, CName, DOI, AuthMail FROM Paper natural join Auth natural join Author natural join PublishedIn natural join Conference natural join BelongsTo natural join ResearchArea natural join Keyword WHERE PTitle LIKE '%".$search."%' OR AuthName LIKE '%".$search."%' OR CName LIKE '%".$search."%' OR RName LIKE '%".$search."%' OR Word LIKE '%".$search."%'";
*/
//echo$basic_query.$const_query.$auth_query.$rname_query.$end_query;

echo "<span class = h1>Results for \"<i>".$search."</i>\"</span><br><br>";
$result = mysql_query($basic_query.$const_query.")".$auth_query.$rname_query.$end_query);

// Refine by Author
echo "<table align = 'center'><tr><td width = 400>";
echo " <form name='input' action='search_refine.php' method='post' onSubmit = 'return validateForm()'>";
$result_auth = mysql_query($basic_query.$const_query.")".$auth_query.$rname_query." GROUP BY AuthName");
echo "Refine by author:&nbsp&nbsp<select name = 'authors'>";
echo"<option value = 'default'>Select an Author</option>";	
	while($row = mysql_fetch_assoc($result_auth))
	{
		echo"<option value = '".$row['AuthName']."' >".$row['AuthName']."</option>";
	}
	echo"</select></td>";

// Refine by Reseach Area	
$result_area = mysql_query($basic_query.$const_query.")".$auth_query.$rname_query." GROUP BY RName");
echo "<td width = 400>Refine by Area:&nbsp&nbsp<select name = 'areas'>";
echo"<option value = 'default'>Select a Research Area</option>";		
	while($row = mysql_fetch_assoc($result_area))
	{
		echo"<option value = '".$row['RName']."' >".$row['RName']."</option>";
	}
	echo"</select></td>";	

	
echo"<td><input type='submit' name='submit' value='Submit'></td></tr></table></form><br>";
$_SESSION['query_torefine'] = $basic_query.$const_query.$auth_query.$rname_query.")";

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
						
					</div></td></tr>
				</table>
				
";			
include_once("footer.php");


?>
  


