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
	$title = clean($_POST['title']);
	$department = clean($_POST['department']);
	$office_no = clean($_POST['office_no']);
	$house_no = clean($_POST['house_no']);
	$office_address = clean($_POST['office_address']);
	$twmp1=0;
	$twmp2=0;
	//Input Validations
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
	if($title == '') {
		$errmsg_arr[] = 'Title missing';
		$errflag = true;
	}
	if($department == '') {
		$errmsg_arr[] = 'Department missing';
		$errflag = true;
	}
	if($office_no == '') {
		$errmsg_arr[] = 'Office Phone Number missing';
		$errflag = false;
		$twmp1=1;
	}
	if($house_no == '') {
		$errmsg_arr[] = 'House Phone Number missing';
		$errflag = false;
		$twmp2=1;
	}
	if($office_address == '') {
		$errmsg_arr[] = 'Office Address missing';
		$errflag = true;
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
	$qry1 = "INSERT INTO members1(member_id,email_id, passwd) VALUES(50,'$login','$passwd')";
	$qry2 = "INSERT INTO staff(email_id, department,title, office_address) VALUES('$login','$department','$title','$office_address')";
	if($twmp1 !=1){
		$qry3 = "INSERT INTO staff_phone_number(email_id, phone_number,number_type) VALUES('$login','$office_no','office')";
		}
	if($twmp2 !=1){
		$qry4 = "INSERT INTO staff_phone_number(email_id, phone_number,number_type) VALUES('$login','$house_no','house')";
		}
	$qry5 = "INSERT INTO faculty_fullname_email(email_id,full_name) VALUES('$login','$name')";
	$result1 = @mysql_query($qry1);
	$result2 = @mysql_query($qry2);
	$result3 = @mysql_query($qry3);
	$result4 = @mysql_query($qry4);
	$result5 = @mysql_query($qry5);
	
	
	//Check whether the query was successful or not
	if($result1 && result2 && result3 && result4 && result5) {
		header("location: register-success.php");
		exit();
	}else {
		die("Query failed 2");
	}
?>