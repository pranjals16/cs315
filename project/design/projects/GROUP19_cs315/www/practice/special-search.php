
<html>
<head>
<link REL="stylesheet" TYPE="text/css" HREF="../MainFrame.css">
<!--opens up a new pop-up window with the specified url-->
<script LANGUAGE="JavaScript">
function popUp(url,windowName)
{
	var new_window
	new_window = window.open(url,windowName,"width=550,height=350,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbar=1,scrollbars=0,resizable=1,copyhistory=0")
}
</script>
<meta http-equiv="pragma" content="no-cache">
<script>parent.menu.location.href="../menu.asp?xml=student/menu.xml";</script>
<script>
var popwindow
var popwindowwidth=600
var popwindowheight=550
var popwindowtop=20

var popwindowleft=-popwindowwidth-50
var marginright
var pagecenter


function showWindow(popwindowURL, popwindowName, multi) 
{
//	popwindow = window.open(popwindowURL, "popwindow", "toolbar=no,width="+popwindowwidth+",height="+popwindowheight+",top="+popwindowtop+",left="+(-popwindowwidth)+"");
	popwindowtop = popwindowtop*multi;
	popwindowwidth = popwindowwidth-(multi*20);
	popwindow = window.open(popwindowURL, popwindowName, "toolbar=no,width="+popwindowwidth+",height="+popwindowheight+",top="+popwindowtop+",left="+(-popwindowwidth)+"");
	if (document.all) {
		marginright = (screen.width+50)*multi;
	}
	if (document.layers) {
		marginright = (screen.width+50)*multi
	}
	pagecenter=Math.floor(marginright/2)-Math.floor(popwindowwidth/2)
}

function toggleEmail(Email)
{
	if(Email.checked)
	{
		//var answer=prompt("Enter your Email Address","someone@Somewhere.com");
		this.location.href="Default.asp?GetEmail=Y";
	}	
	else
		if(confirm("Are you sure you want to disable email notifications?"))
			 this.location.href="Default.asp?GetEmail=N";
		else
			Email.checked=true;
}		 

</script>


</head>

<body link="#004000" bgColor="#fdf5e6">
<!--during Pre-reg-->
<script> </script>

<!--during HSS
<script> showWindow('../Help/UGMessage.html'); window.open('Semester_temp.asp','CurrentSemesterTemplate', "toolbar=no,width=350,height=600,top=20,left=20");</script>
<body onLoad=" showWindow('../Help/HSSMessage.html'); ">  
<body onLoad=" showWindow('../Help/PGMessage.html'); ">
-->
<br><H3><CENTER> Welcome Mr. DEEPAK KUMAR GUPTA</H3>
	<form Id="PersonalInfoForm" ACTION="special-search.php" METHOD="POST">
  <table width="98%" cellspacing="1" cellpadding="1">
   
    
    <tr> 
      <td>Designation: </td>
      <td> 
        <SELECT id=SelectHall name=SelectHall><OPTION value=''></OPTION><OPTION value=1095 >1095</OPTION><OPTION value=4 >4</OPTION><OPTION value=6117 >6117</OPTION><OPTION value=8 >8</OPTION><OPTION value=A212 >A212</OPTION><OPTION value=ACES >ACES</OPTION><OPTION value=G115 >G115</OPTION><OPTION value=G117 >G117</OPTION><OPTION value=G118 >G118</OPTION><OPTION value=GH >GH</OPTION><OPTION value=GH1 >GH1</OPTION><OPTION value=I >I</OPTION><OPTION value=II >II</OPTION><OPTION value=III >III</OPTION><OPTION value=IITK >IITK</OPTION><OPTION value=IV >IV</OPTION><OPTION value=IX  SELECTED >IX</OPTION><OPTION value=N.RA >N.RA</OPTION><OPTION value=OTHE >OTHE</OPTION><OPTION value=SBRA >SBRA</OPTION><OPTION value=SCH >SCH</OPTION><OPTION value=T-VI >T-VI</OPTION><OPTION value=T4 >T4</OPTION><OPTION value=V >V</OPTION><OPTION value=VI >VI</OPTION><OPTION value=VII >VII</OPTION><OPTION value=VIII >VIII</OPTION></SELECT><br><br></td></tr><tr><td></td>
        
        
     

    </tr>
    <tr>   
    <td></td><td> <INPUT type="submit" name="submitDesig" value="GO">  </td>
	  </tr>
	  
  </table>
  
  
  
  
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
	
	

?>

					
					
					
<p>&nbsp;</p>

</body>
</html>












