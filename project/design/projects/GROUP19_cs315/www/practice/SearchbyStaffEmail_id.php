
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
  
  $email_id=$_POST["email_id"];
  

  $errormessage = "";

 //$sql="SELECT * FROM staff_phone_number  WHERE staff_phone_number.email_id='$email_id' ";

//WHERE staff_phone_number.email_id='$email_id' 
		//and staff.email_id =  '$email_id' 
  //faculty_fullname_email.email_id = '$email_id' ";

$sql="SELECT staff.office_address , staff.department, faculty_fullname_email.full_name, staff.email_id, staff.title,
  staff_phone_number.number_type,staff_phone_number.phone_number
FROM staff,  faculty_fullname_email LEFT JOIN staff_phone_number ON staff_phone_number.email_id = faculty_fullname_email.email_id
WHERE faculty_fullname_email.email_id = '$email_id' 
and faculty_fullname_email.email_id = staff.email_id";
 
   $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
 $i=0;
 $primKey="";
  while($row = mysql_fetch_array($result))
	{
	if ($primKey!=$row[3]){
			echo "<br>-----------------------------------------------------------------------<br>";
			echo ++$i.".<br>";
			echo "Name : ".$row[2];
			
			echo "<br>Title : ".$row[4];
		
			echo "<br>Department : ".$row[1];
			
			//echo "<br>Email-ID : ".$row[3];
			echo "<br>Email-ID : <a href=\"mailto: ".$row[3]."@iitk.ac.in\">".$row[3]."@iitk.ac.in</a>";
			
			echo "<br>Office Address : ".$row[0];
			}
			if ( !is_null($row[5])){
				echo "<br>".$row[5]." phone no : ".$row[6];
			}
			
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
  
 //////////////////////////////////////////////////// 
  mysql_close($link);
?>
</body>
</HTML>