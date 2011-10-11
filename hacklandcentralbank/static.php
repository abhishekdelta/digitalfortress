<?php
$LEVELNAME="hacklandcentralbank";
$LEVELPOINTS="50";
require_once("../session.inc.php");

$WIN=0;
$HEAD= <<<HEAD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<title>Hackland Central Bank (HCB)</title>
<link href='style/default.css' rel='stylesheet'/>
</head>
<body>
<div id="wrapper">
<div id="logo" ><h1>HACKLAND CENTRAL BANK</h1></div>
<div id="header">
	<div id="menu">
	<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="services.php">Services</a></li>
	<li><a href="contact.php">Contact Us</a></li>
HEAD;
if($_COOKIE["HCB_UserName"]=="susanf" && $_COOKIE["HCB_AuthID"]=="a24948599b73ac3f44a6fd1f2a8e50" || $_SESSION["HCB_Win"]=="true")
{
	$WIN=1;
	$_SESSION["HCB_Win"]="true";	
}
else if($_SESSION["HCB_Login"]=="")
{
	$HEAD .='<li><a href="login.php">Login</a></li>';
}
else
{
	include_once("../mysql.inc.php");
	$res=mysql_query("SELECT * FROM hacklandcentralbank");
	while($row=mysql_fetch_array($res,MYSQL_ASSOC))
	{
		if($row['username']==$_COOKIE['HCB_UserName'] && $row['authid']==$_COOKIE["HCB_AuthID"])
		{
			$_SESSION["HCB_Login"]=$row['username'];
			break;
		}
	}	

	$HEAD .='<li><a href="logout.php">Logout</a></li> <div style="float:right;">Logged in as '.$_SESSION["HCB_Login"]."</li>";
}
$HEAD .='
	</ul>
	</div>
</div>
<div id="page"><div id="content"><div class="post"><div class="entry"><p>';


$FOOT=<<<FOOT
</p></div></div></div>
<div style="clear: both;">&nbsp;</div>
</div>
<div id="footer">
<hr/>
Copyright @2010 Hackland Central Bank (HCB). All rights reserved.
</div>
</body>
</html>
FOOT;

if($WIN==1)
{
	setcookie ("HCB_UserName", "", time() - 3600);
	setcookie ("HCB_AuthID", "", time() - 3600);
	echo $HEAD." Welcome Susan Fletcher, Administrator! <br/><hr/>CONGRATULATION! YOU HAVE COMPLETED THIS CHALLENGE!<br/>$LEVELPOINTS Points have been added to your score!<br/><a href='../'>Click Here</a>".$FOOT;
	updateUserWin($LEVELNAME,$LEVELPOINTS);

	
	$_SESSION["HCB_Win"]=="false";
	exit();
}

?>
