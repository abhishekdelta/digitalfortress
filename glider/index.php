<?php
$encodedstring="124 141 315 214 324 215";
?>
<?php
$LEVELNAME="glider";
$LEVELPOINTS="100";
require_once("../session.inc.php");
?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="root"/> 
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<title>The Glider</title>
</head>

<body>

<div class="container">

	<div class="gfx"><span></span></div>

	<div class="top">

		<div class="pattern"><span></span></div>

		<div class="header">
			<h1>The Glider</h1>
			<p>Hacker's Symbol</p>
		</div>

		<div class="pattern"><span></span></div>

	</div>

	<div class="content">

		<div class="spacer"></div>

		<div class="item">

			<div class="title">Glider</div>
			<div class="metadata">The Hacker's Emblem</div>
			
			<div class="body">

				<p>The Hacker Emblem was first proposed in October 2003 by Eric S. Raymond, claiming a need for a uniting and recognizable symbol for his perception of hacker culture. This does not refer to the hackers breaking into computers, but to the hacker culture around BSD, perl, GNU, Linux, etc; that is, the community around free software and open source.</p>

				<div class="left"><img src="img/glider.bmp?c=123"></div>

				<p>Raymond has said that one does not claim to be a hacker by displaying this emblem, but suggests that "by using this emblem, you express sympathy with hackers' goals, hackers' values, and the hacker way of living".</p>

				<p>The image itself is a representation of a glider formation in Conway's Game of Life.
				</p>

			</div>

		</div>

		<div class="divider"><span></span></div>

		<div class="item">

			<div class="title">Are you a hacker?</div>
			<div class="metadata">Test it here</div>

			<div class="body">
				
				<p>As you know, Hacker is one who gets to the depth of everything. If ones wants to be called a hacker, he must know how to 
use every single bit of information to solve the problem.</p>

				<h2>The test</h2>
		
				<p>Encoded String is: <b><?php echo $encodedstring; ?></b>.<br> You have to decode this string.(note that decoded string doesn't contain any spaces). Your only help would be the Hacker's Emblem: Glider which is being displayed above. </p>
				
				
			</div>

		</div>

		

		<div class="divider"><span></span></div>

		

	</div>
		
	<div class="footer">

		
		
		
		
		<div class="clearer">&nbsp;</div>

	</div>

</div>

</body>

</html>
