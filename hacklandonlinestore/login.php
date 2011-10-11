<?php
include_once("static.php");
if($_POST["username"]!="" || $_POST["password"]!="")
{
	include_once("../mysql.inc.php");
	if($_POST["username"]=="\' OR 1=1 --" || $_POST["username"]=="\' or 1=1 --" || $_POST["username"]=="\' OR 1=1--" || $_POST["username"]=="\' or 1=1--"  )
	{
		$query="SELECT username,creditcardid FROM hacklandonlinestore WHERE 1=1";
		$res=mysql_query($query);
		
		while($row=mysql_fetch_array($res,MYSQL_ASSOC))
		{
			$BODY.=$row["username"]." ".$row["creditcardid"]."<br/>";
		}
	}
	else
	{
	$query="SELECT * FROM hacklandonlinestore WHERE username='".$_POST["username"]."'";
	$res=mysql_query($query);
	$row=mysql_fetch_array($res,MYSQL_ASSOC);


	if($row["password"]==md5($_POST["password"]))
	{
		$_SESSION["HOS_Login"]=$_POST["username"];
	}
	else
	{
		$BODY="Invalid Username/Password!";
	}
	}
}

if($_SESSION["HOS_Login"]=="")
{
$BODY.=<<<BODY
<form name="login" action="login.php" method="POST">
Username :<input type="text" name="username" /><br/>
Password :<input type="text" name="password" /><br/>
<input type="submit" value="login" />
</form>
BODY;
}
else
{
	$BODY.="You are already logged in!";
}
echo $HEAD.$BODY.$FOOT
?>
