
<html>
<body background="yellow_paper.gif"> 
<?php
  
  //Connect to mysql server
	$link = mysql_connect("localhost", "deepak", "iw2fmyw1");
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	//echo "connedted to db!";
	
	//Select database
	$db = mysql_select_db("my_db", $link);
	if(!$db) {
		die("Unable to select database");
	}
  if(isset($_POST["numitems"])){
  $designation=$_POST["numitems"];
  

  $errormessage = "";



$sql="SELECT designation.desig,designation.name,designation.office_number,designation.home_number
FROM   designation
WHERE designation.desig like '%$designation%'";
 

 $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
 $i=0;
 $primKey="";
  while($row = mysql_fetch_array($result))
	{
	if ($primKey!=$row[3]){
			echo "<br>-----------------------------------------------------------------------<br>";
			echo ++$i.".<br>";
			echo "Designation : ".$row[0];
			
			echo "<br>Name : ".$row[1];
		
			echo "<br>Office Number : ".$row[2];
			
			echo "<br>House Phone Number : ".$row[3];
			}
		/*	if ( !is_null($row[5])){
				echo "<br>".$row[5]." phone no : ".$row[6];
			}
			*/
			$primKey=$row[3];
		
		//print_r("<br>");
	//echo $row['email_id'];
    //echo $row['mob_number'];
		
	}
	if ($i==0){
		echo "No result matching this query";
	}
 /* $sql="SELECT staff_phone_number.phone_number,      
		staff_phone_number.number_type
		
FROM faculty_fullname_email, 
	staff_phone_number
	
WHERE faculty_fullname_email.full_name like '%$name%'  
		and faculty_fullname_email.email_id = staff_phone_number.email_id";
  
  
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  echo $result;
  while($row = mysql_fetch_array($result))
	{
		print_r($row);
	//echo $row['email_id'];
    //echo $row['mob_number'];

	}
 */
  }
 //////////////////////////////////////////////////// 
  mysql_close($link);
?>
</body>
</html>