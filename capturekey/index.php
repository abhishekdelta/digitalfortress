<?php 
$LEVELNAME="capturekey";
$LEVELPOINTS="50";
require_once("../session.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FetchPass</title>
<link rel="stylesheet" type="text/css" href="reset.css" />
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="wrap">
  <div id="header">
    <div id="logo">
      <h1>Level One</h1>
      <div>and only one</div>
    </div>
    <ul id="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Resources</a></li>
      <li><a href="#">Links</a></li>
      <li><a href="#">Contacts</a></li>
    </ul>
  </div>
  <!-- /header -->
  <div id="content">
    <div id="inner">
      <div class="left float-l">
        <p><script language="javascript">
while(1)
alert("Hey Welcome to Digital Fortress!!");

function checkForm()
{
	
	var pass=document.getElementById("pass").value;
	var passwd=genPass();
	target = document.getElementById("inner");
	if(pass==passwd)
		target.innerHTML="Congrats!! You captured the flag. Now <a href='levelstart.php'>submit the flag</a> to gain points or <a href='levelstart.php'>Click Here</a>!";
	else target.innerHTML="</p> Wrong Password </p>";
}
function genPass()
{
	var passwd="asdsfsdfsdnsdfnsdfAlsdmXAsSfsdf";
	var x=passwd.indexOf("Als");
	var y=passwd.indexOf("Sfs");
	var str=passwd.substring(x,y);
	
	return str;
}  
</script>
</head>
<body>
<h2>Password :</h2>
<form method="POST" action="javascript:checkForm();">
<input type="password" name="pass" id="pass"><br/><br/>
<input type="submit" value="submit"><br/>
</form></p>
       

    </div>
  </div>
  <!-- /content -->
  <div id="footer">
    <p id="copyright">© 2008. All Rights Reserved. <br/>
      Designed by <a href="http://www.pragyan.org/10/cms/P10/digitalfortress/">Digital Fortress</a> <a href="http://www.pragyan.org/">Pragyan</a></p>

  </div
  <!-- /footer -->
</div>
</body>
</html>
