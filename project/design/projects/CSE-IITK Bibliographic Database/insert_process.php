<?php
session_start();
include_once("header.php");

if(!isset($_SESSION['id']))
{
	echo"<script type='text/javascript'>alert('User not logged in!');</script>";
	die();
}

else
{
	if(!($_SESSION['id']=="adityah" || $_SESSION['id']=="akar"))
	{
		echo"<script type='text/javascript'>alert('User does not have rights to insert into the database. Please contact the administrators.');</script>";
		die();
	}
	
}

 echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";
include_once("dbconnect.php");

if (isset($_POST['submit']))
{
	$title = $_POST['title'];
	$author = $_POST['author'];
	$publication = $_POST['publication'];
	$venue = $_POST['venue'];
	$year = $_POST['year'];
	$research = $_POST['research'];
	$keywords = $_POST['keywords'];
	$DOI = $_POST['DOI'];
	$author_des = $_POST['author_des'];
	$authmail = $_POST['authmail'];
	
}

else
{
	echo "<div align = 'center' class = h3>Cannot access this page directly!</align>";
	die();
}

$db = db_connect();
@mysql_select_db("DBLP",$db) or die("Unable to select database");

$paperinsert = mysql_query("INSERT INTO Paper (PTitle,DOI) VALUES ('$title','$DOI')",$db) ;

$row = mysql_fetch_array(mysql_query("SELECT PId from Paper where PTitle = '$title'",$db));
$pid = $row[0];

//echo $title.$author.$authmail.$publication.$venue.$year.$DOI.$research;

$authlookup = mysql_query("SELECT AuthId from Author where AuthMail = '$authmail'",$db)or die("Error inserting into database");;
if(mysql_num_rows($authlookup)==0)
{
	mysql_query("INSERT INTO Author (AuthName,Designation,AuthMail) VALUES ('$author','$author_des','$authmail')",$db) or die("Error inserting into database");
	echo "NEW Author Added!<br>";
	$row1 = mysql_fetch_array(mysql_query("SELECT AuthId from Author where AuthMail = '$authmail'",$db));
	$authid = $row1[0];
}
else {
		$row3 = mysql_fetch_array($authlookup);
		$authid = $row3[0];
	}

$conflookup = mysql_query("SELECT CId from Conference where CName ='$publication'",$db)or die("Error inserting into database");;
if(mysql_num_rows($conflookup)==0)
{
	$confinsert = mysql_query("INSERT INTO Conference (CName,Venue,Year) VALUES ('$publication','$venue','$year')",$db) or die("Error inserting into database");
	$row2 = mysql_fetch_array(mysql_query("SELECT CId from Conference where CName = '$publication'",$db));
	$confid = $row2[0];
	echo "NEW Conference Added!<br>";
	
}
else {
		$row4 = mysql_fetch_array($conflookup);
		$confid = $row4[0];
	}

mysql_query("INSERT INTO Auth (PId,AuthId) VALUES ('$pid','$authid')",$db) or die("Error inserting into database");
mysql_query("INSERT INTO BelongsTo (PId,RId) VALUES ('$pid','$research')",$db) or die("Error inserting into database");
mysql_query("INSERT INTO Keyword (PId,Word) VALUES ('$pid','$keywords')",$db) or die("Error inserting into database");
mysql_query("INSERT INTO PublishedIn (PId,CId) VALUES ('$pid','$confid')",$db) or die("Error inserting into database");

echo"Data Successfully Inserted<br><br>";
echo"|&nbsp<a href = 'insert.php'>Contribute&nbsp</a>|<a href = 'search.php'>&nbspSimple Search</a>&nbsp|&nbsp<a href='adv_search.php>Advanced Search</a>&nbsp|&nbsp<a href = 'logout.php'>Logout&nbsp</a>|</table>";
