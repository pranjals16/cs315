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
	$login = clean($_POST['login']);
	
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	
		
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members1 WHERE email_id='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) < 0) {
				$errmsg_arr[] = 'Login ID does not exist';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed 1");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: member-index-admin.php");
		exit();
	}
    $qry5="SELECT * FROM staff WHERE staff.email_id= '$login'";
	//Create INSERT query
	$qry1 = "DELETE FROM members1 WHERE members1.email_id= '$login'";
	$qry2 = "DELETE FROM staff WHERE staff.email_id= '$login'";
	$qry3 = "DELETE FROM staff_phone_number WHERE staff_phone_number.email_id= '$login'";
	$qry4 = "DELETE FROM faculty_fullname_email WHERE staff_phone_number.email_id= '$login'";
	$result1 = @mysql_query($qry1);
	$result2 = @mysql_query($qry2);
	$result3 = @mysql_query($qry3);
	$result4 = @mysql_query($qry4);
	$result5 = @mysql_query($qry5);

	
	
 while($row = mysql_fetch_array($result5))
	{
		if ( !is_null($row[0])){
			//echo "QFWEFWF";
			header("location: delete-success.php");
	        exit();
			}	
	}		
			
	header("location: member-index-admin.php");		
	?>