<?php
session_start();
include_once("header.php");
if(!isset($_SESSION['id']))
{
	echo"<script type='text/javascript'>alert('User not logged in!');</script>";
	die();
}

if(isset($_GET['mail']) && isset($_GET['name']))
{
	$mail = $_GET['mail'];
	$name = $_GET['name'];
}

$_SESSION['name'] = $name;
$_SESSION['mail'] = $mail;

echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";


echo"<span class = 'h1' align = 'center'>Mail your Query</span><br/> ";
echo"<div align = 'left' class = 'h2'>Please enter your query for Dr. ".$name." </div><br>";
echo"<form name = 'query' action = 'query_process.php' method = 'post'>
<textarea name='query' cols='85' rows='10'></textarea><br>

<input type = 'submit' name = 'submit' value = 'Submit'>
</form> ";

echo"</tr></td></table>";
include_once("footer.php");
 
