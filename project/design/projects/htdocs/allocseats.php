<?php
session_start();
?>
<html>
<body>
<?php

      if(isset($_SESSION['authorized']))
      {
	  $seats = $_POST[seatno];
	  $seats_alloc = count($seats,0);
	  if($_POST[pass_confirm]!=$seats_alloc)
	  {
	    echo "Incorrect Number Of Seats Chosen";
	  }
	  else
	  {
	    $_SESSION[trainnum] = $_POST[trainnum];
	    $_SESSION[pass_confirm] = $_POST[pass_confirm];
	    $_SESSION[pass_waiting] = $_POST[pass_waiting];
	    $_SESSION[coachtype] = $_POST[coachtype];
	    if($seats_alloc==1)
	    {
	      $_SESSION[seat_0]=$seats[0];
	    }
	    else if($seats_alloc==2)
	    {
	      $_SESSION[seat_0]=$seats[0];
	      $_SESSION[seat_1]=$seats[1];
	    }
	    else
	    {
	      $_SESSION[seat_0]=$seats[0];
	      $_SESSION[seat_1]=$seats[1];
	      $_SESSION[seat_2]=$seats[2];
	    }
	    echo "Allocating Seats";
	  }
      }
      else
      {
	echo "You Are Not Authorized To access this page";
      }

?>
</body>
</html>
