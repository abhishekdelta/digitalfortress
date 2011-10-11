<?php
include_once("static.php");
$DISPLAYTEXT= $HEAD;

if($_SESSION["HCB_Login"]=="")
{
	$DISPLAYMSG = "Please Login First!";
}
else if($_SESSION["HCB_Login"]=="guest")
{
	$DISPLAYMSG = <<<DISPLAYMSG
	We offer a variety of services to our customers, which include large number of celebrities from Hackland.<br/>
	<a href="celebs.php">Click Here</a> to know some of them.<br/><br/>
	Besides, we also randomly select our customers and employees yearly, who get special free trip to nearby Byteland. <br/>
	<a href="special.php">Click Here</a> to know the selected people for this year trip.<br/><br/>
	To avail all the premium services, please get yourself an account by sending an email to our Accounts Manager.	
DISPLAYMSG;
}
else
{
	$DISPLAYMSG = <<<DISPLAYMSG
	Member services are currently down due to routine security inspection. <br/> We apologize for any incovenience caused.
DISPLAYMSG;
}

$DISPLAYTEXT .= $DISPLAYMSG;
$DISPLAYTEXT .= $FOOT;


echo $DISPLAYTEXT;
?>
