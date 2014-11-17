
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

 //$sql="SELECT * FROM student_mobile  WHERE mob_number='$phone_no'";
  
  
$sql="SELECT student.batch,
		student.department, 
		student_mobile.mob_number, 
		student_mobile.email_id,
		fullname_email.full_name, 
		student.roll_no
FROM student, student_mobile, fullname_email
WHERE student_mobile.mob_number='$phone_no' 
		and student.email_id =  student_mobile.email_id
		and fullname_email.email_id = student.email_id";
  
  
  
  
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
  $i=0;
  while($row = mysql_fetch_array($result))
	{
			echo ++$i.".<br>";
			echo "Name : ".$row[4];
			
			echo "<br>Batch: ".$row[0];
			
			echo "<br>Roll No.: ".$row[5];
			
			echo "<br>Department : ".$row[1];
			
			//echo "<br>Email-ID : ".$row[3];
			echo "<br>Email-ID : <a href=\"mailto: ".$row[3]."@iitk.ac.in\">".$row[3]."@iitk.ac.in</a>";
			
			echo "<br>Mobile  No : ".$row[2];
			
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