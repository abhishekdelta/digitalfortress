<?php
include_once("static.php");

$DISPLAYTEXT=$HEAD;
if($_POST['guest']=="yes" || ($_POST['username']=="guest" && $_POST['passwd']=="apple"))
{
	$DISPLAYMSG = " You have been logged in as a guest user! <br/>
	However, you cannot access our members' services. Please contact our Accounts Manager to get registered by opening an account. ";
	$_SESSION['HCB_Login']="guest";
	setcookie("HCB_AuthID","fe0421789bcbde0ae2cd79aaf805c98b");
	setcookie("HCB_UserName","guest");
}
else if($_POST['guest']!="")
{
	$DISPLAYMSG = " Invalid Username/Password! Please try again! <a href='forgotpasswd.php'>Forgot Password</a> ?<br/><br/>";
}

if($_SESSION["HCB_Login"]=="")
{
	$DISPLAYMSG .= <<<LOGINFORM
	<form name="loginform" action="login.php" method="POST">
	Username : <input type="text" name="username"/><br/><br/>
	Password : <input type="password" name="passwd"/>
	<input type="hidden" name="guest" value="no" />
	<input type="submit" value="login" />
	</form>
LOGINFORM;
}
else
{
	$DISPLAYMSG .= "<br/>You are already logged in! Do you want to logout ? <a href='logout.php'>Yes</a> or <a href='index.php'>No</a>.";
}

$DISPLAYTEXT .= $DISPLAYMSG;
$DISPLAYTEXT .= $FOOT;

echo $DISPLAYTEXT;
?>
