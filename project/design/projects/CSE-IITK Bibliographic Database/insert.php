<script language = "Javascript">
	function validateForm()
	{
		var title=document.input.title
		var author=document.input.author
		var publication=document.input.publication
		var year=document.input.year
		var venue = document.input.venue
		var cj = document.input.cj
		var author_des = document.input.author_des
		var authmail = document.input.authmail
		if(title.value == "")
		{
			alert("Paper Title missing!");title.focus();
			return false
		}
		
		if(author.value == "")
		{
			alert("Author missing!");author.focus();
			return false
		}
		
		if (publication.value == "")
		{
			alert("Conference/Journal name missing!");publication.focus();
			return false
		}
		
		if (year.value < 1850)
		{
			alert("Year is too old!");year.focus();
			return false
		}
		var da = new Date
		
		if (year.value > da.getFullYear())
		{
			alert("Year is in the future!");year.focus();
			return false
		}
		
		if(author_des.value == "")
		{
			alert("Author designation missing!");author_des.focus();
			return false
		}
		
		if(authmail.value == "")
		{
			alert("Author EMail ID missing!");authmail.focus();
			return false
		}
		
		if (cj.value == "conf" && venue.value == "")
		{
			alert("Venue of conference required!");venue.focus();
			return false
		}
		return true
	}
</script>	
<?php
session_start();
include_once("header.php");



if(!isset($_SESSION['id']))
{
	echo"<script type='text/javascript'>alert('User not logged in!');</script>";
	die();
}

if(isset($_SESSION['query_torefine']))
{
	unset($_SESSION['query_torefine']);
}

include_once("dbconnect.php");
$db = db_connect();
@mysql_select_db("DBLP",$db) or die("Unable to select database");
$query = mysql_query("SELECT * FROM ResearchArea", $db);
  echo"<div align = 'center'><h1>Contribute to the Database</h1></div> <br>";
  echo"<table>
	 <tr><td width='1000' align='left' valign='top' class='ntext'>";
  echo "
  <form name='input' action='insert_process.php' onSubmit = 'return validateForm()' method='post'>
<table width = 100%>
<tr ><td align = 'center'>
<table>
	
	<tr><td><span class=h2>Paper Title*:</span></td><td><input type='text' name='title' value = '' size = 40></td></tr>

	<tr><td><span class=h2>Author*: </span></td><td><input type='text' name='author' value = '' size = 40></td></tr>
	
	<tr><td><span class=h2>Author Designation*: </span></td><td><input type='text' name='author_des' value = '' size = 40></td></tr>
	
	<tr><td><span class=h2>Author IITK ID*: </span></td><td><input type='text' name='authmail' value = '' size = 40></td></tr>
	
	<tr><td><span class=h2>Conference/Journal*: </span></td><td><input type='text' name='publication' value = '' size = 40></td></tr>
	<tr><td></td><td><input type = 'radio' name = 'cj' value = 'conf'>Conference&nbsp&nbsp<input type = 'radio' name = 'cj' value = 'jour'>Journal</td></tr>
	<tr><td><span class=h2>Venue (if Conference): </span></td><td><input type='text' name='venue' value = '' size = 40></td></tr>
	
	<tr><td><span class=h2>Year*: </span></td><td><input type='number' name='year' size = 4 value = 0></td></tr>
	
	<tr><td><span class=h2>Research Area*: </span></td><td>
	<select name = 'research'>
	
	";
	while($row = mysql_fetch_assoc($query))
	{
		echo"<option value = ".$row['RId']." >".$row['RName']."</option>";
	}
	echo"</select>
	</td></tr>
	
	<tr><td><span class=h2>Keywords: </span></td><td><input type='text' name='keywords' size = 40></td></tr>
	<tr><td><span class=h2>Digital Object Identifier (DOI): </span></td><td><input type='text' name='DOI' value = '' size = 40></td></tr>

</table>
  
   
";
echo"
<input type='submit' name='submit' value='Submit'>
</form>";
	
echo"<br><br>
						|&nbsp<a href = 'search.php'>Simple Search&nbsp</a>|<a href = 'adv_search.php'>&nbspAdvanced Search</a>&nbsp|&nbsp<a href = 'logout.php'>Logout&nbsp</a>|
					</td></tr>
				</table></td>
				</tr>
				</table>
";	

?>
  

