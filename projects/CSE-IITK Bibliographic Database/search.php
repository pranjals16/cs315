
<?php
@session_start();
include_once("header.php");
echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";


if(!isset($_SESSION['id']))
{
	echo"<script type='text/javascript'>alert('User not logged in!');</script>";
	die();
}

if(isset($_SESSION['query_torefine']))
{
	unset($_SESSION['query_torefine']);
}

  
  //echo"<span class = 'h1' align = 'center'>CSE-IITK Research Paper Database</span> ";
  echo "<form action='search_process_temp.php' method='post' >";
  echo "
	<span class='h1' align='center'>Welcome to the CSE-IITK Research Paper Database</span>
	<br><br>
	".
	"Search for: <input type='text' name='search'  size = 60><br/>".
    "<class='ntext' colspan='2' align='center'><input type='submit' name='submit' value='Search'>".
    "<input type = 'reset'><br/><br/>".
    "|&nbsp<a href = 'insert.php'>Contribute&nbsp</a>|<a href = 'adv_search.php'>&nbspAdvanced Search</a>&nbsp|&nbsp<a href = 'logout.php'>Logout&nbsp</a>|</td>".
    "</form><br><br>
   
";
	


?>
  

