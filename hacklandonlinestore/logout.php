<?php
include_once("static.php");

if($_SESSION["HOS_Login"]=="")
{
	$BODY .= "Please login first!";
}
else
{
	$_SESSION["HOS_Login"]="";
	$BODY .= "<br/>You have been successfully logged out!";
}

echo $HEAD.$BODY.$FOOT;
?>
