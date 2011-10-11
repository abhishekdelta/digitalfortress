<?php
$LEVELNAME="hacklandonlinestore";
$LEVELPOINTS="80";
require_once("../session.inc.php");
$HEAD=<<<HEAD
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<title>Hackland Online Store (HOS)</title>
<link rel="stylesheet" href="styles/default.css" />
</head>
<body>
<div id="logo"><h1>Hackland Online Store</h1></div>
<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="#">Buy</a></li>
<li><a href="register.php">Register</a></li>
HEAD;
if($_SESSION["HOS_Login"]=="")
$HEAD.='<li><a href="login.php">Login</a></li>';
else
$HEAD.='<li><a href="logout.php">Logout</a></li>';
$HEAD.=<<<HEAD
<li><a href="#">Browse</a></li>
</ul>
</div>
<hr />
<div id="latest-post" class="wide-post">
<h1 class="title">&nbsp;</h1>
<div class="entry"> <img src="images/img07.jpg" alt="" width="114" height="114" class="left" /><p>
HEAD;


$FOOT=<<<FOOT
<p class="links"> &nbsp; </p></p>
	</div>

<div class="bottom"></div>
</div>
<div id="footer">
<p>
Copyright @ Hackland Online Store, 2010.  All rights reserved.</p>
</div>
</body>
</html>
FOOT;
?>
