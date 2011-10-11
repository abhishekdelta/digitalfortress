<?php
include_once("static.php");

$DISPLAYTEXT = $HEAD;
if($_SESSION["HCB_Login"]!="")
{
	$DISPLAYMSG = "You are already logged in!";
}
else if($_POST['username']!="")
{
	include_once("../mysql.inc.php");
	$query="SELECT * FROM hacklandcentralbank";
	$res=mysql_query($query);
	
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		if($row['username']==$_POST['username'])
		{
				$userfullname=$row['userfullname'];
				$useremail=$row['useremail'];	
				break;
		}
	}
	
	if($useremail=="")
	{
		$DISPLAYMSG = "User is not found in the database!";
	}
	else
	{
		$username=$_POST['username'];
		$DISPLAYMSG = <<<DISPLAYMSG
User is found!<br/>
Name : $userfullname
<form name="sendemail" action="sendmail.php" method="POST">
<input type="hidden" name="username" value="$username" />
<input type="hidden" name="useremail" value="$useremail" />
Click to send the details of the further steps you need to take to recover you password, to your email account!<br/>
<input type="submit" value="Send me an email!" />
</form>
DISPLAYMSG;

	}
	
}
else
{
	$DISPLAYMSG = <<<DISPLAYMSG
	<form name="recoverpassword" action="forgotpasswd.php" method="POST">
	Please enter your username: <input type="text" name="username" /><br/>
	<input type="submit" value="Recover Password" />
	</form><br/>
	If you have forgotten username, then please contact our Network Administrator as well as Accounts Manager.
	
DISPLAYMSG;
}
$DISPLAYTEXT .= $DISPLAYMSG;
$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
