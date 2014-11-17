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
  
  $name=$_POST["name"];
  

  $errormessage = "";

//$sql="SELECT * FROM student_rollno  WHERE roll_number='$roll_no'";
  /////////////////////////////////////////////
 
  $sql="SELECT student.batch, student.department, fullname_email.full_name,student.email_id,student.roll_no,student_mobile.mob_number
FROM student,  fullname_email LEFT JOIN student_mobile ON fullname_email.email_id = student_mobile.email_id
WHERE fullname_email.full_name like '%$name%' 
and fullname_email.email_id = student.email_id 
";
 
  $result = mysql_query($sql, $link)  or exit('$sql failed: '.mysql_error()); 
 /*
   $sql2="SELECT student_mobile.mob_number,fullname_email.email_id
FROM fullname_email, 
	student_mobile
	
WHERE fullname_email.full_name like '%$name%'  and fullname_email.email_id = student_mobile.email_id";
  $result2 = mysql_query($sql2, $link)  or exit('$sql failed: '.mysql_error()); 
  
  $sql3="SELECT $result.batch, $result.department, $result.full_name,$result.email_id,$result.roll_no,$result2.mob_number
  FROM $result LEFT JOIN $result2 ON $result2.email_id = $result.email_id";
  
  
   $result3 = mysql_query($sql3, $link)  or exit('$sql failed: '.mysql_error()); 
   
   */
  
  
  
  //echo $result;*/
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
			
			
	//		if (!is_null()){
		//		echo $row2;
		//	}
		///*	
		//print_r("<br>");
	//echo $row['email_id'];
    //echo $row['mob_number'];
		
	}
	if ($i==0){
		echo "No result matching this query";
	}
 /*
  $j=0;
  while($row2 = mysql_fetch_array($result2))
	{
			echo $row2;
			/*echo "Name : ".$row[2];
			
			echo "<br>Roll No : ".$row[4];
		
			echo "<br>Department : ".$row[1];
			
			echo "<br>Email-ID : ".$row[3];
			*/
			//echo "<br>-----------------------------------------------------------------------<br>";
	
		
		//print_r("<br>");
	//echo $row['email_id'];
    //echo $row['mob_number'];
		
	//}*/
  
 //////////////////////////////////////////////////// 
  mysql_close($link);
?>
</body>
</HTML>