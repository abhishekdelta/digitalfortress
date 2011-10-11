<?php
include_once("static.php");
include_once("../mysql.inc.php");
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*",$_POST['username']))
{
 $DISPLAYMSG="Dont try to hack us! Hack the challenge instead!"; 
 echo $DISPLAYMSG;
 exit();
}
$query='SELECT * FROM hacklandcentralbank WHERE username="'.$_POST['username'].'"'; 
$res=mysql_query($query);
if(mysql_num_rows($res)==0)
{
	$DISPLAYMSG="Mail Send Error! Invalid User!";
}
else
{
	$row=mysql_fetch_array($res,MYSQL_ASSOC);
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['useremail']))
	{
		$DISPLAYMSG="Invalid EMAIL!";
	}
	 else if($row['useremail']==$_POST['useremail'])
	{
		$DISPLAYMSG="Email successfully sent to ".$_POST['useremail'];
	}
	else
	{
	
		$userfullname=$row['userfullname'];
		$authid=$row['authid'];
		$DISPLAYMSG="";
	/*	$EMAIL =<<<DISPLAYMSG
<br/><br/>EMAIL Contents :<br/><hr/>
<span align="left">
Hello $userfullname,<br/>
You have tried to recover your password.<br/>However, currently we do not provide online password recovery due to security reasons.<br/>
Here is your AuthID : $authid <br/>
Please call Customer Care along with your AuthID to recover your password.<br/>
NOTE : DO NOT GIVE YOUR AUTH ID TO ANYONE. YOUR AUTH ID PLAYS A VERY IMPORTANT ROLE DURING AUTHENTICATION WHEN YOU USE OUR SERVICES.<br/><br/>
Regards,<br/>

Susan Fletcher<br/>
Network Administrator<br/>
Hackland Central Bank
</span>
DISPLAYMSG;
		$DISPLAYMSG.=$EMAIL;*/
		
	//mail send code, make sure whatver mailtype is there, its there in emails/ folder in ui/
	
	require_once("../mailer.lib.php");
	$to = $_POST["useremail"];
	$mailtype = "hca_pass_reset";
	$from = "no-reply@hacklandcentralbank.hl";
	$messenger = new messenger(false);
	$messenger->assign_vars(array('USERFULLNAME'=>"$userfullname",'AUTHID'=>"$authid"));
	if ($messenger->mailer($to,$mailtype,$from))
		$DISPLAYMSG.="Email successfully sent to ".$_POST['useremail'].". Kindly check your e-mail.";
	else 
		$DISPLAYMSG.="Password reset failed!";



/*		$message=wordwrap($EMAIL,70);
		$to=$_POST['useremail'];
		$subject="Hackland Central Bank Password Recovery";
		$headers = 'From: susanfletcher@hacklandmail.hl' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		mail($to,$subject,$message,$headers); */

	}
}
$DISPLAYTEXT = $HEAD;
$DISPLAYTEXT .= $DISPLAYMSG;
$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
