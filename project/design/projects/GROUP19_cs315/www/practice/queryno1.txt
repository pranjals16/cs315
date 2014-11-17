  $query = 'select members.login, members.passwd
	                 from members
									 where members.login = members.login'; 
	
	$result = mysql_query($query);
	 
	 while ($row = mysql_fetch_array($result)) 
	 {
	   	 echo '<h2>'.$row['login'].'</h2>';
	     echo $row['passwd'].'<br/>';
			
	 }