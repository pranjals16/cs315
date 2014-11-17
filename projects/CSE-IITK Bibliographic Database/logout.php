<?php
session_start();
include_once("header.php");
echo"<table>
	 <tr><td width='1000' align='center' valign='top' class='ntext'>";
session_unset();

if (ini_get("session.use_cookies")) 
{
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
echo"<span class= h2>Thank you for using our database.</span><br>";
echo"<a href = 'index.php'>Home</a>";

echo"
					</td></tr>
				</table>
";	
