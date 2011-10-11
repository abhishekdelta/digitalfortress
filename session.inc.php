<?php

$cookie_path = "/";
$cookie_timeout =  60 * 30; // in seconds//60 * 30
$garbage_timeout = $cookie_timeout + 300; // in seconds //300
ini_set('session.name',"PHPSESSID");
session_set_cookie_params($cookie_timeout, $cookie_path);
ini_set('session.gc_maxlifetime', $garbage_timeout);
$sessdir = "../sessions";
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

require_once("../auth.lib.php");
require_once("../mysql.inc.php");

mysqlConnect();
if(!checkSessionAuth())
{
        showWarning(1);
        exit(1);
}
if(isLevelCompleted($LEVELNAME))
{
	showWarning(2);
	exit(1);
}
$USERLOGGEDIN=true;
updateUserAttempt($LEVELNAME);
$LEVELPOINTS=getLevelPoints($LEVELNAME);

?>

