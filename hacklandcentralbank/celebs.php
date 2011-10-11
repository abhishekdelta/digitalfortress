<?php
include_once("static.php");
$DISPLAYTEXT= $HEAD;

if($_SESSION["HCB_Login"]=="")
{
	$DISPLAYMSG = "Please Login First!";
}
else
{
	include_once("../mysql.inc.php");
	$res=mysql_query("SELECT * FROM hacklandcentralbank WHERE type='both' OR type='celeb'");
	echo mysql_error();

	$DISPLAYMSG="<table cellspacing=5>
	<tr><td>Full Name</td><td>Username</td><td>Email</td></tr>";
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		$DISPLAYMSG.="<tr><td>".$row['userfullname']."</td><td>".$row['username']."</td><td>".$row['useremail']."</td></tr>";
	}	
	$DISPLAYMSG.="</table>";
}


$DISPLAYTEXT .= $DISPLAYMSG;
$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
