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
	$passwd = clean($_POST['passwd']);
	$name = clean($_POST['name']);
	$roll_no = clean($_POST['roll_no']);
	$department = clean($_POST['department']);
	$batch = clean($_POST['batch']);
	$mob_no = clean($_POST['mob_no']);
	//Input Validations
	$temp2 =0;
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($passwd == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($name == '') {
		$errmsg_arr[] = 'Name missing';
		$errflag = true;
	}
	if($roll_no == '') {
		$errmsg_arr[] = 'Roll No. missing';
		$errflag = true;
	}
	
	
	if($department == '') {
		$errmsg_arr[] = 'Department missing';
		$errflag = true;
	}
	if($batch == '') {
		$errmsg_arr[] = 'Batch missing';
		$errflag = true;
	}
	if($mob_no == '') {
		$errmsg_arr[] = 'Mobile No missing';
		$errflag = false;
		$temp2 =1;
	}
	
		
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members1 WHERE email_id='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
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

	//Create INSERT query
	$qry1 = "INSERT INTO members1(member_id,email_id, passwd) VALUES(100,'$login','$passwd')";
	$qry2 = "INSERT INTO student(email_id, batch, department, roll_no) VALUES('$login','$batch','$department','$roll_no')";
	if($temp2 != 1){
		$qry3 = "INSERT INTO student_mobile(email_id, mob_number) VALUES('$login','$mob_no')";
		}
	$qry4 = "INSERT INTO fullname_email(email_id,full_name) VALUES('$login','$name')";
	
	$result1 = @mysql_query($qry1);
	$result2 = @mysql_query($qry2);
	$result3 = @mysql_query($qry3);
	$result4 = @mysql_query($qry4);
	
	
	//Check whether the query was successful or not
	if($result1 && result2 && result3 && result4) {
		header("location: register-success.php");
		exit();
	}else {
		die("Query failed 2");
	}
?>