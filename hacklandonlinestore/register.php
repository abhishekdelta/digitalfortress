<?php
include_once("static.php");
function validateform($_POST)
{
	if($_POST["username"]=="" || $_POST["password1"]=="" || $_POST["password2"]=="" ||$_POST["name"]=="" ||$_POST["creditcardid"]=="")
		return false;
	if($_POST["password1"]!=$_POST["password2"])
		return false;
//|| !eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*",$_POST["username"])
	if(!eregi("^[_0-9-]+(\.[_0-9-]+)*",$_POST["creditcardid"]) )
		return false;
	return true;
}
if($_POST["username"]!="" || $_POST["password"]!="")
{
	if(!validateform($_POST))
	{
		$INFOMSG="Incomplete/Invalid form! Please complete all the fields with correct values. Make sure the passwords match.";
	}
	else 	{

	include_once("../mysql.inc.php");
	$query="SELECT * FROM hacklandonlinestore WHERE username='".$_POST["username"]."'";
	$res=mysql_query($query);
	if(mysql_num_rows($res)>0)
	{
		$INFOMSG="Username already exists!";
	}
	else
	{
		$query="INSERT INTO hacklandonlinestore VALUES ('".$_POST["name"]."','".$_POST["username"]."','".md5($_POST["password1"])."','".$_POST["creditcardid"]."')";
		$res=mysql_query($query);
		if(mysql_errno()!=0)
		{
			$BODY="Registration failed!";
		}
		else 
		{
			$BODY="Registration Successful! Please login <a href='login.php'>here</a>.<br/>";
		}
	}
		}
}

if($_SESSION["HOS_Login"]=="")
{
$BODY.=<<<BODY

<form name="register" action="register.php" method="POST">
<table>
<tr><td>Name :</td><td> <input type="text" name="name" /></td></tr>
<tr><td>Username :</td><td> <input type="text" name="username" /></td></tr>
<tr><td>Password :</td><td> <input type="password" name="password1" /></td></tr>
<tr><td>Confirm Password :</td><td> <input type="password" name="password2" /></td></tr>
<tr><td>Credit Card Number :</td><td> <input type="text" name="creditcardid" /></td></tr>
<tr><td colspan="2"> <input type="submit" value="Register" /></td></tr>
</table>
</form><br/><br/>$INFOMSG
BODY;
}
else
{
	$BODY.="You are already logged in!";
}
echo $HEAD.$BODY.$FOOT
?>


