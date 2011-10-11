<?php
$cookie_path = "/";
$cookie_timeout = 60 * 60 * 30; // in seconds//60 * 30
$garbage_timeout = $cookie_timeout + 300; // in seconds //300
ini_set('session.name',"PHPSESSID");
session_set_cookie_params($cookie_timeout, $cookie_path);
ini_set('session.gc_maxlifetime', $garbage_timeout);
$sessdir = "sessions";
if (!is_dir($sessdir)) { mkdir($sessdir, 0777); }
ini_set('session.save_path', $sessdir);

function ae_nocache()
{
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
}

ae_nocache();

session_start();
ini_set('display_errors',1);
$USERLOGGEDIN=false;
$BODY="<div id=innercontent>";
require_once("mysql.inc.php");
require_once("auth.lib.php");
mysqlConnect();
if(checkSessionAuth()==true)
		$USERLOGGEDIN=true;
if(!isset($_GET['page']))
{
	$page="home";
}
else
{
	$page=$_GET['page'];
	if($page=="")
		$page="home";
}
if($page=="login")
{
	require_once("ui/login.lib.php");
	
	checkLogin($USERLOGGEDIN);
	if($USERLOGGEDIN==true)$BODY.="Login Successful! <a href='index.php?page=home'>Click Here</a>.";
	else $BODY.="Login Failed! Try Again.<br/>".getLoginForm();
	
}
else if($page=="logout")
{
	require_once("ui/login.lib.php");
	$BODY.=logout($USERLOGGEDIN);
}

require_once("ui/static.php");


if($page=="home")
{
	if($USERLOGGEDIN==false)
	{
		require_once("ui/login.lib.php");
		$BODY.=getLoginForm();
	}
	else
	{
		require_once("ui/etc.lib.php");
		$BODY.=getHomePage($USERLOGGEDIN);
	}
}
else if($page=="challenges")
{
	require_once("ui/challenges.lib.php");
	$BODY.=getChallenges($USERLOGGEDIN);
}
else if($page=="contact")
{
	require_once("ui/etc.lib.php");
	$BODY.=getContactPage($USERLOGGEDIN);
}
$BODY.="</div>";
echo $HEAD.$BODY.$FOOT;

?>
