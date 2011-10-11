<?php
$LEVELNAME="hacklandcentralbank";
$LEVELPOINTS="";
$LEVELFLAG="..";
$USERLOGGEDIN=false;
require_once("../session.inc.php");
$LEVELINFO=getLevelInfo($LEVELNAME);
$LEVELID=getLevelId($LEVELNAME);

$BODY=<<<BODY
<div id=startcontent>
<h2>LEVEL $LEVELID</h2>

BODY;

$BODY.=<<<BODY
<p>$LEVELINFO</p>
<br>
<input type="button" onclick="window.open('./index.php','_top')" value="Enter the level" />
<br>

BODY;

$BODY.="</div>";
require_once("../ui/static.php");
echo $HEAD.$BODY.$FOOT;

?>
