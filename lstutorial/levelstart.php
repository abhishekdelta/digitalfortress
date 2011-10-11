<?php
$LEVELNAME="lstutorial";
$LEVELANSWER="DanBROwn";
$LEVELPOINTS="";
$LEVELFLAG="..";
$USERLOGGEDIN=false;
require_once("../session.inc.php");
$LEVELINFO=getLevelInfo($LEVELNAME);
$LEVELID=getLevelId($LEVELNAME);

$ANSWERSTATUS="";
$WIN=false;

if(isset($_POST["level{$LEVELID}_passkey"]))
{
	if($_POST["level{$LEVELID}_passkey"]==$LEVELANSWER)
	{
		$ANSWERSTATUS="Congratulations! $LEVELPOINTS have been added to your score. <a href='../'>Click here</a>";
		require_once("../mysql.inc.php");
		updateUserWin($LEVELNAME,$LEVELPOINTS);
		$WIN=true;
	}
	else
	{
		$ANSWERSTATUS="Wrong Answer!";
		require_once("../mysql.inc.php");
		updateUserLost($LEVELNAME);
	}
}

$BODY=<<<BODY
<div id=startcontent>
<h2>LEVEL $LEVELID</h2>


BODY;

if($WIN==false)
{
$BODY.=<<<BODY
<p>$LEVELINFO</p>
<br>
<input type="button" onclick="window.open('./index.php','_top')" value="Enter the level" />
<br>
<br>
<form action="levelstart.php" method="POST">
<input type="password" name="level{$LEVELID}_passkey" />
<input type="submit" value="Submit" />
</form>
<br>
<br>
BODY;
}
$BODY.="$ANSWERSTATUS</div>";
require_once("../ui/static.php");
echo $HEAD.$BODY.$FOOT;

?>
