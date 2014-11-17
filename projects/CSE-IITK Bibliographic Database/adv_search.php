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


  echo"<div align = 'center'><h1>Advanced Search</h1></div> <br>";
  echo"<table>
	 <tr><td width='1000' align='left' valign='top' class='ntext'>";
  echo "
  <form name='input' action='adv_search_process.php' method='post'>
<table width = 100%>
<tr ><td align = 'center'>
<table>
	
	<tr><td><span class=h2>Find in Article:</span></td><td>with all the words</td><td><input type='text' name='article_all' value = ''></td></tr>

	<tr><td></td><td>with at least one of the words</td><td><input type='text' name='article_union' value=''></td></tr>

	<tr><td></td><td>without the words</td><td><input type='text' name='article_notin' value=''></td></tr>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	<tr><td><span class=h2>Author: </span></td><td>Return articles written by</td><td><input type='text' name='author' value = ''></td></tr>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	<tr><td><span class=h2>Publication: </span></td><td>Return articles published in</td><td><input type='text' name='publication' value = ''></td></tr>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	<tr><td><span class=h2>Date: </span></td><td>Return articles published between</td><td><input type='number' name='date1' size = 4 value = 0>&nbsp-&nbsp<input type='number' name='date2' value = 0 size = 4 ></td></tr>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	<tr><td><span class=h2>Research Area: </span></td><td></td><td><input type='text' name='research' value = ''></td></tr>
	<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	<tr><td><span class=h2>Keywords: </span></td><td></td><td><input type='text' name='keywords' value = ''></td></tr>
	

</table>
  
   
";
echo"
<input type='submit' name='submit' value='Submit'>
</form>";
	
echo"<br><br>
						|&nbsp<a href = 'insert.php'>Contribute&nbsp</a>|<a href = 'search.php'>&nbspSimple Search</a>&nbsp|&nbsp<a href = 'logout.php'>Logout&nbsp</a>|
					</td></tr>
				</table></td>
				</tr>
				</table>
";	

?>
  

