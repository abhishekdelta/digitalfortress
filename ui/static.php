<?php
global $USERLOGGEDIN,$LEVELFLAG;
if($LEVELFLAG=="")
	$LEVELFLAG=".";
	
$HEAD=<<<HEAD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Digital Fortress 2010</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="$LEVELFLAG/ui/style/main.css" media="screen" />
</head>
</head>
<body>
<div id="wrap">

<div id="header"> 
<div style="float: left;">
<img src="$LEVELFLAG/ui/images/banner_blue.jpg" alt="Digital Fortress" />
</div>

</div>
<div id="content">



<div id="navigation">
<ul>
<li><a href="$LEVELFLAG/index.php?page=home">Home</a></li>
<li><a href="$LEVELFLAG/index.php?page=contact">Contact</a></li>
<li><a href="http://www.pragyan.org/10/forum/digitalfortress">Forum</a></li>
HEAD;
if($USERLOGGEDIN==true)
{
	$HEAD .=<<<HEAD
		<li><a href="$LEVELFLAG/index.php?page=challenges">Challenges</a></li>
		<li><a href="$LEVELFLAG/index.php?page=logout">Logout</a></li>
HEAD;
	
}


$HEAD .="</div>";

if($USERLOGGEDIN==true)
{

	$score=getUserScore();
	$rank=getUserRank($score);
	$HEAD.="<div style='float : right;padding-top:10px;'>Your Score : $score Your Rank : $rank</div>";

}

$HEAD .=<<<HEAD
<div style="clear: both;"> </div>
<div style="clear: both;"> </div>
HEAD;

$FOOT=<<<FOOT
<div id="footer">
<div style="float: right;">
<a href="$LEVELFLAG/index.php?page=contact"><img src="contact.gif" alt="Contact" /></a>
</div>
&copy; 2010 Digital Fortress, <a href="http://www.pragyan.org">Pragyan `10</a>. All rights reserved.
</div>
</div>

</body>
</html>
FOOT;


?>



