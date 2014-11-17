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
    $delete_mob_no = clean($_POST['delete_mob_no']);

	//Input Validations
	if($delete_mob_no =='') {
		$errmsg_arr[] = 'Enter number please';
		$errflag = true;
		}
	$email_id=$_SESSION['SESS_EMAIL_ID'];
	 // $_SESSION['SESS_LOGIN']
	 
	  // $errormessage = "session not maintain please login again";
	
	
	
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: member-index.php");
		exit();
	}

	//Create DELETE query
	//$qry ="DELETE FROM  student_mobile WHERE student_mobile.mob_number = $delete_mob_no AND student_mobile.email_id = $email_id";
	//$qry ="DELETE FROM  student_mobile WHERE student_mobile.email_id = '$email_id' ";
   	 // $qry ="DELETE FROM  student_mobile WHERE student_mobile.mob_number = '$delete_mob_no' ";
	
	
	
	$qry1 ="SELECT * FROM  student_mobile
	WHERE student_mobile.email_id = '$email_id'
	    and student_mobile.mob_number = '$delete_mob_no' ";
	
	
	$qry2 ="DELETE FROM  student_mobile
	WHERE student_mobile.email_id = '$email_id'
	    and student_mobile.mob_number = '$delete_mob_no' ";
	
	
	 $result1 = @mysql_query($qry1);
	 
	 $result2 = @mysql_query($qry2)  ;

	 
	 while($row = mysql_fetch_array($result1))
	{
		if ( !is_null($row[0])){
			//echo "QFWEFWF";
			header("location: update-success-student.php");
	        exit();
			}	
	}		
			
	header("location: member-index.php");		
			
    
	
?>