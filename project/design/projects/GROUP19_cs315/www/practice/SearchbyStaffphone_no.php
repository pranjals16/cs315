
<HTML>
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
  
  $phone_no=$_POST["phone_no"];
  

  $errormessage = "";

 //$sql="SELECT * FROM staff_phone_number  WHERE staff_phone_number.phone_number='$phone_no'";
  
  
$sql="SELECT staff_phone_number.phone_number, 
		staff_phone_number.email_id, 
		staff_phone_number.number_type, 
		faculty_fullname_email.full_name, 
		staff.department,
		staff.title,
		staff.office_address

FROM staff_phone_number, staff, faculty_fullname_email

WHERE staff_phone_number.phone_number='$phone_no' 
		and staff_phone_number.email_id =  staff.email_id  
		and faculty_fullname_email.email_id = staff_phone_number.email_id";
  
  
  
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
  $i=0;
  while($row = mysql_fetch_array($result))
	{
			echo ++$i.".<br>";
			echo "Name : ".$row[3];
			echo "<br> Title : ".$row[5];
			echo "<br>Department : ".$row[4];
			echo "<br>Office_address :".$row[6];
			//echo "<br>Email-ID: ".$row[1];
			
			echo "<br>Email-ID : <a href=\"mailto: ".$row[1]."@iitk.ac.in\">".$row[1]."@iitk.ac.in</a>";
			
			echo "<br>".$row[2]." phone no : ".$row[0];
			
			
			
			echo "<br>-----------------------------------------------------------------------<br>";
		
		
		//print_r("<br>");
	//echo $row['email_id'];
    //echo $row['mob_number'];
		
	}
 if ($i==0){
		echo "No result matching this query";
	}
  
  
  mysql_close($link);
?>
</body>
</HTML>