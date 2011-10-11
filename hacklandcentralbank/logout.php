<?php
include_once("static.php");
$DISPLAYTEXT= $HEAD;

if($_SESSION["HCB_Login"]=="")
{
	$DISPLAYMSG .= "Please login first!";
}
else
{
	$_SESSION["HCB_Login"]="";
	$DISPLAYMSG .= "<br/>You have been successfully logged out!";
}

$DISPLAYTEXT .= $DISPLAYMSG;
$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
