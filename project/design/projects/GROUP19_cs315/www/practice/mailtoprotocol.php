$email=$_POST['email'];
$email=mysql_real_escape_string($email);
$status = "OK";
$msg="";
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
// You can supress the error message by un commenting the above line
if (!stristr($email,"@") OR !stristr($email,".")) {
$msg="Your email address is not correct<BR>";
$status= "NOTOK";}


echo "<br><br>";
if($status=="OK"){ // validation passed now we will check the tables
$query="SELECT email,userid,password FROM plus_signup WHERE plus_signup.email = '$email'";
$st=mysql_query($query);
$recs=mysql_num_rows($st);
$row=mysql_fetch_object($st);
$em=$row->email;// email is stored to a variable
if ($recs == 0) { // No records returned, so no email address in our table
// let us show the error message
echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br> Sorry Your address is not there in our database . You can signup and login to use our site. <BR><BR><a href='signup.php'> Sign UP </a> </center>";
exit;}

// formating the mail posting
// headers here
$headers4="admin@sitename.com"; // Change this address within quotes to your address
$headers.="Reply-to: $headers4\n";
$headers .= "From: $headers4\n";
$headers .= "Errors-to: $headers4\n";
//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;
// for html mail un-comment the above line

// mail funciton will return true if it is successful
if(mail("$em","Your Request for login details","This is in response to your request for login detailst at site_name \n \nLogin ID: $row->userid \n Password: $row->password \n\n Thank You \n \n siteadmin","$headers")){echo "<center><font face='Verdana' size='2' ><b>THANK YOU</b> <br>Your password is posted to your emil address . Please check your mail after some time. </center>";}

else{// there is a system problem in sending mail
echo " <center><font face='Verdana' size='2' color=red >There is some system problem in sending login details to your address. Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";}

}
else {// Validation failed so show the error message
echo "<center><font face='Verdana' size='2' color=red >$msg <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center></font>";}