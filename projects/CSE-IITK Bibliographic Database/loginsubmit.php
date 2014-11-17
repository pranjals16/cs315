<?php
session_start();
$id=$_POST['id'];
$pass=($_POST['pass']);
include_once("header.php");
//	$query = 'SELECT * FROM user WHERE loginid="'.$login.'"';
//	$query = mysql_query ("SELECT * from login WHERE id='$id' ",$db);
//	$num_rows = mysql_num_rows($query);
	if (@ftp_login(@ftp_connect("vyom.cc.iitk.ac.in"), $id, $pass))
	{
		if (array_key_exists('id', $_SESSION) && $_SESSION['id'] == $id) 
		{
			echo"<script type='text/javascript'>alert('User already logged in!');</script>";
			include_once("search.php");
			//Header( "Location: search.php" );
		}

		else
		{
			session_destroy();
			session_start();
			$_SESSION['id'] = $id;
			include_once("search.php");
			//Header( "Location: search.php" );
		}
		
	}
	else 
	{
		echo"Invalid username or password";
		session_destroy();
		die();
	}
		
	//$line = mysql_fetch_row($query);
	//echo $line[0];
	//$line[1]=trim($line[1]);
/*	if($line[1]== crypt($pass,$line[1]) ) 

	{
}
else
{
	echo "invalid username or password";
	//echo $pass;
	echo "<br>";
	echo $id;
	die();
}
*/
?>
