<?php
include_once("static.php");
if($_SESSION["HOS_Login"]=="")
{
	$BODY="Please Login First!";
}
echo $HEAD.$BODY.$FOOT;
?>
