<?php
session_start();
?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	session_destroy();
	echo "Logged Out<br>";
	echo "<a href=\"index.html\">Click Here To go back Home </a>";
      }
      else
      {
	echo "You have to Log in to Log out";
      }

?>
</body>
</html>
