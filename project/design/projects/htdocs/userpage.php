<?php
session_start();
?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	echo "<a href=\"updateuser.php\">Change Account Information</a><br>";
	echo "<a href=\"newreserv.php\">Make a new Reservation</a><br>";
	echo "<a href=\"viewreserv.php\">View Existing \ Previous Reservations</a><br>";
	echo "<a href=\"logout.php\">Logout</a><br>";
	echo "<a href=\"dereg.php\">De-Register</a>";
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
