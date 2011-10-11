<?php 
$LEVELNAME="lstutorial";
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
      <h1>FetchPass</h1>
      <div>Fetch it</div>
    </div>
    <ul id="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Resource</a></li>
      <li><a href="#">Links</a></li>
      <li><a href="#">Contacts</a></li>
    </ul>
  </div>
  <!-- /header -->
  <div id="content">
    <div id="inner">
      <div class="left float-l">
        <h2>List Directory Contents</h2>
        <p><form action="validate.php" method="POST">
Location :<input type="text" name="passwd"><input type="submit" value="Go">
</form>
</p>
       

    </div>
  </div>
  <!-- /content -->
  <div id="footer">
    <p id="copyright">© 2008. All Rights Reserved. <br/>
      Designed by <a href="http://www.pragyan.org/10/cms/P10/digitalfortress/">Digital Fortress</a> <a href="http://www.pragyan.org/">Pragyan</a></p>
    
  </div>
  <!-- /footer -->
</div>
</body>
</html>
