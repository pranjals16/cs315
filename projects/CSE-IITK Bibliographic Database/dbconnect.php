<?php
function db_connect()
{
  $link=mysql_connect("localhost","root","savitree",TRUE);
  if (! $link)
  {  
      echo "Cannot connect to MySQL server. Contact administrator!<br>";
      die();
    }
  else
    {
	  //mysql_select_db('DBLP', $link);
	  //$sql=mysql_query("SELECT * FROM Author");
	  //while ($row = mysql_fetch_row($sql))
	  //{
		  //echo $row[0]."&nbsp".$row[1]."&nbsp".$row[2]."<br>";
	  //}
      return $link;
    }
}
?>
