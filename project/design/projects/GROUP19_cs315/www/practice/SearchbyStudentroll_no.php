
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
  
  $roll_no=$_POST["roll_no"];
  

  $errormessage = "";

//$sql="SELECT * FROM student_rollno  WHERE roll_number='$roll_no'";
  /////////////////////////////////////////////
 
 $sql="SELECT student.batch, student.department,   fullname_email.full_name,student.email_id,student.roll_no,student_mobile.mob_number
FROM student,  fullname_email LEFT JOIN student_mobile ON student_mobile.email_id = fullname_email.email_id
WHERE student.roll_no like '%$roll_no%' 
and fullname_email.email_id = student.email_id";
 
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
 $i=0;
  $primKey="";
  while($row = mysql_fetch_array($result))
	{
		
		if ($primKey!=$row[3]){
			echo "<br>-----------------------------------------------------------------------<br>";
		//print_r($row);
			echo ++$i.".<br>";
			echo "Name : ".$row[2];
			echo "<br>Batch: ".$row[0];
			echo "<br>Roll No : ".$row[4];
		
			echo "<br>Department : ".$row[1];
			
			//echo "<br>Email-ID : ".$row[3];
			echo "<br>Email-ID : <a href=\"mailto: ".$row[3]."@iitk.ac.in\">".$row[3]."@iitk.ac.in</a>";
			
		}
			if ( !is_null($row[5])){
				echo "<br>Mobile No : ".$row[5];
			}
			$primKey=$row[3];
	}
	if ($i==0){
		echo "No result matching this query";
	}
	/*
  $sql="SELECT student_mobile.mob_number
FROM student_mobile, student
WHERE student.roll_no like '%$roll_no%'  and student.email_id = student_mobile.email_id";
  
  
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
  //echo $result;
 $i=0;
  while($row = mysql_fetch_array($result))
	{
			echo ++$i.".<br>";
			echo "Name : ".$row[2];
			
			echo "<br>Roll No : ".$row[4];
		
			echo "<br>Department : ".$row[1];
			
			echo "<br>Email-ID : ".$row[3];
			
			echo "<br>-----------------------------------------------------------------------<br>";
		
		
		//print_r("<br>");
	//echo $row['email_id'];
    //echo $row['mob_number'];
		
	}
  */
 //////////////////////////////////////////////////// 
  mysql_close($link);
?>
</body>
</HTML>