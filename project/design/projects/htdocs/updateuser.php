<?php
session_start();
?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	echo "<form action=\"chngpsswd.php\" method=\"post\">";
	echo "Enter Old Password : <input type=\"password\" name=\"oldpsswd\"/><br>";
	echo "Enter New Password : <input type=\"password\" name=\"newpsswd\"/><br>";
	echo "<input type=\"submit\" value=\"Submit\"/>";
	echo "</form>";
	echo "<a href=\"userpage.php\">Click Here To Go To User Home</a>";
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
