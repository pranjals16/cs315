

<HTML>
<body background="yellow_paper.gif"> 

<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$update_office_address = clean($_POST['update_office_address']);

	
	$email_id=$_SESSION['SESS_EMAIL_ID'];
	 // $_SESSION['SESS_LOGIN']
	 
	   $errormessage = "session not maintain please login again";
	 

	//Input Validations
	if($update_office_address == '') {
		$errmsg_arr[] = 'Please first enter your office address';
		$errflag = true;
	}
	

	
	
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: member-index-faculty.php");
		exit();
	}

	
	
	
	
	
	//Create UPDATE query
	$qry2 ="UPDATE staff
	SET office_address = '$update_office_address'
	WHERE email_id = '$email_id' ";
	 $result2 = @mysql_query($qry2);
	$qry1 ="SELECT * FROM  staff
	WHERE staff.email_id = '$email_id'
	and staff.office_address = '$update_office_address ";
	
	 $result1 = @mysql_query($qry1);
	
	

	 
	 while($row = mysql_fetch_array($result1))
	{
		if ( !is_null($row[0])){
			//echo "check";
			header("location: update-success-faculty.php");
	        exit();
			}	
	}		
			
	header("location: member-index-faculty.php");		
			
    
	
?>

</body>
</HTML>