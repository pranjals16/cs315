<?php

  /*
	*  PHP and MYSQL
	*/
	
   $connection = mysql_connect('localhost','deepak','iw2fmyw1');
   if ($connection)
	 {
	   echo "connected to database!</br>";
	 }
	 if (!$connection)
	 {
	   die('error connecting to database server'.mysql_error());
	 } 
	 
	 if(!mysql_select_db('my_db', $connection)) 
	 {
		 die('error connecting to database'.mysql_error()); 
	 }
	 
/*	
--Step 1: Build Valid BULK INSERT Statement
DECLARE @SQL varchar(2000)
SET @SQL = "BULK INSERT Designation FROM '"C:\wamp\www\practice\Designation.txt"' WITH (FIELDTERMINATOR = '"",""', ROWTERMINATOR = '\n' ) "

--Step 2: Execute BULK INSERT statement
EXEC (@SQL)

--Step 3: INSERT data into final table
INSERT Designation (email_id,desig)
SELECT SUBSTRING(email_id,2,DATALENGTH(email_id)-1) , SUBSTRING(desig,2,DATALENGTH(desig)-1) 
FROM Designation
*/

//BULK INSERT Designation 
  //  FROM 'C:\wamp\www\practice\Designation.txt' 
  //  WITH 
  //  ( 
  //      FIELDTERMINATOR = '","', 
  //      ROWTERMINATOR = '\n' 
  //  )



	// $desig_insert = "BULK INSERT Designation FROM 'C:\wamp\www\practice\Designation.txt' WITH (FIELDTERMINATOR = '","')";



		//$select = "SELECT members.login, members.passwd";
		//$from = "FROM members";
		//$where = "WHERE members.login = deepakkg";
		//$query = '$select.$from.$where';
		  $query = 'select members.login, members.passwd
	                 from members
									 where members.login = members.login'; 

		$result = mysql_query($query);
		while($row = mysql_fetch_array($result))
		{
			 echo '<h2>'.$row['login'].'</h2>';
	     echo $row['passwd'].'<br/>';
		}
		//echo $result;
	 

	
?>
