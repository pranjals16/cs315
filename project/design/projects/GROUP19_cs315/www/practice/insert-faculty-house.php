<html>

<head></head>
<body bgColor="#E0FFFF"> 

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
	$insert_house_no = clean($_POST['insert_house_no']);

	
	$email_id=$_SESSION['SESS_EMAIL_ID'];
	 // $_SESSION['SESS_LOGIN']
	 
	   $errormessage = "session not maintain please login again";
	 

	//Input Validations
	if($insert_house_no == '') {
		$errmsg_arr[] = 'Please first enter your phone number';
		$errflag = true;
	}
	

	
	
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: member-index-faculty.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO staff_phone_number(email_id, phone_number,number_type) VALUES('$email_id','$insert_house_no','house')";
	$result = @mysql_query($qry);

	//Check whether the query was successful or not
	if($result) {   
		header("location: update-success-faculty.php");
		exit();
	}else {
		die("Invalid Query ...Go Back");
	}
?>


</body>

</html>